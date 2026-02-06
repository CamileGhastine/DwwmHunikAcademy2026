SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

-- Création de la table comment
CREATE TABLE comment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    content VARCHAR(255) NOT NULL
);
ALTER TABLE comment ADD id_user INT NOT NULL AFTER content;

-- Insertion de 5 phrases du jour
INSERT INTO comment (content, id_user) VALUES 
('Petit à petit, l''oiseau fait son nid', 1),
('Mieux vaut tard que jamais', 2),
('L''important ce n''est pas ce que l''on a en soit, mais c''est ce que l''on sort de soit', 1),
('Qui ne tente rien n''a rien', 3),
('La patience est mère de toutes les vertus', 1);

CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO user (pseudo, password) VALUES 
('toto', '$2y$10$RHH5yuqGe/6MHbsKw/vb1emeGPFhXabBeOAyvFNrNg6hzInSbfKWW'),
('tictac', '$2y$10$RHH5yuqGe/6MHbsKw/vb1emeGPFhXabBeOAyvFNrNg6hzInSbfKWW'),
('jean', '$2y$10$RHH5yuqGe/6MHbsKw/vb1emeGPFhXabBeOAyvFNrNg6hzInSbfKWW');
