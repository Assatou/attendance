<?php
include 'database.php';
session_start();

$email = $_SESSION["email"];
      $dup = mysqli_query($conn,"select * from liste where email = '$email'");
      $row = mysqli_fetch_assoc($dup);
	  $id = $row["id"];
	
   

  

	//   graphe

	 
?>

<!DOCTYPE html>
<html>
<head>

	<title>Teacher</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="style2.css">
<!------ Include the above in your HEAD tag ---------->

<SCRIPT language="Javascript">
        function debut_cours() {

            fr_validation.submit();
        }
        function fin_cours() {

            fin_validation.submit();
        }

    </SCRIPT>
</head>
<body >


    <div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>

<div id="wrapper">

    <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars" aria-hidden="true" style="color: white;"></i>
            </button>
            <div class="navbar-brand">   
            </div>
        </div>

        <form action="" class="navbar-form navbar-left">
            <div class="input-group">
              <div class="input-group-btn">
                  <button class="btn  search-btn-icon">
                   <i class="fa fa-search" aria-hidden="true"></i>                  
                  </button>
               </div>
              <!-- <input type="Search" placeholder="Search..." class="form-control-serch search-box" />    -->
            </div>     
        </form>

        <!-- Top Menu Items -->
        <div class="items">
          <ul class="nav navbar-right top-nav">        
            <li class="editpro">
              <i class="fasett fa-cog" aria-hidden="true" class="menu-button" id="menu-button"></i> 
              <h5 class="pull-left login-person-head"></h5> 
            </li>
          </ul>
        </div>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color: #616060; border:1px solid #616060;">
            <ul class="nav navbar-nav side-nav">
              <a href="#"><img class="logostyle" src= alt="LOGO"></a>
                <li>
                   <a class="active" href="liste.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-home" aria-hidden="true"></i>   <span style="color:white;">  Voir le profil des étudiants </span></a>
                </li>
                <li>
                    <a class="#" href="prof.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-user-o" aria-hidden="true"></i>   <span style="color:white;">  Liste de presence </span></a>
                </li>
                <li>
                    <a class="#" href="update.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-calendar" aria-hidden="true"></i>   <span style="color:white;"> abscences </span></a>
                </li>
                <li>
                    <a class="#" href="table.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-envelope" aria-hidden="true"></i>  <span style="color:white;"> courbes </span></a>
                </li>
                <li>
                    <a class="#" href="recherche.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-cogs" aria-hidden="true"></i>   <span style="color:white;"> Settings </span></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
  </nav>


<div class="container-fluid">
<div class="row text-center">
<div class="col-md-12 dashhead">
<h1> Teacher board</h1>
<div>
<td>
                    <form action="darshbord.php" method="post" name="fr_validation">
                        <input type="submit" name="submit" value="Début des cours" onclick="debut_cours();">
                    </form>
                </td>
                <td>
                    <form action="darshbord.php" method="post" name="fin_validation">
                        <input type="submit" name="fin_submit" value="fin cours" onclick="fin_cours();">
                    </form>
                </td>
</div>
<?php
                if (isset($_POST["submit"])) {
                   

                    //  Debut de la journée
                    $date = date("Y-m-d");
                    // $verif = mysqli_query($conn, "SELECT attendance_date FROM attendance WHERE  attendance_date = '$date'");
                     $verif = mysqli_query($conn,"SELECT datesign FROM attendance WHERE  datesign='$date'");
  
                    if (mysqli_num_rows($verif) == 0) {
                        
                        $insertion = "INSERT INTO `attendance` ( `iduser`, `statut`) select distinct id, 'abscent' from student";
    mysqli_query($conn, $insertion);
                    } else {
                        echo "Les cours ont déjà débuté";
                    }
                }

                if (isset($_POST["fin_submit"])) {
                    echo "validé";

                    //  Debut de la journée
                    $date = date("Y-m-d");
                    $verif = mysqli_query($conn, "SELECT datesign FROM attendance WHERE  datesign = '$date'");
                    if (mysqli_num_rows($verif) != 0) {
                        // $insertion = "INSERT INTO attendance ( student_id, attendance_statut) VALUES ('67', 'abscent'), ( '69', 'abscent'), ('70', 'abscent'), ( '71', 'abscent'), ( '73', 'abscent'), ( '74', 'abscent'), ( '91', 'abscent')";
                        $update = "UPDATE attendance SET cours = 1 WHERE datesign = '$date' ";
                        mysqli_query($conn, $update);
                        echo "Fin de cours";
                    } else {
                        echo "fin de cours echec";
                    }
                }

                ?>

<?php include "liste.php" ?>





</div>
</div>
</div>

  </div><!-- /#wrapper -->
</body>
</html>




	
	
	
	
	
	