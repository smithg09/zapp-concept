<?php
 session_start();
include_once 'db.php';
$acc_id = $_SESSION['acc_id'];

$re_pass = mysqli_real_escape_string($con, $_REQUEST['re_password']);
    // $acc_id
    $update_pwd = mysqli_query($con, "UPDATE users SET password='".md5($re_pass)."' WHERE acc_id='$acc_id'");
    
    if($update_pwd) {
        // echo "<script> alert('password updted');</script>" ;
        header("Location: accounts.php");
    }
    else {
        header("Location: accounts.php?error=1");
    }

 
?>