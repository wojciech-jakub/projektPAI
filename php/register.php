<?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 25.11.2017
 * Time: 22:20
 */
session_start();

// Application library ( with DemoLib class )
require "library.php";
$app = new DemoLib();



$login_error_message = '';
$register_error_message = '';
if (!empty($_POST['btnLogin'])) {

    header("Location: login.php"); // Redirect user to the profile.php

}

if (!empty($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $register_error_message = 'Please enter field';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Please enter field';
    } else if ($_POST['username'] == "") {
        $register_error_message = 'Please enter field';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Please enter field';
    }
    else if ($_POST['password1'] == "") {
        $register_error_message = 'Please enter field';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Invalid email address!';
    } else if ($app->isEmail($_POST['email'])) {
        $register_error_message = 'Email is already in use!';
    } else if ($app->isUsername($_POST['username'])) {
        $register_error_message = 'Username is already in use!';
    }
       else if ($_GET['password']!=$_GET['password1'])
    {
        $register_error_message = 'password is not the same';
    }
    else {
        $user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password']);
        // set session and redirect user to the profile page
        $_SESSION['user_id'] = $user_id;
        header("Location: index.php");


    }

}




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">


    <div class="row">
        <div class="col-md-5 well">
            <h4>Register</h4>
            <?php
            if ($register_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $register_error_message . '</div>';
            }
            ?>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>

                     <input type="password" name="password" class="form-control" required/>
                    <br/><label for="">Reply Password</label>

                    <input type="password" name="password1" class="form-control" required/>

                </div>
                <div class="form-group">
                    <input type="submit" name="btnRegister" class="btn btn-primary" value="Register"/>



            </form>
        </div>
        <form action="index.php" method="post">

            <div class="form-group">
                <input type="submit" name="btnLogin" class="btn btn-primary" value="Login"/>
            </div>
        </form>

    </div>
        </div>
    </div>
</div>
</body>




