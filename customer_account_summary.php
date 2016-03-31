<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 2:23 AM
 */
#session_start();

#if(!isset($_SESSION['customer_login']))
#    header('location:index.php');
?>
<?php
$cust_id=$_SESSION['cust_id'];
include 'connect/dbconn.php';
$sql="SELECT * FROM customer WHERE email='$cust_id'";
$result=  mysql_query($sql) or die(mysql_error());
$rws=  mysql_fetch_array($result);


$name= $rws[1];
$account_no= $rws[0];
$branch=$rws[10];
$branch_code= $rws[11];
$last_login= $rws[12];
$acc_status=$rws[13];
$address=$rws[6];
$acc_type=$rws[5];

$gender=$rws[2];
$mobile=$rws[7];
$email=$rws[8];

$_SESSION['login_id']=$account_no;
$_SESSION['name']=$name;
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Home - Online Banking</title>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
    <link rel="stylesheet" href="index.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class='content_customer'>

    <?php include 'customer_navbar.php'?>
    <div class="customer_top_nav">
        <div class="text">Welcome <?php echo $_SESSION['name']?></div>
    </div>


    <?php

    $sql="SELECT * FROM passbook".$_SESSION['login_id'] ;
    $result=  mysql_query($sql) or die(mysql_error());
    while($rws=  mysql_fetch_array($result))
    {
        $balance=$rws[7];
    }
    ?>
    <div class="customer_body">
        <div class="content1">
            <p><span class="heading">Account No: </span><?php echo $account_no;?></p>
            <p><span class="heading">Branch: </span><?php echo $branch;?></p>
            <p><span class="heading">Branch Code: </span><?php echo $branch_code;?></p>
        </div>

        <div class="content2">
            <p><span class="heading">Balance: INR </span><?php echo $balance;?></p>
            <p><span class="heading">Account status: </span><?php echo $acc_status;?></p>
            <p><span class="heading">Last Login: </span><?php echo $last_login;?></p>
        </div>


    </div>

    <?php include 'footer.php';?>

    </body>
</html>