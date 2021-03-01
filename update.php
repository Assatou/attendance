<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT student.name, attendance.id, attendance.datesign, attendance.statut, attendance.why 
	FROM attendance, student 
	WHERE attendance.iduser = student.id AND attendance.statut = 'abscent' AND attendance.why = 'RAS'");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Student</title>
</head>
<body>
<table>
<tr>
<td>Id</td>
<td> Name</td>
<td>Date</td>
<td>Statut</td>
<td>Why</td>
<td>Modifier</td>
</tr>


<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["datesign"]; ?></td>
<td><?php echo $row["statut"]; ?></td>
<td><?php echo $row["why"]; ?></td>

<td><a href="update-process.php?id=<?php echo $row["id"]; ?>">Update</a></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>
