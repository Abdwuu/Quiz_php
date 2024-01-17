<?php

$titre = $_POST['titre'];
$description = $_POST['description'];
$tempsLimite = $_POST['tempsLimite'];

$sql = "INSERT INTO QUIZZES (Titre, DescriptionQ, TempsLimite) VALUES (?, ?, ?)";
$stmt = $BD->prepare($sql);
$stmt->execute([$titre, $description, $tempsLimite]);

header("Location: Accueil.php");
exit();