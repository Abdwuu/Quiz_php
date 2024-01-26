
<?php

require_once 'classe/Reponse.php';


class ReponseBD{



    private $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function get_reponse($idQuestion,string $proprieter ){
        
        $requete = "select * from REPONSES where QuestionID = '$idQuestion';";
        $resultat = $this->bd->query($requete);
        $lesReponses = [];

        foreach ($resultat as $value) {
            $lesReponses[] = new Reponse($value['ReponseID'],$value['QuestionID'],$value['TexteReponse'],$value['EstCorrecte'],$proprieter);
        }

        return $lesReponses;
    }



}