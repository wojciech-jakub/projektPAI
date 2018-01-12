<?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 20.12.2017
 * Time: 22:29
 */

//require_once 'database.php';
require_once __DIR__ . '/library.php';
$id = 0;


session_start();

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}


if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}




if ( !empty($_POST)) {

    // keep track post values
    $id = $_POST['id'];


    $app = new DemoLib();
    $book = $app->AcceptBooking($id);







    //    Database::disconnect();
    header("Location: index.php");

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Boook a car</h3>
        </div>

        <form class="form-horizontal" action="accept.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <p class="alert alert-error">Are you sure to book ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>


        </form>
    </div>

</div> <!-- /container -->
</body>
</html>