
CREATE TABLE USER(
    Nom VARCHAR(50) PRIMARY KEY,
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
    AutresProprietes VARCHAR(255)
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
    QuizID INT,
    UserID INT,
    Score INT,
    PRIMARY KEY (QuizID, UserID),
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