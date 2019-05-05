<?php
require('connect.txt');
require('fpdf.php');
mysql_select_db("3430-sum2-t6", $mydb);
//$inv = new LookUp();
//$sql = mysql_query("select * from part where invoice_id = 201",$mydb);
$sql = mysql_query("select * from part where invoice_id = {$_GET['id']}",$mydb);
//$sql = "SELECT * from rv_repair where invoice_id = {_GET['id']}";

$cost = 0;

$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);



$line = '----------------------------------------------------------------';

$pdf->Cell(0,6,'TAR HEEL MOBILE RV SERVICE, llc',0,1,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(0,6,'111 W 52 Bypass Pilot Mountain, NC 27041',0,1,'C');
$pdf->Cell(0,6,'Phone: 336.403.0134   -   Emergency: 336.403.1080',0,1,'C');
$pdf->SetFont('Times','',14);

//---------- Customer Details ---------------
$sql = mysql_query("select * from customer, invoice where invoice_id = {$_GET['id']} && invoice.customer_id = customer.customer_id",$mydb);
while ($row = mysql_fetch_array($sql))
{
	
	$pdf->Cell(80,8,'Customer: '.$row['fname'].' '.$row['lname'],0,0,'C');
	$pdf->Cell(80,8,'Phone: '.$row['phone'],0,1,'C');
	$pdf->Cell(80,8,'Email: '.$row['email'],0,0,'C');
	$pdf->Cell(80,8,'Adr: '.$row['address'],0,1,'C');
	//$pdf->Cell(20,12,1,1,1,'C');

} 

//---------- Invoice Details ----------------
$sql = mysql_query("select * from invoice where invoice_id = {$_GET['id']}",$mydb);
while ($row = mysql_fetch_array($sql))
{
	
	$pdf->Cell(50,8,'Invoice #: '.$row['invoice_id'],0,0,'C');
	$pdf->Cell(50,8,'Vin: '.$row['vin_number'],0,1,'C');
	$pdf->Cell(50,8,'DOC: '.$row['date_of_creation'],0,1,'C');
	//$pdf->Cell(20,12,1,1,1,'C');
	
} 

//-------- PART -----------

$sql = mysql_query("select * from part where invoice_id = {$_GET['id']}",$mydb);
$partCost = 0;
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,8,'PART',0,1,'L');
$pdf->Cell(20,8,'Name',1,0,'C');
$pdf->Cell(20,8,'Qty',1,0,'C');
$pdf->Cell(25,8,'Price',1,1,'C');
$pdf->SetFont('Times','',14);
while ($row = mysql_fetch_array($sql))
{
	
	$pdf->Cell(20,8,$row['part_name'],0,0,'C');
	$pdf->Cell(20,8,1,0,0,'C');
	$pdf->Cell(25,8,$row['part_price'],0,1,'C');
	//$pdf->Cell(20,12,1,1,1,'C');
	$partCost = $partCost + $row[part_price];
} 
$pdf->Cell(0,8,$line,0,1,'C');


//------- RV_REPAIR ----------

$sql = mysql_query("select * from rv_repair where invoice_id = {$_GET['id']}",$mydb);
$repairCost = 0;
$pdf->SetFont('Arial','B',12);

//$pdf->Cell(20,8,'',0,1,'C');
$pdf->Cell(0,8,'REPAIR',0,1,'L');
$pdf->Cell(25,8,'Rep. ID',1,0,'C');
$pdf->Cell(50,8,'Description',1,0,'C');
$pdf->Cell(20,8,$row['Cost'],0,1,'C');
$pdf->SetFont('Times','',14);
while ($row = mysql_fetch_array($sql))
{
	$pdf->Cell(25,8,$row['repair_id'],0,0,'C');
	$pdf->Cell(50,8,$row['description'],0,0,'C');
	$pdf->Cell(20,8,$row['cost'],0,1,'C');
	//$span = date_diff($end,$start);
	//$days = $end->diff($start);
	//$day = $days->format('%Y-%m-%d');
	//$pdf->Cell(20,12,$day,0,0,'C');
	$repairCost = $repairCost + $row['cost'];

} 
$pdf->Cell(0,8,$line,0,1,'C');

//------- RV_STORAGE ------------

$sql = mysql_query("select * from rv_storage where invoice_id = {$_GET['id']}",$mydb);
$storageCost = 0;
$pdf->SetFont('Arial','B',12);

$pdf->Cell(0,8,'STORAGE',0,1,'L');
$pdf->Cell(50,8,'Start Date',1,0,'C');
$pdf->Cell(50,8,'End Date',1,1,'C');
$pdf->SetFont('Times','',14);
while ($row = mysql_fetch_array($sql))
{
	$start = ($row['start_date']);
	$end =($row['end_date']);
	$pdf->Cell(50,8,$row['start_date'],0,0,'C');
	$pdf->Cell(50,8,$row['end_date'],0,0,'C');
	//$span = date_diff($end,$start);
	//$days = $end->diff($start);
	//$day = $days->format('%Y-%m-%d');
	//$pdf->Cell(20,12,$day,0,0,'C');
	$storageCost = 0;
} 

$cost = $partCost + $repairCost + $storage;

$pdf->Cell(10, 18, '', 0, 1, 'C');

$pdf->Cell(50, 8, 'Total: $ '.$cost,'1', '0', 'C');


$pdf->Output();

?>
