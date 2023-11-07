<?php
require_once('pages.php');
$pages=get_pages();
?>

<head>
    <title>Manage Pages</title>
</head>

<body>
    <h1>Manage Pages</h1>

    <table border="1" cellpadding="5" cellspacing="2" style="min-width:100px">
        <td><a href="create.php">Create a new page</a></td>
    </table>
    <table border="1" cellpadding="5" cellspacing="2" style="min-width:100px">
        <?php
        if(count($pages)<1){ ?>
            <tr><td style="text-align:center">No enteries!</td></tr>
        <?php }else{
            for($i=0;$i<count($pages);$i++){
            ?>
            <tr>
                <td><b><?=$i?>.</b></td>
                <td><p class="text-muted mb-5"><?=$pages[$i]?></p></td>
                <td><a href="detail.php?index=<?=$i?>">View Details</a></td>
                <td><a href="edit.php?index=<?=$i?>">Edit</a></td>
                <td><a href="delete.php?index=<?=$i?>">Delete</a></td>
            </tr>
            <?php
            }
        }
        ?>
    </table>
</body>