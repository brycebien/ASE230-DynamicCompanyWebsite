<?php
require_once('pages.php');

if(isset($_POST['name'])){
    delete_page($_POST);
    echo $_POST['name'].' has been deleted<br>'
    ?><a href="index.php">Back to index</a><?php
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
    <h1>Delete Page Entry</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2 style="margin-bottom:0px">Are you sure you want to delete page entry <?= $pageName ?> this can't be undone</h2><br>

    <form method="POST" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <input type="hidden" name="name" value="<?=$pageName?>"><br>
        <button type="submit">Delete Page</button><br>
    </form>