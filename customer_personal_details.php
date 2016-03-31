<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 1:22 AM
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
    <title>Personal Details</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<div class='content_customer'>

    <?php include 'customer_navbar.php'?>
    <div class="customer_top_nav">
        <div class="text">Welcome <?php echo $_SESSION['name']?></div>
    </div>
    <br><br><br><br>
    <h3 style="text-align:center;color:#2E4372;"><u>Personal Details</u></h3>

    <?php
    $cust_id=$_SESSION['cust_id'];
    include '_inc/dbconn.php';
    $sql="SELECT * FROM customer WHERE email='$cust_id'";
    $result=  mysqli_query($sql) or die(mysqli_error());
    $rws=  mysqli_fetch_array($result);


    $name= $rws[1];
    $account_no= $rws[0];
    $dob=$rws[3];
    $nominee=$rws[4];
    $branch=$rws[10];
    $branch_code= $rws[11];

    $gender=$rws[2];
    $mobile=$rws[7];
    $email=$rws[8];
    $address=$rws[6];

    $last_login= $rws[12];

    $acc_status=$rws[13];
    $acc_type=$rws[5];




    ?>          <div class="customer_body">
        <div class="content3">
            <p><span class="heading">Name: </span><?php echo $name;?></p>
            <p><span class="heading">gender: </span><?php if($gender=='M') echo "Male"; else echo "Female";?></p>
            <p><span class="heading">Mobile: </span><?php echo $mobile;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            <p><span class="heading">Address: </span><?php echo $address;?></p>
        </div>
        <div class="content4">
            <p><span class="heading">Account No: </span><?php echo $account_no;?></p>
            <p><span class="heading">Nominee: </span><?php echo $nominee;?></p>
            <p><span class="heading">Branch: </span><?php echo $branch;?></p>
            <p><span class="heading">Branch Code: </span><?php echo $branch_code;?></p>

            <p><span class="heading">Account Type: </span><?php echo $acc_type;?></p>
        </div>
    </div>
</div>
<?php include 'footer.php';?>

</body>
</html>