SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

-- Création de la table comment
CREATE TABLE comment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    content VARCHAR(255) NOT NULL
);

-- Insertion de 5 phrases du jour
INSERT INTO comment (content) VALUES 
('Petit à petit, l''oiseau fait son nid'),
('Mieux vaut tard que jamais'),
('L''important ce n''est pas ce que l''on a en soit, mais c''est ce que l''on sort de soit'),
('Qui ne tente rien n''a rien'),
('La patience est mère de toutes les vertus');