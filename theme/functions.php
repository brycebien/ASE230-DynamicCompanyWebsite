<?php
function loadPage($page,$title){
	$path='data/'.$page.'.html';
	$content=file_get_contents($path);
	echo $content;
}
?>