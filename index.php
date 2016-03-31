<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 3/27/16
 * Time: 2:02 AM
 */

if(isset($_REQUEST['submitBtn'])){
    include 'connect/dbconnect.php';
    $username=$_REQUEST['uname'];

    $salt="@g26jQsG&nh*&#8v";
    $password=sha1($_REQUEST['pwd'].$salt);

    $sql_request="SELECT email,password FROM banking customer WHERE email='$username' AND password='$password'";
    $result=mysql_query($sql_request) or die(mysql_error());
    $rws= mysql_fetch_array($result);

    $user=$rws[0];
    $pwd=$rws[1];

    if($user==$username && $pwd==$password){
        session_start();
        $_SESSION['customer_login']=1;
        $_SESSION['cust_id']=$username;
    header('location:customer_account_summary.php');
    }
    else {
        header('location:index.php');
    }
}
?>
<?php
session_start();

if (isset($_SESSION['customer_login']))
    header('location:customer_acount_summary.php');
?>
<!DOCTYPE html>
    <html>
        <head>
            <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
            <meta charset="UTF-8">
            <title>Multi banking System</title>
            <link rel="stylesheet" href="index.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        </head>
        <body>
        <div class="wrapper">
            <div class="header">
                <div class="container-fluid">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand navbar-brand-centered">OSCAR</div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-brand-centered">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Bank 1</a> </li>
                                <li><a href="#">Bank 2</a> </li>
                                <li><a href="#">Bank 3</a> </li>
                            </ul>
                        </div>
                    </div>
                </nav>
               </div>

            </div>

            <div id="login-overlay" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span> </button>
                        <h4 class="modal-title" id="myModalLabel">Login To OSCAR</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="well">
                                    <form id="loginForm" method="POST" novalidate="novalidate">
                                        <div class="form-group">
                                            <label for="username" class="control-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter your username">
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="control-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                            <span class="help-block"></span>
                                        </div>
                                        <div id="loginErrorMsg" class="alert alert-error hide">Wrong username of password</div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" id="remember"> Remember login
                                            </label>
                                            <p class="help-block">(if this is a private computer)</p>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">Login</button>
                                        <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <p class="lead">Register now for a <span class="text-success">FREE</span> account </p>
                                <ul class="list-unstyled" style="line-height: 2">
                                    <li><span class="fa fa-check text-success"> Registration for online banking</span> </li>
                                    <li><span class="fa fa-check text-success"> Adding Beneficiary account</span> </li>
                                    <li><span class="fa fa-check text-success"> Funds Transfer</span> </li>
                                    <li><span class="fa fa-check text-success"> Last Login record</span> </li>
                                    <li><span class="fa fa-check text-success"> Mini Statment</span> </li>
                                    <li><span class="fa fa-check text-success"> ATM and Cheque Book</span> </li>
                                    <li><span class="fa fa-check text-success"> Account Statment by date</span> </li>
                                </ul>
                                <p><a href="/new-customer/" class="btn btn-info btn-block">Register Now</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span2" style="width: 15%;">
                            <ul class="unstyled">
                                <li>Github</li>
                                <li><a href="#">About us</a> </li>
                                <li><a href="#">Contact & Support</a> </li>
                            </ul>
                        </div>
                        <div class="span4">
                            <p class="muted pull-right">© 2013 EntityDevelopers. All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
</html>