<?php
function readPlain($fileIn) {
    if (file_exists($fileIn)){
        return json_decode($fileIn);
    } else {
        echo "ERROR - JSON file ".$fileIn." not found...";
    }
}