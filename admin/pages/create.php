<?php
require_once('pages.php');
if (isset($_POST['name'])){
    create_page($_POST);
}
?>

<head>
    <title>Creating new page entry</title>
</head>

<body>
    <h1>Manage Pages Enteries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Create a new page</h2>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <label for="name">Page Name:</label><br>
        <input type="text" name="name"><br>
        <label for="code">Page Code:</label><br>
        <textarea name="code" style="width:512px;height:128px"></textarea><br><br>

        <button type="submit">Create Page</button>
    </form>
</body>