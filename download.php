<?php
require('fpdf183/fpdf.php');
include('./conn/config.php');

$pdf= new FPDF();	
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);//set font
$pdf->cell(189 ,5,'PURCHASE ORDER',1,0,"C");
$pdf->cell(59 ,5,'',0,1);//end of line

$pdf->cell(130 ,5,'',0,0);
$pdf->cell(59 ,5,'',0,1);//end of line
$pdf->setFont("Arial","B",9);
$link= new PDO("mysql:host=localhost; dbname=po_db","root","");
if(isset($_GET['PO']))
{
  $PO= $_GET['PO'];
$query="select * from create_po WHERE PO='$PO' ";
$result=$link->prepare($query);
$result->execute();
if($result->rowCount()!=0)
{
while($user=$result->fetch())
{
    $pdf->cell(130 ,5,'',0,0);
    $pdf->cell(28 ,5,"PO:",0,0);
    $pdf->cell(34 ,5,$user['PO'],1,1);
    $pdf->cell(59 ,5,'',0,1);

    $pdf->cell(35 ,5,'supplier name:',0,0);
    $pdf->cell(34 ,5,$user['supplier'],1,0);
    $pdf->cell(60 ,5,'',0,0);
    $pdf->cell(27 ,5,'order Date:',0,0);
    $pdf->cell(36 ,5,$user['o_date'],1,0);
    $pdf->cell(59 ,5,'',0,1);
    $pdf->cell(59 ,5,'',0,1);
    
    $pdf->cell(130 ,5,'',0,0);
    $pdf->cell(28 ,5,'D_date:',0,0);
    $pdf->cell(34 ,5,$user['d_date'],1,0);
    $pdf->cell(59 ,5,'',0,1);
    $pdf->cell(59 ,5,'',0,1);

    $pdf->cell(130 ,5,'',0,0);
    $pdf->cell(28 ,5,'Destination:',0,0);
    $pdf->cell(35 ,5,$user['destination'],1,0);
    $pdf->cell(59 ,5,'',0,1);
    $pdf->cell(59 ,5,'',0,1);

    $pdf->cell(130 ,5,'',0,0);
    $pdf->cell(28 ,5,'price_term:',0,0);
    $pdf->cell(34 ,5,$user['price_term'],1,0);
    $pdf->cell(59 ,5,'',0,1);
    $pdf->cell(59 ,5,'',0,1);

    $pdf->cell(130 ,5,'',0,0);
    $pdf->cell(28 ,5,'pay_term:',0,0);
    $pdf->cell(34 ,5,$user['pay_term'],1,0);
    $pdf->cell(59 ,5,'',0,1);
    $pdf->cell(59 ,5,'',0,1);

    $pdf->cell(130 ,5,'',0,0);
    $pdf->cell(28 ,5,'Category:',0,0);
    $pdf->cell(34 ,5,$user['category'],1,0);
    $pdf->cell(59 ,5,'',0,1);
    $pdf->cell(59 ,5,'',0,1);
}
}
} 
$pdf->SetFont('Arial','B',8);
//$pdf->Cell(10,8,'No.',1);
$pdf->Cell(15,8,'CODE',1);
$pdf->Cell(15,8,'W(MM)',1);
$pdf->Cell(15,8,'D(MM) ',1);
$pdf->Cell(15,8,'T(MM) ',1);
$pdf->Cell(15,8,'TYPE ',1);
$pdf->Cell(15,8,'FINISH',1);
$pdf->Cell(15,8,'QTY',1);
$pdf->Cell(15,8,'COLOUR',1);
$pdf->Cell(15,8,'SQM',1);
$pdf->Cell(15,8,'KGS',1);
$pdf->Cell(15,8,'RATE',1);
$pdf->Cell(15,8,'TOTAL',1);
$link= new PDO("mysql:host=localhost; dbname=po_db","root","");
$query1="SELECT CODE,WM,TM,DM,TYPE,FINISH,COLOUR,QTY,SQM,KGS,RATE,(QTY*SQM) as sqm,(QTY*KGS)as kgs,(QTY*RATE) as TOTAL from po ";
$result2=$link->prepare($query1);
$result2->execute();
if($result2->rowCount()!=0)
{
while($row=$result2->fetch())
{
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(15,8,$row['CODE'],1);
	$pdf->Cell(15,8,$row['WM'],1);
	$pdf->Cell(15,8,$row['DM'],1);
	$pdf->Cell(15,8,$row['TM'],1);
	$pdf->Cell(15,8,$row['TYPE'],1);
	$pdf->Cell(15,8,$row['FINISH'],1);
	$pdf->Cell(15,8,$row['QTY'],1);
	$pdf->Cell(15,8,$row['COLOUR'],1);
	$pdf->Cell(15,8,$row['sqm'],1);
	$pdf->Cell(15,8,$row['kgs'],1);
	$pdf->Cell(15,8,$row['RATE'],1);
  $pdf->Cell(15,8,$row['TOTAL'],1);
}
}
$pdf->output();
?>