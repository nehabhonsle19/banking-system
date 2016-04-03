<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 3/30/16
 * Time: 5:46 PM
 */

#session_start();
#include 'connect/dbconnect.php';

#if (!isset($_SESSION['admin_login']))
#    header('location:adminlogin.php');
?>

<!DOCTYPE html>
<html>
<head>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
    <meta charset="UTF-8">
    <title>Admin Change Password</title>
    <link rel="stylesheet" href="admin_homepage.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<?php include 'admin_navbar.php'?>
<div class="change_password_admin">
    <div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only"></span>Close</button>
                <h4 class="modal-title" id="adminChangePasswor">Change Password</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="well">
                            <form id="adminChangePassword" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="password-old" class="control-label">Enter Old Password</label>
                                    <input type="text" class="form-control" id="password-old" name="old_password" value="" required="required" title="Enter your old password">

                                </div>
                                <div class="form-group">
                                    <label for="password-new" class="control-label">Enter new password</label>
                                    <input type="text" class="form-control" id="password-new" name="new_password" value="" required="required" title="Enter your new password">
                                    <input type="text" class="form-control" id="password-new" name="again_password" value="" required="required" title="Enter your new password again">
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Set</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
if (isset($_REQUEST['change_password'])){
    $sql="SELECT * FROM admin WHERE id='1'";
    $result=mysqli_query($sql);
    $rws = mysqli_fetch_array($result);
    $old = mysqli_real_escape_string($_REQUEST['old_password']);
    $new = mysqli_real_escape_string($_REQUEST['new_password']);
    $again = mysqli_real_escape_string($_REQUEST['again_password']);
    if ($rws[9]==$old && $new==$again){
        $sql1="UPDATE admin SET pwd='$new' WHERE id='1'";
        mysqli_query($sql1) or die(mysqli_error());
        header('location:admin_homepage.php');
    }
    else{
        header('location:change_password_admin.php');
    }
}
?>
</div>
</html>
