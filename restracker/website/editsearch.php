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
$query = "SELECT * FROM $place WHERE name LIKE '%$name%'";
}
else{
echo "There was an issue in deciding location. ";
}

//mysql_select_db($dbname, $conn);

$result = mysqli_query($conn, $query);
if(!$result){
 die('Not Connected' . mysql_error());
}

echo "<head>
  <title>Floyd's Inventory Tracker</title>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <link rel=\"icon\" href=\"breadlogo.png\" type=\"image/gif\" sizes=\"20x20\">
  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css\">
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
  <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js\"></script>
  </head>";
  
echo "<style>
	    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    body {
      background-color: #f2f2f2;
    }
	
     #floydinvent {
	color: white;
	font-family: Georgia;
  }
  
  #hat {
  height: 30px;
  width: 30px;
  margin-bottom: 0px;
  }
  
  th{
  text-align: center;
  font_weight: bold;
  }
  
  tr:nth-child(even) {background-color: #d3d3d3;}
  tr:nth-child(odd) {background-color: #a0a0a0;}
  </style>";

echo "
	<nav class=\"navbar navbar-inverse\">
  <div class=\"container-fluid\">
    <div class=\"navbar-header\">
      <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>                        
      </button>
      <a id=\"floydinvent\" class=\"navbar-brand\" href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/home.html\"><div class=\"yeah\"><img style=\"margin:0px 0px 0px 0px\" id=\"hat\" src=\"chefhat2.jpg\" alt=\"Logo\">  Floyd's Inventory System</div></a>
    </div>
    <div class=\"collapse navbar-collapse\" id=\"myNavbar\">
      <ul class=\"nav navbar-nav\">
        <li class=\"active\"><a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/home.html\"><span class=\"glyphicon glyphicon-home\"></span>	Home</a></li>
        <li><a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/checkinvent.html\"><span class=\"glyphicon glyphicon-eye-open\"></span>	View</a></li>
        <li><a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/edit.html\"><span class=\"glyphicon glyphicon-pencil\"></span>	Edit Item</a></li>
        <li><a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/whattoadd.html\"><span class=\"glyphicon glyphicon-plus\"></span>	Add Item</a></li>
      </ul>
      <ul class=\"nav navbar-nav navbar-right\">
        <li><a href=\"#\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
	";
  
echo "<h2 id=\"hedit\" style=\"text-align: center\" >Edit Item</h2>";
  
echo "<form action=\"editsearch.php\" method=\"GET\" id=\"editform\">";
echo		"<div class=\"form-group\">";
echo			"<div class=\"md-form mt-0\">";
echo			"<input class=\"form-control\" type=\"text\" name=\"itemname\" placeholder=\"What item would you like to ammend?\" aria-label=\"Search\">";
echo			"<div>";
echo	"</div>";  
  
echo	"<div class=\"form-group\">";
echo		"<div align=\"center\">";
echo		"<label for=\"itype\" style=\"padding-left: 10px\">Item Type:</label>";
echo		"<select class=\"form-control\" name=\"itemtype\" id=\"itype\" style=\"width: 165px;\">";
echo			"<option value=\"Inventory\">Inventory</option>";
echo			"<option value=\"Recipe\">Recipe</option>";
echo		"</select>";
echo		"</div>";
echo	"</div>";
  
  
echo		"<div class=\"text-center\"><button type=\"submit\" class=\"btn btn-default\" id=\"searchbtn\">Search</button><div>";
echo "</form>";


echo "<h2>";
echo $place;
echo "</h2>";

$rowcount=mysqli_num_rows($result);
if($rowcount > 0){ 
  echo $rowcount . " Result(s) found.";
  }
  else
  { 
  echo "No records found"; 
  }

echo "<table class=\"table table-hover text-centered\">";

if ($place == "Inventory"){
echo "<th>Name</th>";
echo "<th>Type</th>";
echo "<th>Qty.</th>";
echo "<th>Edit</th>";
echo "<th>Remove</th>";
}
else if ($place == "Recipe"){
echo "<th>Name</th>";
echo "<th>Type</th>";
echo "<th>Ser. Sz.</th>";
echo "<th>Edit</th>";
echo "<th>Remove</th>";
}

if ($place == "Inventory"){
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
$itname = $row['name'];
 if ($row['quantity'] > $row['minimum'])
 {	

	echo 
	"<tr><td>" . $row['name'] 
	. "</td><td>" . $row['type'] 
	. "</td><td>" . $row['quantity'] 
	. "</td><td>" . "<a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/editsingle.php?itemname={$itname}&itemtype=Inventory\"><span class=\"glyphicon glyphicon-pencil\"></span>	Edit</a>"
    . "</td><td>" . "<a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/removesingle.php?itemname={$itname}&itemtype=Inventory\"><span class=\"glyphicon glyphicon-remove\"></span>	Remove</a>"  
	. "</td></tr>"; 
 }
 else
 {
	echo 
	"<tr style=\"color:#D05050\"><td>" . $row['name'] 
	. "</td><td>" . $row['type'] 
	. "</td><td>" . $row['quantity'] 
	. "</td><td>" . "<a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/editsingle.php?itemname={$itname}&itemtype=Inventory\"><span class=\"glyphicon glyphicon-pencil\"></span>	Edit</a>"
    . "</td><td>" . "<a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/removesingle.php?itemname={$itname}&itemtype=Inventory\"><span class=\"glyphicon glyphicon-remove\"></span>	Remove</a>" 
	. "</td></tr>"; 
 }
}
}
else if ($place == "Recipe") {
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{ 
$itname = $row['name'];
	echo 
	"<tr><td>" . $row['name'] 
	. "</td><td>" . $row['type'] 
	. "</td><td>" . $row['serv_size'] 
	. "</td><td>" . "<a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/editsingle.php?itemname={$itname}&itemtype=Recipe\"><span class=\"glyphicon glyphicon-pencil\"></span>	Edit</a>"
    . "</td><td>" . "<a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/removesingle.php?itemname={$itname}&itemtype=Recipe\"><span class=\"glyphicon glyphicon-remove\"></span>	Remove</a>" 
	. "</td></tr>"; 

}
}
echo "</table>";




$conn->close();

//db user: capstone-191-t1
//db pass: D2BUdK5C4zTpnceJ
// name, type, quantity, mytpe, min, description

//INSERT INTO Inventory (name, type, quantity, measuring, minimum, description)
// VALUES ('chicken','meat','5','pound','3','keep refrigerated');


?>