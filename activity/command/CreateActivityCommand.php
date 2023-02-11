<?php

    namespace activity\command;
    use shared\Command;

    require_once __DIR__."/../../shared/Command.php";

    final class CreateActivityCommand extends Command{

        private $nome;

        public function __construct($nome){ $this->nome = $nome; }

        public function getName(): string { return $this->nome; }

    }

?> 