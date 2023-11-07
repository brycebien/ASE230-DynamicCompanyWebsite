<?php
// function readJSON($fileIn) {
//     if (file_exists($fileIn)){
//         $json_file=file_get_contents($fileIn);
//         return json_decode($json_file,true);
//     }
// }

class JSONHandler{
    
    public static function read($fileIn) {
        if (file_exists($fileIn)){
            $json_file=file_get_contents($fileIn);
            return json_decode($json_file,true);
        }
    }

    public static function write($file,$infoIn){
        if (file_exists($file)) file_put_contents($file,$infoIn);
    }
}