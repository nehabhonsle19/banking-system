<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 3/30/16
 * Time: 2:22 AM
 */
session_start();

if (isset($_SESSION['admin_login']))
    header('location:admin_homepage.php');
?>

<!DOCTYPE html>
    <html>
        <head>
            <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
            <meta charset="UTF-8">
            <title>Admin Login - OSCAR</title>
            <link rel="stylesheet" href="admin_login.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        </head>
        <?php
        include 'header.php'; ?>
        ?>
       <div class = "container">
           <div class="wrapper">
               <form action="" method="post" name="Login_Form" class="form-signin">
                   <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                   <hr class="colorgraph"><br>

                   <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" />
                   <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>

                   <button class="btn btn-lg btn-primary btn-block"  name="SubmitBtn" value="Login" type="Submit">Login</button>
               </form>
           </div>
       </div>
<?php include 'footer.php'; ?>

<?php
include 'connect/dbconnect.php';
if(!isset($_SESSION['admin_login'])){
    if(isset($_REQUEST['SubmitBtn'])){
        $sql="SELECT * FROM admin WHERE id='1'";
        $result=mysql_query($sql);
        $rws= mysql_fetch_array($result);
        $username= mysql_real_escape_string($_REQUEST['uname']);
        $password= mysql_real_escape_string($_REQUEST['pwd']);
        if($username==$rws[8] && $password==$rws[9]){
            $_SESSION['admin_login']=1;
         header('location:admin_homepage.php');}
        else
         heder('location:adminlogin.php');
        }
    }
else{
    header('location:admin_homepage.php');
}
?>