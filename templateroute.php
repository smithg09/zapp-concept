<?php 
session_start();
    $temp_id = $_REQUEST['templates'];
    $_SESSION['template_id'] = $temp_id;
    header("Location: editor.php");
?>