<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$con = mysqli_connect("localhost", "root", "", "zapp");
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $search =  $_REQUEST["term"];
    $type = $_SESSION['acc_type'];
    if($type == 'premium') {
        $sql = "SELECT * FROM `templates` WHERE temp_name LIKE '%{$search}%'";
    }
    else {
        $sql = "SELECT * FROM `templates` WHERE  acc_type = '$type' and temp_name LIKE '%{$search}%'  ";
    }
    

            if($result = mysqli_query($con,$sql)) {
                $rows = mysqli_num_rows($result);
                if($rows > 0){
                    $emparray = array();
                    while($row =mysqli_fetch_assoc($result))
                    {
                        // echo "<p>" . $row['temp_name'] . "</p>";
                        $emparray[] = $row;
                    }
                    echo json_encode($emparray);
                } else{
                    echo "No matches found";
                }
            }
            else {
                echo "No matches found";
            }
        }
else {
    echo "Error";
}
     
// mysqli_close($link);
?>