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
        $stmt = $this->pdo->prepare("SELECT 
        ticket.*, 
        projet.nom_projet 
    FROM 
        ticket
    LEFT JOIN 
        projet ON ticket.id_projet = projet.id_projet");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTicketById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ticket WHERE id_ticket = ?");
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
            titre_ticket = ?,
            date_ticket = ?,
            responsable = ?,
            statut = ?,
            description_ticket = ?,
            date_de_fin = ?,
            temps_passe = ?,
            visible_client = ?,
            id_projet = ?
        WHERE id_ticket = ?
    ");

        return $stmt->execute([
            $data['titre_ticket'],
            $data['date_ticket'],
            $data['responsable'],
            $data['statut'],
            $data['description_ticket'],
            $data['date_de_fin'] ?: null,
            $data['temps_passe'] ?: null,
            isset($data['visible_client']) ? 1 : 0,
            $data['id_projet'],
            $id
        ]);
    }


    public function filterTickets($projetId = null, $responsable = null, $statut = null)
    {
        $query = "
            SELECT ticket.*, projet.nom_projet 
            FROM ticket 
            LEFT JOIN projet ON ticket.id_projet = projet.id_projet 
            WHERE 1=1
        ";
        $params = [];

        if (!empty($projetId)) {
            $query .= " AND ticket.id_projet = :projetId";
            $params['projetId'] = $projetId;
        }

        if (!empty($responsable)) {
            $query .= " AND ticket.responsable = :responsable";
            $params['responsable'] = $responsable;
        }

        if (!empty($statut)) {
            $query .= " AND ticket.statut = :statut";
            $params['statut'] = $statut;
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
