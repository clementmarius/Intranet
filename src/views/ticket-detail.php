<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du ticket</title>
</head>
<body>
    <h1><?= isset($ticket) ? 'Détail du ticket' : 'Créer un ticket' ?></h1>

    <?php if (isset($ticket)): ?>
        <p><strong>ID :</strong> <?= htmlspecialchars($ticket['id']) ?></p>
        <p><strong>Titre :</strong> <?= htmlspecialchars($ticket['titre']) ?></p>
        <p><strong>Date :</strong> <?= htmlspecialchars($ticket['date']) ?></p>
        <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($ticket['description'])) ?></p>
        <a href="/tickets">Retour à la liste</a>
    <?php else: ?>
        <form action="/ticket-creer" method="POST">
            <label>Titre : <input type="text" name="titre_ticket" required></label><br>
            <label>Date : <input type="date" name="date_ticket" required></label><br>
            <label>Structure : <input type="text" name="structure" required></label><br>
            <label>Responsable : <input type="text" name="responsable" required></label><br>
            <label>Statut : <input type="text" name="statut" required></label><br>
            <label>Description : <textarea name="description_ticket" required></textarea></label><br>
            <label>Date de fin : <input type="date" name="date_de_fin"></label><br>
            <label>Temps passé : <input type="number" step="0.1" name="temps_passe"></label><br>
            <label>Visible client : <input type="checkbox" name="visible_client"></label><br>
            <label>ID site : <input type="number" name="id_site"></label><br>
            <input type="submit" value="Créer le ticket">
        </form>
    <?php endif; ?>
</body>
</html>
