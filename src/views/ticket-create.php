<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer un ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Créer un ticket</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form action="/api/ticket-creer" method="POST" class="card p-4 shadow-sm">

            <div class="mb-3">
                <label for="titre_ticket" class="form-label">Titre</label>
                <input type="text" id="titre_ticket" name="titre_ticket" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date_ticket" class="form-label">Date</label>
                <input type="date" id="date_ticket" name="date_ticket" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="responsable" class="form-label">Responsable</label>
                <select id="responsable" name="responsable" class="form-select">
                    <option value="">-- Sélectionner --</option>
                    <option value="Evan">Evan</option>
                    <option value="Fabien">Fabien</option>
                    <option value="Kim">Kim</option>
                    <option value="Lola">Lola</option>
                    <option value="Jean">Jean</option>
                    <option value="Jérémy">Jérémy</option>
                    <option value="Marius">Marius</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select id="statut" name="statut" class="form-select" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="Nouveau">Nouveau</option>
                    <option value="En cours">En cours</option>
                    <option value="Fermé">Fermé</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description_ticket" class="form-label">Description</label>
                <textarea id="description_ticket" name="description_ticket" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="date_de_fin" class="form-label">Date de fin</label>
                <input type="date" id="date_de_fin" name="date_de_fin" class="form-control">
            </div>

            <div class="mb-3">
                <label for="temps_passe" class="form-label">Temps passé (heures)</label>
                <input type="number" id="temps_passe" name="temps_passe" step="0.01" min="0" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="visible_client" name="visible_client" value="1">
                <label class="form-check-label" for="visible_client">
                    Visible par le client
                </label>
            </div>

            <div class="mb-3">
                <label for="id_projet" class="form-label">Projet associé (ID)</label>
                <input type="number" id="id_projet" name="id_projet" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Créer le ticket</button>
        </form>
    </div>
</body>

</html>