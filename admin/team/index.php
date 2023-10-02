<?php
require_once('./team.php');
$team=get_team();
?>

<head>
    <title>Manage Team</title>
</head>

<body>
    <h1>Manage Team Entries</h1>
    <table border="1" cellpadding="5" cellspacing="2" style="min-width:100px">
        <td><a href="create.php">Create new team entry</a></td>
    </table>
    <table border="1" cellpadding="5" cellspacing="2" style="width:700px">
        <?php
        if (count($team)<1){ ?>
            <tr><td style="text-align:center">No entries!</td></tr>
        <?php
        }else {
            for($i=0;$i<count($team);$i++){ ?>
                <tr>
                    <td><b><?= $team[$i]['id'] ?>.</b></td>
                    <td><p style="margin-bottom:6px"><b><?=$team[$i]['name']?></b>, <i><?=$team[$i]['title']?></i></p>
                        <p style="margin-top:6px"><?=$team[$i]['description']?></p></td>
                    <td style="width:80px"><a href="detail.php?index=<?=$i?>">View details</a></td>
                    <td><a href="edit.php?index=<?=$i?>">Edit</a></td>
                    <td><a href="delete.php?index=<?=$i?>">Delete</a></td>
                </tr>
        <?php }
        } ?>
    </table>
</body>