<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 1:32 AM
 */
#session_start();

#if(!isset($_SESSION['customer_login']))
#    header('location:index.php');
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
    <style>
        .content_customer table,th,td {
            padding:6px;
            border: 1px solid #2E4372;
            border-collapse: collapse;
            text-align: center;
        }
        .content_customer td{
            padding:10px;
        }
        .head{

            text-align:center;
            color:#2E4372;
            font-weight:bold;
        }

    </style>
</head>
<?php include 'header.php' ?>
<div class='content_customer'>

    <?php include 'customer_navbar.php'?>
    <div class="customer_top_nav">
        <div class="text">Welcome <?php echo $_SESSION['name']?></div>
    </div>
    <br><br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Transfer Funds</u></h3>


    <?php
    include '_inc/dbconn.php';
    $sender_id=$_SESSION["login_id"];


    $sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
    $result=  mysqli_query($sql);
    $rws=mysqli_fetch_array($result);
    $s_id=$rws[1];
    ?>


    <?php
    if($sender_id==$s_id)
    {
        echo "<form action='customer_transfer_process.php' method='POST'>";
        echo "<table align='center'>";
        echo "<tr><td>Select Beneficiary:</td><td> <select name='transfer'>" ;

        $sql1="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
        $result=  mysqli_query($sql);

        while($rws=mysqli_fetch_array($result)) {
            echo "<option value='$rws[3]'>$rws[4]</option>";
        }

        echo "</td></tr></select>";

        echo "<tr><td>Enter Amount: </td><td><input type='number' name='t_val' required></td></table>";

        echo "<table align='center'><tr><td style='padding:5px;'><input type='submit' name='submitBtn' value='Transfer' class='addstaff_button'></td></tr></table></form>";
    }
    else{
        echo "<br><br><div class='head'><h3>No Benefeciary Added with your account.</h3></div>";
    }
    ?>
</div>
<?php include 'footer.php'; ?>