<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['login-email'])){
		
		$email = stripslashes($_REQUEST['login-email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email' and password='".md5($password)."'";
		$result = mysqli_query($con,$query);
		$row    = mysqli_fetch_array($result);
		echo $row;
		$Name     = $row['username'];
		$acc_type = $row['acc_type'];
		$acc_id = $row['acc_id'];
		// or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $email;
			$_SESSION['name'] = $Name;
			$_SESSION['acc_type'] = $acc_type;
			$_SESSION['acc_id']= $acc_id;
			header("Location: templates.php"); // Redirect user to index.php
			
			}
			else{
				// echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
			header("Location: index.php?error=1");	
			}
    }
?>
