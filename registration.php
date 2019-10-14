<?php
session_start();
include_once 'db.php';

if(isset($_POST['btn-signup']))
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = md5(mysqli_real_escape_string($con, $_POST['password']));
	$phoneno = mysqli_real_escape_string($con, $_POST['number']);
	// $email = mysqli_real_escape_string($con, $_POST['email']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$team_id = mysqli_real_escape_string($con, $_POST['team_id']);
	$team_name = mysqli_real_escape_string($con, $_POST['team_name']);
	
	$check_register = mysqli_query($con, "INSERT INTO users(username,email,password,phone_no,gender) VALUES('".$username."','".$email."','".$password."','".$phoneno."','".$gender."')");
	
	// $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
	// $result = mysqli_query($con,$query);
	// $row    = mysqli_fetch_array($result);
	// $acc_id = $row['acc_id'];
	// echo "new : " .$acc_id;
	// $check_register_team = mysqli_query($con, "INSERT INTO `teams` (`team_id`, `team_name`, `acc_id`)VALUES('".$team_id."','".$team_name."','".$acc_id."'");
	

	if(  $check_register) {
		// echo "<script>console.log('Registration done!');</script>";
		header("Location: index.php?success=1");
	}
	else {
		echo "console.log('error');";
	}
}

?>