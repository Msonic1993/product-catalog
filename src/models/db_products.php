<?php


namespace ComposerIncludeFiles\models;
use mysqli;
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}config{$ds}config.php");

class db_products
{
    private $productName;
    private $productDesc;
    private $productStatus;
    private $productId;

    public function __construct($productName, $productDesc, $productStatus, $productId)
    {
        $this->productName = $productName;
        $this->productDesc = $productDesc;
        $this->productStatus = $productStatus;
        $this->productId = $productId;
    }

    public function createOne()
    {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $query = "INSERT INTO product (`productName`,`description`,`status` ) VALUES (?,?,?);";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sss", $this->productName, $this->productDesc, $this->productStatus);
        $stmt->execute();
        $result = $mysqli->query($query);
        return $result;
//        if ($result->num_rows > 0) {
//            return $result; }
//        else {
//            return "0 results";
//        }
//        $mysqli->close();
    }
    public function updateOne()
    {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $query = "update product set productName=?, description=?, status=? where id=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssi", $this->productName, $this->productDesc, $this->productStatus, $this->productId);
        $stmt->execute();
        $result = $mysqli->query($query);
        return $result;

    }

    public function getAll()
    {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $sql = "SELECT p.id as id, p.productName as productName, p.description as description, p.status as status, c.categoryName as categoryName FROM product p 
                    LEFT JOIN category c on c.id = p.category_id";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        }
        $mysqli->close();
        return $result;
    }

    public function deleteOne()
    {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $query = "DELETE FROM product where id = ?;";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $this->productId);
        $stmt->execute();
        $result = $mysqli->query($query);
        $mysqli->close();
        if ($result) {
            $mysqli->close();

        } else {
            echo "Error deleting record";
        }
    return $result;
    }
}
