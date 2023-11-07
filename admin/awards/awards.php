<?php
require_once(file_exists('../../lib/readCSV.php')?'../../lib/readCSV.php' : './lib/readCSV.php');

class Award{
    private $year;
    private $title;
    private $ID;

    public function __construct($year, $title, $id){
        $this->year = $year;
        $this->title = $title;
        $this->ID = $id;
    }

    public function getYear(){
        return $this->year;
    }

    public function setYear($year){
        $this->year = $year;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getID(){
        return $this->ID;
    }

    public function display(){
        echo '<h2>' . $this->year . ':</h2><br><p class="text-muted mb-5">' . $this->title . '</p>';
    }
}

class AwardsManager{
    private $awards = [];

    public function __construct(){
        $awardData = readCSV(file_exists('../../data/awards.csv')?'../../data/awards.csv' : './data/awards.csv');
        for($i=0; $i<count($awardData);$i++){
            $year = $awardData[$i]['year'];
            $title = $awardData[$i]['award'];
            $id = $awardData[$i]['id'];
            $this->addAward(new Award($year, $title, $id));
        }
    }

    public function addAward($award){
        $this->awards[] = $award;

        $isInCSV=false;
        $entries=readCSV(file_exists('../../data/awards.csv')?'../../data/awards.csv' : './data/awards.csv');
        $new_entries=fopen(file_exists('../../data/awards.csv')?'../../data/awards.csv' : './data/awards.csv','a');
        foreach($entries as $entry){
            if($entry['award'] == $award->getTitle()){
                $isInCSV=true;
            }
        }
        if(!$isInCSV){
            fwrite($new_entries,implode(';',['year'=>$award->getYear(),'award'=>$award->getTitle(), 'id'=>count($entries)])."\n");
        }
        fclose($new_entries);
    }

    public function delete($index){
        if(array_key_exists($index, $this->awards)){
            $entries=readCSV(file_exists('../../data/awards.csv')?'../../data/awards.csv' : './data/awards.csv');
            $entries_updated=fopen(file_exists('../../data/awards.csv')?'../../data/awards.csv' : './data/awards.csv','w');
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
    public function edit($index, $year, $title){
        $award = $this->awards[$index];
        $award->setYear($year);
        $award->setTitle($title);

        $entries_existing=readCSV(file_exists('../../data/awards.csv')?'../../data/awards.csv' : './data/awards.csv');
        $entries_updated=fopen(file_exists('../../data/awards.csv')?'../../data/awards.csv' : './data/awards.csv','w');
        for($i=0;$i<count($entries_existing);$i++){
            if($entries_existing[$i]['id'] == $index){
                $entries_existing[$i]['year'] = $year;
                $entries_existing[$i]['award'] = $title;
            }
        }
        fputcsv($entries_updated,['year','award','id'],';');
        foreach ($entries_existing as $fields){
            fwrite($entries_updated,implode(';',$fields)."\n");
        }
        fclose($entries_updated);
    }
}
