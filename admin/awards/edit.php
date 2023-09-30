<?php
require_once('./awards.php');
$index=$_GET['index'];
$awards=get_awards();

edit_award($awards[$index]);
?>

<head>
    <title>Editing award entry <?= $index + 1 ?></title>
</head>

<body>
    <h1>Manage Awards Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h1>Editing award entry <?= $index + 1 ?></h1>
</body>