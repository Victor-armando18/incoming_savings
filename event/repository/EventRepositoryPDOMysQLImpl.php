<?php

    namespace event\repository;

    use configuration\Connection;
    use event\Event;
    use RuntimeException;

    require_once __DIR__."/../../config/Connection.php";

    final class EventRepositoryPDOMySQLImpl implements  EventRepository{
        
        private $connection;

        public function __construct() {
            $this->connection = Connection::get();
        }

        public function save(Event $event): void {
            $query = <<<SQL
                INSERT INTO evento VALUES(DEFAULT, :ano, :data, CURRENT_DATE, CURRENT_TIME);
            SQL;
            try {
                $this->connection->beginTransaction();
                $transacao = $this->connection->prepare($query);
                $transacao->bindValue(":ano", $event->getyear());
                $transacao->bindValue(":data", $event->getDate());
                if($transacao->execute()) $this->connection->commit();
            } catch (\PDOException $th) {
                $this->connection->rollBack();
                throw new RuntimeException("Houve um erro ao tentar cadastrar o evento. Motivo: ".$th->getMessage());
            }
        }

        public function findByYearAndDate(int $year, string $date) {
        }

        public function findAllByYear(int $value): array {
            return [];
        }

        public function findAll(): array {
            return [];
        }
    }

?>