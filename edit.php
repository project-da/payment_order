<?php
 include('./conn/config.php'); 
	
	$CODE=$_GET['CODE'];
	
	$QTY=$_POST['QTY'];

	
	mysqli_query($link,"update po set QTY='$QTY' where CODE='$CODE'");
	header('location:insert_po.php');

?>
