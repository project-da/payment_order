<?php
include('./conn/config.php');  //connection
include_once('create.php');
 ?>
      <html>
        <head> 
          <title>Manager preview Page</title>
             <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
             <link rel="stylesheet" href="style.css"></link>
             <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
        <body>
     
        <div class="pay" style=" margin-left: 11%;">    
      <table class="display" id="userTable" style="width:100%" >
                    <tr>   
                            <th>PO.NO</th>
                            <th>Order DATE</th>
                            <th>Delivery Date</th>
                            <th>Destination</th>
                            <th>Pricing terms</th>
                            <th>Payment Terms</th>
                            <th>Supplier name</th>
                            <th>Category</th>
                            <th>action</th>
                    </tr>
                    <?php
                            $qr=("SELECT * from  create_po")
                            or die('Invalid query: ' . mysql_error());;
                            $re=mysqli_query($link,$qr);
                            while($user=mysqli_fetch_array($re))
                            {
                    ?>
                    <tr>
                            <td><?php echo $user['PO']; ?></td>
                            <td><?php echo $user['o_date']; ?></td>
                            <td><?php echo $user['d_date']; ?></td>
                            <td><?php echo $user['destination']; ?></td>
                            <td><?php echo $user['price_term']; ?></td>
                            <td><?php echo $user['pay_term']; ?></td>
                            <td><?php echo $user['supplier']?></td>
                            <td><?php echo $user['category']?></td>
                           <td><a href="download.php?PO=<?php echo $user['PO']; ?>">Download Now</a></td>
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
     

</body>
</html>