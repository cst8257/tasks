DROP DATABASE IF EXISTS `tasks`;
CREATE DATABASE `tasks`;
USE `tasks`;

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int NOT NULL,
  `task` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `priority` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `items` (`id`, `task`, `completed`, `priority`) VALUES
(1, 'Buy Milk', 0, '1'),
(2, 'Feed Cat', 1, '3'),
(3, 'Clean Room', 0, '0');

ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

