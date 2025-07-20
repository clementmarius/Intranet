<?php


namespace config;

use PDO;

use PDOException;

/* Connexion PDO + constantes */

class Database
{
    // Instance unique de la connexion PDO
    private static ?PDO $instance = null;

    // Méthode publique pour récupérer l'instance
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $host = 'localhost';
            $dbname = 'intranet';
            $username = 'root';
            $password = '';

            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

            try {
                self::$instance = new PDO($dsn, $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "✅ Connexion réussie à la base de données '$dbname'.";
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
