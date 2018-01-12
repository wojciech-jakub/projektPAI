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
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];



    echo $_SESSION['user_id'];
    $user_id = $_SESSION['user_id'];


//    $end_date="2018-01-01";
//    $start_date="2018-02-03";
    $app = new DemoLib();
    $book = $app->Book($id,$user_id,$start_date,$end_date);


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
<?php include_once "../userDetails/header.php"?>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Boook a car</h3>
        </div>

        <form class="form-horizontal" action="book.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <p class="alert alert-error">Are you sure to book ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="index.php">No</a>
            </div>

          Start date
            <input type="date" name="start_date"  max="2118-1-1" required><br>
           End_date
            <input type="date" name="end_date" min="2018-01-01" required><br>
        </form>
    </div>

</div> <!-- /container -->
<?php include_once "../userDetails/footer.php"?>

</body>
</html>