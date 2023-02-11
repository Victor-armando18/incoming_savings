<?php

    use activity\ActivityRepository;
    use activity\service\GetAllActivities;

    require_once __DIR__."/../service/GetAllActivities.php";

    final class GetAllActivitiesExecuter{
        private $queryHandler;

        public function __construct(ActivityRepository $repository) {
            $this->queryHandler = new GetAllActivities($repository);
        }

        public function execute(){
            return $this->queryHandler->execute();
        }
    }

?>