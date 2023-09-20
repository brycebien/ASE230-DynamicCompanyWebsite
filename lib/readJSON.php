<?php
function readJSON($fileIn) {
    if (file_exists($fileIn)){
        $json_file=file_get_contents($fileIn);
        return json_decode($json_file,true);
    }
}