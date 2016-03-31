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
#   header('location:adminlogin.php');
?>

<!DOCTYPE html>
<html>
<head>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
    <meta charset="UTF-8">
    <title>Customer Change Password</title>
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
                <h4 class="modal-title" id="customerChangePasswor">Change Password</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="well">
                            <form id="customerChangePassword" method="post" novalidate="novalidate">
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
    $change=$_SESSION['login_id'];
    if(isset($_REQUEST['change_password'])){
        $sql="SELECT * FROM customer WHERE id='$change'";
        $result=mysqli_query($sql);
        $rws=  mysqli_fetch_array($result);

        $salt="@g26jQsG&nh*&#8v";
        $old=  sha1($_REQUEST['old_password'].$salt);
        $new=  sha1($_REQUEST['new_password'].$salt);
        $again=sha1($_REQUEST['again_password'].$salt);

        if($rws[9]==$old && $new==$again){
            $sql1="UPDATE customer SET password='$new' WHERE id='$change'";
            mysqli_query($sql1) or die(mysqli_error());
            header('location:customer_account_summary.php');
        }
        else{

            header('location:change_account_summary.php');
        }
    }
    ?>
</div>
</html>
