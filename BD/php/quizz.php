<?php


require_once('connexion.php');
$connexion=connect_bd();

function get_questions(){
    global $connexion;
    $requete="SELECT * FROM QUIZZES";
    $resultat=$connexion->query($requete);
    $questions=$resultat->fetchAll(PDO::FETCH_ASSOC);
    return $questions;
}

