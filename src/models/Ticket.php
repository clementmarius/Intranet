<?php

namespace acck\models;

use \PDO;


class Ticket
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTickets()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ticket");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTicketById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ticket WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createTicket($data)
    {
        $stmt = $this->pdo->prepare("
        INSERT INTO ticket (
            titre_ticket,
            date_ticket,
            responsable,
            statut,
            description_ticket,
            date_de_fin,
            temps_passe,
            visible_client,
            id_projet
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

        return $stmt->execute([
            $data['titre_ticket'],
            $data['date_ticket'],
            $data['responsable'],
            $data['statut'],
            $data['description_ticket'],
            $data['date_de_fin'],
            $data['temps_passe'],
            isset($data['visible_client']) ? 1 : 0,
            $data['id_projet']
        ]);
    }


    public function updateTicket($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE ticket SET
                titre = ?,
                date = ?,
                structure = ?,
                responsable = ?,
                statut = ?,
                description = ?,
                date_fin = ?,
                temps_passe = ?,
                visible_client = ?,
                id_site = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $data['titre_ticket'],
            $data['date_ticket'],
            $data['structure'],
            $data['responsable'],
            $data['statut'],
            $data['description_ticket'],
            $data['date_de_fin'],
            $data['temps_passe'],
            isset($data['visible_client']) ? 1 : 0,
            $data['id_site'],
            $id
        ]);
    }
}
