<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 12:32 PM
 */
session_start();

if(!isset($_SESSION['staff_login']))
    header('location:staff_login.php');
?>
<?php
$staff_id=$_SESSION['staff_id'];
include 'connect/dbconnect.php';
$sql="SELECT * FROM staff WHERE email='$staff_id'";
$result=  mysql_query($sql) or die(mysql_error());
$rws=  mysql_fetch_array($result);

$id=$rws[0];
$name=$rws[1];
$dob=$rws[2];
$department=$rws[4];
$doj=$rws[5];
$mobile=$rws[7];
$email=$rws[8];
$gender=$rws[10];
$last_login=$rws[11];

$_SESSION['login_id']=$email;
$_SESSION['name1']=$name;
$_SESSION['id']=$id;
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Staff Home</title>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
        <link rel="stylesheet" href="index.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <div class="displaystaff_content">

        <?php include 'staff_navbar.php'?>
        <div class="customer_top_nav">
            <div class="text">Welcome <?php echo $_SESSION['name1']?></div>
        </div>

        <div class="customer_body">
            <div class="content1">
                <p><span class="heading">Name: </span><?php echo $name;?></p>
                <p><span class="heading">Department: </span><?php echo $department;?></p>
                <p><span class="heading">Email: </span><?php echo $email;?></p>
            </div>
            <div class="content2">
                <p><span class="heading">DOJ: </span><?php echo $doj;?></p>
                <p><span class="heading">Last Login: </span><?php echo $last_login;?></p>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>
<?php
$date1=date('Y-m-d H:i:s');
$_SESSION['staff_date']=$date1;
?>