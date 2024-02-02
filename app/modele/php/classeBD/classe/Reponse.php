<?php


class Reponse implements IRender{

    private int $idReponse;
    private int $idQuestion;
    private string $TexteReponse;
    private bool $valide;

    private string $proprieter;

    public function __construct(int $idReponse,int $idQuestion,string $TexteReponse,bool $valide,string $proprieter){
        $this->idReponse = $idReponse;
        $this->idQuestion = $idQuestion;
        $this->TexteReponse = $TexteReponse;
        $this->valide = $valide;
        $this->proprieter = $proprieter;
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
        if ($this->proprieter == "Choix multiple") {
        return "<label><input type='checkbox' name='question{$this->idQuestion}' value='{$this->valide}'" . ($this->valide == 1 ? ' checked' : '') . "> : <input type='text' name='question{$this->idReponse}' value='{$this->TexteReponse}'> Case Cocher = Bonne reponse </label>";
    }
    return "<label><input type='radio' name='question{$this->idQuestion}' value='{$this->valide}'" . ($this->valide == 1 ? ' checked' : '') . "> : <input type='text' name='question{$this->idReponse}' value='{$this->TexteReponse}'> Case Cocher = Bonne reponse </label>";
}
    

    public function render(): string{
        if ($this->proprieter == "Choix multiple") {
            return "<label><input placeholder='Votre nouvelle reponse' type='checkbox' name='question{$this->idQuestion}[]' value='{$this->idReponse}'>$this->TexteReponse</label>";
        }   
        return "<label><input placeholder='Votre nouvelle reponse' type='radio' name=question$this->idQuestion value='$this->idReponse' required>$this->TexteReponse</label>";
    }

}



?>