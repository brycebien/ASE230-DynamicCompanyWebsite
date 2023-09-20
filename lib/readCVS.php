<?php
function readCVS($fileIn) {
    if (file_exists($fileIn)){
        fopen($fileIn,'r');
        return fgetcsv($fileIn);
        fclose($fileIn);
    } else {
       echo "ERROR - CSV file ".$fileIn." not found...";
    }
}