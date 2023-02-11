<?php

    namespace activity;

    use shared\Query;

    require_once __DIR__."/../Activity.php";

    interface ActivityRepository{
        
        function save(Activity $activity): void;
        function getByName(string $value);
        function getAll(): array;

    }

?>