<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="student_attendance";
	$conn = mysqli_connect($servername, $username, $password,$db);
	
	
	
	$sql = "SELECT name, email, tel
FROM student";
	$result = mysqli_query($conn,$sql);
?>

<html>
	<head>
    <title>teacher page</title>		
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	</style>
	</head>
	
	<body>
    <div class="demo-content">
		<h2 class="title_with_link">Student attendance</h2>
  
<?php if(!empty($result))	 { ?>
<table class="table-content">
          <thead>
        <tr>
                      
          <th width="30%"><span>Name</span></th>
          <th width="50%"><span>email</span></th>          
          <th width="20%"><span>phone</span></th>	  
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["tel"]; ?></td>

		</tr>
   <?php
		}
   ?>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</body></html>
