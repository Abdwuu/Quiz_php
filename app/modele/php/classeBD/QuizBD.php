<?php

require_once 'classe/Quiz.php';
require_once 'QuestionBD.php';
class QuizBD{

    private $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function get_all_quiz(){
        $requete="select * from QUIZZES;";
        $resultat=$this->bd->query($requete);
        $lesquiz = [];
        foreach ($resultat as $value) {
            $lesquiz[] = new Quiz(intval($value['QuizID']),$value['Titre'],$value['Description'],intval($value['TempsLimite']),$value['AutresProprietes']);
        }
    
    
        return $lesquiz;
    }

    public function get_quiz(int $idQuiz){
        $requete="select * from QUIZZES where QuizID = '$idQuiz';";
        $requete_get_question = "select * from QUESTIONS where QuizID = '$idQuiz';";
        $resultat=$this->bd->query($requete);
        $lesquiz = [];
        foreach ($resultat as $value) {
            $lequiz = new Quiz(intval($value['QuizID']),$value['Titre'],$value['Description'],intval($value['TempsLimite']),$value['AutresProprietes']);
            $lequiz->setLesQuestions();
            $lesquiz[] = 
        }
    
    
        return $lesquiz;
    }

    public function getBestScores(int $idQuiz){
        $requete = "select * from BESTSCORES where QuizID = '$idQuiz' order by Score desc;";
        $resultat = $this->bd->query($requete);
        $lesScores = [];
        foreach ($resultat as $value) {
            $lesScores[$resultat] = $value;
        }
        if (count($lesScores) == 0){
            return 0;
        }
        return $lesScores;
    }


}

?>