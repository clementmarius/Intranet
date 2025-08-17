<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer un projet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-center">➕ Créer un nouveau projet</h1>

        <form method="POST" action="/api/projet-creer" class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nom du projet</label>
                <input type="text" name="nom_projet" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">URL du projet</label>
                <input type="url" name="url_projet" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">URL de développement</label>
                <input type="url" name="url_devt" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Identifiant</label>
                <input type="text" name="identifiant" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="mot_de_passe" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Lien administrateur</label>
                <input type="url" name="lien_administrateur" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Commentaire</label>
                <textarea name="commentaire" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Commentaire mise à jour</label>
                <textarea name="commentaire_maj" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Version PHP</label>
                <input type="text" name="PHP_version" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Client associé</label>
                <select name="id_client" class="form-select" required>
                    <?php foreach ($clients as $client) : ?>
                        <option value="<?= $client['id_client'] ?>">
                            <?= htmlspecialchars($client['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">Créer le projet</button>
                <a href="/api/projets" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</body>

</html>