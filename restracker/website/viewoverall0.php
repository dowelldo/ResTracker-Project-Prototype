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

// NEW CODE!!!!!!!!!

if(isset($_POST['search'])){
	$q = $_POST['q'];
	$query = mysqli_query($conn,"SELECT * FROM `table_name` WHERE `thing_to_search` LIKE '%$qname%'"); 
//Replace table_name with your table name and `thing_to_search` with the column you want to search
	$count = mysqli_num_rows($query);
	if($count == "0"){
		$output = '<h2>No result found!</h2>';
	}else{
		while($row = mysqli_fetch_array($query)){
		$s = $row['column_to_display']; // Replace column_to_display with the column you want the results from
				$output .= '<h2>'.$s.'</h2><br>';
			}
		}
	}

// END OF NEW CODE!!!!!!!!!!!!	
	
 if ($conn->query($sql_insert)) {    echo "table shown";
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

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['type'] . "</td><td>"
  . $row['quantity'] . "</td><td>" . $row['measuring'] . "</td><td>"
  . $row['minimum'] . "</td><td>"
  . $row['description'] . "</td></tr>";  //$row['index'] the index here is a field name
}
