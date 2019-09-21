<?php
$mysqli = new mysqli("localhost", "root", "", "demo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = $mysqli->query("SELECT * FROM `users`")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

    printf("Result set has %d rows.\n", $row_cnt);

	// foreach($result as $re){
		printf($result);
	// }
    /* close result set */
    $result->close();
}

/* close connection */
$mysqli->close();
?>