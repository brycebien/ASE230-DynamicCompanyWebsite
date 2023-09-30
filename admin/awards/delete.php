<?php
require_once('./awards.php');
$index=$_GET['index'];
$awards=get_awards();

delete_award($awards[$index]);
// maybe make delete auto direct back to index page if it sucessfully deletes?

?>

<head>
    <title>Deleting award entry <?= $index + 1 ?>...</title>
</head>

<body>
    <h3>Deleting award entry <?= $index + 1 ?>...</h3>
</body>