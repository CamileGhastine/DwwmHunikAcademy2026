-- ========================================
-- TABLES FILM, AVIS ET RÉALISATEUR
-- ========================================

-- Création de la table realisateur
CREATE TABLE realisateur (
    id INT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    sexe TINYINT,
    nationalite VARCHAR(50)
);

-- Insertion des données dans realisateur
INSERT INTO realisateur (id, nom, prenom, sexe, nationalite) VALUES
(16, 'Scott', 'Ridley', 0, 'uk'),
(22, 'Aronofsky', 'Darren', 0, 'us'),
(47, 'Jenkins', 'Patty', 1, 'us'),
(66, 'Ritchie', 'Guy', 0, 'uk');

-- Ajout des réalisateurs manquants
INSERT INTO realisateur (id, nom, prenom, sexe, nationalite) VALUES
(61, 'Fincher', 'David', 0, 'us'),
(85, 'Moshé', 'Noble', 0, 'us');

-- Création de la table film
CREATE TABLE film (
    id INT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    id_realisateur INT,
    FOREIGN KEY (id_realisateur) REFERENCES realisateur(id)
);

-- Insertion des données dans film
INSERT INTO film (id, nom, id_realisateur) VALUES
(121, 'Requiem for a Dream', 22),
(546, 'Gladiator', 16),
(666, 'Fight Club', 61),
(775, 'Blade Runner', 16),
(984, 'Seul sur Mars', 16),
(986, 'Black Swan', 22),
(987, 'Wonder Woman', 47),
(988, 'The Tomorrow Man', 85);

-- Création de la table avis
CREATE TABLE avis (
    id INT PRIMARY KEY,
    id_film INT,
    note DECIMAL(3,1),
    FOREIGN KEY (id_film) REFERENCES film(id)
);

-- Insertion des données dans avis
INSERT INTO avis (id, id_film, note) VALUES
(1, 546, 4.5),
(2, 546, 2.5),
(3, 775, 5),
(4, 984, 3.5),
(5, 987, 3.1),
(6, 666, 4.2),
(7, 986, 3),
(8, 986, 4.3),
(9, 121, 1);
