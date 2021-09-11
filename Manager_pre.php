<?php
include('./conn/config.php');  //connection
include_once('Manager_view1.php');
 ?>
<html><head> <title>Manager preview Page</title>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="style.css"></link>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
        <div class="tab"> 
<div class="container">
<h2>   PAYMENT  ORDER       </h2></div>
</div>
<table class="display" id="userTable" style="width:80%">
<tr>
    <th>PO.NO</th>
    <th>Order DATE</th>
    <th>Delivery Date</th>
    <th>Destination</th>
    <th>Pricing terms</th>
    <th>Payment Terms</th>
    <th>Supplier name</th>
    <th>Action</th>
    </tr>
    <tbody>
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
                    <td><a href="manager_download.php?PO=<?php echo $user['PO']; ?>">Download Now</a></td>

                    </tr>
            <?php
    }
            ?>
            </tbody>
</table>  

      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <script>
      $(document).ready(function() {
      $('#userTable').DataTable();
      });
      </script>
      </div>
</form>
        </div> 
        
</body>
</html>