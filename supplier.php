<?php 
include('./conn/config.php');

if(isset($_POST["btn"]))
{
  
    $suppliername=$_POST["suppliername"];
    $address=$_POST["address"];
    $iec=$_POST["iec"];
    $gstno=$_POST["gstno"];
    $qry="insert supplier values('$suppliername','$address',' $iec','$gstno')";
    $res= mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
     
    }
  }
$query1="select * from supplier"; 
$res1= mysqli_query($link, $query1);
if(mysqli_affected_rows($link)==1){
echo"";
{
   }
  }
?> 
<!DOCTYPE html> 
<html> 
	<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
          <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
          <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" type="text/css" href="style.css">
		  <title></title>
          <style>
         
       </style> 
	      </head> 
	      <body> 
          <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
          <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
          <a href="insert_po.php" class="w3-bar-item w3-button">CREATE PO</a>
          <a href="all_preview.php" class="w3-bar-item w3-button"> PREVIEW ALL PO's</a>
          <a href="index.php" class="w3-bar-item w3-button">LOGOUT</a>
          </div>
          <div class="w3-teal">
          <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button> 
          </div>
          <script>
          function w3_open() {
              document.getElementById("mySidebar").style.display = "block";
            }
            function w3_close() {
              document.getElementById("mySidebar").style.display = "none";
          }
          </script><br><br><br><br><br><br><br><br>
          <div class="order">
            <h2>PAYMENT  ORDER</h2></div>
            <div class=" container">
             <form class="well form-horizontal" action=" " method="post"  id="contact_form">
             <!--<div class="id" >
             <div class="form-group">
          <label class="col-md-4 control-label">ID</label>  
             <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <input name="id"  placeholder="Supplier id" class="form-control" type="text" autocomplete="off" >
               </div>
              </div>
          </div>
        </div>-->
          <div class="form-group">
          <label class="col-md-4 control-label">Supplier Name</label>  
             <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <input name="suppliername"  placeholder="Supplier Name" class="form-control" type="text" autocomplete="off" required>
               </div>
              </div>
          </div>

          <div class="form-group">
          <label class="col-md-4 control-label">Supplier Address</label>  
             <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <input name="address"  placeholder="Supplier Address" class="form-control" type="text" autocomplete="off" required>
               </div>
              </div>
          </div>
          <div class="form-group">
          <label class="col-md-4 control-label">IEC</label>  
             <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <input name="iec"  placeholder="IEC" class="form-control" type="text" autocomplete="off" required>
               </div>
              </div>
          </div>
          <div class="form-group">
          <label class="col-md-4 control-label">GST NO.</label>  
             <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <input name="gstno" placeholder="GST NO." class="form-control" type="text" autocomplete="off" required>
               </div>
              </div>
          </div>
          <button type="submit" name="btn">SUBMIT</button>
        </div></form>
  </table> 
	</body> 
	</html>