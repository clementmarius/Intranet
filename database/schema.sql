/* Script de creation des tables */
-- Table Client
CREATE TABLE
    Client (
        id_client INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nom VARCHAR(255) NOT NULL,
        téléphone VARCHAR(20) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL
    );

-- Table Projet
CREATE TABLE
    Projet (
        id_projet INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nom_projet VARCHAR(255) NOT NULL,
        url_projet TEXT NULL,
        url_devt TEXT NULL,
        identifiant VARCHAR(255) NOT NULL,
        mot_de_passe VARCHAR(255) NOT NULL,
        lien_administrateur TEXT NULL,
        commentaire TEXT NULL,
        commentaire_maj TEXT NULL,
        PHP_version VARCHAR(20) NULL,
        id_client INT NOT NULL,
        FOREIGN KEY (id_client) REFERENCES Client (id_client)
    );

-- Table MAJ
CREATE TABLE
    MAJ (
        id_maj INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        date DATE NOT NULL,
        id_projet INT NOT NULL,
        FOREIGN KEY (id_projet) REFERENCES Projet (id_projet)
    );

-- Table Joueur
CREATE TABLE
    Joueur (
        id_player INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        Role INT NOT NULL,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );

-- Table Projet_Joueur (liaison Projet ↔ Joueur)
CREATE TABLE
    Projet_Joueur (
        id_projet_joueur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        id_projet INT NOT NULL,
        id_joueur INT NOT NULL,
        FOREIGN KEY (id_projet) REFERENCES Projet (id_projet),
        FOREIGN KEY (id_joueur) REFERENCES Joueur (id_player)
    );

-- Table Ticket
CREATE TABLE
    Ticket (
        id_ticket INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        titre_ticket VARCHAR(255) NOT NULL,
        date_ticket DATE NOT NULL,
        responsable TEXT NULL,
        statut VARCHAR(100) NOT NULL,
        description_ticket TEXT NOT NULL,
        date_de_fin DATE,
        temps_passe DECIMAL(5, 2),
        visible_client BOOLEAN DEFAULT FALSE,
        id_projet INT,
        FOREIGN KEY (id_projet) REFERENCES Projet (id_projet)
    );