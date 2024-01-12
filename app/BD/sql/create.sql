

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