<?php

namespace ACCK\controllers;

require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../../config/database.php';

use ACCK\models\Client;
use function ACCK\config\getPDO;

class ClientController
{
    private $clientModel;

    public function __construct()
    {
        $pdo = getPDO();
        $this->clientModel = new Client($pdo);
    }

    public function liste()
    {
        $clients = $this->clientModel->getAllClients();
        include __DIR__ . '/../views/client-liste.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->clientModel->createClient($_POST);
            header('Location: /api/clients');
            exit;
        }

        include __DIR__ . '/../views/client-create.php';
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $this->clientModel->updateClient($id, $_POST);
            if ($success) {
                header("Location: /api/clients");
                exit;
            } else {
                echo "Erreur lors de la mise à jour du client.";
            }
        } else {
            $client = $this->clientModel->getClientById($id);
            include __DIR__ . '/../views/client-update.php';
        }
    }
}
