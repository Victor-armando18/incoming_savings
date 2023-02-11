<?php

    namespace activity\service;

use activity\ActivityRepository;

    final class GetAllActivities{

        private $reposiory;

        public function __construct(ActivityRepository $repository) {
            $this->reposiory = $repository;
        }

        function execute(): array{
            return $this->reposiory->getAll();
        }
    }

?>