<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Forum - Réponses</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .forum-container {
            margin: 2rem auto;
            max-width: 800px;
        }
        .question-card {
            background: #ffffff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        .response-card {
            background: #ffffff;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }
        .response-card .author {
            font-weight: bold;
            color: #007bff;
        }
        .response-card .timestamp {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .response-form textarea {
            resize: none;
        }
    </style>
</head>
<body>

<div class="forum-container">
    <!-- Question Section -->
    <div class="question-card">
        <h3>Comment apprendre à coder en Python ?</h3>
        <p>Je suis débutant et j'aimerais savoir par où commencer pour apprendre Python. Des conseils ?</p>
        <p class="text-muted">Posté par <strong>JohnDoe</strong> le 25 novembre 2024</p>
    </div>

    <!-- Responses Section -->
    <div class="responses">
        <h4>Réponses (3)</h4>

        <!-- Response 1 -->
        <div class="response-card">
            <p class="author">Alice</p>
            <p>C’est une excellente question ! Je recommande de commencer avec des tutoriels comme Codecademy ou de suivre des cours sur Udemy. Pratiquez beaucoup en essayant de créer des petits projets.</p>
            <p class="timestamp">Répondu le 25 novembre 2024 à 10:00</p>
        </div>

        <!-- Response 2 -->
        <div class="response-card">
            <p class="author">Bob</p>
            <p>Vous devriez également lire la documentation officielle de Python et rejoindre des forums comme Stack Overflow ou Reddit pour poser vos questions.</p>
            <p class="timestamp">Répondu le 25 novembre 2024 à 10:30</p>
        </div>

        <!-- Response 3 -->
        <div class="response-card">
            <p class="author">Charlie</p>
            <p>Python est très accessible ! Essayez d'installer Anaconda si vous voulez un environnement simple pour débuter avec Python et des bibliothèques comme NumPy ou pandas.</p>
            <p class="timestamp">Répondu le 25 novembre 2024 à 11:00</p>
        </div>
    </div>

    <!-- Add a Response Form -->
    <div class="response-form mt-4">
        <h4>Ajouter une réponse</h4>
        <form action="submit_response.php" method="POST">
            <div class="mb-3">
                <label for="response-text" class="form-label">Votre réponse</label>
                <textarea class="form-control" id="response-text" name="response" rows="4" placeholder="Rédigez votre réponse ici..." required></textarea>
            </div>
            <div class="mb-3">
                <label for="author-name" class="form-label">Votre nom</label>
                <input type="text" class="form-control" id="author-name" name="author" placeholder="Entrez votre nom" required>
            </div>
            <button type="submit" class="btn btn-primary">Publier</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
