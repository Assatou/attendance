<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="student_attendance";
	$conn = mysqli_connect($servername, $username, $password,$db);
	
	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		
		$queryCondition .= "WHERE datesign BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT student.name, attendance.datesign, attendance.statut, attendance.why
	FROM attendance, student " . $queryCondition . " ORDER BY datesign desc";
	$result = mysqli_query($conn,$sql);
?>

<html>
	<head>
    <title>Students attendance part2</title>		
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
	.table-content{border-top:black 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: black;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: black 1px solid;vertical-align:top;} 
	</style>
	</head>
	
	<body>
    <div class="demo-content">
		<h2 class="title_with_link bg-dark">More results</h2>
         <form name="frmSearch" method="post" action="">
	    <p class="search_input">
		<input type="text" placeholder="From Date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
	    <input type="text" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Search" >
	</p>
<?php if(!empty($result))	 { ?>
	<table id="example" class="table table-striped table-bordered nowrap" style="width:50%">
          <thead class="content bg-dark">
        <tr class="content bg-light">
                      
          <th width="30%"><span>Name</span></th>
          <th width="300%"><span>Date</span></th>          
          <th width="20%"><span>statut</span></th>
		  <th width="40%"><span>Why</span></th>	  
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
			<td><?php echo $row["name"]; ?></td>
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
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
</body></html>
