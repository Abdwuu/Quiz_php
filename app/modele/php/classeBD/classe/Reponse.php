<?php


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



    public function modifrender(): string{
        return "<label><input type='checkbox' name='question{$this->idQuestion}' value='{$this->valide}'" . ($this->valide == 1 ? ' checked' : '') . "> : <input type='text' name='question{$this->idQuestion}' value='{$this->TexteReponse}'> Case Cocher = Bonne reponse </label>";
    }
    

    public function render(): string{
        return "<label><input placeholder='Votre nouvelle reponse' type='radio' name=question'$this->idQuestion' value='$this->valide' required>$this->TexteReponse</label>";
    }

}




?>