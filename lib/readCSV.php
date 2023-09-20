<?php
function readCSV($fileIn) {
    if (file_exists($fileIn)){
        $fp=fopen($fileIn,'r');
        return fgets($fp);
        fclose($fp);
    } else {
       echo "ERROR - CSV file ".$fileIn." not found...";
    }
}