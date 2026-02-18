-- Création de la table
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    deadline DATE,
    is_done BOOLEAN DEFAULT FALSE
);

-- Insertion de 4 tâches
INSERT INTO tasks (title, description, deadline, is_done) VALUES
('Faire les courses', 'Acheter du lait, du pain et des fruits', '2026-02-20', FALSE),
('Réviser PHP', 'Relire les bases et faire des exercices', '2026-02-22', FALSE),
('Envoyer le rapport', 'Envoyer le rapport mensuel au manager', '2026-02-25', TRUE),
('Nettoyer la maison', 'Passer l’aspirateur et ranger', '2026-02-21', FALSE);