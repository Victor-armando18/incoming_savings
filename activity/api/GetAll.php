<?php

    require_once __DIR__."/../executer/GetAllActivitiesExecuter.php";
    require_once __DIR__."/../repository/ActivityRepositoryPDOMySQLImpl.php";

    $executer = new GetAllActivitiesExecuter(new ActivityRepositoryPDOMySQLImpl());
    // $activities = json_encode($executer->execute());
    // echo $activities;
    $activities = $executer->execute();
    foreach($activities as $activity){
        echo $activity."<br>";
    }

?>