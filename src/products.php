
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
<?php

use function ComposerIncludeFiles\controllers\dbgetvar;
include 'controllers\product_controller.php';

?>
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
        <td><?=$row['category_id'];?></td>

    </tr>
        <?php endforeach;?>
</table>
</body>
</html>
