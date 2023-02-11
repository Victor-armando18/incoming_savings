<?php

    namespace shared;

    require_once __DIR__."/Command.php";

    interface CommandHandler{
        function execute(Command $command): void;
    }

?>