<?php
function get_pages(){
    $pages=scandir('../../pages');
    array_splice($pages,0,2);
    return $pages; //returns array of pages
}
#creating a new page
function create_page($page){
    if(!file_exists('../../'.$page['name'].'.html')){
        file_put_contents('../../pages/'.$page['name'].'.html',$page['code']);
        echo '<h1>Page has been created at ../../pages/'.$page['name'].'.html</h1>';
    ?>
        <a href="../../pages/<?=$page['name']?>.html">Go to <?=$page['name']?>.html</a>
    <?php
    }else{
        echo 'page already exists';
    ?>
        <a href='index.php'>go back to page manager</a>
    <?php
        die();
    }
}

function edit_page($newPage){
    $oldPage='../../pages/'.$newPage['name'];
    file_put_contents($oldPage, $newPage['code']);
}
?>