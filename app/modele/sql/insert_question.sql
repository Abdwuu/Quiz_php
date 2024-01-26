INSERT INTO USER (UserID, Nom, Prenom, MotDePasse, AutresProprietes)
VALUES
    (1, 'free', 'free', 'free', 'free'),
    (2, 'Doe', 'Jane', '123456', 'Autre option'),
    (3, 'Doe', 'Jack', '123456', 'Autre option');

-- Ajout d'un quiz sur les dessins animés
INSERT INTO QUIZZES (QuizID, Titre, Description, TempsLimite, AutresProprietes)
VALUES 
    (1, 'Quiz sur les Dessins Animés', 'Testez vos connaissances sur les dessins animés', 300, 'Difficulté: Facile'),
    (2, "Quiz sur les films d'action", "Testez vos connaissances sur les films d'action", 300, 'Difficulté: Moyenne'),
    (3, "Quiz sur les jeux vidéo", "Testez vos connaissances sur les jeux vidéo", 300, 'Difficulté: Difficile');
    

-- Ajout de QUESTIONS pour le quiz sur les dessins animés
INSERT INTO QUESTIONS (QuestionID, QuizID, Enonce, TypeQuestion,lesPoints, AutresProprietes)
VALUES
    (1, 1, "Qui est l\'éternel ennemi de Tom dans Tom et Jerry ?", 'Choix unique',1 ,'Difficulté: Facile'),
    (2, 1, 'Quel personnage vit dans un ananas sous la mer ?', 'Choix unique',1 ,'Difficulté: Facile'),
    (3, 1, 'Quel personnage porte un chapeau magique dans Fantasia ?', 'Choix unique',1 ,'Difficulté: Moyenne'),
    (4, 2, 'Quel acteur joue le rôle de John Wick ?', 'Choix unique',1 ,'Difficulté: Moyenne'),
    (5, 2, 'Quel acteur joue le rôle de John McClane dans Die Hard ?', 'Choix unique',1 ,'Difficulté: Moyenne'),
    (6, 2, 'Quel acteur joue le rôle de John Rambo dans Rambo ?', 'Choix unique',1 ,'Difficulté: Moyenne'),
    (7, 3, 'Quel est le nom du personnage principal dans The Legend of Zelda ?', 'Choix unique',1 ,'Difficulté: Difficile'),
    (8, 3, 'Quel est le nom du personnage principal dans Final Fantasy ?', 'Choix unique',1 ,'Difficulté: Difficile'),
    (9, 3, 'Quel est le nom du personnage principal dans Metal Gear Solid ?', 'Choix unique',1 ,'Difficulté: Difficile'),
    (10, 1,'Quels sont les personnages faisant partie du dessin animé "Les Winx"','Choix multiple',1 ,'Difficulté: Difficile');
    
-- Ajout de réponses pour les QUESTIONS

INSERT INTO REPONSES (ReponseID, QuestionID, TexteReponse, EstCorrecte, AutresProprietes)
VALUES
    (1, 1, 'Jerry', FALSE, 'Autre option'),
    (2, 1, 'Spike', FALSE, 'Autre option'),
    (3, 1, 'Butch', TRUE, 'Autre option'),
    (4, 1, 'Tyke', FALSE, 'Autre option'),
    (5, 2, "Bob l\'éponge", FALSE, 'Autre option'),
    (6, 2, 'SpongeBob SquarePants', TRUE, 'Autre option'),
    (7, 2, 'Patrick Star', FALSE, 'Autre option'),
    (8, 3, 'Mickey Mouse', FALSE, 'Autre option'),
    (9, 3, 'Donald Duck', FALSE, 'Autre option'),
    (10, 3, "Sorcerer\'s Apprentice", TRUE, 'Autre option'),
    (11, 4, 'Keanu Reeves', TRUE, 'Autre option'),
    (12, 4, 'Bruce Willis', FALSE, 'Autre option'),
    (13, 4, 'Sylvester Stallone', FALSE, 'Autre option'),
    (14, 5, 'Keanu Reeves', FALSE, 'Autre option'),
    (15, 5, 'Bruce Willis', TRUE, 'Autre option'),
    (16, 5, 'Sylvester Stallone', FALSE, 'Autre option'),
    (17, 6, 'Keanu Reeves', FALSE, 'Autre option'),
    (18, 6, 'Bruce Willis', FALSE, 'Autre option'),
    (19, 6, 'Sylvester Stallone', TRUE, 'Autre option'),
    (20, 7, 'Link', TRUE, 'Autre option'),
    (21, 7, 'Zelda', FALSE, 'Autre option'),
    (22, 7, 'Ganondorf', FALSE, 'Autre option'),
    (23, 8, 'Cloud', TRUE, 'Autre option'),
    (24, 8, 'Tifa', FALSE, 'Autre option'),
    (25, 8, 'Aerith', FALSE, 'Autre option'),
    (26, 9, 'Solid Snake', TRUE, 'Autre option'),
    (27, 9, 'Liquid Snake', FALSE, 'Autre option'),
    (28, 9, 'Big Boss', FALSE, 'Autre option'),
    (29,10, 'Bloom', TRUE, 'Autre option'),
    (30,10, 'Stella', TRUE, 'Autre option'),
    (31,10, 'Sulfus', FALSE, 'Autre option'),
    (32,10, 'Musa', TRUE, 'Autre option'),
    (33,10, 'Dolce', FALSE, 'Autre option');
