<?php
session_start();
include_once 'db.php';
$acc_id = $_SESSION['acc_id'];
if(isset($_POST['btn-team']))
{
	$username = mysqli_real_escape_string($con, $_POST['username-team']);
	$teamname =  $_SESSION['teamname']; 
    $teamidnew = $_SESSION['teamid'];
                                        
	$check_register = mysqli_query($con, "INSERT INTO teams(team_id,team_name,acc_id) SELECT '$teamidnew','$teamname',acc_id FROM users Where username='$username'");
	
	// $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
	// $result = mysqli_query($con,$query);
	// $row    = mysqli_fetch_array($result);
	// $acc_id = $row['acc_id'];
	// echo "new : " .$acc_id;
	// $check_register_team = mysqli_query($con, "INSERT INTO `teams` (`team_id`, `team_name`, `acc_id`)VALUES('".$team_id."','".$team_name."','".$acc_id."'");
	

	if(  $check_register) {
		// echo "<script>console.log('Registration done!');</script>";
		header("Location: accounts.php?success=1");
	}
	else {
        echo "<script> alert('An Error Occured! Please try again');</script>";
		echo "console.log('error');";
	}
}

?>