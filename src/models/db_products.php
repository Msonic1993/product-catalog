<?php


namespace ComposerIncludeFiles\models;
use mysqli;
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}config{$ds}config.php");

class db_products {
    private $productName;
    private $productDesc;
    private $productStatus;

    public function __construct($productName,$productDesc,$productStatus) {
        $this->productName = $productName;
        $this->productDesc = $productDesc;
        $this->productStatus = $productStatus;
    }
    public function createAll() {
        print('$message');
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $query = "INSERT INTO product (`productName`,`description`,`status` ) VALUES (?,?,?);";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sss", $this->productName,$this->productDesc,$this->productStatus);
        $stmt->execute();
        $result = $mysqli->query($query);
        return print $result;
//        if ($result->num_rows > 0) {
//            return $result; }
//        else {
//            return "0 results";
//        }
//        $mysqli->close();
    }
    public function getAll() {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $sql = "SELECT p.productName as productName, p.description as description, p.status as status, c.categoryName as categoryName FROM product p 
                    LEFT JOIN category c on c.id = p.category_id";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            }
        } else {
            return "0 results";
        }
        $mysqli->close();
        return $result;
    }
}
