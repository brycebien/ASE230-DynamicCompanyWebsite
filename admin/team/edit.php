<?php
require_once('./team.php');
// get index variable from either GET on first load or POST after submission (to avoid null errors)
(count($_GET) >= 1)?$index=$_GET['index']:$index=$_POST['index'];
$team=get_team();

if (isset($_POST['index'])){
    echo edit_team_entry($_POST);
    return;
}

?>

<head>
    <title>Editing team entry <?= $index ?></title>
</head>

<body>
    <h1>Manage Team Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Editing team entry <?= $index ?></h2><br>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="name">Name:</label> <br>
        <input type="text" name="name" value="<?= $team[$index]['name'] ?>"> <br>
        <label for="title">Title:</label> <br>
        <input type="text" name="title" value="<?= $team[$index]['title'] ?>"> <br>
        <label for="description">Description:</label> <br>
        <textarea type="text" name="description" style="width:512px;height:128px"><?= $team[$index]['description'] ?></textarea> <br><br>
        <input type="hidden" name="index" value="<?= $index ?>">
        <button type="submit">Save changes</button>
    </form> <hr>
    <form method="GET" action="delete.php?index=<?=$index?>">
        <input type="hidden" name="index" value="<?= $index ?>">
        <button>Delete entry</button>
    </form>
</body>