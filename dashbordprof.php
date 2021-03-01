
 <?php

include 'database.php';
session_start();






 
?>


<SCRIPT language="Javascript">
        function debut_cours() {

            fr_validation.submit();

        }
        function fin_cours() {

            fin_validation.submit();
        }

    </SCRIPT>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">

<?php
                if (isset($_POST["submit"])) {
                   

                    //  Debut de la journée
                    $date = date("Y-m-d");
                    
                     $verif = mysqli_query($conn,"SELECT datesign FROM attendance WHERE  datesign='$date'");
  
                    if (mysqli_num_rows($verif) == 0) {
                        
                        $insertion = "INSERT INTO `attendance` ( `iduser`, `statut`) select distinct id, 'abscent' from student";
                        mysqli_query($conn, $insertion);
                    } else {
                        echo "Les cours ont déjà débuté";
                    }
                }

                if (isset($_POST["fin_submit"])) {
                    

                    //  Debut de la journée
                    $date = date("Y-m-d");
                    $verif = mysqli_query($conn, "SELECT datesign FROM attendance WHERE  datesign = '$date'");
                    if (mysqli_num_rows($verif) != 0) {
                       
                        $update = "UPDATE attendance SET cours = 1 WHERE datesign = '$date' ";
                        mysqli_query($conn, $update);
                        echo "Fin de cours";
                    } else {
                        echo "fin de cours echec";
                    }
                }

                ?>

</head>
<body class="container bg-light">
<br>
<br>
<br>
    </div>
    <div class="row bg-dark text-light">
        <div class="col-3 p-2"><h2><?php echo $_SESSION["name"]; ?> </h2></div>
        <div class="col p-2"></div> <BR></BR>
        <div class="col-1 p-1 d-flex flex-reverse "><button type="button" class="btn btn-primary"><a href="logout.php" class="text-light">Deconnecter</a></button><br/></div>
        <div class="col-2 p-2 d-flex flex-reverse text-light">
    <div></div></div></div>

    <span>
    <a href="index.php" class="text-info">Acceuil</a>
    </span> <br>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">

                            <img src="<?php echo $_SESSION["file_name"];?>" alt=""/>
                            <br>
                            <div class="file">
                        
                                <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn btn-primary" name="btnAddMore" value="Edit Profile"/>
                        
                          </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["id"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["name"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo $_SESSION["email"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                          <p><?php echo $_SESSION["tel"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>sexe</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION["sex"]; ?></p>
                                            </div>
                                        </div>
                            </div>
                            <form method="post" action="update.php"  >
                          <input type="hidden" name="editId" value="<?php echo $row["id"];?>"/>
                          <button type="submit" class="btn btn-primary btn-lg" ><a href="edit.php" class="text-light">Editer</a></button><br/>
                          </form>
                    
                </div>
                
            </form>  
            </div>
        </div>
<br><br>
<br><br>



<div class="col-10" id="chartContainer" style="height: 370px; width: 100%;"></div>


<br><br>
<br><br>


    <style>
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	</style>
	</head>
	
	<body>
 

 <!-- signature -->
 <?php
 $id = $_SESSION['id'];
      $sql = "SELECT `iduser`, `datesign`, `statut`, `why` FROM `attendance` WHERE `statut`= 'abscent' AND `iduser`= '$id'";
	$result = mysqli_query($conn,$sql);
      
      
?>


    <div class="demo-content">
		<h2 class="title_with_link">Student attendance</h2>
 
<?php if(!empty($result))	 { ?>
<table class="table-content">
          <thead>
        <tr>
                      
          <th width="30%"><span>Datesign</span></th>
          <th width="30%"><span>statut</span></th> 
          <th width="40%"><span>Why</span></th>         
        	  
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
			
			<td><?php echo $row["datesign"]; ?></td>
			<td><?php echo $row["statut"]; ?></td>
      <td><?php echo $row["why"]; ?></td>

		</tr>
   <?php
		}
   ?>
   <tbody>
  </table>
<?php } ?>
 
  </div>




 <!-- fin signature -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>



