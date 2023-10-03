<?php
require_once('./team.php');
$index=$_GET['index'];
$team=get_team();
?>

<head>
    <title>Viewing award entry <?= $index ?></title>
</head>

<body>
    <h1>Manage Team Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Viewing award entry <?= $index ?></h2>
    <table border="1" cellpadding="5" cellspacing="2">
        <td><a href="edit.php?index=<?=$index?>">Edit</a></td>
        <td><a href="delete.php?index=<?=$index?>">Delete</a></td>
    </table>
    <hr>
    <table border="1" cellpadding="5" cellspacing="2" style="width:900px">
        <tr>
            <td><b>ID:</b></td>
            <td><b>Name:</b></td>
            <td><b>Title:</b></td>
            <td><b>Desciption:</b></td>
        </tr>
        <tr>
            <td><?= $team[$index]['id'] ?></td>
            <td><?= $team[$index]['name'] ?></td>
            <td><?= $team[$index]['title'] ?></td>
            <td><?= $team[$index]['description'] ?></td>
        </tr>
    </table>
</body>