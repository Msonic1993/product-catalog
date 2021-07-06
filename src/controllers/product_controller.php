<?php


namespace ComposerIncludeFiles\controllers;
use mysqli;

require_once "config.php";

     function dbgetvar(){
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $sql = "SELECT * FROM product ";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                return $result;
                }
            } else {
                return "0 results";
            }
            $mysqli->close();


        }



