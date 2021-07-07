<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include 'header.php';
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}src{$ds}config{$ds}config.php");
use function ComposerIncludeFiles\controllers\productEdit;
include 'controllers\product_controller.php';
?>

<div class="edit_product">
    <h3>Edytujesz produkt </h3>
    <form method="POST">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nazwa produktu" name="productName1">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Opis"  name="productDesc1">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Status"  name="productStatus1">
            </div>
            <br>

        </div>
        <div class="col-auto">
            <br>
            <input class="btn btn-primary mb-2" type="submit" name="update" value="Update">
        </div>
        <?php
        if(isset($_POST['productName1'])){
            productEdit();
        }?>
    </form>

</div>

<?php include 'footer.php';?>
