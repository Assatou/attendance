<?php
session_start();
include 'database.php';


$user_id = $_SESSION["id"];
     
echo 'Vous etre connecté en tant que '.$user_id.'';

$sql = mysqli_query($conn, "select name, tel, email, password, file_name from student where id=$user_id");
$row = mysqli_fetch_assoc($sql);
$name = $row["name"];
$phone = $row["tel"];
$email = $row["email"];
$pass = $row["password"];
$file_name = $row["file_name"];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Attendance profile</title>
    <meta charset="utf-8">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag -------- -->
    <SCRIPT language="Javascript">
        function checkpass() {
            if (document.profile_form.password1.value != document.profile_form.password2.value) {
                window.alert("mots de passe non conforme");
            }
            //     else {
            //     //    function bien(){ok}
        }
    </SCRIPT>
</head>

<?php

$error_name = '';
$error_phone = '';
$error_email = '';
$error_image = '';
$error_pass = '';
$error = 0;
$success = '';

if (isset($_POST["button_action"])) {
    $name_new = $_POST["name"];
    $email_new = $_POST["email"];
    $phone_new = $_POST["tel"];
    $pass1_new = $_POST["password"];
    $pass2_new = $_POST["password1"];
    $Newpass = $pass;

    if ($pass != $pass1_new || $name_new == '') {
        if ($name_new == '') {
            $error_name = 'le nom doit pas etre nul';
        }
        if ($pass != $pass1_new) {
            $error_pass = 'mot de passe saisi est incorrect';
        }
    } else {
        if ($pass2_new != '') {
            $Newpass = $pass2_new;
        }

        if ($_FILES['file']['name']) {
            $FName = md5($_FILES['file']['name']);
            echo $_FILES['file']['name'];
            echo "je suis la";
            $NewFile = "empphoto/" . $FName;
            if (!move_uploaded_file($_FILES['file']['tmp_name'], $NewFile)) {
                die("Failed to move file " . $_FILES['file']['tmp_name'] . " to " . $FName);
            } else {
                $update = mysqli_query($conn, "UPDATE student SET name = '$name_new', tel = '$phone_new', email= '$email_new', password = '$Newpass' , file_name = '$NewFile' WHERE id='$user_id'");
            }
        } //si fichier n'existe pas
        else {
            $update = mysqli_query($conn, "UPDATE student SET name = '$name_new', tel = '$phone_new', email= '$email_new', password = '$Newpass' WHERE id='$user_id'");
        }
        $update = mysqli_query($conn, "UPDATE student SET name = '$name_new', tel= '$phone_new', email= '$email_new', password = '$Newpass' WHERE id='$user_id'");

        if ($update) {

            $_SESSION["id"]=$user_id;
            $_SESSION['email']=$email_new;
            $_SESSION['password']=$Newpass;
            $status = 'success';
            $success = '<div class="alert alert-success">Profile Details Change Successfully</div>';
           
            
            header('Location: profiletud.php');
            echo "Modifier avec succès";
        } else {
            echo  'Echec modification, Veuillez reprendre.';
        }


        mysqli_close($conn);
    }
}




?>

<body>

    <div class="container" style="margin-top:30px">
        <span><?php echo $success; ?></span>
        <div class="card">
        
            <form method="post" name="profile_form" id="profile_form" enctype="multipart/form-data">
            <div>
            <input type="text" name="editeId" value="<?php echo$user_id?>">
            </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">Profile</div>
                        <div class="col-md-3" align="right">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Name <span class="text-danger"></span></label>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo$name ?>" />
                                <span class="text-danger"><?php echo$error_name ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Telephone <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="tel" id="tel" class="form-control" value="<?php echo$phone ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Email<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="email" id="email" class="form-control" value=" <?php echo$email ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Ancien password <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo$pass ?>" />
                                <span class="text-danger"> <?php echo $error_pass ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Nouveau password <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="password" name="password1" id="password1" class="form-control" placeholder="Leave blank to not change it" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Confirmez Nouveau password <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Leave blank to not change it" onchange="checkpass();" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Image <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="file" name="file" />
                                <span class="text-muted">Only .jpg and .png allowed</span><br />
                                <img src="<?php echo $file_name?>" class="img-thumbnail" style="width:200px;height:210px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" align="center">


                    <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Save" />
                </div>
            </form>
        </div>
    </div>
    <br />
    <br />
    <a href="profil.php">Retour</a>
</body>

</html>


