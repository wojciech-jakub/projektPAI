<?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 25.11.2017
 * Time: 14:11
 */

/**
 * iTech Empires Tutorial Script : PHP Login Registration system with PDO Connection
 *
 * File: Database Configuration
 */

// database Connection variables
/**
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'root'); // Database user. ex. root ( if your on local server)
define('PASSWORD', ''); // user password  (if password is not set for user then keep it empty )
define('DATABASE', 'pai'); // Database Database name

function DB()
{

    try {
        $db = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . '', USER, PASSWORD);
        return $db;}
    catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
 **/
class DB
{
    private $host ='localhost';
    private $user = 'root';
    private $pass = '';
    private $dbaname ='pai';
    private $dbh;

  //  private $error;
  //  private static $instance;


//    public static function getInstance(){
//        if(!self::$instance){
//            self::$instance = new self();
//        }
//        return self::$instance;
//    }

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbaname . '';

        $options = array(
        PDO::ATTR_PERSISTENT   => true,
        PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($dsn, $this->user,$this->pass, $options);
        }
        catch (PDOException $e) {
            return "Error!: " . $e->getMessage();
            die();
        }
    }

    /**
     * @return PDO
     */
    public function getDbh()
    {
        return $this->dbh;
    }

    /**
     * @param PDO $dbh
     */
    public function setDbh($dbh)
    {
        $this->dbh = $dbh;
    }



}
?>

