<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 2:04 AM
 */
#session_start();

#if(!isset($_SESSION['customer_login']))
#    header('location:index.php');
?>
    <!DOCTYPE html>
    <html>
<head>
    <meta charset="UTF-8">
    <title>Mini Statement</title>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
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

    </style>
</head>
<div class='content_customer'>

    <?php include 'customer_navbar.php'?>
    <div class="customer_top_nav">
        <div class="text">Welcome <?php echo $_SESSION['name']?></div>
    </div>

    <?php    include '_inc/dbconn.php';
    $sender_id=$_SESSION["login_id"];
    $sql="SELECT * FROM passbook".$sender_id." LIMIT 10";
    $result=  mysql_query($sql) or die(mysql_error()); ?>

    <br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Last 10 Transaction</u></h3>
    <table align="center">

        <th>Id</th>
        <th>Transaction Date</th>
        <th>Narration</th>
        <th>Credit</th>
        <th>Debit</th>
        <th>Balance Amount</th>

        <?php
        while($rws=  mysql_fetch_array($result)){

            echo "<tr>";
            echo "<td>".$rws[0]."</td>";
            echo "<td>".$rws[1]."</td>";
            echo "<td>".$rws[8]."</td>";
            echo "<td>".$rws[5]."</td>";
            echo "<td>".$rws[6]."</td>";
            echo "<td>".$rws[7]."</td>";

            echo "</tr>";
        } ?>
    </table>
</div>
<?php include 'footer.php'?>