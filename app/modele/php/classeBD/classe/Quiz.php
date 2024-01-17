<?php



require_once ('IRender.php');


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

    public function setLesQuestions(array $lesQuestions){
        $this->lesQuestions = $lesQuestions;
    }


    public function render(): string{
        return "<option value='$this->idQuiz'>$this->titre</option>";
    }



}





