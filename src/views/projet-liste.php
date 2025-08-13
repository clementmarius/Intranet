<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des projets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-center">📁 Liste des projets</h1>

        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="/api/tickets" class="btn btn-primary">Voir les tickets</a>
            <a href="/api/projet-creer" class="btn btn-success">Ajouter un projet</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom du projet</th>
                        <th>URL projet</th>
                        <th>URL devt</th>
                        <th>Identifiant</th>
                        <th>Mot de passe</th>
                        <th>Lien admin</th>
                        <th>Commentaire</th>
                        <th>Commentaire MAJ</th>
                        <th>Version PHP</th>
                        <th>ID client</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projets as $projet) : ?>
                        <tr>
                            <td><?= htmlspecialchars($projet['id_projet']) ?></td>
                            <td><?= htmlspecialchars($projet['nom_projet']) ?></td>
                            <td>
                                <?php if (!empty($projet['url_projet'])): ?>
                                    <a href="<?= htmlspecialchars($projet['url_projet']) ?>" target="_blank">
                                        <?= htmlspecialchars($projet['url_projet']) ?>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($projet['url_devt'])): ?>
                                    <a href="<?= htmlspecialchars($projet['url_devt']) ?>" target="_blank">
                                        <?= htmlspecialchars($projet['url_devt']) ?>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($projet['identifiant']) ?></td>
                            <td><?= htmlspecialchars($projet['mot_de_passe']) ?></td>
                            <td>
                                <?php if (!empty($projet['lien_administrateur'])): ?>
                                    <a href="<?= htmlspecialchars($projet['lien_administrateur']) ?>" target="_blank">
                                        <?= htmlspecialchars($projet['lien_administrateur']) ?>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($projet['commentaire']) ?></td>
                            <td><?= htmlspecialchars($projet['commentaire_maj']) ?></td>
                            <td><?= htmlspecialchars($projet['PHP_version']) ?></td>
                            <td><?= htmlspecialchars($projet['id_client']) ?></td>
                            <td>
                                <a href="/api/projet-update/<?= $projet['id_projet'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>