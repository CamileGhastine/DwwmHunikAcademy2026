-- Création de la table etudiant
CREATE TABLE etudiant (
    id INT PRIMARY KEY,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(50) NOT NULL
);

-- Insertion des données dans etudiant
INSERT INTO etudiant (id, prenom, nom) VALUES
(30, 'Joseph', 'Biblo'),
(31, 'Paul', 'Bismuth'),
(32, 'Jean', 'Michel'),
(33, 'Ted', 'Bundy'),
(34, 'Caroline', 'Martinez'),
(35, 'Joséphine', 'Henry');

-- Création de la table examen
CREATE TABLE examen (
    id INT PRIMARY KEY,
    id_examen INT,
    id_etudiant INT,
    matiere VARCHAR(100) NOT NULL,
    note DECIMAL(4,2),
    FOREIGN KEY (id_etudiant) REFERENCES etudiant(id)
);

-- Insertion des données dans examen
INSERT INTO examen (id, id_examen, id_etudiant, matiere, note) VALUES
(788, 453, 30, 'Histoire-Geographie', 10.5),
(789, 873, 33, 'Mathématiques', 14),
(790, 873, 34, 'Mathématiques', 4),
(791, 453, 31, 'Histoire-Geographie', 15.5),
(792, 453, 32, 'Histoire-Geographie', 8),
(793, 873, 31, 'Mathématiques', 14),
(794, 453, 33, 'Histoire-Geographie', 9.5),
(796, 453, 34, 'Histoire-Geographie', 17),
(797, 873, 30, 'Mathématiques', 7.5);
