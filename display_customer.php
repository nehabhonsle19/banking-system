<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 1:41 AM
 */
#session_start();

#if(!isset($_SESSION['admin_login']))
#header('location:adminlogin.php');
?>
<!DOCTYPE html>
<?php
include 'connect/dbconn.php';
$sql="SELECT * FROM `customer`";
$result=  mysql_query($sql) or die(mysql_error());
$sql_min="SELECT MIN(id) from customer";
$result_min=  mysql_query($sql_min);
$rws_min=  mysql_fetch_array($result_min);
?>
<html>
<head>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style>
        .displaystaff_content table,th,td {
            padding:6px;
            border: 1px solid #2E4372;
            border-collapse: collapse;
        }

    </style>
    <title>Edit Customer Details</title>
</head>
<div class="displaystaff_content">
    <?php include 'admin_navbar.php'?>
    <form action="editcustomer.php" method="POST">

        <table align="center">
            <th>id</th>
            <th>name</th>
            <th>gender</th>
            <th>DOB</th>
            <th>nominee</th>
            <th>account type</th>
            <th>address</th>
            <th>mobile</th>
            <th>email</th>
            <?php
            while($rws=  mysql_fetch_array($result)){
                echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                if($rws[0]==$rws_min[0]) echo' checked';
                echo " /></td>";
                echo "<td>".$rws[1]."</td>";
                echo "<td>".$rws[2]."</td>";
                echo "<td>".$rws[3]."</td>";
                echo "<td>".$rws[4]."</td>";
                echo "<td>".$rws[5]."</td>";
                echo "<td>".$rws[6]."</td>";
                echo "<td>".$rws[7]."</td>";
                echo "<td>".$rws[8]."</td>";
                echo "</tr>";
            }
            ?>

        </table>
        <table align="center">
            <tr>
                <td>
                    <input type="submit" name="submit_id" value="EDIT CUSTOMER DETAILS" class='addstaff_button'/>
                </td>
            </tr>
        </table>
    </form>


</div>




</body>
</html>