<?php 
	require 'db.php';
?>
 <link href="folders/style/style.css" rel="stylesheet">
<?php if ( isset ($_SESSION['logged_user']) ) : ?>
<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
    <table>
        <tr>
            <!-- <th>ID</th> -->
            <th>Title</th>
            <!-- <th>Description</th> -->
            <!-- <th>Price</th> -->
        </tr>

        <?php

            /*
             * Делаем выборку всех строк из таблицы "products"
             */

            $products = mysqli_query($connect, "SELECT * FROM `products`");

            /*
             * Преобразовываем полученные данные в нормальный массив
             */

            $products = mysqli_fetch_all($products);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             * Ключ 0 - id
             * Ключ 1 - title
             * Ключ 2 - price
             * Ключ 3 - description
             */

            foreach ($products as $product) {
                ?>
                    <tr>
                        <!-- <td><?= $product[0] ?></td> -->
                        <td><?= $product[1] ?></td>
                     
                        <td><a href="product.php?id=<?= $product[0] ?>">View</a></td>
                        <td><a href="update.php?id=<?= $product[0] ?>">Update</a></td>
                        <td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>">Delete</a></td>
                    </tr>
                <?php
            }
        ?>
    </table>
        <a href="/admin/newfile.php">добавить файл</a>
        <a href="/admin/">Главная</a>
</body>
</html>
<?php else : ?>
Вы не авторизованы<br/>
<a href="/login.php">Авторизация</a>
<?php endif; ?>

