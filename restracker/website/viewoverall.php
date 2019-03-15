<?php

echo"<p>HEYYYYYYY</p>";

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

$sql = "SELECT * FROM Inventory";
$result = mysqli_query($dbc, $sql) or die("Bad query: $sql");


echo"<p>HELLLOOOOOO</p>";
echo"<table border='1'>";
echo"<tr><td>Item</td><td>Type</td><td>Quantity</td><td>Measurement</td><td>Minimum</td><td>Description</td></tr>";


echo"</table>";

 if ($conn->query($sql_insert)) {    echo "new record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//db user: capstone-191-t1
//db pass: D2BUdK5C4zTpnceJ
// name, type, quantity, mytpe, min, description

//INSERT INTO Inventory (name, type, quantity, measuring, minimum, description)
// VALUES ('chicken','meat','5','pound','3','keep refrigerated');

?> 
