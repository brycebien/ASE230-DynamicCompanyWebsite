<?php
require_once('./products.php');
$productManager=new ProductManager;
$products=$productManager->getProductList();
$index=count($products);

if (isset($_POST['index'])){
    $productManager->createProduct($_POST);
    return;
}
?>

<head>
    <title>Creating new product entry</title>
</head>

<body>
    <h1>Manage Product Enteries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Create new product</h2>
    <p>New product ID: <b><?=$index?></b></p>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="name">Name:</label> <br>
        <input type="text" name="name"> <br>
        <label for="description">Description:</label> <br>
        <textarea type="text" name="description" style="width:512px;height:128px"></textarea><br><br>
        <label>Applications:</label> <br>
        <?php
        for($i=0;$i<3;$i++){
        ?>
            <label for="application<?=$i?>">Application <?=$i?>:</label> <br>
            <textarea type="text" name="application<?=$i?>" style="width:512px;height:128px"></textarea><br>
        <?php
        } ?>
        <br><br>
        <input type="hidden" name="index" value="<?= $index ?>">
        <button type="submit">Save changes</button>
    </form>
</body>