<?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 25.11.2017
 * Time: 14:52

 * <?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */

// Start Session
session_start();

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}

// Database connection



// Application library ( with DemoLib class )
require_once __DIR__ . '/library.php';


$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
$type = $app->Admin($_SESSION['user_id']);
//echo(['id_role']);
//echo(var_dump($type));




if($type == 1) {
    require_once  'Users.php';


}
else
{
    include_once "User.php";

}
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

</head>
<body>
<form action="logout.php" method="post">
    <div class="form-group">
        <input type="submit" name="btnRegister1" class="btn btn-primary" value="logout"/>
    </div>
    <?php
    echo ['user_id'];
    ?>


</form>


</body>
</html>