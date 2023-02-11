<?php
    
    use activity\Activity;
    use activity\ActivityRepository;
    use configuration\Connection;
    use PDOException;

    require_once __DIR__."/AtivityRepository.php";

    final class ActivityRepositoryPDOMySQLImpl implements ActivityRepository{
        
        private $connection;

        public function __constrcut(){ $this->connection = Connection::get(); }

        public function save(Activity $activity): void {
            try {
                $this->connection->beginTransaction();
                $transacao = $this->connection->prepare("INSERT INTO actividade VALUES(:nome);");
                $transacao->bindValue(':nome', $activity->getName(), PDO::PARAM_STR);
                if($transacao->execute()) $this->connection->commit();
            } catch (PDOException $th) {
                $this->connection->rollback();
                throw new RuntimeException("Houve um falha ao tentar cadastrar a actividade. Motivo: ".$th->getMessage());
            }
        }
        
        public function getByName(string $value){
            try {
                $transacao = $this->connection->prepare("SELECT nome FROM actividade WHERE nome = :nome");
                $transacao->bindValue(':nome', $value);
                $transacao->execute();
                return $transacao->fetchColumn();
            } catch (PDOException $th) {
                throw new RuntimeException("Houve um falha ao consultar a actividade. Motivo: ".$th->getMessage());
            }
        }
        
        public function getAll(): array {
            try {
                $transacao = $this->connection->Query("SELECT nome FROM actividade");
                return $transacao->fetchAll();
            } catch (PDOException $th) {
                throw new RuntimeException("Houve um falha ao buscar as actividades. Motivo: ".$th->getMessage());
            }
        }
    }

?>