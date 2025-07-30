<?php

require_once __DIR__ . '/../models/Ticket.php';
require_once __DIR__ . '/../config/database.php';

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
                header("Location: /tickets");
                exit;
            } else {
                echo "Erreur lors de la création du ticket.";
            }
        } else {
            include __DIR__ . '/../views/ticket-detail.php';
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $success = $this->ticketModel->updateTicket($id, $_POST);
            if ($success) {
                header("Location: /tickets");
                exit;
            } else {
                echo "Erreur lors de la mise à jour du ticket.";
            }
        } else {
            $ticket = $this->ticketModel->getTicketById($id);
            include __DIR__ . '/../views/ticket-update.php';
        }
    }
}
