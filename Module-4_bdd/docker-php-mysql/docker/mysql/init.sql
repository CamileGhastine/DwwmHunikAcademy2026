SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100),
    lastname VARCHAR(100) NOT NULL
    );

INSERT INTO student (firstname, lastname) VALUES ('Théo', 'Abogo');
INSERT INTO student (firstname, lastname) VALUES ('Camile', 'Ghastine');
INSERT INTO student (lastname) VALUES ('Bir');

