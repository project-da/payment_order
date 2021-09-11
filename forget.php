<?php
include('./conn/config.php');
        $username_err=$password_err=$confirm_err=$match_err=$msg=$error='';
if(isset($_POST['submit1']))
 {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $confirm=$_POST['cpass'];
            $query="select * from login where username='$username'";
            $run=mysqli_query($link,$query);
            $row=mysqli_num_rows($run);
    if($row==0)
        {
            $username_err="username does not exist";
        }
    else if($password=='')
        {
            $password_err="please enter your new password";
        }
    elseif($confirm=='')
        {
        $confirm_err="please re_enter your new password";
        }
    else if($password!==$confirm)
        {
            $match_err="password do not match";
        }
    else
    {
        $sql="update login set password='$password' where username='$username'";
        $run=mysqli_query($link,$sql);
            if($run)
                {
                    $msg="password changed successfully";
                }
            else
                {
                    $error="unable to change password";
                }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Reset password</title>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/boootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                    <link rel="stylesheet" href="style.css">
                    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        </head>
            <body>
                   
                   <div class="log-log"> <br>
                       <fieldset>   
                   <h1>PAYMENT ORDER</h1>
                   <br>
                        <form method="POST" action="" id="log"><br>
                                <h2>Reset password </h2><br><br>
                                <label><b>User Name</b></label>
                                <input type="text" name="username" id="username" placeholder="Username">    
                                <br><br>  
                                <span class="float-right text-danger font-weight-bold"><?php echo $username_err; ?></span>
                                <label><b>New Password</b></label>
                                <input type="password" name="password" placeholder="New password"/><br><br>
                                <span class="float-right text-danger font-weight-bold"><?php echo $password_err; ?></span>
                                <label><b>Confirm password</b></label>
                                <input type="password" name="cpass" placeholder="Confirm password" /><br><br>
                                <span class="float-right text-danger font-weight-bold"><?php echo $confirm_err; echo $match_err; ?></span>
                                <p class="text-center font-weight-bold"><?php echo $msg; echo $error; ?></p>
                                <input type="submit" name="submit1" id="submit1" value="Reset"><br><br>
                                <a href="index.php"><button class="GF"> Login </a> </button>  
                        </form>
                    </div>
</fieldset>
            </body>
</html>