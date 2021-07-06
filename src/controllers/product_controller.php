<?php


namespace ComposerIncludeFiles\controllers;
use ComposerIncludeFiles\models\db_products;
use mysqli;
include 'C:\Users\wdziwoki\PhpstormProjects\product-catalog\src\models\db_products.php';
require_once "config.php";

function dbgetvar(){
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $p = new db_products(0,0,0);
        $result = $p->getAll();

    }
    return $result;
}
function dbpostvar(){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $productName = $_POST['productName'];
        $productDesc = $_POST['productDesc'];
        $productStatus = $_POST['productStatus'];
        $p = new db_products($productName,$productDesc,$productStatus);
        $p->createAll();
        header('Location: ' . 'products.php');
        }


}


