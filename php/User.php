


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/styleindex.css">
</head>
<body>

<div class="container">
    <div class="row">
        <h2>
            RENTAL CAR
        </h2>

    </div>
    <div class = "info">
        <button class="tablink" onclick="openPage('Home', this, '#755')">Home</button>
        <button class="tablink" onclick="openPage('News', this, '#755')" id="defaultOpen">News</button>
        <button class="tablink" onclick="openPage('Contact', this, '#755')">Contact</button>
        <button class="tablink" onclick="openPage('About', this, '#755')">About</button>

        <div id="Home" class="tabcontent">
            <h3>USERS</h3>
            <p>
            <div class="uzytkownik">


                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Username</th>
                        <th>Action</th>
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
                        echo '<td><a class="btn" href="book.php?id='.$row['id_vehicle'].'">Book</a></td>';
                        echo '<td><a class="btn btn-danger" href="delete.php?id='.$row['id_vehicle'].'">Delete</a></td>';
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
            <h3>News</h3>
            <p>
            <div class="uzytkownik">
                </table>

            </div>
            </p>
        </div>

        <div id="Contact" class="tabcontent">
            <h3>Contact</h3>
            <p>Get in touch, or swing by for a cup of coffee.</p>
        </div>

        <div id="About" class="tabcontent">
            <h3>About</h3>
            <p>
            <div class="container">
                <div class="well">
                    <h2>
                        Profile
                    </h2>
                    <h3>Hello <?php echo $user->name ?>,</h3>

                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
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




</body>
</html>

