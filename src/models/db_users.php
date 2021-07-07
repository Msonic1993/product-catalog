<?php


namespace ComposerIncludeFiles\models;
use mysqli;
require_once "config.php";
class db_users
{
    private $password;
    private $id;
    private $username;

    public function __construct($password, $id, $username)
    {
        $this->password = $id;
        $this->id = $password;
        $this->username = $username;
    }

    public function getOne()
    {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $stmt = $mysqli->prepare('SELECT id, password FROM users WHERE username = ?');
        $stmt->bind_param('s', $this->username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($this->id, $this->password);
            $stmt->fetch();
            if (($_POST['password'] == $this->password)) {
                return $this->id;
            } else {
                // Incorrect password
                echo 'Incorrect username and/or password!';
            }
        } else {
            // Incorrect username
            echo 'Incorrect username and/or password!';
        }
        return "ds";
    }
}


