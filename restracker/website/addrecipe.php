<?php

$name = filter_input(INPUT_POST, 'recipename');
$type = filter_input(INPUT_POST, 'recipetype');
$mtype = filter_input(INPUT_POST, 'measuretype');
$samount = filter_input(INPUT_POST, 'servamount');
$description = filter_input(INPUT_POST, 'description');

$servername = "localhost";
$username = "capstone-191-t1";
$password = "D2BUdK5C4zTpnceJ";
$dbname = "4800-191-t1";

$done = false;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error);
} 

$sql_insert = "INSERT INTO Recipe (name, type, measuring, serv_size, description)
 VALUES ('$name','$type','$mtype','$samount', '$description')";


 if ($conn->query($sql_insert)) {
	 echo "new record created successfully";
	 $done = true;
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if($done)
{
	header("Location: http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/recipebook.html");
	exit;
}


$conn->close();

//db user: capstone-191-t1
//db pass: D2BUdK5C4zTpnceJ
// name, type, quantity, mytpe, min, description

//INSERT INTO Inventory (name, type, quantity, measuring, minimum, description)
// VALUES ('chicken','meat','5','pound','3','keep refrigerated');

?> 