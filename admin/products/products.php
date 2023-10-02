<?php
require_once('../../lib/readJSON.php');
$products_list=get_products(); // used for retrieving and indexing all items

//retrieve and index
function get_products(){
    return readJSON('../../data/products.json');
}

//create new product
function create_product($entry_in){
    //echo 'Creating entry '.$entry_in['id'].'...';
    $entries_updated=get_products(); // set enteries_updated to the json data as php array
    $entries_updated[count($entries_updated)]=$entry_in; // add the new entry to the json data
    $updated = json_encode($entries_updated,JSON_PRETTY_PRINT); // set updated to the json data as json
    echo $updated;
    file_put_contents('../../data/products.json',$updated); // update the json data

}

//edit a product
function edit_product(){

}

//delete a product
function delete_product(){
    
}
?>