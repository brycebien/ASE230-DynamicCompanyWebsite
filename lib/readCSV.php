<?php
function readCSV($fileIn) {
    if (!file_exists($fileIn)){
        echo "ERROR - CSV file $fileIn not found...";
    }
    $fp=fopen($fileIn,'r');
    $get_csv=fgetcsv($fp,0,';');
    $data=[];

    while($content=fgetcsv($fp,0,';')){
        if(count($get_csv)===count($content)){
            $data[]=array_combine($get_csv,$content);
        }
    }
    fclose($fp);
    return $data;
}