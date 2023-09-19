<?php
function readPlain($fileIn) {
    if (file_exists($fileIn)){
        fopen($fileIn,'r');
        return file_get_contents($fileIn);
        fclose($fileIn);
    } else {
        echo "ERROR - text file ".$fileIn." not found...";
    }
}