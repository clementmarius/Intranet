<?php
// Afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base
$mysqlClient = new PDO(
    'mysql:host=sj667040-001.eu.clouddb.ovh.net;port=35545;dbname=intranet2025;charset=utf8',
    'adminacck',
    'WelcomeAcck123',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

// Fonction sécurisée d'affichage
function safe($value): string {
    if (!isset($value) || $value === null) return '';
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$message = '';
$ticket = null;

// Récupération du ticket à modifier
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $mysqlClient->prepare("SELECT * FROM ticket WHERE id_ticket = ?");
    $stmt->execute([$id]);
    $ticket = $stmt->fetch();

    if (!$ticket) {
        $message = "<div class='alert alert-danger'>❌ Ticket introuvable.</div>";
    }
}

// Mise à jour du ticket si formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titre_ticket']) && isset($_GET['id'])) {
    try {
        $update = $mysqlClient->prepare("
            UPDATE ticket SET 
                titre_ticket = :titre_ticket,
                date_ticket = :date_ticket,
                responsable = :responsable,
                statut = :statut,
                description_ticket = :description_ticket,
                date_de_fin = :date_de_fin,
                temps_passe = :temps_passe,
                visible_client = :visible_client,
                id_projet = :id_projet
            WHERE id_ticket = :id_ticket
        ");

        $visible_client = isset($_POST['visible_client']) ? 1 : 0;

        $update->execute([
            'titre_ticket' => $_POST['titre_ticket'],
            'date_ticket' => $_POST['date_ticket'],
            'responsable' => $_POST['responsable'],
            'statut' => $_POST['statut'],
            'description_ticket' => $_POST['description_ticket'],
            'date_de_fin' => $_POST['date_de_fin'] ?: null,
            'temps_passe' => $_POST['temps_passe'] ?: null,
            'visible_client' => $visible_client,
            'id_projet' => $_POST['id_projet'],
            'id_ticket' => $_GET['id']
        ]);

        $message = "<div class='alert alert-success'>✅ Ticket mis à jour avec succès.</div>";

        // Recharger les données mises à jour
        $stmt = $mysqlClient->prepare("SELECT * FROM ticket WHERE id_ticket = ?");
        $stmt->execute([$_GET['id']]);
        $ticket = $stmt->fetch();

    } catch (PDOException $e) {
        $message = "<div class='alert alert-danger'>❌ Erreur : " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mise à jour d’un ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">✏️ Modifier un ticket</h1>

    <?= $message ?>

    <?php if ($ticket): ?>
        <form method="POST" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="titre_ticket" class="form-label">Titre</label>
                <input type="text" name="titre_ticket" id="titre_ticket" class="form-control" required value="<?= safe($ticket['titre_ticket']) ?>">
            </div>

            <div class="mb-3">
                <label for="date_ticket" class="form-label">Date</label>
                <input type="date" name="date_ticket" id="date_ticket" class="form-control" required value="<?= safe($ticket['date_ticket']) ?>">
            </div>

            <div class="mb-3">
                <label for="responsable" class="form-label">Responsable</label>
                <select name="responsable" id="responsable" class="form-select">
                    <?php
                    $responsables = ['Evan', 'Fabien', 'Kim', 'Lola', 'Jean', 'Jérémy', 'Marius'];
                    echo "<option value=''>-- Sélectionner --</option>";
                    foreach ($responsables as $res) {
                        $selected = ($ticket['responsable'] === $res) ? 'selected' : '';
                        echo "<option value='$res' $selected>$res</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" id="statut" class="form-select" required>
                    <?php
                    $statuts = ['Nouveau', 'En cours', 'Fermé'];
                    foreach ($statuts as $s) {
                        $selected = ($ticket['statut'] === $s) ? 'selected' : '';
                        echo "<option value='$s' $selected>$s</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="description_ticket" class="form-label">Description</label>
                <textarea name="description_ticket" id="description_ticket" rows="3" class="form-control" required><?= safe($ticket['description_ticket']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="date_de_fin" class="form-label">Date de fin</label>
                <input type="date" name="date_de_fin" id="date_de_fin" class="form-control" value="<?= safe($ticket['date_de_fin']) ?>">
            </div>

            <div class="mb-3">
                <label for="temps_passe" class="form-label">Temps passé (heures)</label>
                <input type="number" name="temps_passe" id="temps_passe" step="0.01" min="0" class="form-control" value="<?= safe($ticket['temps_passe']) ?>">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="visible_client" id="visible_client" value="1" <?= $ticket['visible_client'] ? 'checked' : '' ?>>
                <label for="visible_client" class="form-check-label">Visible par le client</label>
            </div>

            <div class="mb-3">
                <label for="id_projet" class="form-label">Projet associé</label>
                <input type="number" name="id_projet" id="id_projet" class="form-control" value="<?= safe($ticket['id_projet']) ?>" required>
            </div>

            <button type="submit" class="btn btn-success">💾 Mettre à jour</button>
        </form>
    <?php elseif (!$message): ?>
        <div class="alert alert-warning">Aucun ticket sélectionné.</div>
    <?php endif; ?>
</div>
</body>

</html>
