
CREATE TABLE USER(
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(50),
    Prenom VARCHAR(50),
    MotDePasse VARCHAR(50),
    AutresProprietes VARCHAR(255)
);

-- Table QUIZZES
CREATE TABLE QUIZZES (
    QuizID INT AUTO_INCREMENT PRIMARY KEY,
    Titre VARCHAR(255),
    Description TEXT,
    TempsLimite INT, -- Temps limite en secondes (si applicable)
    AutresProprietes VARCHAR(255),
    CALL createBestScore(QuizID)
);

-- Table QUESTIONS
CREATE TABLE QUESTIONS (
    QuestionID INT AUTO_INCREMENT PRIMARY KEY,
    QuizID INT,
    Enonce TEXT,
    TypeQuestion VARCHAR(50), -- Choix multiple, vrai/faux, texte, etc.
    lesPoints INT,
    AutresProprietes VARCHAR(255),
    FOREIGN KEY (QuizID) REFERENCES QUIZZES(QuizID)
);

CREATE TABLE BESTNOTE (
    idBestNote INT AUTO_INCREMENT PRIMARY KEY,
    QuizID INT UNSIGNED,
    UserID INT UNSIGNED,
    Score INT,
    FOREIGN KEY (QuizID) REFERENCES QUIZZES(QuizID),
    FOREIGN KEY (UserID) REFERENCES USER(UserID)
);




-- Table Réponses
CREATE TABLE REPONSES (
    ReponseID INT AUTO_INCREMENT PRIMARY KEY,
    QuestionID INT,
    TexteReponse TEXT,
    EstCorrecte BOOLEAN,
    AutresProprietes VARCHAR(255),
    FOREIGN KEY (QuestionID) REFERENCES QUESTIONS(QuestionID)
);


-- Nous allons crée une procédure permettant à lorsque une nouveau quizz est créé, le bestscore est automatiquement créé à 0
CREATE PROCEDURE `createBestScore`(IN quizID INT)
BEGIN
    INSERT INTO BESTNOTE (QuizID, UserID, Score) VALUES (quizID, 0, 0);
END

-- -- Table Résultats
-- CREATE TABLE Resultats (
--     ResultatID INT PRIMARY KEY,
--     UserID INT,
--     QuizID INT,
--     Score INT,
--     DateHeureCompletion DATETIME,
--     AutresProprietes VARCHAR(255),
--     FOREIGN KEY (UserID) REFERENCES Utilisateurs(UserID),
--     FOREIGN KEY (QuizID) REFERENCES QUIZZES(QuizID)
-- );