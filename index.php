<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Lancer le routeur
require_once __DIR__ . '../../src/routes/api.php';
