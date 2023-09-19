<?php
function readCVS($fileIn) {
    if (file_exists($fileIn)){
        fopen($fileIn,'r');
        return fgetcsv($fileIn);
        fclose($fileIn);
    } else {
       echo "ERROR - CVS file ".$fileIn." not found...";
    }
}