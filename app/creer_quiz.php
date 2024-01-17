<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/CSS/creer_quiz.css">
    <title>Créer un Quiz</title>   
</head>
<body>
    <div class="container">
        <h1>Créer un nouveau Quiz</h1>

        <form action="ajouter_quiz.php" method="post">
            <label for="titre">Titre du Quiz :</label>
            <input type="text" id="titre" name="titre" required>

            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>

            <label for="tempsLimite">Temps Limite (en minutes) :</label>
            <input type="number" id="tempsLimite" name="tempsLimite" required>

            <label for="autresProprietes">Autres Propriétés :</label>
            <textarea id="autresProprietes" name="autresProprietes"></textarea>

            <button type="submit">Créer le Quiz</button>
        </form>
    </div>
</body>
</html>