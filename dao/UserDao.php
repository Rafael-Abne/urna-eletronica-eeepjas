<?php
require_once ('../connection/db.php');

class UserDao extends DB
{
    private static $instance;

    protected $table = "users";

    public static function getInstance() {

        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        //
    }

    public function login($user){
        try {
            $sql = "SELECT * FROM $this->table WHERE user = ?";
            $stmt = DB::prepare($sql);
            $stmt->bindValue(1, $user['user']);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result['password'] == $user['password']){
                return true;
            }
            return false;

        } catch (Exception $ex) {
            $ex->getMessage();
            return false;
        }
    }

   
}



