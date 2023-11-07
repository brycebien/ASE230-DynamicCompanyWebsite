<?php
require_once('./awards.php');
$awardsManager = new AwardsManager();
$awards=$awardsManager->getAwards();
$index=count($awards);

if (isset($_POST['index'])){
    $awardsManager->addAward(new Award($_POST['year'], $_POST['award'], $_POST['index']));
    return;
}
?>

<head>
    <title>Creating new award entry</title>
</head>

<body>
    <h1>Manage Awards Entries</h1>
    <a href="index.php"><< Back</a>
    <hr>

    <h2>Create new award</h2>
    <p>New award ID: <b><?= $index ?></b></p>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="year">Year:</label> <br>
        <input type="text" name="year"> <br>
        <label for="award">Description:</label> <br>
        <textarea type="text" name="award" style="width:512px;height:128px"></textarea> <br><br>
        <input type="hidden" name="index" value="<?= $index ?>">
        <button type="submit">Create new entry</button>
    </form>
</body>