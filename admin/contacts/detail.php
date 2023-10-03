<?php
require_once('./contacts.php');
$index=$_GET['index'];
$contacts=get_contacts();
?>

<head>
    <title>Viewing Contact Request <?= $index ?></title>
</head>

<body>
    <h1>View Contact Requests</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Viewing contact request <?= $index ?></h2>
    <table border="1" cellpadding="5" cellspacing="2">
        <td><a href="edit.php?index=<?=$index?>">Edit</a></td>
        <td><a href="delete.php?index=<?=$index?>">Delete</a></td>
    </table>
    <hr>
    <table border="1" cellpadding="5" cellspacing="2" style="width:1000px">
        <tr>
            <td><b>ID:</b></td>
            <td><b>Name:</b></td>
            <td><b>Email:</b></td>
            <td><b>Subject:</b></td>
            <td><b>Message:</b></td>
        </tr>
        <tr>
            <td><?= $contacts[$index]['id'] ?></td>
            <td><?= $contacts[$index]['name'] ?></td>
            <td><?= $contacts[$index]['email'] ?></td>
            <td><?= $contacts[$index]['subject'] ?></td>
            <td><?= $contacts[$index]['message'] ?></td>
        </tr>
    </table>
</body>
