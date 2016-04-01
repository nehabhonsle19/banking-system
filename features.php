<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Features - Online Banking</title>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
    <link rel="stylesheet" href="index.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <style>
        .content_customer ul{
            margin-left:150px;
            margin-top:50px;
        }
        .content_customer li{
            padding-top:15px;
        }
    </style>

</head>
<?php include 'header.php' ?>
<div class='content_customer'>
    <h3 style="text-align:center;color:#2E4372;"><u>Online Banking features</u></h3>
    <ul>
        <li>Registration for online banking by Admin. </li>
        <li>Adding Beneficiary account by customer.</li>
        <li> Transferring amount to the beneficiary added by customer. </li>
        <li>Staff must approve for beneficiary activation before it can be used for transferring funds. </li>
        <li>Customer gets to know his last login date and time each time he logs in.</li>
        <li>Customer can check last 10 transactions made with their account.</li>
        <li>Customer can check their account statement within a date range.</li>

        <li>Customer can request for ATM and Cheque Book.</li>
        <li>Staff will approve requests for ATM card and cheque book. </li>
        <li> Admin can add/edit/delete customer as well as staff. </li>
        <li> All three of them(customer, staff & admin) can change their password. </li>
        <li>Staff and Admin Login pages are hidden from customer for security purpose.</li>
        <li>Passwords are stored as encrypted hashes with an additional random salt for added security.</li>

    </ul>
</div>
<?php include 'footer.php'?>
</html>
