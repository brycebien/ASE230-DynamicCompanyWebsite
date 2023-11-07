<?php
require_once('products.php');
$productManager=new ProductManager;
$products=$productManager->getProductList();

//echo '<pre>'; var_dump ($products); echo '</pre>'; 

?>
<head>
    <title>Products</title>
</head>

<body>
    <h1>Products</h1>
    <table border="1" cellpadding="5" cellspacing="2" style="min-width:100px">
        <!-- table listing all available products -->
        <td><a href="create.php">Create new entry</a></td>
    </table>
    <table border="1" cellpadding="5" cellspacing="2" style="min-width:100px">
        <?php 
        if(count($products)<1){ ?>
            <tr><td style="text-align:center">No enteries!</td></tr>
        <?php
        }else{
            for($i=0;$i<count($products);$i++){ ?>
                <tr>
                    <td><b><?= $i ?>.</b></td>
                    <td><p class="text-muted mb-5"><b><?=$products[$i]->getName()?></b>: <?=$products[$i]->getDescription()?></p></td>
                    <td style="width:80px"><a href="detail.php?index=<?=$i?>">View details</a></td>
                    <td><a href="edit.php?index=<?=$i?>">Edit</a></td>
                    <td><a href="delete.php?index=<?=$i?>">Delete</a></td>
                </tr>
          <?php  }
        } ?>
    </table>
</body>