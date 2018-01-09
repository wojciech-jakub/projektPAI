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

if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}




if ( !empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];




    $app = new DemoLib();
    $book = $app->Book($id);
//    $db = new DB;
//    $pdo = $db->getDbh();
//
//    // delete data
//    //$pdo = Database::connect();
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO reservation (id_vehicle) VALUES(:id) ";
//    $q = $pdo->prepare($sql);
//    $q->bindParam(':id_vehicle',$id);
//    $q->execute();





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
            <h3>Delete a Customer</h3>
        </div>

        <form class="form-horizontal" action="book.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>