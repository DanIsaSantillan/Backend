<?php

    class User {
        private $conn;
        private $db_table = "contact";

        public $ContactId;
        public $Name;
        public $Phone;
        public $Date;
        public $Status;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getUsers() {
            $sqlQuery = "SELECT * FROM " .$this->db_table. "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        public function createUser() {
            $sqlQuery = "INSERT INTO " .$this->db_table. "
                        SET 
                            Name = :Name,
                            Phone = :Phone,
                            Date = :Date,
                            Status = :Status";
            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(":Name", $this->Name);
            $stmt->bindParam(":Phone", $this->Phone);
            $stmt->bindParam(":Date", $this->Date);
            $stmt->bindParam(":Status", $this->Status);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function updateUser() {
            $sqlQuery = "UPDATE " .$this->db_table. "
                        SET 
                            Name = :Name,
                            Phone = :Phone,
                            Date = :Date,
                            Status = :Status
                        WHERE
                            ContacId= :ContactId";
            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(":Name", $this->Name);
            $stmt->bindParam(":Phone", $this->Phone);
            $stmt->bindParam(":Date", $this->Date);
            $stmt->bindParam(":Status", $this->Status);
            $stmt->bindParam(":ContactId", $this->ContactId);
            
        }

        public function deleteUser() {
            $sqlQuery = "DELETE FROM " .$this->db_table. "
                        WHERE
                            ContactId = :ContactId";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(":ContactId", $this->ContactId);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function getSingleUser() {
            $sqlQuery = "SELECT * FROM " .$this->db_table. "
                        WHERE ContactID = :ContactId LIMIT 1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(":ContactId", $this->ContactId);
            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->Name = $dataRow('Name');
            $this->Phone = $dataRow('Phone');
            $this->Date = $dataRow('Date');
            $this->Status = $dataRow('Status');
            $this->ContactId = $dataRow('ContactId');
        }

    }


?>