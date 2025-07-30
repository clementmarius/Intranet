<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le ticket</title>
</head>
<body>
    <h1>Modifier le ticket</h1>

    <?php if (isset($ticket)): ?>
        <form action="/ticket-update/<?= $ticket['id'] ?>" method="POST">
            <label for="titre_ticket">Titre :</label><br>
            <input type="text" id="titre_ticket" name="titre_ticket" value="<?= htmlspecialchars($ticket['titre']) ?>" required><br><br>

            <label for="date_ticket">Date :</label><br>
            <input type="date" id="date_ticket" name="date_ticket" value="<?= htmlspecialchars($ticket['date']) ?>" required><br><br>

            <label for="structure">Structure :</label><br>
            <input type="text" id="structure" name="structure" value="<?= htmlspecialchars($ticket['structure']) ?>"><br><br>

            <label for="responsable">Responsable :</label><br>
            <input type="text" id="responsable" name="responsable" value="<?= htmlspecialchars($ticket['responsable']) ?>"><br><br>

            <label for="statut">Statut :</label><br>
            <select id="statut" name="statut" required>
                <option value="Nouveau" <?= $ticket['statut'] === 'Nouveau' ? 'selected' : '' ?>>Nouveau</option>
                <option value="En cours" <?= $ticket['statut'] === 'En cours' ? 'selected' : '' ?>>En cours</option>
                <option value="Fermé" <?= $ticket['statut'] === 'Fermé' ? 'selected' : '' ?>>Fermé</option>
            </select><br><br>

            <label for="description_ticket">Description :</label><br>
            <textarea id="description_ticket" name="description_ticket" required><?= htmlspecialchars($ticket['description']) ?></textarea><br><br>

            <label for="date_de_fin">Date de fin :</label><br>
            <input type="date" id="date_de_fin" name="date_de_fin" value="<?= htmlspecialchars($ticket['date_de_fin']) ?>"><br><br>

            <label for="temps_passe">Temps passé (heures) :</label><br>
            <input type="number" id="temps_passe" name="temps_passe" step="0.1" min="0" value="<?= htmlspecialchars($ticket['temps_passe']) ?>"><br><br>

            <label for="visible_client">Visible par le client :</label>
            <input type="checkbox" id="visible_client" name="visible_client" value="1" <?= $ticket['visible_client'] ? 'checked' : '' ?>><br><br>

            <label for="id_site">ID du site :</label><br>
            <input type="number" id="id_site" name="id_site" value="<?= htmlspecialchars($ticket['id_site']) ?>"><br><br>

            <button type="submit">Mettre à jour</button>
        </form>
        <br>
        <a href="/tickets">Retour à la liste</a>
    <?php else: ?>
        <p>Ticket non trouvé.</p>
    <?php endif; ?>
</body>
</html>
