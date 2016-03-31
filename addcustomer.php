<?php
/**
 * Created by PhpStorm.
 * User: michaelspeed
 * Date: 4/1/16
 * Time: 12:25 AM
 */
#session_start();

#if(!isset($_SESSION['admin_login']))
#    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<html>
<head>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>
    <meta charset="UTF-8">
    <title>Add Customer</title>
    <link rel="stylesheet" href="admin_login.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
    <div class='addstaff'>

        <form action="add_customer.php" method="POST">
            <table align="center">
                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><u>Add Customer</u></h3></td></tr>
                <tr>
                    <td> Customer's name</td>
                    <td><input type="text" name="customer_name" required=""/></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        M<input type="radio" name="customer_gender" value="M" checked/>
                        F<input type="radio" name="customer_gender" value="F" />
                    </td>
                </tr>
                <tr>
                    <td>
                        DOB
                    </td>
                    <td>
                        <input type="date" name="customer_dob" required=""/>
                    </td>
                </tr>
                <tr>
                    <td>Nominee</td>
                    <td><input type="text" name="customer_nominee" required=""/></td>
                </tr>
                <tr>
                    <td>
                        Branch
                    </td>
                    <td>
                        <select name="branch">
                            <option>KOLKATA</option>
                            <option>DELHI</option>
                            <option>BANGALORE</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Account type</td>
                    <td>
                        <select name="customer_account">
                            <option>savings</option>
                            <option>current</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Minimum amount</td>
                    <td><input type="text" name="initial" value="1000" min="1000" required=""/></td>
                </tr>

                <tr>
                    <td>Address:</td>
                    <td><textarea name="customer_address" required=""></textarea></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><input type="text" name="customer_mobile" required=""/></td>
                </tr>

                <tr>
                    <td>Email id</td>
                    <td><input type="email" name="customer_email" required=""/></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="customer_pwd" required=""/></td>
                </tr>
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="add_customer" value="Add Customer" class="addstaff_button"/></td>
                </tr>
            </table>
    </div>
</div>
</form>
<?php include 'footer.php';?>
</body>
</html>