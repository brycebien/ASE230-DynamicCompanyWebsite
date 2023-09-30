<?php
require_once('../../lib/readCSV.php');
$awards_list=get_awards();

function get_awards(){
    return readCSV('../../data/awards.csv');
}

function create_award(){
    
}

function edit_award($award){
    
}

function delete_award($award){

}