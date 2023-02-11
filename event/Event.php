<?php

    namespace event;

    final class Event{

        private $number;
        private $year;
        private $date;
        private $registrationDate;
        private $registrationTime;

        public function __construct(string $year, string $date) {
            $this->year = $year;
            $this->date = $date;
        }

        public function setNumber(int $value): void{
            $this->number = $value;
        }

        public function getNumber(): int{
            return $this->number;
        }

        public function setYear(int $value): void{
            $this->year = $value;
        }

        public function getyear(): int{
            return $this->year;
        }

        public function getDate() {
            return $this->date;
        }
        
        public function setDate(string $date) {
            $this->date = $date;
        }
        
        public function getRegistrationDate() {
            return $this->registrationDate;
        }
        
        public function setRegistrationDate(string $registrationDate) {
            $this->registrationDate = $registrationDate;
        }

        public function getRegistrationTime() {
            return $this->registrationTime;
        }

        public function setRegistrationTime(string $registrationTime) {
            $this->registrationTime = $registrationTime;
        }
    }

?>