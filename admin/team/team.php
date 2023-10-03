<?php
require_once('../../lib/readCSV.php');

function get_team(){
    return readCSV('../../data/team.csv');
}

function create_team_entry($entry_in){
    echo 'Creating entry '.$entry_in['id'].'...';
    $entries_updated=fopen('../../data/team.csv','a');

    fwrite($entries_updated,implode(';',$entry_in)."\n");
    
    fclose($entries_updated);
    header('Location: index.php');
    die;
}

function edit_team_entry($entry_in){
    echo 'Saving changes to entry '.$entry_in['id'].' ...';
    $entries_existing=get_team();
    $entries_updated=fopen('../../data/team.csv','w');

    for ($row=0;$row < count($entries_existing);$row++){
        var_dump($entries_existing[$row]);
        if ($entries_existing[$row]['id'] == $entry_in['index']){
            $entries_existing[$row]['name']=$entry_in['name'];
            $entries_existing[$row]['title']=$entry_in['title'];
            $entries_existing[$row]['description']=$entry_in['description'];
        }
        echo '<br>';
    }
    fputcsv($entries_updated,['name','title','description','id'],';');
    foreach ($entries_existing as $fields){
        fwrite($entries_updated,implode(';',$fields)."\n");
    }
    fclose($entries_updated);
    header('Location: detail.php?index='.$entry_in['index']); //redirect back to entry
    die;
}

function delete_team_entry($entry_in){
    echo 'Deleting entry '.$entry_in['id'].'...';
    $entries_existing=get_team();
    $entries_updated=fopen('../../data/team.csv','w');

    fputcsv($entries_updated,['name','title','description','id'],';');
    foreach ($entries_existing as $fields){
        fwrite($entries_updated,$fields['id']==$entry_in['id']?"":implode(';',$fields)."\n");
    }
    fclose($entries_updated);
    header('Location: index.php'); //redirect back to index
    die;
}