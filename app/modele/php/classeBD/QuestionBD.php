<?php

require_once 'classe/Question.php';
require_once 'ReponseBD.php';


class QuestionBD{

    private $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }


    public function get_question(int $idQuiz){
        
        $requete = "select * from QUESTIONS where QuizID = '$idQuiz';";
        $resultat = $this->bd->query($requete);
        $lesQuestion = [];

        foreach ($resultat as $value) {
            $uneQuestion = new Question($value['QuestionID'],$value['QuizID'],$value['Enonce'],$value['TypeQuestion'],$value['lesPoints'],$value['AutresProprietes']);
            $uneQuestion->setLesReponses((new ReponseBD($this->bd))->get_reponse($value['QuestionID'],$value['TypeQuestion']));
            $lesQuestion[] = $uneQuestion;
        }

        return $lesQuestion;
    } 

    

}





?>