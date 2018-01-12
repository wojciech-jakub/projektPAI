


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="../resources/profile.css">




</head>
<body>

<div class="container">
    <div class="row">
        <h2>
            RENTAL CAR

        </h2>


        <div class="log">
            <form action="logout.php" method="post">
                <div class="form-group">
                    <input type="submit" name="btnRegister1" class="btn btn-primary" value="logout"/>
                </div>



            </form>
        </div>


    </div>
    <div class = "info">
        <button class="tablink" onclick="openPage('Home', this, '#755')">Home</button>
        <button class="tablink" onclick="openPage('News', this, '#755')" id="defaultOpen">News</button>
        <button class="tablink" onclick="openPage('Contact', this, '#755')">Contact</button>
        <button class="tablink" onclick="openPage('About', this, '#755')">About</button>

        <div id="Home" class="tabcontent">
            <h3>Samochody</h3>
            <p>
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
                    require_once "database.php";
                    $db = new DB;
                    $pdo = $db->getDbh();
                    // $pdo = Database::connect();
                    $sql = 'SELECT * FROM vehicle ORDER BY id_vehicle DESC';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['producent'] . '</td>';
                        echo '<td>'. $row['model'] . '</td>';
                        echo '<td>'. $row['rok'] . '</td>';
                        echo '<td><a class="button" href="book.php?id='.$row['id_vehicle'].'">Book</a></td>';
                        echo '</td>';
                        echo '</tr>';

                    }
                    // Database::disconnect();
                    ?>
                    </tbody>
                </table>

            </div>
            </p>
        </div>

        <div id="News" class="tabcontent">
            <h3>Rezerwacje</h3>
            <p>
            <div class="uzytkownik">



                    <?php


                    // check user login
                    if(empty($_SESSION['user_id']))
                    {
                        header("Location: index.php");
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

        <div id="Contact" class="tabcontent">
            <h3>Contact</h3>

        </div>

        <div id="About" class="tabcontent">
            <h3>About</h3>
            <p>

            </p>
        </div>

        <script>
            function openPage(pageName,elmnt,color) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }
                document.getElementById(pageName).style.display = "block";
                elmnt.style.backgroundColor = color;

            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
    </div>
</div>



</body>
</html>

