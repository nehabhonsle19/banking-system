<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 3/27/16
 * Time: 2:05 AM
 */
$serverName="localhost";
$dbusername="root";
$dbpassword="mike0001";
$dbname="banking";
mysql_connect($serverName,$dbusername,$dbpassword)/* or die('down;)*/;
mysql_select_db($dbname) or die(mysql_error());
?>
