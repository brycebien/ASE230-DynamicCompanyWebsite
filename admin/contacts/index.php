<?php
require_once('./contacts.php');
$contacts=get_contacts();
?>

<head>
    <title>View Contact Requests</title>
</head>

<body>
    <h1>View Contact Requests</h1>
    <table border="1" cellpadding="5" cellspacing="2" style="width:700px">
        <?php
        if (count($contacts)<1){ ?>
            <tr><td style="text-align:center">No contact requests!</td></tr>
        <?php
        }else {
            for($i=0;$i<count($contacts);$i++){ ?>
                <tr>
                    <td><b><?= $contacts[$i]['id'] ?>.</b></td>
                    <td><p style="margin-bottom:6px"><b><?=$contacts[$i]['name']?></b> - <i><?=$contacts[$i]['subject']?></i></p></td>
                    <td style="width:80px"><a href="detail.php?index=<?=$i?>">View details</a></td>
                </tr>
        <?php }
        } ?>
    </table>
</body>