    -- Exercice 2 :  Creez une base de donnée.
    --     Nom de la bdd : php-pdo
    --     Nom de la table : Voiture
    --     Colonnes : Comme dans le formulaire 


CREATE DATABASE php-pdo;

CREATE TABLE Voiture(
    id_voiture int NOT NULL AUTO_INCREMENT,
    marque varchar(50) NOT NULL,
    modele varchar(50) NOT NULL,
    puissance int NOT NULL,
    annee date NOT NULL,
    couleur varchar(20) NOT NULL,
    PRIMARY KEY (id_voiture)
) ENGINE=InnoDB;

CREATE TABLE Conducteur(
    id_conducteur int NOT NULL AUTO_INCREMENT,
    nom varchar(20) NOT NULL,
    prenom varchar(20) NOT NULL,
    age int NOT NULL,
    permis varchar(20) NOT NULL,
    mail varchar(30) NOT NULL,
    ville varchar(20) NOT NULL,
    mdp varchar(20) NOT NULL,
    PRIMARY KEY (id_utilisateur)
) ENGINE=InnoDB;