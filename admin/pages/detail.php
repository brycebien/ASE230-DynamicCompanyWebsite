<?php
require_once('pages.php');
$index=$_GET['index'];
$pages=get_pages();
?>

<head>
    <title>Viewing page <?=$index?></title>
</head>

<body>
    <h1>Manage Page Enteries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Viewing product entery <?=$index?></h2>
    <table border="1" cellpadding="5" cellspacing="2">
        <td><a href="edit.php?index=<?=$index?>">Edit</a></td>
        <td><a href="delete.php?index=<?=$index?>">Delete</a></td>
    </table>
    <hr>

    <table border="1" cellpadding="5" cellspacing="2">
        <tr>
            <td><b>ID:</b></td>
            <td><b>Name:</b></td>
            <td><b>Page Link:</b></td>
        </tr>
        <tr>
            <td><?= $index ?></td>
            <td><?= $pages[$index] ?></td>
            <td><a href="../../pages/<?= $pages[$index] ?>">Go to page</a></td>
        </tr>
    </table>
</body>