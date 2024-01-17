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
        $requete = "select * from BESTNOTE where QuizID = '$idQuiz';";
        $resultat = $this->bd->query($requete);
        foreach ($resultat as $value) {
            return intval($value['Score']);
        }
        return 0;
    }

    public function addBestScore(int $idQuiz, int $score, string $nom){
        $id = $this->get_id_User($nom);

        $requete = "update BESTNOTE SET Score = '$score', UserID = '$id' where QuizID = '$idQuiz';";
        $resultat = $this->bd->query($requete);
        
    }

    private function get_id_User(string $nom){
        $requete = "select * from USER where Nom = '$nom';";
        $resultat = $this->bd->query($requete);
        $id = -1;
        foreach ($resultat as $value) {
            $id = intval($value['UserID']);
        }
        return $id;
    }

    public function ajouter_quiz(string $titre, string $description, int $tempsLimite, string $autresProprietes){
        $requete = "insert into QUIZZES (Titre, Description, TempsLimite, AutresProprietes) values ('$titre', '$description', '$tempsLimite', '$autresProprietes');";
        $resultat = $this->bd->query($requete);
    }

}

