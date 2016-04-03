<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 1:43 AM
 */
#session_start();

#if(!isset($_SESSION['customer_login']))
#    header('location:index.php');
?>
    <!DOCTYPE html>
    <html>
<head>
    <meta charset="UTF-8">
    <title>Display Beneficiary</title>
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

    <?php
    include 'connect/dbconn.php';
    $sender_id=$_SESSION["login_id"];
    $sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id'";
    $result=  mysqli_query($sql) or die(mysqli_error());
    ?>
    <br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Added Beneficiary</u></h3>
    <form action="delete_beneficiary.php">
        <table align="center">

            <th>Id</th>
            <th>Name</th>
            <th>Beneficiary Account No</th>
            <th>status</th>

            <?php
            while($rws=  mysqli_fetch_array($result)){

                echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                echo ' checked';
                echo " /></td>";
                echo "<td>".$rws[4]."</td>";
                echo "<td>".$rws[3]."</td>";
                echo "<td>".$rws[5]."</td>";

                echo "</tr>";
            } ?>
        </table>
        <table align="center"><tr><td><input type="submit" name="submit_id" value="DELETE BENEFICIARY" class='addstaff_button'/></td></tr></table>
    </form>
</div>
<?php include 'footer.php'?>