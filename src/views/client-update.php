<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier le client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-center">✏️ Modifier le client</h1>

        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="/api/clients" class="btn btn-secondary">← Retour à la liste</a>
        </div>

        <form action="" method="POST" class="mx-auto" style="max-width: 500px;">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($client['nom']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" value="<?= htmlspecialchars($client['telephone']) ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($client['email']) ?>">
            </div>

            <button type="submit" class="btn btn-warning w-100">Mettre à jour</button>
        </form>
    </div>
</body>

</html>