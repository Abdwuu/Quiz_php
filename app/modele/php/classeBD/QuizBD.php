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
 
    public function get_quiz($idQuiz) : Quiz{
        $requete="select * from QUIZZES where QuizID = '$idQuiz';";
        $resultat=$this->bd->query($requete);
        $lequiz = new Quiz(-1,"Quiz Non trouvée","","","");
        foreach ($resultat as $value) {
            $lequiz = new Quiz(intval($value['QuizID']),$value['Titre'],$value['Description'],$value['TempsLimite'],$value['AutresProprietes']);
            
        }
    
    
        return $lequiz;
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

    public function addBestScore(int $idQuiz, int $score, string $nom){
        $requete = "update BESTSCORES SET Score = '$score', Nom = '$nom' WHERE QuizID = '$idQuiz' and Score < '$score';";
        $resultat = $this->bd->query($requete);
        
    }

}

