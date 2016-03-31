<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 2:03 AM
 */
session_start();

include 'connect/dbconn.php';

$date=date('Y-m-d h:i:s');
$id=$_SESSION['login_id'];
$sql="UPDATE customer SET lastlogin='$date' WHERE id='$id'";
mysql_query($sql) or die(mysql_error());

session_destroy();
header('location:index.php');
?>