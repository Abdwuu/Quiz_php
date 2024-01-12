<?php

require_once 'IRender.php';
require_once('IRender.php');


class Reponse implements IRender{

    private int $idReponse;
    private int $idQuestion;
    private string $TexteReponse;
    private bool $valide;

    public function __construct(int $idReponse,int $idQuestion,string $TexteReponse,bool $valide){
        $this->idReponse = $idReponse;
        $this->idQuestion = $idQuestion;
        $this->TexteReponse = $TexteReponse;
        $this->valide = $valide;
    }

    public function getIdReponse(){
        return $this->idReponse;
    }

    public function getIdQuestion(){
        return $this->idQuestion;
    }

    public function getTexteReponse(){
        return $this->TexteReponse;
    }

    public function getValide(){
        return $this->valide;
    }

    public function render(): string{
        return "<label><input type='radio' name='$this->idQuestion' value='$this->valide'>$this->TexteReponse</label>";
    }

}




?>