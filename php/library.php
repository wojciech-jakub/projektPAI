<?php
/**
 * Created by PhpStorm.
 * User: wojtek
 * Date: 25.11.2017
 * Time: 14:17
*/

/*
 * Tutorial: PHP Login Registration system
 *
 * Page: Application library
 * */
require "database.php";

class DemoLib
{




    /*
     * Register New User
     *
     * @param $name, $email, $username, $password
     * @return ID
     * */

    public function __construct()
    {
    }


    public function ShowUserBook($user_id)
    {
        try {
            $db = new  DB;
            $query = $db->getDbh()->prepare("select booking.status from booking
            inner join reservation on booking.id_reservation=reservation.id_reservation
            inner join users on users.user_id=reservation.user_id
            
            where users.user_id=:user_id;");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();




            if ($query->rowCount() > 0) {
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }

    public function AcceptBooking($id_booking)
    {
        try {
            $db = new DB;
            $query = $db->getDbh()->prepare("UPDATE booking
               SET status='accepted'
                where id_book=:id_booking");

            $query->bindParam("id_booking", $id_booking, PDO::PARAM_STR);
            $query->execute();
            return $db->getDbh()->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function InsertBook($id_reservation)
    {
        $status = "waiting to accept";
        try {
            $db = new DB;
            $query = $db->getDbh()->prepare("INSERT INTO booking(id_reservation,status) 
            VALUES (:id_reservation,:status)");

            $query->bindParam("id_reservation", $id_reservation, PDO::PARAM_STR);
            $query->bindParam("status",$status,PDO::PARAM_STR);
            $query->execute();
            return $db->getDbh()->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }
    public function Book($id_vehicle,$user_id,$start_date,$end_date)
    {
        try {
            $db = new DB;
            $query = $db->getDbh()->prepare("INSERT INTO reservation(id_vehicle,user_id,start_date,end_date) 
            VALUES (:id_vehicle,:user_id,:start_date,:end_date)");

            $query->bindParam("id_vehicle", $id_vehicle, PDO::PARAM_STR);
            $query->bindParam('user_id',$user_id,PDO::PARAM_STR);
            $query->bindParam('start_date',$start_date,PDO::PARAM_STR);
            $query->bindParam('end_date',$end_date,PDO::PARAM_STR);
            $query->execute();
            $this->InsertBook($db->getDbh()->lastInsertId());

            return $db->getDbh()->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function Register($name, $email, $username, $password)
    {


        try {
            $db = new DB;
            $query = $db->getDbh()->prepare("INSERT INTO users(name, email, username, password) VALUES (:name,:email,:username,:password)");
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);

            $query->execute();
            return $db->getDbh()->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check Username
     *
     * @param $username
     * @return boolean
     * */
    public function isUsername($username)
    {
        try {
            $db = new  DB;
            $query = $db->getDbh()->prepare("SELECT user_id FROM users WHERE username=:username");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Check Email
     *
     * @param $email
     * @return boolean
     * */
    public function isEmail($email)
    {
        try {
            $db = new DB;
            $query = $db->getDbh()->prepare("SELECT user_id FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * Login
     *
     * @param $username, $password
     * @return $mixed
     * */
    public function Login($username, $password)
    {
        try {
            $db =new  DB;
            $query = $db->getDbh()->prepare("SELECT user_id FROM users WHERE (username=:username OR email=:username) AND password=:password");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->user_id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /*
     * get User Details
     *
     * @param $user_id
     * @return $mixed
     * */
    public function UserDetails($user_id)
    {
        try {
            $db = new DB;
            $query = $db->getDbh()->prepare("SELECT user_id, name, username, email FROM users WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function Admin($user_id)
    {
        try {
            $db = new DB;
            $query = $db->getDbh()->prepare("SELECT id_role FROM users WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id_role;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        return null;
    }

}