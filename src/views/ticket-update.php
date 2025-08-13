<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-center">✏️ Modifier un ticket</h1>

        <?php if (isset($ticket)) : ?>
            <form action="/api/ticket-update/<?= $ticket['id_ticket'] ?>" method="POST" class="card p-4 shadow-sm bg-white">

                <div class="mb-3">
                    <label for="titre_ticket" class="form-label">Titre</label>
                    <input type="text" id="titre_ticket" name="titre_ticket" class="form-control" value="<?= htmlspecialchars($ticket['titre_ticket']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="date_ticket" class="form-label">Date</label>
                    <input type="date" id="date_ticket" name="date_ticket" class="form-control" value="<?= htmlspecialchars($ticket['date_ticket']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable</label>
                    <select id="responsable" name="responsable" class="form-select">
                        <option value="">-- Sélectionner --</option>
                        <?php
                        $responsables = ['Evan', 'Fabien', 'Kim', 'Lola', 'Jean', 'Jérémy', 'Marius'];
                        foreach ($responsables as $r) :
                        ?>
                            <option value="<?= $r ?>" <?= $ticket['responsable'] === $r ? 'selected' : '' ?>>
                                <?= $r ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select id="statut" name="statut" class="form-select" required>
                        <option value="Nouveau" <?= $ticket['statut'] === 'Nouveau' ? 'selected' : '' ?>>Nouveau</option>
                        <option value="En cours" <?= $ticket['statut'] === 'En cours' ? 'selected' : '' ?>>En cours</option>
                        <option value="Fermé" <?= $ticket['statut'] === 'Fermé' ? 'selected' : '' ?>>Fermé</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description_ticket" class="form-label">Description</label>
                    <textarea id="description_ticket" name="description_ticket" class="form-control" rows="3" required><?= htmlspecialchars($ticket['description_ticket']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="date_de_fin" class="form-label">Date de fin</label>
                    <input type="date" id="date_de_fin" name="date_de_fin" class="form-control" value="<?= htmlspecialchars($ticket['date_de_fin']) ?>">
                </div>

                <div class="mb-3">
                    <label for="temps_passe" class="form-label">Temps passé (heures)</label>
                    <input type="number" id="temps_passe" name="temps_passe" step="0.1" min="0" class="form-control" value="<?= htmlspecialchars($ticket['temps_passe']) ?>">
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" id="visible_client" name="visible_client" class="form-check-input" value="1" <?= $ticket['visible_client'] ? 'checked' : '' ?>>
                    <label for="visible_client" class="form-check-label">Visible par le client</label>
                </div>

                <div class="mb-3">
                    <label for="id_projet" class="form-label">Projet associé</label>
                    <input type="number" id="id_projet" name="id_projet" class="form-control" value="<?= htmlspecialchars($ticket['id_projet']) ?>">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/api/ticket-liste" class="btn btn-secondary">↩️ Retour</a>
                    <button type="submit" class="btn btn-success">💾 Mettre à jour</button>
                </div>
            </form>
        <?php else : ?>
            <div class="alert alert-danger text-center">❌ Ticket non trouvé.</div>
        <?php endif; ?>
    </div>
</body>

</html>