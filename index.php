<?PHP
  include('./conn/config.php');             //....database_connection.........
   session_start();                        //.......session_start................
   if($link===false)
      {
      die("connection error");          
      }
    if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $username=$_POST["username"];
        $password=$_POST["password"];
        $sql="select * from login where username='". $username."' AND password='". $password."' ";
        $result=mysqli_query($link,$sql);
        $row=mysqli_fetch_array($result);
    if($row["usertype"]=="manager")
   {  
         $_SESSION["username"]=$username;
         header("location:Manager_view1.php");
         }
       elseif ($row["usertype"]=="admin")
       {
        $_SESSION["username"]=$username;
        header("location:create.php");
       }
       else
       {
        echo "username or password incorrect";
       }
    }
?>  
<html>    
<head>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>    
<body>  
 <br><br>

<div class="log-log">  
<fieldset> 
  <h1>PAYMENT ORDER</h1>  
    <form method="POST" action=""> 
    <h2>Login </h2><br>   
        <label><b>User Name</b></label>    
        <input type="text" name="username" id="username" placeholder="Username">    
        <br><br>    
        <label><b>Password</b></label>    
        <input type="Password" name="password" id="password" placeholder="Password">    
        <br><br> 
        <input type="submit" name="login" id="login" value="LOGIN">       
        <br><br>  
         <a href="forget.php"> Forgot password? </a>
     
    </form>    
  </div> 
  </div>  
  </fieldset> 
</body>    
</html> 