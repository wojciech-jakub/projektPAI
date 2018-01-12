?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 12.01.2018
 * Time: 18:22
 */
?>

<?php


// Start Session
session_start();

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}

// Database connection



// Application library ( with DemoLib class )
require_once __DIR__ . '../backend/library.php';

$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
$type = $app->Admin($_SESSION['user_id']);
//echo(['id_role']);
//echo(var_dump($type));




if($type == 1) {
    require_once  '../admin/getinfo.php';


}
else
{
    include_once "usersinfo.php";

}
?>
