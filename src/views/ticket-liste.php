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
            <a href="/api/ticket-creer" class="btn btn-primary">➕ Ajouter un ticket</a>
        </div>

        <?php if (empty($tickets)) : ?>
            <div class="alert alert-info">Aucun ticket enregistré.</div>
        <?php else : ?>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tickets as $ticket) : ?>
                            <tr>
                                <td><?= htmlspecialchars($ticket['id_ticket']) ?></td>
                                <td><?= htmlspecialchars($ticket['titre_ticket']) ?></td>
                                <td><?= htmlspecialchars($ticket['date_ticket']) ?></td>
                                <td><?= htmlspecialchars($ticket['responsable']) ?></td>
                                <td><?= htmlspecialchars($ticket['statut']) ?></td>
                                <td><?= htmlspecialchars($ticket['description_ticket']) ?></td>
                                <td><?= htmlspecialchars($ticket['date_de_fin']) ?></td>
                                <td><?= htmlspecialchars($ticket['temps_passe']) ?></td>
                                <td><?= htmlspecialchars($ticket['id_projet']) ?></td>
                                <td><?= $ticket['visible_client'] ? 'Oui' : 'Non' ?></td>
                                <td>
                                    <a href="/api/ticket-update/<?= $ticket['id_ticket'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
