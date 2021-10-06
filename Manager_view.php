<?php

include('./conn/config.php');
include_once('Manager_view1.php');

?>
<html>
    <head>
         <title>Manager preview Page</title>
            <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
            <link rel="stylesheet" href="style.css"></link>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
    
     <!-- Sidebar -->
  <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
    <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
    <a href="Manager_view.php" class="w3-bar-item w3-button">ALL PO'S</a>
    <a href="Manager_pre.php" class="w3-bar-item w3-button">ALL PREVIEW </a>
    <a href="logout.php" class="w3-bar-item w3-button">LOGOUT</a>
  </div>
  
  <!-- Page Content -->
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
   <div class="order">
   <h2>   PAYMENT  ORDER       </h2></div>
    <table class="display" id="userTable" style="width:40%" >
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
            <th>TOTAL</th> 
            <th>ACTION</th>
          </tr>
    <?php
          $qr="SELECT CODE,WM,TM,DM,TYPE,FINISH,COLOUR,QTY,SQM,KGS,RATE,(QTY*SQM) as sqm,(QTY*KGS)as kgs,(QTY*RATE) as TOTAL from po";
          $re=mysqli_query($link,$qr);
          while($user=mysqli_fetch_array($re))
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
                <td><a href="down.php?CODE=<?php echo $user['CODE']; ?>">Download Now</a></td> 
          </tr>
        <?php
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
       </div>
  </div> 
</body>
</html>
