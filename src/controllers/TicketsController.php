<?php

namespace ACCK\controllers;

require_once __DIR__ . '/../models/Ticket.php';
require_once __DIR__ . '/../../config/database.php';

use ACCK\models\Ticket;
use function ACCK\config\getPDO;

class TicketsController
{
    private $ticketModel;

    public function __construct()
    {
        $pdo = getPDO();
        $this->ticketModel = new Ticket($pdo);
    }

    public function liste()
    {
        $tickets = $this->ticketModel->getAllTickets();
        include __DIR__ . '/../views/ticket-liste.php';
    }

    public function detail($id)
    {
        $ticket = $this->ticketModel->getTicketById($id);
        include __DIR__ . '/../views/ticket-detail.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $this->ticketModel->createTicket($_POST);
            if ($success) {
                header("Location: /api/");
                exit;
            } else {
                $error = "Erreur lors de la création du ticket.";
                include __DIR__ . '/../views/ticket-create.php';
            }
        } else {
            include __DIR__ . '/../views/ticket-create.php';
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $this->ticketModel->updateTicket($id, $_POST);
            if ($success) {
                header("Location: /api");
                exit;
            } else {
                echo "Erreur lors de la mise à jour du ticket.";
            }
        } else {
            $ticket = $this->ticketModel->getTicketById($id);
            include __DIR__ . '/../views/ticket-update.php';
        }
    }

    public function filter()
    {
        // Correction des noms des champs
        $projetId = $_POST['projet_id'] ?? null;
        $responsable = $_POST['responsable'] ?? null;
        $statut = $_POST['statut'] ?? null;

        $tickets = $this->ticketModel->filterTickets($projetId, $responsable, $statut);

        if (empty($tickets)) {
            echo '<tr><td colspan="11" class="text-center text-muted">Aucun ticket trouvé.</td></tr>';
            return;
        }

        foreach ($tickets as $ticket) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($ticket['id_ticket']) . '</td>';
            echo '<td>' . htmlspecialchars($ticket['titre_ticket']) . '</td>';
            echo '<td>' . htmlspecialchars($ticket['date_ticket']) . '</td>';
            echo '<td>' . htmlspecialchars($ticket['responsable']) . '</td>';
            echo '<td>' . htmlspecialchars($ticket['statut']) . '</td>';
            echo '<td>' . htmlspecialchars($ticket['description_ticket']) . '</td>';
            echo '<td>' . htmlspecialchars($ticket['date_de_fin']) . '</td>';
            echo '<td>' . htmlspecialchars($ticket['temps_passe']) . '</td>';
            echo '<td>' . htmlspecialchars($ticket['nom_projet']) . '</td>';
            echo '<td>' . (!empty($ticket['visible_client']) ? 'Oui' : 'Non') . '</td>';
            echo '<td><a href="/api/ticket-update/' . $ticket['id_ticket'] . '" class="btn btn-sm btn-warning">✏️ Modifier</a></td>';
            echo '</tr>';
        }
    }
}
