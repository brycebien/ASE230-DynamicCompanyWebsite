<?php
require_once('../../lib/readCSV.php');

function get_contacts(){
    return readCSV('../../data/contacts.csv');
}