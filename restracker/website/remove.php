<?php

$name = filter_input(INPUT_POST, 'itemname');
$type = filter_input(INPUT_POST, 'itemtype');

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

$name = $_GET ['itemname'];
$place = $_GET ['itemtype'];


if($place == "Inventory" or $place == "Recipe"){
$query = "DELETE FROM $place WHERE name = '$name'";
}
else{
echo "There was an issue in deciding location. ";
}

echo $query;
//mysql_select_db($dbname, $conn);

if ($conn->query($query) === TRUE){
	echo "Record removed successfully";
	$done = true;
}
else {
	echo "Error removing: " . $conn->error;
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