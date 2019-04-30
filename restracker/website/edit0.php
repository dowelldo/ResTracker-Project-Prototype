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


$query = "SELECT * FROM '$type' WHERE name LIKE '$name'"; //You don't need a ; like you do in SQL

//mysql_select_db($dbname, $conn);

$result = mysqli_query($conn, $query);
if(!$result){
 die('Not Connected' . mysql_error());
}

echo "<table>";
echo "<th>Name</th>";
echo "<th>Type</th>";
echo "<th>Qty.</th>";
echo "<th>Msr.</th>";
echo "<th>Desc.</th>";

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
	echo "<tr><td>" . $row['name'] . "</td><td>" . $row['type'] . "</td><td>"
  . $row['quantity'] . "</td><td>" . $row['measuring'] . "</td><td>"
  . $row['description'] . "</td></tr>"; 
}
echo "</table>";


 if ($conn->query($sql_insert)) {
 echo "new record created successfully";
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