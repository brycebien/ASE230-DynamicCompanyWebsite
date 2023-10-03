<?php
require_once('../../lib/readJSON.php');
//retrieve and index
function get_products(){
    return readJSON('../../data/products.json');
}

//create new product
function create_product($entry_in){
    $index=$entry_in['index'];
    $entries_updated=get_products(); // set enteries_updated to the json data as php array
    $new_entry=['name' => $entry_in['name'], 'description' => $entry_in['description'], 'applications' => [$entry_in['application0'],$entry_in['application1'],$entry_in['application2']]];
    $entries_updated[count($entries_updated)]=$new_entry; // add the new entry to the json data
    $updated = json_encode($entries_updated,JSON_PRETTY_PRINT); // set updated to the json data as json
    echo '<pre>';
    print_r($updated);
    file_put_contents('../../data/products.json',$updated); // update the json data
    header('Location: index.php');
}

//edit a product
function edit_product($enteries_updated){
    $index=$enteries_updated['index'];
    // 1. decode the json file
    $enteries_old=get_products();
    // 2. apply changes
    $enteries_old[$index]['name']=$enteries_updated['name'];
    $enteries_old[$index]['description']=$enteries_updated['description'];

    for($j=0;$j<count($enteries_old[$index]['applications']);$j++){
        $enteries_old[$index]['applications'][$j]=$enteries_updated['application'.$j];
    }
    // 3. encode the json file and put contents
    $updated = json_encode($enteries_old,JSON_PRETTY_PRINT);
    file_put_contents('../../data/products.json',$updated);
}

//delete a product
function delete_product($entry_in){
    $index=$entry_in['index'];
    $products=get_products();
    array_splice($products,$index,$index+1);
    file_put_contents('../../data/products.json',json_encode($products,JSON_PRETTY_PRINT));
}
?>