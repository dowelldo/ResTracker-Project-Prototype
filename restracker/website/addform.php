<?php

$name = filter_input(INPUT_POST, 'itemname');
$type = filter_input(INPUT_POST, 'itemtype');
$quantity = filter_input(INPUT_POST, 'amountoh');
$measuring = filter_input(INPUT_POST, 'measuretype');
$minimum = filter_input(INPUT_POST, 'minamount');
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

$sql_insert = "INSERT INTO Inventory (name, type, quantity, measuring, minimum, description)
 VALUES ('$name','$type','$quantity','$measuring','$minimum','$description')";


 if ($conn->query($sql_insert)) {
 echo "new record created successfully";
 $done = true;
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if($done)
{
	header("Location: http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/checkoverall.html");
	exit;
}

$conn->close();

//db user: capstone-191-t1
//db pass: D2BUdK5C4zTpnceJ
// name, type, quantity, mytpe, min, description

//INSERT INTO Inventory (name, type, quantity, measuring, minimum, description)
// VALUES ('chicken','meat','5','pound','3','keep refrigerated');

?> 


