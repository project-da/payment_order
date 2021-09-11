<?php  //php starts
include('./conn/config.php'); // connection
$CODE = $_GET['CODE']; // get id through query string
$qry = mysqli_query($link,"select * from po where CODE='$CODE'"); // select query
$user = mysqli_fetch_array($qry); // fetch data
if(isset($_POST['update'])) // when click on Update button
{
    $QTY = $_POST['t1'];
    $edit = mysqli_query($link,"update po set QTY='$QTY' where CODE='$CODE'");
    if($edit)
    {
        mysqli_close($link); // Close connection
        header("location:Admin_view.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>  <!--phpends-->
<!DOCTYPE html> <!--html start-->
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Document</title>
        </head>
    <body>
    <body>
     <div class="wrapper">
    </div>
    <div class="tab"> 
       <h2>Payment Order</h2>
    </div>
      <h3>Update Data</h3>
        <form method="POST">
                    QTY<input type="text" name="t1" value="<?php echo $user['QTY'] ?>" placeholder="Enter qty" Required><br><br><Br>
                    <input type="submit" name="update" value="Update">
        </form>
   </body>
</html>