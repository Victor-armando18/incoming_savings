<?php

    namespace activity\service;

    use activity\Activity;
    use activity\ActivityRepository;
    use activity\command\CreateActivityCommand;
    use RuntimeException;
    use shared\Command;
    use shared\CommandHandler;

    require_once __DIR__."/../command/CreateActivityCommand.php";
    require_once __DIR__."/../../shared/CommandHandler.php";

    final class CreateActivity implements CommandHandler{
        
        private $repository;

        public function __construct(ActivityRepository $repository) {
            $this->repository = $repository;  
        }

        public function execute(Command $command): void{
            
            if($command instanceof CreateActivityCommand){
                $activity = $this->repository->getByName($command->getName());
                if(isset($activity)) throw new RuntimeException("Actividade {$command->getName()} já está cadastrada!");
                $this->repository->save(new Activity($command->getName()));
                return;
            }

            throw new RuntimeException("Comando Inválido!");
        }

    }

?>