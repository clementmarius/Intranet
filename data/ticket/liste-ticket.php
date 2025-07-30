<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base
$mysqlClient = new PDO(
    'mysql:host=sj667040-001.eu.clouddb.ovh.net;port=35545;dbname=intranet2025;charset=utf8',
    'adminacck',
    'WelcomeAcck123',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Mode erreur pour débogage
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

// Fonction sécurisée d'affichage
function safe($value): string
{
    if (!isset($value) || $value === null) {
        return '';
    }
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

// Récupération de tous les tickets
$sql = "SELECT * FROM ticket";
$query = $mysqlClient->query($sql);
$tickets = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-center">📋 Liste des tickets</h1>

        <div class="d-flex justify-content-center mb-4">
            <a href="/intranet/data/index.php" class="btn btn-primary">➕ Ajouter un ticket</a>
        </div>

        <?php if (count($tickets) === 0): ?>
            <div class="alert alert-info">Aucun ticket enregistré.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Responsable</th>
                            <th>Statut</th>
                            <th>Description</th>
                            <th>Date de fin</th>
                            <th>Temps passé</th>
                            <th>Projet</th>
                            <th>Visible client</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tickets as $ticket): ?>
                            <tr>
                                <td><?= safe($ticket['id_ticket']) ?></td>
                                <td><?= safe($ticket['titre_ticket']) ?></td>
                                <td><?= safe($ticket['date_ticket']) ?></td>
                                <td><?= safe($ticket['responsable']) ?></td>
                                <td><?= safe($ticket['statut']) ?></td>
                                <td><?= safe($ticket['description_ticket']) ?></td>
                                <td><?= safe($ticket['date_de_fin']) ?></td>
                                <td><?= safe($ticket['temps_passe']) ?></td>
                                <td><?= safe($ticket['id_projet']) ?></td>
                                <td><?= $ticket['visible_client'] ? 'Oui' : 'Non' ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>