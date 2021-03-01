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
    <title>Votre signature</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>



<SCRIPT LANGUAGE="JavaScript">
var maintenant=new Date();
document.write(maintenant);
</SCRIPT>
<br>
    
    
   <div>
    <a href="logout.php" class="btn btn-primary ">Deconnecter</a>  
   </div>
     
    <div>
    <a href="profiletud.php" class="btn btn-primary ">Mon profil</a>  
   </div>


    <?php
  $email = $_SESSION["email"];
    $dup = mysqli_query($conn,"select * from student where email = '$email'");
      $row = mysqli_fetch_assoc($dup);
      $id = $row["id"];
      $_SESSION["id"]= $row["id"];
      $_SESSION["name"]= $row["name"];
      $_SESSION["tel"]= $row["tel"];
      $_SESSION["sex"]= $row["sex"];
      $_SESSION["file_name"]= $row["file_name"];

    // le script qui permet de signer une fois

    $date = date("Y-m-d");
    

    $verif = mysqli_query($conn, "SELECT * FROM attendance WHERE iduser='$id' AND datesign='$date'");
    if (mysqli_num_rows($verif) == 0) {
        echo "<script>alert(\"le cours n'a pas encor debuté\")</script>"; 
    }
    else{
        $row_verif= mysqli_fetch_assoc($verif);
        $cours = $row_verif["cours"];
    
        $statut = $row_verif["statut"];
        if ($cours == 1) {
            echo "<script>alert(\"le cours est fini\")</script>";
        } else {
            if (mysqli_num_rows($verif) == 1 && $statut != 'present') {
                $insertion = "UPDATE attendance SET statut='present' WHERE iduser= '$id' AND datesign='$date'";

                mysqli_query($conn, $insertion);
                echo "<script>alert(\"Vous avez bien signé\")</script>";
            } else {
                if (mysqli_num_rows($verif) == 0) {
                    echo "<script>alert(\"le cours n'a pas encor debuté\")</script>";
                } else {
                    echo "<script>alert(\"Vous avez deja signé\")</script>";
                }
            }
        }
    }
    
    ?>

</body>

</html>