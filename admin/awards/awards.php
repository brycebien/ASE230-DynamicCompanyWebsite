<?php
require_once('./lib/readCSV.php');
// $awards_list=get_awards();

// function get_awards(){
//     return readCSV('../../data/awards.csv');
// }

// function create_award($entry_in){
//     echo 'Creating entry '.$entry_in['id'].'...';
//     $entries_updated=fopen('../../data/awards.csv','a');

//     fwrite($entries_updated,implode(';',$entry_in)."\n");
    
//     fclose($entries_updated);
//     header('Location: index.php');
//     die;
// }

// function edit_award($entry_in){
//     echo 'Saving changes to entry '.$entry_in['id'].' ...';
//     $entries_existing=get_awards();
//     $entries_updated=fopen('../../data/awards.csv','w');

//     for ($row=0;$row < count($entries_existing);$row++){
//         var_dump($entries_existing[$row]);
//         if ($entries_existing[$row]['id'] == $entry_in['index']){
//             $entries_existing[$row]['year']=$entry_in['year'];
//             $entries_existing[$row]['award']=$entry_in['award'];
//         }
//         echo '<br>';
//     }
//     fputcsv($entries_updated,['year','award','id'],';');
//     foreach ($entries_existing as $fields){
//         fwrite($entries_updated,implode(';',$fields)."\n");
//     }
//     fclose($entries_updated);
//     header('Location: detail.php?index='.$entry_in['index']); //redirect back to entry
//     die;
// }

// function delete_award($entry_in){
//     echo 'Deleting entry '.$entry_in['id'].'...';
//     $entries_existing=get_awards();
//     $entries_updated=fopen('../../data/awards.csv','w');

//     fputcsv($entries_updated,['year','award','id'],';');
//     foreach ($entries_existing as $fields){
//         fwrite($entries_updated,$fields['id']==$entry_in['id']?"":implode(';',$fields)."\n");
//     }
//     fclose($entries_updated);
//     header('Location: index.php'); //redirect back to index
//     die;
// }

class Award{
    private $year;
    private $title;

    public function __construct($year, $title){
        $this->year = $year;
        $this->title = $title;
    }

    public function getYear(){
        return $this->year;
    }

    public function getTitle(){
        return $this->title;
    }

    public function display(){
        echo '<h2>' . $this->year . ':</h2><br><p class="text-muted mb-5">' . $this->title . '</p>';
    }
}

class AwardsManager{
    private $awards = [];

    public function addAward($award){
        $this->awards[] = $award;

        $isInCSV=false;
        $entries=readCSV('./data/awards.csv');
        $new_entries=fopen('./data/awards.csv','a');
        foreach($entries as $entry){
            if($entry['award'] == $award->getTitle()){
                $isInCSV=true;
            }
        }
        if(!$isInCSV){
            fwrite($new_entries,implode(';',['year'=>$award->getYear(),'award'=>$award->getTitle(),'id'=>count($this->awards)-1])."\n");
        }
        fclose($new_entries);
    }

    public function delete($index){
        if(array_key_exists($index, $this->awards)){
            $entries=readCSV('./data/awards.csv');
            $entries_updated=fopen('./data/awards.csv','w');
            fputcsv($entries_updated,['year','award','id'],';');
            foreach ($entries as $fields){
                fwrite($entries_updated,$fields['id']==$entries[$index]['id']?"":implode(';',$fields)."\n");
            }
            fclose($entries_updated);

            unset($this->awards[$index]);
        }

    }

    public function getAwards(){
        return $this->awards;
    }

    //add way to edit award
}