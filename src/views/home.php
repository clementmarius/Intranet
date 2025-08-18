<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Intranet ACCK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6c63ff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: rgba(255, 255, 255, 0.9);
            padding: 1.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .section-card {
            border-radius: 15px;
            padding: 2rem;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .section-card:hover {
            transform: translateY(-5px);
        }

        footer {
            margin-top: auto;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header class="text-center">
        <h1 class="fw-bold text-primary">Intranet ACCK</h1>
        <p class="text-muted mb-0">Bienvenue sur la plateforme interne de gestion</p>
    </header>

    <!-- CONTENU -->
    <main class="container py-5">
        <div class="row g-4">

            <!-- Tickets -->
            <div class="col-md-4">
                <div class="section-card text-center">
                    <h2 class="h4 mb-4">🎫 Tickets</h2>
                    <a href="/api/ticket-liste" class="btn btn-outline-primary btn-lg w-100 mb-3">📋 Voir la liste</a>
                    <a href="/api/ticket-creer" class="btn btn-primary btn-lg w-100">➕ Créer un ticket</a>
                </div>
            </div>

            <!-- Projets -->
            <div class="col-md-4">
                <div class="section-card text-center">
                    <h2 class="h4 mb-4">📂 Projets</h2>
                    <a href="/api/projets" class="btn btn-outline-primary btn-lg w-100 mb-3">📋 Voir la liste</a>
                    <a href="/api/projet-creer" class="btn btn-primary btn-lg w-100">➕ Créer un projet</a>
                </div>
            </div>

            <!-- Clients -->
            <div class="col-md-4">
                <div class="section-card text-center">
                    <h2 class="h4 mb-4">👥 Clients</h2>
                    <a href="/api/clients" class="btn btn-outline-primary btn-lg w-100 mb-3">📋 Voir la liste</a>
                    <a href="/api/client-creer" class="btn btn-primary btn-lg w-100">➕ Ajouter un client</a>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <p>© 2025 Intranet ACCK - Développé par l'équipe interne</p>
    </footer>

</body>

</html>