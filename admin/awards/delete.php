<?php
require_once('./awards.php');
$index=$_GET['index'];
$awardsManager=new AwardsManager();

if (isset($_POST['index'])){
    $awardsManager->delete($_POST['index']);
    return;
}

?>

<head>
    <title>Delete award entry <?= $index + 1 ?></title>
</head>

<body>
    <h1>Manage Awards Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2 style="margin-bottom:0px">Are you sure you want to delete award entry <?= $index ?>?</h2><br>
    <p>This cannot be undone</p>
    <form method="POST">
        <input type="hidden" name="index" value="<?= $index ?>">
        <button>Delete entry</button>
    </form>
</body>