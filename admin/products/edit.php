<?php
require_once('./products.php');
// get index variable from either GET on first load or POST after submission (to avoid null errors)
(count($_GET) >= 1)?$index=$_GET['index']:$index=$_POST['index'];
$prodcuts=get_products();

if (isset($_POST['index'])){
    edit_product($_POST);
    echo '<pre>';
    print_r($_POST);
    return;
}

?>

<head>
    <title>Editing products entry <?= $index ?></title>
</head>

<body>
    <h1>Manage Product Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Editing product entry <?= $index ?></h2><br>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="name">Name:</label> <br>
        <input type="text" name="name" value="<?= $prodcuts[$index]['name'] ?>"> <br>
        <label for="description">Description:</label> <br>
        <textarea type="text" name="description" style="width:512px;height:128px"><?= $prodcuts[$index]['description'] ?></textarea><br><br>
        <label>Applications:</label> <br>
        <?php
        for($i=0;$i<count($prodcuts[$index]['applications']);$i++){
        ?>
            <label for="application<?=$i?>">Application <?=$i?>:</label> <br>
            <textarea type="text" name="application<?=$i?>" style="width:512px;height:128px"><?=$prodcuts[$index]['applications'][$i]?></textarea><br>
        <?php
        } ?>
        <br><br>
        <input type="hidden" name="index" value="<?= $index ?>">
        <button type="submit">Save changes</button>
    </form> <hr>
    <form method="GET" action="delete.php?index=<?=$index?>">
        <input type="hidden" name="index" value="<?= $index ?>">
        <button>Delete entry</button>
    </form>
</body>