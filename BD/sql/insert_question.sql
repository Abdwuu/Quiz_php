-- Ajout d'un quiz sur les dessins animés
INSERT INTO QUIZZES (QuizID, Titre, Description, TempsLimite, AutresProprietes)
VALUES (1, 'Quiz sur les Dessins Animés', 'Testez vos connaissances sur les dessins animés', 300, 'Difficulté: Facile');

-- Ajout de QUESTIONS pour le quiz sur les dessins animés
INSERT INTO QUESTIONS (QuestionID, QuizID, Enonce, TypeQuestion, AutresProprietes)
VALUES
    (1, 1, "Qui est l\'éternel ennemi de Tom dans Tom et Jerry ?", 'Choix multiple', 'Difficulté: Facile'),
    (2, 1, 'Quel personnage vit dans un ananas sous la mer ?', 'Choix multiple', 'Difficulté: Facile'),
    (3, 1, 'Quel personnage porte un chapeau magique dans Fantasia ?', 'Choix multiple', 'Difficulté: Moyenne');
    
-- Ajout de réponses pour les QUESTIONS

INSERT INTO REPONSES (ReponseID, QuestionID, TexteReponse, EstCorrecte, AutresProprietes)
VALUES
    (1, 1, 'Jerry', FALSE, 'Autre option'),
    (2, 1, 'Spike', FALSE, 'Autre option'),
    (3, 1, 'Butch', TRUE, 'Autre option'),
    (4, 1, 'Tyke', FALSE, 'Autre option'),
    (5, 2, 'Bob l\'éponge', FALSE, 'Autre option'),
    (6, 2, 'SpongeBob SquarePants', TRUE, 'Autre option'),
    (7, 2, 'Patrick Star', FALSE, 'Autre option'),
    (8, 3, 'Mickey Mouse', FALSE, 'Autre option'),
    (9, 3, 'Donald Duck', FALSE, 'Autre option'),
    (10, 3, 'Sorcerer\'s Apprentice', TRUE, 'Autre option');