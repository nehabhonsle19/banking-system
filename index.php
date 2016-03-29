<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 3/27/16
 * Time: 2:02 AM
 */

if(isset($_REQUEST['submitBtn'])){
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
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
            <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        </head>
        <body>
        <div class="wrapper">
            <div class="header">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand navbar-brand-centered">MULTI-BANK</div>
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
        </body>
</html>