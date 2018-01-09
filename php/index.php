
<?php
/*
 * Tutorial: PHP Login Registration system
 *
 * Page index.php
 * */

// Start Session
session_start();
include "layout.php";
// Application library ( with DemoLib class )
require __DIR__ . '/library.php';
$app = new DemoLib();

$login_error_message = '';
$register_error_message = '';

// check Login request
if (!empty($_POST['btnLogin1'])) {

    header("Location: login.php"); // Redirect user to the profile.php

}

// check Register request
if (!empty($_POST['btnRegister1'])) {

        header("Location: register.php");

}




if (!empty($_SESSION['user_id']))
{
    header('Location: profile.php');
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/styleindex.css">
</head>

<body>



    <div class="row2">
        <form action="index.php" method="post">
            <div class="form-group">
                <input type="submit" name="btnRegister1" class="btn btn-primary" value="Register"/>
            </div>
        </form>

        <form action="login.php" method="post">
            <div class="form-group">
                <input type="submit" name="btnLogin1" class="btn btn-primary" value="Login"/>
            </div>
        </form>
    </div>




</body>
</html>