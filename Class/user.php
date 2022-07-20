<?php

    class User {
        private $conn;
        private $db_table = "contact";

        public $contactId;
        public $name;
        public $phone;
        public $date;
        public $status;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getUsers() {
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

    }


?>