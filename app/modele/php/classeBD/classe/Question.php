<?php


require_once ('IRender.php');

class Question implements IRender{


    private int $idQuestion;
    private int $idQuiz;
    private string $enonce;
    private string $typequestion;
    private int $lespts;
    private string $autre;

    private array $lesReponses;

    public function __construct($idQuestion,$idQuiz,$enonce,$typequestion,$lespts,$autre){
        $this->idQuestion = $idQuestion;
        $this->idQuiz = $idQuiz;
        $this->enonce = $enonce;
        $this->typequestion = $typequestion;
        $this->lespts = $lespts;
        $this->autre = $autre;
        $this->lesReponses = [];
    }

    public function getIdQuestion(){
        return $this->idQuestion;
    }

    public function getIdQuiz(){
        return $this->idQuiz;
    }

    public function getEnonce(){
        return $this->enonce;
    }

    public function getTypeQuestion(){
        return $this->typequestion;
    }

    public function getLesPts(){
        return $this->lespts;
    }

    public function getAutre(){
        return $this->autre;
    }

    public function getLesReponses(){
        return $this->lesReponses;
    }


    public function getLesReponsesForModif(){
        $html = "<div class='question'>";
        $html .= "<h2>$this->enonce</h2>";
        $html .= "<div class='options'>";
        
        foreach ($this->lesReponses as $reponse) {
            $html .= $reponse->modifrender();
        }
        $html .= "<div id='ajout$this->idQuestion'></div>";
        $html .= "<button onclick='ajout($this->idQuestion)'>Ajouter une reponse</button>";
        $html .= "</div>";
        $html .= "</div>";

        return $html;
    }


    public function setLesReponses(array $lesReponses){
        $this->lesReponses = $lesReponses;
    }

    public function setEnonce($enonce){
        $this->enonce = $enonce;
    }

    public function setTypeQuestion($typequestion){
        $this->typequestion = $typequestion;
    }

    public function setLesPts($lespts){
        $this->lespts = $lespts;
    }

    public function setAutre($autre){
        $this->autre = $autre;
    }


    public function render(): string{
        $html = "<div class='question'>";
        $html .= "<h2>$this->enonce</h2>";
        $html .= "<div class='options'>";

        foreach ($this->lesReponses as $reponse) {
            $html .= $reponse->render();
        }


        $html .= "</div>";
        $html .= "</div>";

        return $html;
    }





}