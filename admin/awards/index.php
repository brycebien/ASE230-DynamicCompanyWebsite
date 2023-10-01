<?php
require_once('./awards.php');
$awards=get_awards();
?>

<head>
    <title>Manage Awards</title>
</head>

<body>
    <h1>Manage Awards Entries</h1>
    <table border="1" cellpadding="5" cellspacing="2" style="min-width:100px">
        <td><a href="create.php">Create new entry</a></td>
    </table>
    <table border="1" cellpadding="5" cellspacing="2" style="width:700px">
        <?php
        if (count($awards)<1){ ?>
            <tr><td style="text-align:center">No entries!</td></tr>
        <?php
        }else {
            for($i=0;$i<count($awards);$i++){ ?>
                <tr>
                    <td><b><?= $awards[$i]['id'] ?>.</b></td>
                    <td><p class="text-muted mb-5"><b><?=$awards[$i]['year']?></b>: <?=$awards[$i]['award']?></p></td>
                    <td style="width:80px"><a href="detail.php?index=<?=$i?>">View details</a></td>
                    <td><a href="edit.php?index=<?=$i?>">Edit</a></td>
                    <td><a href="delete.php?index=<?=$i?>">Delete</a></td>
                </tr>
        <?php }
        } ?>
    </table>
</body>