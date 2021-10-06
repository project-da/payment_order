<?php
include('./conn/config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Document</title>
</head>
<style>
   
.form-a {
    margin-left: 60%;
    margin-top: -18%;
}
.title {
    margin-right: 18%;
    margin-top: -18px;
}
table {
    margin-left: -200%;
}
</style>
<body>
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
                <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
              <a href="insert_po.php" class="w3-bar-item w3-button">CREATE PO</a>
              <a href="all_preview.php" class="w3-bar-item w3-button"> PREVIEW ALL PO's</a>
              <a href="supplier.php" class="w3-bar-item w3-button"> </a>
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
       <br><br>
<form action="" method="POST">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="title">
                <h4> INTERO LIVING PTY LTD </h4>
                <h5>No.304, Tower 23,</h5>
                <h5>Unihomes, Phase 1, Nallambakkam,</h5>
                <h5>Chennai-600048.</h5>
                <h5>IEC : TBC</h5>
                <h5>GST: TBC </h5>
                <h3></h3>
            </div>
        </div>
    </div>
</div>
<?php
?>
        <div class="col-md-6">
            <div class="form-a">
                        <label for="po">PO No.</label>
                        <input type="text" name="t1" value="<?php echo $user['PO']; ?>" /><br><br>

                        <label for="od">Order Date:</label>
                        <input type="date" name="t2"  value="<?php echo $user['o_date']; ?>"/><br><br>

                        <label for="dd">Delivery Date:</label>
                        <input type="date" name="t3"  value="<?php echo $user['d_date']; ?>"/><br><br>
                        
                      

                        <label for="desti">Desti.:  &nbsp;</label>
                        <input type="text" name="t5"  value="<?php echo $user['destination']; ?>"/><br><br>

                        <label >Pricing terms:</label>
                        <select  name="t6"  value="<?php echo $user['price_term']; ?>">
                            <option value="Factor">Factor</option>
                            <option value="FOB">FOB</option>
                            <option value="C$F">C$F</option>
                            <option value="FIS">FIS</option>
                        </select><br><br>

                        <label >Payment Terms:</label>
                        <select  name="t7"  value="<?php echo $user['pay_term']; ?>">
                            <option value="COD">COD</option>
                            <option value="30 Days">30 Days</option>
                            <option value="60 Days">60 Days</option>
                        </select><br><br>
                   <label> category:</label>
                         <select name="t8"  value="<?php echo $user['category']; ?>"> select category
            <option> select category</option> </select>
          <br><br>
              
       


            </form>
            
            </div>
        </div> 
        
       
    <form action="" method="POST">
        <div style="overflow-x:auto;">
           <table class="display" id="userTable" style="width:20%"   >
              <the>
            
            <th>CODE</th>
            <th>W(MM)</th>
            <th>D(MM)</th>
            <th>T(MM)</th>
            <th>TYPE</th>
            <th>FINISH</th>
            <th>QUANTITY</th>
            <th>COLOUR</th>
            <th>SQM</th>
            <th>KGS</th>
            <th>RATE</th>
            <th>TOTAL</th> 
</thead>  
             <?php
          $sql = "SELECT CODE,WM,TM,DM,TYPE,FINISH,COLOUR,QTY,SQM,KGS,RATE,ROUND(QTY*SQM,4) as sqm,ROUND(QTY*KGS,4)as kgs,(QTY*RATE) as TOTAL,  SUM(TOTAL) as grandtotal  from po  ";
$result =mysqli_query($link, $sql);
while($user=mysqli_fetch_array($result))
{
?>
            <tr>       
            <td><?php echo $user['CODE'];?></td>
                <td><?php echo $user['WM'];?></td>
                <td><?php echo $user['DM'];?></td>
                <td><?php echo $user['TM'];?></td>
                <td><?php echo $user['TYPE'];?></td>
                <td><?php echo $user['FINISH'];?></td>
                <td><?php echo $user['QTY'];?></td>
                <td><?php echo $user['COLOUR'];?></td>
                <td><?php echo $user['sqm'];?></td>
                <td><?php echo $user['kgs'];?></td>
                <td><?php echo $user['RATE'];?></td>
                <td><?php echo $user['TOTAL'];?></td>
          </tr>
           <?php } ?>
      </table>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
        $(document).ready(function() {
        $('#userTable').DataTable();
        });
        </script><br><br>
      </form>       
     </body>
</html>

