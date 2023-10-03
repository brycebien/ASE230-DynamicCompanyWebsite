<?php
require_once('./team.php');
$team=get_team();
$index=count($team);

if (isset($_POST['index'])){
    echo create_team_entry($_POST);
    return;
}
?>

<head>
    <title>Creating new team entry</title>
</head>

<body>
    <h1>Manage Team Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Create new award</h2>
    <p>New entry ID: <b><?= $index ?></b></p>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="name">Name:</label> <br>
        <input type="text" name="name"> <br>
        <label for="title">Title:</label> <br>
        <input type="text" name="title"> <br>
        <label for="description">Description:</label> <br>
        <textarea type="text" name="description" style="width:512px;height:128px"></textarea> <br><br>
        <input type="hidden" name="index" value="<?= $index ?>">
        <button type="submit">Create new entry</button>
    </form>
</body>