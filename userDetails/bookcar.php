


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>




</head>
<body>

<?php include_once "header.php"?>

</div>

    <div id="Home" class="tabcontent">
        <h3>Samochody</h3>

        <div class="uzytkownik">


            <table class="samochod" >

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

