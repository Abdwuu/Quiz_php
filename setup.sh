#!/bin/bash

# Paramètres de connexion à la base de données MySQL
DB_NAME="quizz"
DB_USER="susu"
DB_PASSWORD="susu"

# Chemin vers le fichier SQL
SQL_FILE="sql/create.sql"

# Exécution du script SQL avec mysql
mysql  -u $DB_USER -p $DB_PASSWORD < $SQL_FILE

