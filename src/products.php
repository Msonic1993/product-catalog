
<?php include 'templates\header.php';?>
<?php

use function ComposerIncludeFiles\controllers\dbgetvar;
use function ComposerIncludeFiles\controllers\dbpostvar;
include 'C:\Users\wdziwoki\PhpstormProjects\product-catalog\src\controllers\product_controller.php';

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
            dbpostvar();
        }?>
    </form>

</div>
<br>
<h3>Tabela produktów</h3>
<table class="table table-striped">
    <tr>
        <th>Nazwa produktu</th>
        <th>Opis</th>
        <th>Status</th>
        <th>Kategoria</th>
    </tr>
    <?php  foreach(dbgetvar() as $row): ?>
    <tr>
        <td><?=$row['productName'];?></td>
        <td><?=$row['description'];?></td>
        <td><?=$row['status'];?></td>
        <td><?=$row['categoryName'];?></td>

    </tr>
        <?php endforeach;?>
</table>
<?php include 'templates\footer.php';?>
</body>
</html>
