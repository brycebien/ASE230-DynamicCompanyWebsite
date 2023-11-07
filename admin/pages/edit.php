<?php
require_once('pages.php');

if(isset($_POST['name'])){
    edit_page($_POST);
    echo $_POST['name'].' has been edited<br>';
    ?><a href="../../pages/<?=$_POST['name']?>">Go to edited page</a><br>
    <a href="index.php">Back to Index</a><?php
    return;
}else{
    (count($_GET)>=1)?$index=$_GET['index']:$index=$_POST['index'];
    $page=get_pages();
    $pageName=$page[$index];
    $pageContent=file_get_contents('../../pages/'.$pageName);
}
?>
<head>
    <title>Editing pages entry <?= $pageName ?></title>
</head>

<body>
    <h1>Manage Page Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Editing page entry <?= $pageName ?></h2><br>

    <form method="POST" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <input type="hidden" name="name" value="<?=$pageName?>"><br>
        <label for="code">Page Code:</label><br>
        <textarea name="code" style="width:512px;height:128px"><?=$pageContent?></textarea><br><br>
        <button type="submit">Submit Edited Page</button>
    </form>