<?php 
	
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


echo "<div class="viewoveralltable" align="center">
<table border='1'>
<tr><td>Item</td><td>Type</td><td>Qty</td><td>Mst</td><td>Min</td><td>Dsc</td></tr>
";

while($row = msqli_fetch_assoc($result))
{
	echo"<tr>
		<td>{$row['name']}</td>
		<td>{$row['type']}</td>
		<td>{$row['quantity']}</td>
		<td>{$row['measuring']}</td>
		<td>{$row['minimum']}</td>
		<td>{$row['description']}</td>
		</tr>";
}

</table>
</div>

if ($conn->query($sql_insert)) {    echo "new record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
?>