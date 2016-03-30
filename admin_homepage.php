<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 3/30/16
 * Time: 1:01 PM
 */

session_start();

#if (!isset($_SESSION['admin_login']))
 #   header('location:adminlogin.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
    <meta charset="UTF-8">
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="admin_homepage.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<?php include 'admin_navbar.php'?>
<div class="col-sm-6 col-md-4">
<div id="staff_widget" class="list-group">
    <div class="list-group-item heading">
        <img class="media-object img-circle" src="#">
        <div class="text-warp">
            <h4 class="list-group-item-heading">Admin</h4>
            <p class="list-group-item-text">Staff Control Panel</p>
        </div>
        <div class="clearfix"></div>
    </div>
    <a href="#" class="list-group-item">
        <i class="fa fa-user fa-lg pull-right"></i>
        <p class="list-group-item-text">Add staff members</p>
    </a>
    <a href="#" class="list-group-item">
        <i class="fa fa-user fa-lg pull-right"></i>
        <p class="list-group-item-text">Edit staff members</p>
    </a>
    <a href="#" class="list-group-item">
        <i class="fa fa-user fa-lg pull-right"></i>
        <p class="list-group-item-text">Delete staff</p>
    </a>
</div>

    <div id="customer_widget" class="list-group">
        <div class="list-group-item heading">
            <img class="media-object img-circle" src="#">
            <div class="text-warp">
                <h4 class="list-group-item-heading">Admin</h4>
                <p class="list-group-item-text">Customer Control Panel</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <a href="#" class="list-group-item">
            <i class="fa fa-user fa-lg pull-right"></i>
            <p class="list-group-item-text">Add customer</p>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-user fa-lg pull-right"></i>
            <p class="list-group-item-text">Edit customer</p>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-user fa-lg pull-right"></i>
            <p class="list-group-item-text">Delete customer</p>
        </a>
    </div>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>

