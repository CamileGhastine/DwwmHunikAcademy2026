CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE password (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    secret VARCHAR(255) NOT NULL,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE
);

-- Utilisateurs
INSERT INTO user (name, password) VALUES
('Alice', '$2y$10$st2uwUWdWb2smcYVP54LkeREvimagdCRKa1FTt/UiNYS5oISh9v8G'),
('Bob', '$2y$10$st2uwUWdWb2smcYVP54LkeREvimagdCRKa1FTt/UiNYS5oISh9v8G'),
('Charlie', '$2y$10$st2uwUWdWb2smcYVP54LkeREvimagdCRKa1FTt/UiNYS5oISh9v8G');
-- Mots de passe (4 par user)
INSERT INTO password (title, secret, id_user) VALUES
-- Alice
('Gmail', 'aliceGmailPwd', 1),
('Facebook', 'aliceFbPwd', 1),
('Twitter', 'aliceTwitterPwd', 1),
('Amazon', 'aliceAmazonPwd', 1),

-- Bob
('Gmail', 'bobGmailPwd', 2),
('LinkedIn', 'bobLinkedPwd', 2),
('Dropbox', 'bobDropboxPwd', 2),

-- Charlie
('Gmail', 'charlieGmailPwd', 3),
('Steam', 'charlieSteamPwd', 3),
('Discord', 'charlieDiscordPwd', 3),
('Spotify', 'charlieSpotifyPwd', 3);