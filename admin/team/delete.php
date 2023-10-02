<?php
require_once('./team.php');
$index=$_GET['index'];
$team=get_team();

if (isset($_POST['index'])){
    echo delete_team_entry($team[$index]);
    return;
}

?>

<head>
    <title>Delete team entry <?= $index + 1 ?></title>
</head>

<body>
    <h1>Manage Team Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2 style="margin-bottom:0px">Are you sure you want to delete team entry <?= $index ?>?</h2><br>
    <p>This cannot be undone</p>
    <form method="POST">
        <input type="hidden" name="index" value="<?= $index ?>">
        <button>Delete entry</button>
    </form>
</body>