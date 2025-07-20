<?php

require_once __DIR__ . '/../../config/database.php';

use config\Database;

class User
{

    private PDO $conn;

    public function __construct()
    {
        try {
            $this->conn = Database::getInstance();
        } catch (PDOException $e) {
            error_log("[" . date("Y-m-d H:i:s") . "] Erreur de connexion : " . $e->getMessage(), 3, __DIR__ . '/../../logs/error.log');
            // Tu peux lever une exception ou gérer autrement selon ton besoin
            die("Connexion à la base impossible.");
        }
    }


    public function addNewUser($name, $age, $job): void
    {
        try {
            $query = "INSERT INTO user (name, age, job) VALUES (:name, :age, :job)";

            if ($this->conn === null) {
                throw new Exception("Database connection is null.");
            }

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":age", $age, PDO::PARAM_STR);
            $stmt->bindParam(":job", $job, PDO::PARAM_STR);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Query failed: " . $e->getMessage(), 3, '../../logs/error.log');
        }
    }
}
