<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 12:33 PM
 */
session_start();

if(isset($_SESSION['staff_login']))
    header('location:staff_homepage.php');
?>
    <!DOCTYPE html>
    <html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
        <meta charset="UTF-8">
        <title>Staff Login - Online Banking</title>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
        <link rel="stylesheet" href="index.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
<?php
include 'header.php'; ?>

    <div class='content'>
        <div class="user_login">
            <form action='' method='POST'>
                <table align="center">
                    <tr><td><span class="caption">Staff Login</span></td></tr>
                    <tr><td colspan="2"><hr></td></tr>
                    <tr><td>Username:</td></tr>
                    <tr><td><input type="text" name="uname"></td></tr>
                    <tr><td>Password:</td></tr>
                    <tr><td><input type="password" name="pwd"></td></tr>
                    <tr><td class="button1"><input type="submit" name="submitBtn" value="Log In" class="button"></td></tr>
                </table>
            </form>
        </div>
    </div>

<?php include 'footer.php';
?>
<?php
if(isset($_REQUEST['submitBtn'])){
    include 'connect/dbconnect.php';
    $username=$_REQUEST['uname'];
    $password=$_REQUEST['pwd'];

    $sql="SELECT email,pwd FROM staff WHERE email='$username' AND pwd='$password'";
    $result=mysql_query($sql) or die(mysql_error());
    $rws=  mysql_fetch_array($result);



    if($rws[0]==$username && $rws[1]==$password){
        session_start();
        $_SESSION['staff_login']=1;
        $_SESSION['staff_id']=$username;

        header('location:staff_homepage.php');
    }
    else
        echo "fail";

}
?>