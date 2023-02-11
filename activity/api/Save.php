<?php
    
    require_once __DIR__."/../executer/CreateActivityExecuter.php";
    require_once __DIR__."/../repository/ActivityRepositoryPDOMySQLImpl.php";

    use activity\command\CreateActivityCommand;
    use activity\executer\CreateActivityExecuter;

    $executer = new CreateActivityExecuter(new ActivityRepositoryPDOMySQLImpl());
    $executer->execute(new CreateActivityCommand($_GET['name']));

?>