
<?php

$name = filter_input(INPUT_POST, 'naym');
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

$query = "UPDATE Recipe SET type = '$type', measuring = '$mtype', serv_size = $samount, description = '$description' WHERE name = '$name'";


 if ($conn->query($query)) {
	 echo "record updated successfully";
	 $done = true;
	 
	 echo $query;
	 echo $name;
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

//db user: capstone-191-t1
//db pass: D2BUdK5C4zTpnceJ
// name, type, quantity, mytpe, min, description

//INSERT INTO Inventory (name, type, quantity, measuring, minimum, description)
// VALUES ('chicken','meat','5','pound','3','keep refrigerated');

?> 
