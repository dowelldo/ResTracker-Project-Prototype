<?php
require('fpdf.php');

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

//$inv = new LookUp();
//$sql = mysql_query("select * from part where invoice_id = 201",$mydb);
//$sql = mysql_query("select * from part where invoice_id = {$_GET['id']}",$mydb);
//$sql = "SELECT * from rv_repair where invoice_id = {_GET['id']}";

$cost = 0;

$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);



$line = '----------------------------------------------------------------';

$pdf->Cell(0,6,'FLOYD\'S RESTAURANT HOMECOOKING INC.',0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(0,6,'4122 N Graham St, Charlotte, NC 28206',0,1,'C');
$pdf->Cell(0,6,'Phone: (704)-597-5519',0,1,'C');
$pdf->SetFont('Times','',14);
date_default_timezone_set("America/New_York");
$pdf->Cell(0,6,date("d-m-y h:i:sa"),0,1,'C');

//---------- Customer Details ---------------


//-------- Inventory -----------

$pdf->SetMargins(5,5);

$sql = mysqli_query($conn, "SELECT * FROM Inventory");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'NEEDED INVENTORY',0,1,'L');
$pdf->Cell(36,8,'Name',1,0,'C');
$pdf->Cell(23,8,'Type',1,0,'C');
$pdf->Cell(15,8,'Qty',1,0,'C');
$pdf->Cell(23,8,'Measuring',1,0,'C');
$pdf->Cell(15,8,'Min',1,0,'C');
$pdf->Cell(87,8,'Description',1,1,'C');

$pdf->SetFont('Times','',14);
while ($row = mysqli_fetch_array($sql))
{
if ($row['quantity'] <= $row['minimum']){	
	$pdf->Cell(36,8,$row['name'],1,0,'C');
	//$pdf->Cell(20,8,1,0,0,'C');
	$pdf->Cell(23,8,$row['type'],1,0,'C');
	//$pdf->Cell(20,12,1,1,1,'C');
	$pdf->Cell(15,8,$row['quantity'],1,0,'C');
	$pdf->Cell(23,8,$row['measuring'],1,0,'C');
	$pdf->Cell(15,8,$row['minimum'],1,0,'C');
	$pdf->Cell(87,8,$row['description'],1,1,'C');
}	
} 
$pdf->Cell(0,8,$line,0,1,'C');


$pdf->Output();

//db user: capstone-191-t1
//db pass: D2BUdK5C4zTpnceJ
// name, type, quantity, mytpe, min, description

//INSERT INTO Inventory (name, type, quantity, measuring, minimum, description)
// VALUES ('chicken','meat','5','pound','3','keep refrigerated');

?>