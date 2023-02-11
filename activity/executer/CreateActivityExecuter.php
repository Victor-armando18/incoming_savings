<?php

    namespace activity\executer;

    use activity\ActivityRepository;
    use activity\command\CreateActivityCommand;
    use activity\service\CreateActivity;
    use RuntimeException;

    require_once __DIR__."/../service/CreateActivity.php";

    final class CreateActivityExecuter{

        private $commandHandler;

        public function __construct(ActivityRepository $reposiory) {
            $this->commandHandler = new CreateActivity($reposiory);
        }

        public function execute(CreateActivityCommand $comando): void{
            try {
                $this->commandHandler->execute($comando);
                echo "Actividade cadastrada com sucesso!";
            } catch (RuntimeException $th) {
                echo $th->getMessage();
            }
        }
    }

?>