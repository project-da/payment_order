<?php
require('fpdf183/fpdf.php');
include('./conn/config.php');

$pdf= new FPDF();	
$pdf->AddPage();
//set font
$pdf->SetFont('Arial','B',14);
//cell(width,height)
$pdf->cell(189 ,5,'PURCHASE ORDER',1,0,"C");
$pdf->cell(59 ,5,'',0,1);//end of line


$pdf->cell(130 ,5,'',0,0);
$pdf->cell(59 ,5,'',0,1);//end of line
$pdf->setFont("Arial","",14);
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
    //$pdf->SetFont('Arial','B',14);
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
$pdf->output();
?>