<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un projet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-center">✏️ Modifier un projet</h1>

        <?php if (isset($projet)) : ?>
            <form action="/api/projet-update/<?= $projet['id_projet'] ?>" method="POST" class="card p-4 shadow-sm bg-white">

                <div class="mb-3">
                    <label for="nom_projet" class="form-label">Nom du projet</label>
                    <input type="text" id="nom_projet" name="nom_projet" class="form-control" value="<?= htmlspecialchars($projet['nom_projet']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="url_projet" class="form-label">URL du projet</label>
                    <input type="url" id="url_projet" name="url_projet" class="form-control" value="<?= htmlspecialchars($projet['url_projet']) ?>">
                </div>

                <div class="mb-3">
                    <label for="url_devt" class="form-label">URL de développement</label>
                    <input type="url" id="url_devt" name="url_devt" class="form-control" value="<?= htmlspecialchars($projet['url_devt']) ?>">
                </div>

                <div class="mb-3">
                    <label for="identifiant" class="form-label">Identifiant</label>
                    <input type="text" id="identifiant" name="identifiant" class="form-control" value="<?= htmlspecialchars($projet['identifiant']) ?>">
                </div>

                <div class="mb-3">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label>
                    <input type="text" id="mot_de_passe" name="mot_de_passe" class="form-control" value="<?= htmlspecialchars($projet['mot_de_passe']) ?>">
                </div>

                <div class="mb-3">
                    <label for="lien_administrateur" class="form-label">Lien administrateur</label>
                    <input type="url" id="lien_administrateur" name="lien_administrateur" class="form-control" value="<?= htmlspecialchars($projet['lien_administrateur']) ?>">
                </div>

                <div class="mb-3">
                    <label for="commentaire" class="form-label">Commentaire</label>
                    <textarea id="commentaire" name="commentaire" class="form-control" rows="3"><?= htmlspecialchars($projet['commentaire']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="commentaire_maj" class="form-label">Commentaire mise à jour</label>
                    <textarea id="commentaire_maj" name="commentaire_maj" class="form-control" rows="3"><?= htmlspecialchars($projet['commentaire_maj']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="PHP_version" class="form-label">Version PHP</label>
                    <input type="text" id="PHP_version" name="PHP_version" class="form-control" value="<?= htmlspecialchars($projet['PHP_version']) ?>">
                </div>

                <div class="mb-3">
                    <label for="id_client" class="form-label">ID Client</label>
                    <input type="number" id="id_client" name="id_client" class="form-control" value="<?= htmlspecialchars($projet['id_client']) ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/api/projets" class="btn btn-secondary">↩️ Retour</a>
                    <button type="submit" class="btn btn-success">💾 Mettre à jour</button>
                </div>
            </form>
        <?php else : ?>
            <div class="alert alert-danger text-center">❌ Projet non trouvé.</div>
        <?php endif; ?>
    </div>
</body>

</html>