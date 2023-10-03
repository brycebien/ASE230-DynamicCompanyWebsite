<?php
require_once('../../theme/functions.php');
#creating a new page
function create_page($page){
    if(!file_exists('../../'.$page['title'].'.html')){

    }else{
        echo 'page already exists';
        die();
    }
}
?>