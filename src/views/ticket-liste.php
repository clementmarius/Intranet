<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4 text-center">📋 Liste des tickets</h1>

        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="/api/ticket-creer" class="btn btn-primary">Ajouter un ticket</a>
            <a href="/api/projets" class="btn btn-primary">Voir les projets</a>
        </div>

        <!-- Filtres -->
        <form id="filter-form" class="row g-3 mb-4">
            <div class="col-md-4">
                <label for="projet" class="form-label">Projet</label>
                <select id="projet" name="projet_id" class="form-select">
                    <option value="">Tous les projets</option>
                    <?php foreach ($projets as $projet) : ?>
                        <option value="<?= $projet['id'] ?>"><?= htmlspecialchars($projet['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="responsable" class="form-label">Responsable</label>
                <select id="responsable" name="responsable" class="form-select">
                    <option value="">Tous les responsables</option>
                    <option value="Evan">Evan</option>
                    <option value="Fabien">Fabien</option>
                    <option value="Kim">Kim</option>
                    <option value="Lola">Lola</option>
                    <option value="Jean">Jean</option>
                    <option value="Jérémy">Jérémy</option>
                    <option value="Marius">Marius</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="statut" class="form-label">Statut</label>
                <select id="statut" name="statut" class="form-select">
                    <option value="">Tous les statuts</option>
                    <option value="Ouvert">Ouvert</option>
                    <option value="En cours">En cours</option>
                    <option value="Fermé">Fermé</option>
                </select>
            </div>
        </form>

        <!-- Tableau des tickets -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Responsable</th>
                        <th>Statut</th>
                        <th>Description</th>
                        <th>Date de fin</th>
                        <th>Temps passé</th>
                        <th>Projet</th>
                        <th>Visible client</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="ticket-table-body">
                    <?php foreach ($tickets as $ticket) : ?>
                        <tr>
                            <td><?= htmlspecialchars($ticket['id_ticket'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['titre_ticket'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['date_ticket'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['responsable'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['statut'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['description_ticket'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['date_de_fin'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['temps_passe'] ?? '') ?></td>
                            <td><?= htmlspecialchars($ticket['nom_projet'] ?? '') ?></td>
                            <td><?= !empty($ticket['visible_client']) ? 'Oui' : 'Non' ?></td>
                            <td>
                                <a href="/api/ticket-update/<?= $ticket['id_ticket'] ?>" class="btn btn-sm btn-warning">✏️ Modifier</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script AJAX -->
    <script>
        document.querySelectorAll('#filter-form select').forEach(select => {
            select.addEventListener('change', () => {
                const formData = new FormData(document.getElementById('filter-form'));

                fetch('/api/tickets/filter', {
                        method: 'POST',
                        body: formData
                    })
                    .then(res => res.text())
                    .then(html => {
                        document.getElementById('ticket-table-body').innerHTML = html;
                    })
                    .catch(err => {
                        console.error("Erreur lors du filtrage :", err);
                        alert("Une erreur est survenue.");
                    });
            });
        });
    </script>
</body>

</html>