<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 3/30/16
 * Time: 12:59 PM
 */

session_start();
session_destroy();
header('location:adminlogin.php');
?>