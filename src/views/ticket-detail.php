<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- /src/views/ticket-detail.php -->
    <h1>Créer un ticket</h1>

    <form action="/ticket-creer" method="POST">
        <label for="titre_ticket">Titre :</label><br>
        <input type="text" id="titre_ticket" name="titre_ticket" required><br><br>

        <label for="date_ticket">Date :</label><br>
        <input type="date" id="date_ticket" name="date_ticket" required><br><br>

        <label for="structure">Structure :</label><br>
        <input type="text" id="structure" name="structure"><br><br>

        <label for="responsable">Responsable :</label><br>
        <input type="text" id="responsable" name="responsable"><br><br>

        <label for="statut">Statut :</label><br>
        <select id="statut" name="statut" required>
            <option value="Nouveau">Nouveau</option>
            <option value="En cours">En cours</option>
            <option value="Fermé">Fermé</option>
        </select><br><br>

        <label for="description_ticket">Description :</label><br>
        <textarea id="description_ticket" name="description_ticket" required></textarea><br><br>

        <label for="date_de_fin">Date de fin :</label><br>
        <input type="date" id="date_de_fin" name="date_de_fin"><br><br>

        <label for="temps_passe">Temps passé (heures) :</label><br>
        <input type="number" id="temps_passe" name="temps_passe" step="0.1" min="0"><br><br>

        <label for="visible_client">Visible par le client :</label><br>
        <input type="checkbox" id="visible_client" name="visible_client" value="1"><br><br>

        <label for="id_site">ID du site :</label><br>
        <input type="number" id="id_site" name="id_site"><br><br>

        <button type="submit">Créer le ticket</button>
    </form>


</body>

</html>