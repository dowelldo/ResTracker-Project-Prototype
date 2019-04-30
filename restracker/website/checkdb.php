<?php
	$q = strval($_GET['q']);
	
	// Credentials for the database
	$servername = "localhost";
	$username = "capstone-191-t1";
	$password = "D2BUdK5C4zTpnceJ";
	$dbname = "4800-191-t1";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if (mysqli_connect_error()) {
		die("Connection failed: " . mysqli_connect_error);
	} 
	
	mysqli_select_db($conn,"4800-191-t1");
	
	// run the recieved query
	$result = mysqli_query($conn, $q);
	
	// The variable to hold the returned string of short ingredients
	$r = "";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['minimum'] > $row['quantity']) {
			$r .= $row['name'] . "/";
		}
	}
	
	// strip out all spaces so string is cookie friendly
	$r = str_replace(" ", "", $r);
	echo $r;
?>

