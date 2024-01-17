<?php

require_once 'config/connexion.php';
require_once 'modele/php/classeBD/QuizBD.php';
require_once 'modele/php/classeBD/QuestionBD.php';


$BD = connect_bd();

$QUIZBD = new QuizBD($BD);

$QUESTIONBD = new QuestionBD($BD);

session_start(); // N'oubliez pas de démarrer la session


?>
