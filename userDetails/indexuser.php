<?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 12.01.2018
 * Time: 19:00
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>






    <style>
        body{
            background: #DDD;
        }
        * {box-sizing: border-box}



        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .prev, .next,.text {font-size: 11px}
        }
    </style>
</head>
<body>
<?php include_once "header.php"?>
<?php include_once "footer.php"?>


</body>
</html>

