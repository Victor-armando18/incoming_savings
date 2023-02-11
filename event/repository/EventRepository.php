<?php

    namespace event\repository;

    use event\Event;

    require_once __DIR__."/../Event.php";

    interface EventRepository{
        function save(Event $event): void;
        function findByYearAndDate(int $year, string $date);
        function findAllByYear(int $value): array;
        function findAll(): array;
    }

?>