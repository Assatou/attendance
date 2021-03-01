<?php
session_start();
	include 'database.php';
	
	if($_POST['type']==1){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$sex=$_POST['sex'];
	$password=$_POST['password'];
	

	$sql = "INSERT INTO `etudiant`( `name`, `email`, `tel`, `sex`, `password`) 
	VALUES ('$name','$email','$tel','$sex','$password')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
}

	if($_POST['type']==2){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$check=mysqli_query($conn,"select * from student where email='$email' and password='$password'");
		if (mysqli_num_rows($check)>0)
		{
			$_SESSION['email']=$email;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}

	if($_POST['type']==3){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$check=mysqli_query($conn,"select * from liste where email='$email' and password='$password'");
		if (mysqli_num_rows($check)>0)
		{
			$_SESSION['email']=$email;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}
?>
 