<?php
require_once('./awards.php');
// get index variable from either GET on first load or POST after submission (to avoid null errors)
(count($_GET) >= 1)?$index=$_GET['index']:$index=$_POST['index'];
$awards=get_awards();

if (isset($_POST['index'])){
    echo edit_award($_POST);
    return;
}

?>

<head>
    <title>Editing award entry <?= $index ?></title>
</head>

<body>
    <h1>Manage Awards Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Editing award entry <?= $index ?></h2><br>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="year">Year:</label> <br>
        <input type="text" name="year" value="<?= $awards[$index]['year'] ?>"> <br>
        <label for="award">Description:</label> <br>
        <textarea type="text" name="award" style="width:512px;height:128px"><?= $awards[$index]['award'] ?></textarea> <br><br>
        <input type="hidden" name="index" value="<?= $index ?>">
        <button type="submit">Save changes</button>
    </form> <hr>
    <form method="GET" action="delete.php?index=<?=$index?>">
        <input type="hidden" name="index" value="<?= $index ?>">
        <button>Delete entry</button>
    </form>
</body>