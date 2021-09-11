<?php
include('./conn/config.php'); //connection
include_once('create.php');
    if(isset($_POST["btn"]))
{
     
    $PO=$_POST["PO"];
    $o_date=$_POST["o_date"];
    $d_date=$_POST["d_date"];
    $destination=$_POST["destination"];
    $price_term=$_POST["price_term"];
    $pay_term=$_POST["pay_term"];
    $supplier=$_POST["supplier"];
    $category=$_POST["category"];
    $qry="insert create_po values('$PO','$o_date','$d_date','$destination','$price_term','$pay_term','$supplier','$category')";    
    $res= mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
  echo "<script>alert('Record Added');</script>";
    }
  }
?>
<!--html starts-->
<html lang="en">
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
          <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
          <link rel="stylesheet" type="text/css" href="style.css"> 
          
        </head>
    <body>
        <div class=" container">
             <form class="well form-horizontal" action=" " method="post"  id="contact_form" target="_blank">
      <div class="supplier"> 
      <div class="form-group">
          <label class="col-md-4 control-label">SUPPLIER</label>  
             <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <select name="supplier" id="supplier"  >
                     <option value="Select supplier ">Select supplier </option>
                     <option value="MASTERSALES INTERNATIONAL ">MASTERSALES INTERNATIONAL </option>
                     <option value="ACC ">ACC</option>
                     <option value="XYZ">XYZ</option>
                  </select>
                </div>
               </div>
             </div>
       </div>
<!-- Text input -->
    <div class="group">
       <div class="form-group">
         <label class="col-md-4 control-label">PO NO.</label>  
           <div class="col-md-4 inputGroupContainer">   
             <div class="input-group">  
          <input type="number"  name="PO" id="PO" placeholder="order number " value="<?php echo $PO; ?>"  class="form-control">
              </div>
           </div>
      </div>  
<!-- Text input-->
     <div class="form-group">
        <label class="col-md-4 control-label" >ORDER DATE</label> 
           <div class="col-md-4 inputGroupContainer">
             <div class="input-group">
               <input name="o_date" min="" id="fromDate" placeholder="Order Date:" class="form-control"  type="date" value="<?php echo $o_date; ?>" >
             </div>
           </div>
      </div>
<!-- Text input-->
       <div class="form-group">
          <label class="col-md-4 control-label">DELIVERY DATE</label>  
             <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <input name="d_date" min="" id="toDate" placeholder="date" class="form-control"  type="date" value="<?php echo $d_date; ?>" >
               </div>
              </div>
          </div>
   <!-- Text input-->
        <div class="form-group">
           <label class="col-md-4 control-label">DESTINATION</label>  
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                   <select name="destination" placeholder="destination" id="desti"  value="<?php echo $destination; ?>" >
                     <option value="ICD bangalore ">ICD bangalore </option>
                  </select>
                </div>
             </div>
         </div>
<!-- Text input-->    
        <div class="form-group">
          <label class="col-md-4 control-label">PRICE TERM</label>  
             <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <select name="price_term" id="price_term" >
                     <option value="select price ">select price </option>
                     <option value="Factor ">Factor </option>
                     <option value="FOB ">FOB </option>
                     <option value="C$F">C$F</option>
                     <option value="FIS">FIS</option>
                  </select>
                </div>
               </div>
             </div>
             <!-- Text input-->    
         <div class="form-group">
            <label class="col-md-4 control-label">PAYMENT TERM</label>  
              <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                        <select name="pay_term" id="pay_term">
                            <option value="select payment ">select payment</option>
                            <option value="COD ">COD </option>
                            <option value="30 DAYS ">30 DAYS</option>
                            <option value="60DAYS">60 DAYS</option>
                        </select>   
                  </div>
              </div>
         </div>
         <div class="category">
             <div class="form-group">
               <label class="col-md-4 control-label">CATEGORY </label>  
                 <div class="col-md-4 inputGroupContainer">
                   <div class="input-group">
                      <select name="category" id="category" >
                         <option value="" >select category</option>
                         <option value="abc ">abc </option>
                         <option value="def ">def </option>
                         <option value="ghi">ghi</option>
                      </select><br><br>                      
                         <button type="submit" name="btn">Generate po</button><br><br>
                   </div>
                </div>
             </div>   
         </form>
         </div>    
         </div>  

                        <?php
           if(isset($_POST["category"]))
             {
               if(isset($_POST["btn"]))
               {
                $sql="SELECT CODE,WM,TM,DM,TYPE,FINISH,COLOUR,QTY,SQM,KGS,RATE,(QTY*SQM) as sqm,(QTY*KGS)as kgs,(QTY*RATE) as TOTAL from po where TYPE='".$_POST['category']."'";
                    $result=mysqli_query($link,$sql) or die( mysqli_error($link));
                    while($user=mysqli_fetch_array($result))
                    {
       ?>
        
                 <table class="display" id="userTable" style="width:80%" >
                        <tr>
                            <th>CODE</th>
                            <th>W(MM)</th>
                            <th>D(MM)</th>
                            <th>T(MM)</th>
                            <th>TYPE</th>
                            <th>FINISH</th>
                            <th>QTY</th>
                            <th>COLOUR</th>
                            <th>SQM</th>
                            <th>KGS</th>
                            <th>RATE</th>
                            <th>PRICE</th> 
                            <th>ACTION</th>
                        </tr> 
             <tr>
                        <td><?php echo $user['CODE']; ?></td>
                        <td><?php echo $user['WM']; ?></td>
                        <td><?php echo $user['DM']; ?></td>
                        <td><?php echo $user['TM']; ?></td>
                        <td><?php echo $user['TYPE']; ?></td>
                        <td><?php echo $user['FINISH']; ?></td>
                        <td><?php echo $user['QTY']; ?></td>
                        <td><?php echo $user['COLOUR']; ?></td>
                        <td><?php echo $user['sqm']; ?></td>
                        <td><?php echo $user['kgs']; ?></td>
                        <td><?php echo $user['RATE']; ?></td>
                        <td><?php echo $user['TOTAL']; ?></td>
                        <td><a href="edit.php?CODE=<?php echo $user['CODE']; ?>">UPDATE</a></td> 
            </tr>
            <?php 
                }
            }
        }
               ?>             
</table>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
var fromDate;
$('#fromDate').on('change', function(){
  fromDate = $(this).val();
  $('#toDate').prop('min',function(){
   return fromDate
  })

});
var toDate;
$('#toDate').on('change', function(){
  toDate = $(this).val();
  $('#fromDate').prop('max',function(){
   return toDate
  })

});
 </script>
 
  </body>
</html>  
<!--html end-->


