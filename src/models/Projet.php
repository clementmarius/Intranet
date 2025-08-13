<?php

namespace ACCK\models;

use \PDO;

class Projet
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllProjets()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projet");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
