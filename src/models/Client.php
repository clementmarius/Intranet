<?php

namespace ACCK\models;

use \PDO;

class Client
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllClients()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM client");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createClient(array $data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO client (nom, telephone, email)
            VALUES (:nom, :telephone, :email)
        ");

        $stmt->execute([
            ':nom'       => $data['nom'],
            ':telephone' => $data['telephone'],
            ':email'     => $data['email'],
        ]);
    }

    public function getClientById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM client WHERE id_client = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateClient($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE client SET
                nom = ?,
                telephone = ?,
                email = ?
            WHERE id_client = ?
        ");
        return $stmt->execute([
            $data['nom'],
            $data['telephone'],
            $data['email'],
            $id
        ]);
    }
}
