<?php
//require 'database.php';

function cars()
{
    try {

        $conn = new DB;

        //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->getDbh()->prepare("SELECT * FROM vehicle");
        $stmt->execute();

        //$rola =     $stmt =  $conn->getDbh()->prepare("SELECT id_role FROM users");
        // set the resulting array to associative
        // $rola -> execute();

        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //  $wynik = $rola->setFetchMode(PDO::FETCH_ASSOC);
        //  echo('<pre>');
//   foreach(new TableRows(new RecursiveArrayIterator($result)) as $user1) {
//        // echo $v;
//        //if($k='id_role')
//     //   echo array_column($k,5);
//       // echo $v;
//       echo $user1;
//     //   var_dump($user1);
//      //  echo($stmt->fetchColumn(5));
//        //  var_ump($wynik);
//    }
        echo('<pre>');
        foreach ($result as $vehic2) {
            //echo $user1;
            // var_dump($user1);
            //  print_r($user1['id_role']);
            //  print_r($user1);
          //  echo '<tr>';
            // echo '<td>' . $user2['user_id'] . '</td>';

            echo '<td> &nbsp;' . $vehic2['producent'] . '</td>'  ;
            echo '<td> &nbsp;' . $vehic2['model'] . '</td>';
            echo '<td> &nbsp;' . $vehic2['rok'] . '</td>';


            echo '</tr>';
            echo '<br>';


//        if($user2['id_role']==0)
//        {
//            //      echo '<tr>';
////            echo '<td>' . $user2['user_id'] . '</td>';
////            echo '<td>' . $user2['name'] . '</td>';
////            echo '<td>' . $user2['email'] ;
//            echo '</tr>';
//            echo('<form action="/action_page.php">
//            <input type="checkbox"  name="admin" value="admin"> admin
//            </form>');
//        }
//
//        else{
////            echo '<tr>';
////            echo '<td>' . $user2['user_id'] . '</td>';
////            echo '<td>' . $user2['name'] . '</td>';
////            echo '<td>' . $user2['email'] . '</td>';
//            //echo '</tr>';
//            echo('<form action="/action_page.php">
//            <input type="checkbox"  name="admin" value="admin"
//            checked> admin
//            </form>');
//
//        }

            //foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
            //    echo (['id_role']);
            //  var_dump($wynik);////
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
echo "</table>";
?>
<!DOCTYPE html>
<html>
<body>

<div style="height:220px;width:500px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
<?php cars() ;
            ?>
</div>



</body>
</html>