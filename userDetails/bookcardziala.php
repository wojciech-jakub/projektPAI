

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>

        body{
            font-family: 'Lato', sans-serif;
        }


        table {
            color: #333; /* Lighten up font color */
            width: 640px;
            border-collapse:
                    collapse; border-spacing: 0;
        }

        td, th { border: 1px solid #CCC; height: 30px; } /* Make cells a bit taller */

        th {
            background: #717171; /* Light grey background */
            font-weight: bold; /* Make sure they're bold */

        }

        td {
            background: #FAFAFA; /* Lighter grey background */
            text-align: center; /* Center our text */
        }

        tr:nth-child(even) td { background: #F1F1F1; }

        /* Cells in odd rows (1,3,5...) are another (excludes header cells)  */
        tr:nth-child(odd) td { background: #FEFEFE; }

        tr td :hover { background: #666; color: #FFF; }


        .uzytkownik{
            height: 560px;
            overflow-y: scroll;

        }
        .button{
            display: block;
            width: 75px;
            margin-left: 20%;
            height: 25px;
            background: #4E9CAF;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>




</head>
<body>

<?php include_once "header.php"?>

</div>

<div id="Home" class="tabcontent">
    <h3>Samochody</h3>


    <div class="uzytkownik">


        <table class="samochod" >
            <thead>
            <tr>
                <th>Prducent</th>
                <th>Model</th>
                <th>Rok</th>
                <th>Akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once "../php/database.php";
            $db = new DB;
            $pdo = $db->getDbh();
            // $pdo = Database::connect();
            $sql = 'SELECT * FROM vehicle ORDER BY id_vehicle DESC';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['producent'] . '</td>';
                echo '<td>'. $row['model'] . '</td>';
                echo '<td>'. $row['rok'] . '</td>';
                echo '<td><a class="button" href="../php/book.php?id='.$row['id_vehicle'].'">Book</a></td>';
                echo '</td>';
                echo '</tr>';

            }
            // Database::disconnect();
            ?>
            </tbody>
        </table>

    </div>

</div>



</div>


<?php include_once "footer.php"?>




</body>
</html>


