<?php
session_start();

$servername = "localhost";
    $username = "root";
    $password = "";
    $db="student_attendance";
    $conn = mysqli_connect($servername, $username, $password,$db);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attendance signer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
<h1>Thank you for signing Up to day </h1>


<SCRIPT LANGUAGE="JavaScript">
var maintenant=new Date();
document.write(maintenant);
</SCRIPT>
<br>


<br>
<br>
<div>
<button type="button" class="btn btn-primary btn-lg"><a href="index.php">OK</a></button>

</div><br>

<div>
<button type="button" class="btn btn-primary btn-lg"><a href="profil.php">prof's</a></button>

</div




<?php
    
  // le script qui permet de signer une fois

       $email = $_SESSION["email"];
    $dup = mysqli_query($conn,"select * from student where email = '$email'");
      $row = mysqli_fetch_assoc($dup);
      $id = $row["id"];
      $_SESSION["id"]= $row["id"];
      $_SESSION["name"]= $row["name"];
      $_SESSION["tel"]= $row["tel"];
      $_SESSION["sex"]= $row["sex"];
      $_SESSION["file_name"]= $row["file_name"];

    


    // 

      $date = date("Y-m-d");

     echo "$id";
    $verif = mysqli_query($conn, "SELECT * FROM attendance WHERE iduser='2' AND datesign='2020-08-30'");
    if (mysqli_num_rows($verif) == 0) {
        echo "Le cours na pas encore"; 
    }
    else{
        $row_verif= mysqli_fetch_assoc($verif);
        $cours = $row_verif["cours"];

        $statut = $row_verif["statut"];
        if ($cours == 1) {
            echo "";
        } else {
            if (mysqli_num_rows($verif) == 1 && $statut != 'present') {
                $insertion = "UPDATE attendance SET statut='present' WHERE student_id= '$id' AND attendance_date='$date'";
                mysqli_query($conn, $insertion);
                echo "";
            } else {
                if (mysqli_num_rows($verif) == 0) {
                    echo "";
                } else {
                    echo "";
                }
            }
        }
    }


   
 ?>
 

 </body>

</html>