<?php

namespace ACCK\models;

use \PDO;

class Projet
{
    public $pdo;

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

    public function createProjet(array $data)
    {
        $sql = "INSERT INTO projet 
        (nom_projet, url_projet, url_devt, identifiant, mot_de_passe, 
         lien_administrateur, commentaire, commentaire_maj, PHP_version, id_client)
        VALUES 
        (:nom_projet, :url_projet, :url_devt, :identifiant, :mot_de_passe, 
         :lien_administrateur, :commentaire, :commentaire_maj, :PHP_version, :id_client)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':nom_projet'          => $data['nom_projet'],
            ':url_projet'          => !empty($data['url_projet']) ? $data['url_projet'] : null,
            ':url_devt'            => !empty($data['url_devt']) ? $data['url_devt'] : null,
            ':identifiant'         => $data['identifiant'],
            ':mot_de_passe'        => $data['mot_de_passe'],
            ':lien_administrateur' => !empty($data['lien_administrateur']) ? $data['lien_administrateur'] : null,
            ':commentaire'         => !empty($data['commentaire']) ? $data['commentaire'] : null,
            ':commentaire_maj'     => !empty($data['commentaire_maj']) ? $data['commentaire_maj'] : null,
            ':PHP_version'         => !empty($data['PHP_version']) ? $data['PHP_version'] : null,
            ':id_client'           => $data['id_client'],
        ]);
    }

    public function getProjetById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projet WHERE id_projet = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProjet($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE projet SET
                nom_projet = ?,
                url_projet = ?,
                url_devt = ?,
                identifiant = ?,
                mot_de_passe = ?,
                lien_administrateur = ?,
                commentaire = ?,
                commentaire_maj = ?,
                PHP_version = ?,
                id_client = ?
            WHERE id_projet = ?
        ");

        return $stmt->execute([
            $data['nom_projet'],
            $data['url_projet'] ?: null,
            $data['url_devt'] ?: null,
            $data['identifiant'] ?: null,
            $data['mot_de_passe'] ?: null,
            $data['lien_administrateur'] ?: null,
            $data['commentaire'] ?: null,
            $data['commentaire_maj'] ?: null,
            $data['PHP_version'] ?: null,
            $data['id_client'] ?: null,
            $id
        ]);
    }
}
