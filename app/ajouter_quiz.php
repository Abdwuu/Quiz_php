<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'const.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $tempsLimite = $_POST['tempsLimite'];
    $autresProprietes = $_POST['autresProprietes'];


    QUIZBD->ajouter_quiz($titre, $description, $tempsLimite, $autresProprietes);

    header("Location: Acceuil.php");
    exit();
} else {
    echo "Le formulaire n'a pas été soumis.";
}