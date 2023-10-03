<?php
require_once('./products.php');
$index=$_GET['index'];
$products=get_products();
?>

<head>
    <title>Viewing product entry <?= $index ?></title>
</head>

<body>
    <h1>Manage Product Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Viewing product entry <?= $index ?></h2>
    <table border="1" cellpadding="5" cellspacing="2">
        <td><a href="edit.php?index=<?=$index?>">Edit</a></td>
        <td><a href="delete.php?index=<?=$index?>">Delete</a></td>
    </table>
    <hr>
    <table border="1" cellpadding="5" cellspacing="2">
        <tr>
            <td><b>ID:</b></td>
            <td><b>Name:</b></td>
            <td><b>Description:</b></td>
        </tr>
        <tr>
            <td><?= $index ?></td>
            <td><?= $products[$index]['name'] ?></td>
            <td><?= $products[$index]['description'] ?></td>
        </tr>
    </table>
</body>