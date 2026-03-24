SET NAMES 'utf8mb4';
SET CHARACTER SET utf8mb4;

CREATE TABLE `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `liked` int DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comment` (`content`, `created_at`, `liked`) VALUES
('Super article !!', '2026-03-01 10:15:00', 5),
('Très utile, merci 👍', '2026-03-01 11:20:00', 8),
('Je ne suis pas d''accord', '2026-03-01 12:05:00', 1),
('Excellent travail', '2026-03-02 09:30:00', 10),
('Peut mieux faire', '2026-03-02 10:45:00', 2),
('Clair et précis', '2026-03-02 14:10:00', 7),
('Merci pour le partage', '2026-03-03 08:25:00', 6),
('Pas convaincu', '2026-03-03 09:50:00', 0),
('Top !', '2026-03-03 11:00:00', 9),
('Intéressant', '2026-03-03 13:15:00', 4),
('J''ai appris quelque chose', '2026-03-04 10:05:00', 8),
('Article moyen', '2026-03-04 11:40:00', 3),
('Très bien expliqué', '2026-03-04 15:20:00', 9),
('Un peu long', '2026-03-05 09:10:00', 2),
('Parfait', '2026-03-05 10:55:00', 10),
('Pas assez détaillé', '2026-03-05 14:30:00', 1),
('Super clair', '2026-03-06 08:45:00', 7),
('Merci beaucoup', '2026-03-06 10:00:00', 6),
('Bonne analyse', '2026-03-06 12:25:00', 5),
('Je recommande', '2026-03-07 09:35:00', 9),
('Bof', '2026-03-07 11:10:00', 0),
('Très instructif', '2026-03-07 13:50:00', 8),
('Pas mal', '2026-03-08 10:20:00', 4),
('Excellent contenu', '2026-03-08 11:45:00', 10),
('À améliorer', '2026-03-08 15:05:00', 2),
('Bravo 👏', '2026-03-09 09:15:00', 9),
('Cool', '2026-03-09 10:40:00', 5),
('Bien écrit', '2026-03-09 12:55:00', 7),
('Sympa à lire', '2026-03-10 08:30:00', 6),
('Génial', '2026-03-10 09:50:00', 10);
