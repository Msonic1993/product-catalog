<?php


namespace ComposerIncludeFiles\controllers;
use ComposerIncludeFiles\models\db_products;
include 'models\db_products.php';
require_once 'config\config.php';

function productGet(){
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $items = new db_products(Null,Null,Null,Null);
        $result = $items->getAll();

    }
    return $result;
}
function productPost(){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['deleteItem'])) {
            $productId = $_POST['deleteItem'];
            $items = new db_products(Null, Null, Null, $productId,);
            $items->deleteOne();
            header('Location: ' . 'products.php');
        } elseif (isset($_POST['productName'])) {
            $productName = $_POST['productName'];
            $productDesc = $_POST['productDesc'];
            $productStatus = $_POST['productStatus'];
            if ($productName == "") {
                echo "Wprowadzono pustą wartość w polu Nazwa produktu";
            } else {
                $items = new db_products($productName, $productDesc, $productStatus, Null);
                $items->createOne();
                header('Location: ' . 'products.php');
            }
        }
    }
}

function productEdit(){
    $id = $_GET['id'];
    print $id;
    if (isset($_POST['update'])) {
            $productName = $_POST['productName1'];
            $productDesc = $_POST['productDesc1'];
            $productStatus = $_POST['productStatus1'];
            if ($productName == "") {
                echo "Wprowadzono pustą wartość w polu Nazwa produktdddu";
            } else {
                $items = new db_products($productName, $productDesc, $productStatus, $id);
                $items->updateOne();
                header('Location: ' . 'products.php');
            }
        }
}
