<?php

// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH . DS . 'database.php');

class User extends DatabaseObject {

    protected static $table_name = "users";
    protected static $db_fields = array('id', 'username', 'password', 'firstname', 'lastname', 'role');
    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $role;

    public function full_name() {
        if (isset($this->firstname) && isset($this->lastname)) {
            return $this->firstname . " " . $this->lastname;
        } else {
            return "";
        }
    }

    public static function authenticate($username = "", $password = "") {
        global $database;
        $username = $database->escape_value($username);
        $password = md5($database->escape_value($password));

        $sql = "SELECT * FROM users ";
        $sql .= "WHERE username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }
}
?>