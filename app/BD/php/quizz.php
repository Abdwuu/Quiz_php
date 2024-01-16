<?php


require_once('connexion.php');
require ('Question.php');
require_once ('IRender.php');

$connexion=connect_bd();

class Quiz implements IRender{

    private int $idQuiz;
    private string $titre;
    private string $description;
    private int $tempslimite;

    private string $autre;

    private array $lesQuestions;

    public function __construct(int $idQuiz,string $titre,string $description,int $tempslimite,string $autre){
        $this->idQuiz = $idQuiz;
        $this->titre = $titre;
        $this->description = $description;
        $this->tempslimite = $tempslimite;
        $this->autre = $autre;
        $this->lesQuestions = [];
        $this->setLesQuestions();
    }

    public function getIdQuiz(){
        return $this->idQuiz;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getTempsLimite(){
        return $this->tempslimite;
    }

    public function getAutre(){
        return $this->autre;
    }

    public function getLesQuestions(){
        return $this->lesQuestions;
    }

    public function setLesQuestions(){

        $bd = connect_bd();
        $requete = "select * from QUESTIONS where QuizID = '$this->idQuiz';";
        $resultat = $bd->query($requete);
        $lesQuestions = [];

        foreach ($resultat as $value) {
            $lesQuestions[] = new Question($value['QuestionID'],$value['QuizID'],$value['Enonce'],$value['TypeQuestion'],$value['lesPoints'],$value['AutresProprietes']);
        }

        $this->lesQuestions = $lesQuestions;

    }

    public static function get_all_quiz(){
        global $connexion;
        $requete="select * from QUIZZES;";
        $resultat=$connexion->query($requete);
        $lesquiz = [];
        foreach ($resultat as $value) {
            $lesquiz[] = new Quiz(intval($value['QuizID']),$value['Titre'],$value['Description'],intval($value['TempsLimite']),$value['AutresProprietes']);
        }
    
    
        return $lesquiz;
    }

    public static function get_Quiz(int $idQuiz) : Quiz{
        $bd = connect_bd();
        $requete = "select * from QUIZZES where QuizID = '$idQuiz';";
    
        $resultat = $bd->query($requete);
        foreach ($resultat as $value) {
            $quiz = new Quiz(intval($value['QuizID']),$value['Titre'],$value['Description'],intval($value['TempsLimite']),$value['AutresProprietes']);
            return $quiz;
        }
    
        return new Quiz(-1,"Quiz non trouvée","",0,"");
        
    }

    public static function getBestScores(int $idQuiz){
        $bd = connect_bd();
        $requete = "select * from BESTSCORES where QuizID = '$idQuiz' order by Score desc;";
        $resultat = $bd->query($requete);
        $lesScores = [];
        foreach ($resultat as $value) {
            $lesScores[$resultat] = $value;
        }
        if (count($lesScores) == 0){
            return 0;
        }
        return $lesScores;
    }

    public function addBestScore(string $nom,int $score){
        $bd = connect_bd();
        $existe = false;
        $requete = "select * from BESTSCORES where QuizID = '$this->idQuiz' order by Score desc;";
        $resultat = $bd->query($requete);
        $lesScores = [];
        
    }
    
    public function createQuiz(){
        $bd = connect_bd();
        $requete = "insert into QUIZZES (Titre,Description,TempsLimite,AutresProprietes) values ('$this->titre','$this->description','$this->tempslimite','$this->autre');";
        $bd->exec($requete);
    }

    public function updateQuiz(){
        $bd = connect_bd();
        $requete = "update QUIZZES set Titre = '$this->titre', Description = '$this->description', TempsLimite = '$this->tempslimite', AutresProprietes = '$this->autre' where QuizID = '$this->idQuiz';";
        $bd->exec($requete);
    }

    public function addQuestion(Question $question){
        $bd = connect_bd();
        $requete = "insert into QUESTIONS (QuizID,Enonce,TypeQuestion,lesPoints,AutresProprietes) values ('$this->idQuiz',$question->getEnonce()','$question->getTypeQuestion()','$question->getLesPoints()','$question->getAutresProprietes()');";
        $bd->exec($requete);
    }

    public function render(): string{
        return "<option value='$this->idQuiz'>$this->titre</option>";
    }



}





