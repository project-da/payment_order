<?php
 //connection
 include('./conn/config.php'); 
    if(isset($_POST["btn"]))
{
    $PO=$_POST["PO"];
    $o_date=$_POST["o_date"];
    $d_date=$_POST["d_date"];
    $destination=$_POST["desti"];
    $price_term=$_POST["price_term"];
    $pay_term=$_POST["pay_term"];
    $supplier=$_POST["display"];
    $category=$_POST["category"];
    $qry="insert create_po values('$PO','$o_date','$d_date','$destination','$price_term','$pay_term','$supplier','$category')";
    $res= mysqli_query($link, $qry);
    if(mysqli_affected_rows($link)==1)
    {
    $last_id = mysqli_insert_ID($link);
    echo "<script>  window.onload = function(){
      alert('KUH- $last_id');
    }</script>";   
    } 
    else {
     
    }
    
  }

  ?>
<!DOCTYPE html>
<html lang="en">
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


		<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

          <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Document</title>
</head>

<body>
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
              <a href="insert_po.php" class="w3-bar-item w3-button">CREATE PO</a>
              <a href="all_preview.php" class="w3-bar-item w3-button"> PREVIEW ALL PO's</a>
              <a href="supplier.php" class="w3-bar-item w3-button"> SUPPLIER </a>
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
        </script>
       
        <div class=" container">
             <form class="well form-horizontal" action=" " method="post"  id="contact_form">
            
            
             <div class="group">
       <div class="form-group">
         <label class="col-md-4 control-label">SUPPLIER NAME</label>  
           <div class="col-md-4 inputGroupContainer">   
             <div class="input-group">
             <?php
        $query="select suppliername from supplier ";
        $res=mysqli_query($link,$query);
        ?>
        <select name="display"> Supplier Name
      

            <?php while($user1=mysqli_fetch_array($res))
            {
        ?>
     <option name="data"><?php echo $user1['suppliername'];?></option>
     <?php
            }
            ?>
            </select>
            </div>
           </div>
      </div>  

<!-- Text input -->
    <div class="group">
       <div class="form-group">
         <label class="col-md-4 control-label">PO NO.</label>  
           <div class="col-md-4 inputGroupContainer">   
             <div class="input-group">  
          <input type="number"  name="PO" id="PO" placeholder=" " value="<?php echo $last_id; ?>"  class="form-control" readonly>
              </div>
           </div>
      </div>  
<!-- Text input-->
     <div class="form-group">
        <label class="col-md-4 control-label" >ORDER DATE</label> 
           <div class="col-md-4 inputGroupContainer">
             <div class="input-group">
               <input name="o_date"  id="fromDate" placeholder="Order Date:" class="form-control"  type="text" value="<?php echo $user['o_date']; ?>" required >
             </div>
           </div>
      </div>
<!-- Text input-->
       <div class="form-group">
          <label class="col-md-4 control-label">DELIVERY DATE</label>  
             <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <input name="d_date" id="toDate" placeholder="date" class="form-control" type="text"  value="<?php echo $user['d_date']; ?>"  required>
               </div>
              </div>
          </div>
   <!-- Text input-->
        <div class="form-group">
           <label class="col-md-4 control-label">DESTINATION</label>  
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                   <select name="desti" placeholder="destination" id="desti" value='<?php echo $user['destination']; ?>'  required >
                   <option><?php echo $destination; ?></option>
                   <option value="ICD bangalore ">ICD bangalore </option>
                  </select>
                </div>
             </div>
         </div>
<!-- Text input-->    
        <div class="form-group">
          <label class="col-md-4 control-label"  >PRICE TERM</label>  
             <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <select name="price_term" id="price_term"  value="<?php echo $user['price_term']; ?>" required >
                  <option><?php echo $price_term; ?></option>
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
            <label class="col-md-4 control-label"  >PAYMENT TERM</label>  
              <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                        <select name="pay_term" id="pay_term" value="<?php echo $user['pay_term']; ?>" required>
                        <option><?php echo $pay_term; ?></option>
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
                      <select name="category" id="category"  value="<?php echo $user['category']; ?>" required >
                      <option><?php echo $category; ?></option>
                         <option value="HMR">HMR </option>
                         <option value="Paint">Paint </option>
                         <option value="E Veneer">E VENEER</option>
                         <option value="PARTICLE BOARD">PARTICLE BOARD</option>
                         <option value="E STONE">E STONE</option>
                         <option value="PVC">PVC</option>
                         <option value="CL">CL</option>
                         <option value="Paint">Paint</option>
                         <option value="GRANITE">GRANITE</option>
                         <option value="UNIVERSAL">UNIVERSAL</option>    
                      </select>
                      <br><br>  
                      <button type="submit" name="btn" onclick="myfun()">Generate po</button><br><br>
                   </div>
                </div>
             </div>   
        
         </div>    
         </div>  
         <div style=overflow-x:auto;>
	

	<div class="well" style="margin:auto; ">
	

		<div style="height:50px;"></div>
		<table class="table table-striped table-bordered table-hover">
		<?php	
		if(isset($_POST["category"]))
             {
               ?>
		<thead>
			<th>CODE</th>
                        <th>WM</th>
					            	<th>DM</th>
                        <th>TM</th>
                        <th>TYPE</th>
                        <th>FINISH</th>
                        <th>QTY</th>
					             	<th>COLOUR</th>
                        <th>SQM</th>
                        <th>KGS</th>
                        <th>RATE</th>
                        <th>TOTAL</th>
                        <th>ACTION</th>

						</thead>
			<tbody>
			
<?php
               if(isset($_POST["btn"]))
               {
                $query="SELECT CODE,WM,TM,DM,TYPE,FINISH,COLOUR,QTY,SQM,KGS,RATE, ROUND(QTY*SQM,4) as sqm,ROUND(QTY*KGS,4)as kgs,(QTY*RATE) as TOTAL from po where TYPE='".$_POST['category']."'";
                    $result=mysqli_query($link,$query) or die( mysqli_error($link));
                    while($row=mysqli_fetch_array($result))
                    {
       ?>
             <tr>
			 <td><?php echo $row['CODE']; ?></td>
                        <td><?php echo $row['WM']; ?></td>
                        <td><?php echo $row['DM']; ?></td>
                        <td><?php echo $row['TM']; ?></td>
                        <td><?php echo $row['TYPE']; ?></td>
                        <td><?php echo $row['FINISH']; ?></td>
                        <td><?php echo $row['QTY']; ?></td>
                        <td><?php echo $row['COLOUR']; ?></td>
                        <td><?php echo $row['sqm']; ?></td>
                        <td><?php echo $row['kgs']; ?></td>
                        <td><?php echo $row['RATE']; ?></td>
                        <td><?php echo $row['TOTAL']; ?></td>
						<td>
							<a href="#edit<?php echo $row['CODE']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
						
							<?php include('button.php'); ?>
						</td>
                     
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
   </script>
      <script>
       $( function() {
  var from = $( "#fromDate" )
      .datepicker({
        dateFormat: "yy-mm-dd",
		minDate: new Date()
      })
      .on( "change", function() {
        to.datepicker( "option", "minDate", getDate( this ) );
      }),
    to = $( "#toDate" ).datepicker({
      dateFormat: "yy-mm-dd",
     
    })
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });

  function getDate( element ) {
    var date;
    var dateFormat = "yy-mm-dd";
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }

    return date;
  }
});
    </script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</div>
<a href=preview.php>SEND TO</a>
</form>
</div>
</body>
</html>

