<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Intranet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center">

    <div class="container mt-5 text-center">
        <h1 class="mb-4">Bienvenue sur l'intranet</h1>

        <a href="ticket/ticket.php" class="btn btn-primary btn-lg">Ajouter un ticket</a>
        <a href="ticket/liste-ticket.php" class="btn btn-primary btn-lg">liste des tickets</a>
    </div>

</body>

</html>