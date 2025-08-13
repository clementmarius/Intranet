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
}
