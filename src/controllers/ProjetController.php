<?php

namespace ACCK\controllers;

require_once __DIR__ . '/../models/Projet.php';
require_once __DIR__ . '/../../config/database.php';

use ACCK\models\Projet;
use function ACCK\config\getPDO;

class ProjetController
{
    private $projetModel;

    public function __construct()
    {
        $pdo = getPDO();
        $this->projetModel = new Projet($pdo);
    }

    public function liste()
    {
        $projets = $this->projetModel->getAllProjets();
        include __DIR__ . '/../views/projet-liste.php';
    }

    // Création d'un projet
    public function create()
    {
        // On récupère la liste des clients pour le select
        $stmt = $this->projetModel->pdo->query("SELECT * FROM client");
        $clients = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->projetModel->createProjet($_POST);
            header('Location: /api/projets');
            exit;
        }

        include __DIR__ . '/../views/projet-create.php';
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $this->projetModel->updateProjet($id, $_POST);
            if ($success) {
                header("Location: /api/projets");
                exit;
            } else {
                echo "Erreur lors de la mise à jour du projet.";
            }
        } else {
            $projet = $this->projetModel->getProjetById($id);
            include __DIR__ . '/../views/projet-update.php';
        }
    }
}
