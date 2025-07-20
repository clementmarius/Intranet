<?php

require_once __DIR__ . '/../models/Ticket.php';

class TicketsController
{

    private $ticket;

    public function __construct()
    {
        $this->ticket = new User();
    }

    public function liste()
    {
        include __DIR__ . '/../views/ticket-liste.php';
    }


    public function detail()
    {
        include __DIR__ . '/../views/ticket-detail.php';
    }
}
