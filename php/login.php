<?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 25.11.2017
 * Time: 23:29
 */
session_start();

// Application library ( with DemoLib class )
require __DIR__ . '/library.php';
$app = new DemoLib();

$login_error_message = '';
$register_error_message = '';

if (!empty($_POST['btnLogin'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == "") {
        $login_error_message = 'Username field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $user_id = $app->Login($username, $password); // check user login
        if($user_id > 0)
        {
            $_SESSION['user_id'] = $user_id; // Set Session
            header("Location: profile.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Invalid login details!';
        }

    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="../resources/style.css">

</head>
<body>

<center>
   <h4>Login</h4>

    <form action="login.php" method="post">
        <div class="form-group">
            <label for="">Username/Email</label>
            <input type="text" name="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" name="btnLogin" class="btn btn-primary" value="Login"/>
        </div>
    </form>
</center>
<body/>