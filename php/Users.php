


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../resources/users.css">

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
                    $sql = 'SELECT * FROM users ORDER BY user_id DESC';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['name'] . '</td>';
                        echo '<td>'. $row['email'] . '</td>';
                        echo '<td>'. $row['username'] . '</td>';
                        echo '<td><a class="btn" href="read.php?id='.$row['user_id'].'">Read</a></td>';
                        echo '<td><a class="btn btn-danger" href="delete.php?id='.$row['user_id'].'">Delete</a></td>';
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


                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>id_resrevation</th>
                        <th>name</th>
                        <th>start date</th>
                        <th>end date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once "database.php";
                    $db = new DB;
                    $pdo = $db->getDbh();
                    // $pdo = Database::connect();
                    $sql = 'select booking.id_book , reservation.start_date, reservation.end_date, users.name, booking.status
                        from reservation
                        inner join users on reservation.user_id=users.user_id
                        inner join booking on reservation.id_reservation = booking.id_reservation ';

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>'. $row['id_book'] . '</td>';
                        echo '<td>'. $row['name'] . '</td>';
                        echo '<td>'. $row['start_date'] . '</td>';
                        echo '<td>'. $row['start_date'] . '</td>';
                        echo '<td>'. $row['status'] . '</td>';

                        echo '<td><a class="btn btn-danger" href="accept.php?id='.$row['id_book'].'">accept</a></td>';




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

        <div id="Contact" class="tabcontent">
            <h3>Contact</h3>
            <p>Get in touch, or swing by for a cup of coffee.</p>
        </div>

        <div id="About" class="tabcontent">
            <h3>About</h3>
            <p>

                    <h2>
                        Profile
                    </h2>
                    <h3>Hello <?php echo $user->name ?>,</h3>

                    <a href="logout.php" class="btn btn-primary">Logout</a>
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

