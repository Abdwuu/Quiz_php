<?php


require_once('connexion.php');
$connexion=connect_bd();

function get_questions(){
    global $connexion;
    $requete="select * from QUIZZES;";
    $resultat=$connexion->query($requete);
    return $resultat;
}

function get_titre_quizz(){

    $question = get_questions();
    $titre_quizz = [];
    foreach ($question as $value) {
        $titre_quizz[] = $value['Titre'];
    }

    return $titre_quizz;

}

function get_question_quizz($titre_quizz){

    global $connexion;
    $requete="select * from QUIZZES where Titre = '$titre_quizz';";
    $resultat=$connexion->query($requete);
    return $resultat;

}

