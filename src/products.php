<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}src{$ds}config{$ds}config.php");

use function ComposerIncludeFiles\controllers\productGet;
use function ComposerIncludeFiles\controllers\productPost;
include 'header.php';
include 'controllers\product_controller.php';
?>
<br>

<div class="add_new_product">
    <h3>Dodaj nowy produkt</h3>
    <form method="POST" action="products.php">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nazwa produktu" name="productName">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Opis"  name="productDesc">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Status"  name="productStatus">
            </div>
            <br>

        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Zapisz</button>
        </div>
        <?php
        if(isset($_POST['productName'])){
            productPost();
        }?>
    </form>

</div>
<br>
<h3>Tabela produktów</h3>


<table class="table table-striped">
    <form method="POST" action=""
    <tr>
        <th>ID produktu</th>
        <th>Nazwa produktu</th>
        <th>Opis</th>
        <th>Status</th>
        <th>Kategoria</th>
        <th>Edytuj</th>
        <th>Usuń</th>
    </tr>

    <?php  foreach(productGet() as $row): ?>
    <tr>
        <td><?=$row['id'];?></td>
        <td><?=$row['productName'];?></td>
        <td><?=$row['description'];?></td>
        <td><?=$row['status'];?></td>
        <td><?=$row['categoryName'];?></td>
        <td><a href="editproduct.php?id=<?php echo $row['id']; ?>">Edytuj</a></td>
        <td><button type="submit" name="deleteItem" value="<?php echo $row['id']; ?>" class="btn btn-danger">Usuń</button></td>

    </tr>
        <?php endforeach;?>
    <?php
    if(isset($_POST['deleteItem'])){
        productPost();
    }?>
</table>

</form>


<?php include 'footer.php';?>
</body>
</html>
