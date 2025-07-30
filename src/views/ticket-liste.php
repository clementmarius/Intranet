<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des tickets</title>
</head>

<body>
    <h1>Liste des tickets</h1>

    <a href="/ticket-creer">Créer un nouveau ticket</a>

    <ul>
        <?php foreach ($tickets as $ticket): ?>
            <li>
                <strong><?= htmlspecialchars($ticket['titre']) ?></strong> -
                <?= htmlspecialchars($ticket['date']) ?> -
                <a href="/ticket/<?= $ticket['id'] ?>">Voir le détail</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>