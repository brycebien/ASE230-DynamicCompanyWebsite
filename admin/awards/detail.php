<?php
require_once('./awards.php');
$index=$_GET['index'];
$awardsManager = new AwardsManager();
$awards=$awardsManager->getAwards();
?>

<head>
    <title>Viewing award entry <?= $index ?></title>
</head>

<body>
    <h1>Manage Awards Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Viewing award entry <?= $index ?></h2>
    <table border="1" cellpadding="5" cellspacing="2">
        <td><a href="edit.php?index=<?=$index?>">Edit</a></td>
        <td><a href="delete.php?index=<?=$index?>">Delete</a></td>
    </table>
    <hr>
    <table border="1" cellpadding="5" cellspacing="2">
        <tr>
            <td><b>ID:</b></td>
            <td><b>Year:</b></td>
            <td><b>Content:</b></td>
        </tr>
        <tr>
            <td><?= $awards[$index]->getID(); ?></td>
            <td><?= $awards[$index]->getYear() ?></td>
            <td><?= $awards[$index]->getTitle() ?></td>
        </tr>
    </table>
</body>