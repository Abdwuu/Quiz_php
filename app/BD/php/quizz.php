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
    


    public function render(): string{
        return "<option value='$this->idQuiz'>$this->titre</option>";
    }



}





