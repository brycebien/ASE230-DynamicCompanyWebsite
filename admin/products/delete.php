<?php
require_once('./products.php');
$index=$_GET['index'];
$products=get_products();

if (isset($_POST['index'])){
    delete_product($_POST);
    echo '<pre>';
    print_r($_POST);
    return;
}

?>

<head>
    <title>Delete product entry <?= $index + 1 ?></title>
</head>

<body>
    <h1>Manage Product Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2 style="margin-bottom:0px">Are you sure you want to delete product entry <?= $index ?>?</h2><br>
    <p>This cannot be undone</p>
    <form method="POST">
        <input type="hidden" name="index" value="<?= $index ?>">
        <button>Delete entry</button>
    </form>
</body>