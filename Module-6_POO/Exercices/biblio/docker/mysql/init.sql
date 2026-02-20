CREATE TABLE book (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    author VARCHAR(50) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO book (title, author, description) VALUES
('1984', 'George Orwell', 'Dystopian novel about a totalitarian regime and mass surveillance.'),
('Animal Farm', 'George Orwell', 'Political satire featuring farm animals rebelling against humans.'),
('The Hobbit', 'J.R.R. Tolkien', 'Fantasy adventure following Bilbo Baggins on a quest.'),
('The Lord of the Rings', 'J.R.R. Tolkien', 'Epic fantasy about the struggle to destroy the One Ring.'),
('Harry Potter and the Sorcerer''s Stone', 'J.K. Rowling', 'A young boy discovers he is a wizard and attends Hogwarts.'),
('Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 'Harry returns to Hogwarts where a dark force threatens students.'),
('Pride and Prejudice', 'Jane Austen', 'Classic romance exploring manners and marriage in England.'),
('The Catcher in the Rye', 'J.D. Salinger', 'Story of teenage rebellion and alienation.'),
('To Kill a Mockingbird', 'Harper Lee', 'Novel about racial injustice in the American South.'),
('The Great Gatsby', 'F. Scott Fitzgerald', 'Tragic story of wealth, love, and the American Dream.'),
('Moby-Dick', 'Herman Melville', 'A sea captain obsessively hunts a giant white whale.'),
('War and Peace', 'Leo Tolstoy', 'Historical novel set during the Napoleonic Wars.'),
('Crime and Punishment', 'Fyodor Dostoevsky', 'Psychological drama about guilt and morality.'),
('The Alchemist', 'Paulo Coelho', 'Philosophical tale about following one''s dreams.'),
('The Little Prince', 'Antoine de Saint-Exupéry', 'Poetic story about a young prince exploring planets.'),
('Brave New World', 'Aldous Huxley', 'Dystopian vision of a technologically controlled society.'),
('The Da Vinci Code', 'Dan Brown', 'Thriller involving secret societies and religious mysteries.'),
('The Hunger Games', 'Suzanne Collins', 'Dystopian story of a deadly televised survival competition.'),
('The Chronicles of Narnia', 'C.S. Lewis', 'Fantasy series set in the magical land of Narnia.'),
('The Shining', 'Stephen King', 'Psychological horror set in an isolated hotel.');