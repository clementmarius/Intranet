<?php

// Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload Composer
require_once __DIR__ . '/vendor/autoload.php';

// Configuration base de données
require_once __DIR__ . '/config/database.php';

// Routes
require_once __DIR__ . '/src/routes/api.php';
