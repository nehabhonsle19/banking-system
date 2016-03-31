<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 1:07 AM
 */
#session_start();

#if(!isset($_SESSION['customer_login']))
#    header('location:index.php');
?>
    <!DOCTYPE html>
    <?php include 'customer_navbar.php'?>
<head>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
    <meta charset="UTF-8">
    <title>Account Statement</title>
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
    <div class="customer_top_nav">
        <div class="text">Welcome <?php echo $_SESSION['name']?></div>
    </div>

    <br><br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Account summary by Date</u></h3>
    <form action="customer_account_statement_date.php" method="POST">
        <table align="center">
            <tr><td>Start Date [mm/dd/yyyy] </td><td>
                    <input type="date" name="date1" required></td></tr>

            <tr><td>End Date [mm/dd/yyyy] </td><td>
                    <input type="date" name="date2" required></td></tr>
        </table>
        <div class="wrap"
        <table align="center"><tr><td colspan="2" align='center' ><input type="submit" name="summary_date" value="Go" class="addstaff_button"/></td>
            </tr>
        </table>
        </div>
    </form>

</div>
<?php include 'footer.php'?>