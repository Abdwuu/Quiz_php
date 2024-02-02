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

    public function get_quiz_by_title($titre) {
        $requete="select * from QUIZZES where Titre = '$titre';";
        $resultat=$this->bd->query($requete);
        foreach ($resultat as $value) {
            return new Quiz(intval($value['QuizID']),$value['Titre'],$value['Description'],$value['TempsLimite'],$value['AutresProprietes']);            
        }
    
        return null;

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

    public function ajouter_quiz(string $titre, string $description, string $tempsLimite, string $autresProprietes){
        try{
            $requete = "insert into QUIZZES (Titre, Description, TempsLimite, AutresProprietes) values ('$titre', '$description', '$tempsLimite', '$autresProprietes');";
            $resultat = $this->bd->query($requete);
            if ($resultat) {
                return true;
            } else {
                return false;
            }
        }catch(Exception $e){
            return false;
        }

    }

    public function ajouter_un_quiz(Quiz $quiz){
        $requete = "insert into QUIZZES (Titre, Description, TempsLimite, AutresProprietes) values ('".$quiz->getTitre()."', '".$quiz->getDescription()."', '".$quiz->getTempsLimite()."', '".$quiz->getAutre()."');";
        $resultat = $this->bd->query($requete);
    }



    function calculerScoreEtFeedback($reponsesUtilisateur) {
        // Initialise le score total à zéro
        $scoreTotal = 0;
        $feedback = array();
    
        foreach ($reponsesUtilisateur as $idQuestion => $reponseUtilisateur) {
            // Obtient le nom de la question
            $nomQuestion = $this->getNomQuestion($idQuestion);
    
            $feedbackQuestion = array(
                'idQuestion' => $idQuestion,
                'nomQuestion' => $nomQuestion,
                'reponsesUtilisateur' => $reponseUtilisateur,
                'reponsesCorrectes' => array(),
                'correct' => false,
                'points' => 0
            );
    
            if (is_array($reponseUtilisateur)) {
                foreach ($reponseUtilisateur as $reponse) {
                    $feedbackQuestion['reponsesCorrectes'][] = $reponse;

                    if (is_array($reponse) && count($reponse) > 1){
                        foreach ($reponse as $value) {
                            $feedbackQuestion['correct'] = $this->reponseEstCorrecte($value);
                            $feedbackQuestion['points'] += $feedbackQuestion['correct'];
                        }
                    }else{
                        $feedbackQuestion['correct'] = $this->reponseEstCorrecte($reponse);
                        $feedbackQuestion['points'] += $feedbackQuestion['correct'];
                    }
                }
            } else {
                $feedbackQuestion['reponsesCorrectes'][] = $reponseUtilisateur;
                $feedbackQuestion['correct'] = $this->reponseEstCorrecte($reponseUtilisateur);
                $feedbackQuestion['points'] += $feedbackQuestion['correct'];
            }
    
            // Ajoute le feedback de la question à la liste globale
            $feedback[$nomQuestion] = $feedbackQuestion;
    
            // Ajoute les points correspondants au score total
            $scoreTotal += $feedbackQuestion['points'];
        }
    
        return array('scoreTotal' => $scoreTotal, 'feedback' => $feedback);
    }
    
    // Fonction pour obtenir le nom de la question
    private function getNomQuestion($idQuestion) {
        $requete = "select Enonce from QUESTIONS where QuestionID = '$idQuestion';";
        $resultat = $this->bd->query($requete);
        
        return ($resultat && $resultat->rowCount() > 0) ? $resultat->fetchColumn() : "Question #$idQuestion";
    }
    
    
    

    
    public function reponseEstCorrecte($reponse) {
        $requete = "select * from REPONSES where ReponseID = '$reponse';";
        $resultat = $this->bd->query($requete);
        foreach ($resultat as $value) {
            return intval($value['EstCorrecte']);
        }
        return 0;
    }


}

