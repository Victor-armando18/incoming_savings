<?php

    namespace activity;

    final class Activity{

        private $name;

        public function __construct(string $nome){ $this->name = $nome; }

        public function getName(): string { return $this->name; }        
    }

?>