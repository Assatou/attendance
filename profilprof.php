
 <?php

include 'database.php';
session_start();

$email = $_SESSION["email"];
      $dup = mysqli_query($conn,"select * from student where email = '$email'");
      $row = mysqli_fetch_assoc($dup);
      $id = $row["id"];

      
      $_SESSION["id"]= $row["id"];
      $_SESSION["name"]= $row["name"];
      $_SESSION["tel"]= $row["tel"];
      $_SESSION["sex"]= $row["sex"];
      $_SESSION["file_name"]= $row["file_name"];


      echo 'Vous etre connecté en tant que '.$row["name"].'';



      // Recuperer les infos sur la liste de presence
      


      
      

     
    




$req = "select  case when mois=1 then CONCAT('Janavier-',ANNEE)
              when mois=2 then CONCAT('Fevrier-',ANNEE)
			  when mois=3 then CONCAT('Mars-',ANNEE)
			  when mois=4 then CONCAT('Avril-',ANNEE)
			  when mois=5 then CONCAT('Mai-',ANNEE)
			  when mois=6 then CONCAT('Juin-',ANNEE)
			  when mois=7 then CONCAT('Juillet-',ANNEE)
			  when mois=8 then CONCAT('Aout-',ANNEE)
			  when mois=9 then CONCAT('Septembre-',ANNEE)
			  when mois=10 then CONCAT('Octobre-',ANNEE)
			  when mois=11 then CONCAT('Novembre-',ANNEE)
			  when mois=12 then CONCAT('Decembre-',ANNEE) end MOIS_NOM,
			  nonbre from(
 SELECT student.name, COUNT('attendance.datesign') FROM attendance, student WHERE student.id=attendance.iduser GROUP BY name
 ) as t";


 if($result=$conn->query($req)){
$dataPoints = array();
$graph = array();
while($row=$result->fetch_row()){
  array_push($graph,array("y" => $row[1], "label" => "$row[0]"));

}
 }


$dataPoints = $graph;





 

 
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  title: {
    text: "Attendance per Week"
  },
  axisX: {
    title: "mois"
  },

   axisY: {
    title: "nombre signature"
  },
  
  data: [{
    type: "spline",
    markerSize: 2,
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
</head>
<body class="container bg-light">
<br>
<br>
<br>
   

    
    </div>
<div class="row bg-secondary text-light">
  <div class="col-3 p-2"><h2><?php echo $_SESSION["name"]; ?></h2></div>
  <div class="col p-2"></div>
  <div class="col-1 p-1 d-flex flex-reverse "><button type="button" class="btn btn-primary "><a href="logout.php" class="text-light">Lougout</a></button><br/></div>
  <div class="col-2 p-2 d-flex flex-reverse text-light"><button type="button" class="btn btn-primary btn-lg"><a href="editprofil.php" class="text-light">Edit profil</a></button><br/></div>


</div>
   
      <span>
    <a href="index.php" class="text-info">Home</a>
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


if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
      
      
?>


    <div class="demo-content">
		<h2 class="title_with_link">Student attendance</h2>
 
<?php if(!empty($result))	 { ?>
<table class="table-content">
          <thead>
        <tr>
                      
          <th width="30%"><span>Datesign</span></th>
          <th width="50%"><span>time</span></th>          
        	  
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
			
			<td><?php echo $row["datesign"]; ?></td>
			<td><?php echo $row["time"]; ?></td>

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



