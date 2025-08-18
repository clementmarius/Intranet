<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-center">👥 Liste des clients</h1>

        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="/api/client-creer" class="btn btn-success">Ajouter un client</a>
            <a href="/api/projets" class="btn btn-primary">Voir les projets</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client) : ?>
                        <tr>
                            <td><?= htmlspecialchars($client['id_client']) ?></td>
                            <td><?= htmlspecialchars($client['nom']) ?></td>
                            <td><?= htmlspecialchars($client['telephone'] ?? '') ?></td>
                            <td><?= htmlspecialchars($client['email'] ?? '') ?></td>
                            <td>
                                <a href="/api/client-update/<?= $client['id_client'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>