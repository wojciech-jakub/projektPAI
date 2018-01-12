<?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 12.01.2018
 * Time: 19:43
 */
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>





</head>
<body>

<?php include_once "header.php"?>
<div class="container">
    <div class="row">


        <div id="News" class="tabcontent">
            <h3>Rezerwacje</h3>
            <p>
            <div class="uzytkownik">



                <?php
                session_start();
                include_once "../php/library.php";


                // check user login
                if(empty($_SESSION['user_id']))
                {
                    header("Location: index.php");
                }


                // check user login
                if(empty($_SESSION['user_id']))
                {
                    header("Location: ../php/index.php");
                }
                $app = new DemoLib();
                $book = $app->ShowUserBook($_SESSION['user_id']);
                //  echo (json_encode($book));
                $help= json_encode($book);
                foreach ($book as $key => $value)
                {
                    echo $value->status .  "<br>";
                }


                ?>




            </div>
            </p>


        </div>




    </div>
</div>

<?php include_once "footer.php"?>




</body>
</html>


