<?php
function monAutoloader($nomClasse) {
    // Convertit le namespace en chemin relatif
    $cheminFichier = str_replace('\\', '/', $nomClasse) . '.php';

    // Vérifie si le fichier existe
    if (file_exists($cheminFichier)) {
        include $cheminFichier;
    }
}

// Enregistre l'autoloader
spl_autoload_register('monAutoloader');




?>
