<?php
require_once('./awards.php');
$index=$_GET['index'];
$awards=get_awards();
?>

<head>
    <title>Viewing award entry <?= $index + 1 ?></title>
</head>

<body>
    <h1>Manage Awards Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Viewing award entry <?= $index + 1 ?></h2>
    <table border="1" cellpadding="5" cellspacing="2">
        <td><a href="edit.php?index=<?=$index?>">Edit</a></td>
        <td><a href="delete.php?index=<?=$index?>">Delete</a></td>
    </table>
    <hr>
    <table border="1" cellpadding="5" cellspacing="2">
        <tr>
            <td><b>Year:</b></td>
            <td><b>Content:</b></td>
        </tr>
        <tr>
            <td><?= $awards[$index]['year'] ?></td>
            <td><?= $awards[$index]['award'] ?></td>
        </tr>
    </table>
</body>