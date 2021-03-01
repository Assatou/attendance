<?php
// php
session_start();

include 'database.php';

      $email = 'teacher@gmail.com';
      $dup = mysqli_query($conn,"select * from liste where email = '$email'");
     var_dump($dup);
      $row = mysqli_fetch_assoc($dup);
      var_dump($row);
      $id = $row["id"];
      

     // $_SESSION["id"]= $row["id"];
     // $_SESSION["name"]= $row["name"];
     //  $_SESSION["password"]= $row["password"];
     //  $_SESSION["email"]= $row["email"];

?>