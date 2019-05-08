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
  
echo "<h2 id=\"hedit\" style=\"text-align: center\" > Remove Item</h2>";
  
echo "<h3 id=\"hedit\" style=\"text-align: center\" > Are you sure you want to remove<br>{$name}?</h3>";

echo	"<div style=\"text-align:center\">
		<a href=\"http://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/remove.php?itemname={$name}&itemtype={$place}\"><button type=\"button\" class=\"btn btn-primary\">Yes</button></a>
		<a href=\"https://student2.cs.appstate.edu/teams/4800-191-t1/restracker/website/edit.html\"><button type=\"button\" class=\"btn btn-dark\">No</button></a>
		</div>";

$conn->close();

//db user: capstone-191-t1
//db pass: D2BUdK5C4zTpnceJ
// name, type, quantity, mytpe, min, description

//INSERT INTO Inventory (name, type, quantity, measuring, minimum, description)
// VALUES ('chicken','meat','5','pound','3','keep refrigerated');


?>