<?php
	include 'database.php';
	$sql = "SELECT student.name, attendance.datesign, attendance.time
FROM attendance, student
WHERE student.id = attendance.iduser;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			
			<td><?=$row['name'];?></td>
			<td><?=$row['datesign'];?></td>
			<td><?=$row['time'];?></td>
			
		</tr>
		
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>
  