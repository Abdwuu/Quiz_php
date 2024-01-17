<!DOCTYPE html>
<html>
<head>
    <title>Créer un Quiz</title>
</head>
<body>
    <h1>Créer un Quiz</h1>
    <form action="/BD/php/creer_quiz_bd.php" method="post">
        <label for="titre">Titre:</label><br>
        <input type="text" id="titre" name="titre"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="tempsLimite">Temps Limite (en secondes):</label><br>
        <input type="number" id="tempsLimite" name="tempsLimite"><br>
        <input type="submit" value="Créer">
    </form>
</body>
</html>
