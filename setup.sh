#!/bin/bash

# Paramètres de connexion à la base de données MySQL
DB_HOST="servinfo-maria"
DB_NAME="DBfofana"
DB_USER="fofana"
DB_PASSWORD="fofana"

# Chemin vers le fichier SQL
SQL_FILE="sql/create.sql"

# Exécution du script SQL avec mysql
mysql -h $DB_HOST -u $DB_USER -p $DB_PASSWORD < $SQL_FILE

