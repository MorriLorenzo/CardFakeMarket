-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 26, 2025 alle 20:00
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardfakemarket`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `card`
--

CREATE TABLE `card` (
  `code` int(11) NOT NULL,
  `language` varchar(50) NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `set_code` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `card`
--

INSERT INTO `card` (`code`, `language`, `image`, `description`, `set_code`, `quantity`, `price`) VALUES
(5, 'ita', 'img/card/5.png', 'Drago Bianco Occhi Blu', 4, 5, 104.00),
(6, 'ita', 'img/card/6.png', 'Golem GoGoGo', 4, 26, 2.00),
(7, 'ita', 'img/card/7.jpg', 'GoGoGo Gigas', 4, 100, 3.00),
(8, 'ita', 'img/card/8.jpg', 'Mago GaGaGa', 4, 52, 1.00),
(9, 'ita', 'img/card/9.png', 'Numero 39: Utopia', 4, 5, 240.00),
(10, 'ita', 'img/card/10.jpg', 'Numero c39: Raggio Utopia', 4, 15, 241.00),
(11, 'ita', 'img/card/11.jpg', 'Numero c39: Raggio Utopia V', 4, 15, 242.00),
(12, 'ing', 'img/card/12.webp', 'Numero 4: Kraken Selvaggio', 4, 200, 20.00),
(13, 'ita', 'img/card/13.jpg', 'Numero 34: Terror Byte', 4, 78, 11.00),
(14, 'ing', 'img/card/14.jpg', 'Trio Congegno', 6, 295, 0.20),
(15, 'ing', 'img/card/15.jpg', 'Mikazukinoyaiba, il Drago Zanna della Luna', 6, 44, 0.15),
(16, 'ita', 'img/card/16.jpg', 'Veidos, il Drago dell\'Oscurità Infinita', 6, 44, 0.50),
(17, 'ita', 'img/card/17.jpg', 'Mago Silente Zero', 6, 55, 3.99),
(18, 'ita', 'img/card/18.jpg', 'Ombra Eredità Del Mondo', 6, 367, 5.85),
(19, 'ita', 'img/card/19.jpg', 'Spadaccino Silente Zero', 6, 789, 1.67),
(20, 'ing', 'img/card/20.jpg', 'Bacha The Melodius Maestra', 6, 2, 103.99),
(21, 'ita', 'img/card/21.jpg', 'Comandante Ingranaggio Antico', 6, 55, 56.39),
(22, 'ita', 'img/card/22.jpg', 'L\'Onesto', 6, 1, 1000000.01),
(23, 'ita', 'img/card/23.webp', 'Rillaboom', 5, 208, 56.14),
(24, 'ing', 'img/card/24.jpg', 'Giratina', 5, 29, 276.91),
(25, 'cin', 'img/card/25.jpg', 'Chien-Pao', 5, 435, 1.99),
(26, 'ing', 'img/card/26.jpg', 'Surfing Pikachu', 5, 1, 35424.22),
(27, 'ita', 'img/card/27.jpg', 'Pawmot', 5, 324, 91.69),
(28, 'ita', 'img/card/28.webp', 'Diglett', 5, 325, 0.35),
(29, 'ita', 'img/card/29.webp', 'Charizard', 5, 11, 803.09),
(30, 'ing', 'img/card/30.webp', 'Squirtle', 5, 1233, 0.11),
(31, 'ita', 'img/card/31.png', 'Dvcklett', 5, 1938, 0.66),
(32, 'ita', 'img/card/32.jpg', 'Copperajah', 7, 2435, 22.33),
(33, 'ita', 'img/card/33.webp', 'Rayquaza', 7, 2, 333.69),
(34, 'ita', 'img/card/34.jpg', 'Darkrai', 7, 124, 12.36),
(35, 'ita', 'img/card/35.jpg', 'Bulbasaur', 7, 123, 0.12),
(36, 'ita', 'img/card/36.png', 'Mankey', 7, 1424, 0.22),
(37, 'ita', 'img/card/37.webp', 'Palkia', 7, 12, 678.99),
(38, 'ita', 'img/card/38.webp', 'Mewtwo', 7, 11, 999.99),
(39, 'ita', 'img/card/39.webp', 'Zekrom', 7, 33, 543.11),
(40, 'mar', 'img/card/40.jpg', 'Thanos', 7, 11, 9999999.99),
(41, 'ita', 'img/card/41.jpg', 'Drago Forma Furente, Vendicatore', 8, 12, 50.99),
(42, 'ita', 'img/card/42.png', 'Alfred, Re Dei Cavalieri', 8, 2, 100.00),
(43, 'ita', 'img/card/43.jpg', 'Astaroth Maestro Di Amon', 8, 23, 10.00),
(44, 'ita', 'img/card/44.jpg', 'Enigman Tempesta', 8, 23, 2.99),
(45, 'ita', 'img/card/45.jpeg', 'Ezzell, Vanguard del Re dei Cavalieri', 8, 53, 22.86),
(46, 'ita', 'img/card/46.webp', 'Luquier REVERSE', 8, 11, 333.01),
(47, 'ita', 'img/card/47.jpg', 'Drago Nucleo Ardente', 8, 222, 0.25),
(48, 'ita', 'img/card/48.webp', 'Signore Maestoso Blaster', 8, 213, 12.35),
(49, 'ita', 'img/card/49.jpg', 'Vortimer \"Diablo\" Giudizio delle Lame Splendenti', 8, 234, 1.28),
(50, 'ita', 'img/card/50.jpeg', 'Amon, Marchese del Mondo Demoniaco', 9, 1432, 0.25),
(51, 'ita', 'img/card/51.jpg', 'Vampiro Calmo', 9, 13, 10.11),
(52, 'ita', 'img/card/52.jpg', 'Amon REVERSE', 9, 11, 25.11),
(53, 'ita', 'img/card/53.jpg', 'Gandharva, Berserker Drago Demoniaco', 9, 453, 1.55),
(54, 'ita', 'img/card/54.jpg', 'Blitzritter', 9, 132, 0.10),
(55, 'ita', 'img/card/55.jpeg', 'Tsukuyomi, Dea della Luna Piena', 9, 1111, 24.00),
(56, 'ita', 'img/card/56.jpg', 'Hyakki Vogue \"Reverse\", Drago Demoniaco Celato', 9, 53, 111.87),
(57, 'ita', 'img/card/57.webp', 'Archangel Dragon, Gavriel', 9, 24, 77.99),
(58, 'ita', 'img/card/58.jpeg', 'Barcgal', 9, 0, 0.99);

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cart`
--

INSERT INTO `cart` (`id`, `user_email`) VALUES
(1, 'admin@admin.com'),
(12, 'jago@camoni.com'),
(11, 'lorenzo@morri.com'),
(13, 'mattia@mencaccini.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `cart_card`
--

CREATE TABLE `cart_card` (
  `cart_id` int(11) NOT NULL,
  `card_code` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `game`
--

CREATE TABLE `game` (
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `game`
--

INSERT INTO `game` (`name`) VALUES
('Magic'),
('Pokemon'),
('Vanguard'),
('Yu-Gi-Oh');

-- --------------------------------------------------------

--
-- Struttura della tabella `gameset`
--

CREATE TABLE `gameset` (
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `game_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `gameset`
--

INSERT INTO `gameset` (`code`, `name`, `date`, `game_name`) VALUES
(4, 'Astri Splendenti', '2025-01-01', 'Yu-Gi-Oh'),
(5, 'Sole e Luna', '2021-03-11', 'Pokemon'),
(6, 'Eredità di distruzione', '2017-08-09', 'Yu-Gi-Oh'),
(7, 'Scintille Folgoranti', '2019-10-17', 'Pokemon'),
(8, 'Colpo Brillante', '2020-06-12', 'Vanguard'),
(9, 'Invasione Del Signore Demoniaco', '2017-10-10', 'Vanguard');

-- --------------------------------------------------------

--
-- Struttura della tabella `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `message` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `card_code` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `notification`
--

INSERT INTO `notification` (`id`, `status`, `message`, `user_email`, `card_code`, `order_id`) VALUES
(41, 1, 'ordine effettuato', 'admin@admin.com', NULL, 13),
(42, 1, 'ordine in consegna', 'admin@admin.com', NULL, 13),
(43, 1, 'carta esaurita', 'admin@admin.com', 22, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `order`
--

INSERT INTO `order` (`id`, `order_date`, `quantity`, `total_price`, `user_email`) VALUES
(1, '2025-01-08', 22, 104.00, 'admin@admin.com'),
(2, '2025-01-21', 3, 66.00, 'admin@admin.com'),
(3, '2025-01-26', 1, 1040.00, 'admin@admin.com'),
(4, '2025-01-26', 1, 1248.00, 'admin@admin.com'),
(5, '2025-01-26', 1, 104.00, 'admin@admin.com'),
(6, '2025-01-26', 1, 104.00, 'admin@admin.com'),
(7, '2025-01-26', 1, 104.00, 'admin@admin.com'),
(8, '2025-01-26', 1, 104.00, 'admin@admin.com'),
(9, '2025-01-26', 1, 104.00, 'admin@admin.com'),
(10, '2025-01-26', 1, 3.00, 'admin@admin.com'),
(11, '2025-01-26', 1, 1.00, 'admin@admin.com'),
(12, '2025-01-26', 1, 8.00, 'admin@admin.com'),
(13, '2025-01-26', 1, 1000000.01, 'admin@admin.com'),
(14, '2025-01-26', 2, 334.21, 'admin@admin.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `order_card`
--

CREATE TABLE `order_card` (
  `order_id` int(11) NOT NULL,
  `card_code` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `order_card`
--

INSERT INTO `order_card` (`order_id`, `card_code`, `quantity`) VALUES
(3, 5, 10),
(4, 5, 12),
(5, 5, 1),
(6, 5, 1),
(7, 5, 1),
(8, 5, 1),
(9, 5, 1),
(10, 8, 3),
(11, 14, 5),
(12, 6, 4),
(13, 22, 1),
(14, 46, 1),
(14, 54, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT 0,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`email`, `first_name`, `last_name`, `address`, `is_admin`, `password`) VALUES
('admin@admin.com', 'Admin', 'User', 'Via Admin 273', 1, '$2y$10$3axU/cyWoBp9LofBD1CauuIFl7p2fukoMfTmeuwTmmfbfHAc/bvHK'),
('jago@camoni.com', 'Jago', 'Camoni', 'Via del Bamblone 99', 0, '$2y$10$4Qgb1GVjXedVcPF.nQ0mgO0aTNIHTTWHF4cSlzeOWEyLxaDKD161e'),
('lorenzo@morri.com', 'Lorenzo', 'Morri', 'Via Asdrongo 24', 0, '$2y$10$XIfCAyfFZcmScriFnlwVB.dikOYHbH/NP5Gr3ne7WGX4DKl6fVKXa'),
('mattia@mencaccini.com', 'Mattia', 'Mencaccini', 'via del nonsosnappare 34', 0, '$2y$10$JmIlBgM6P9rm9TpCqdUgKObrW86Y2woLxuPsczYQ4ZuB9.xzrQZiS');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`code`),
  ADD KEY `set_code` (`set_code`);

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indici per le tabelle `cart_card`
--
ALTER TABLE `cart_card`
  ADD PRIMARY KEY (`cart_id`,`card_code`),
  ADD KEY `card_code` (`card_code`);

--
-- Indici per le tabelle `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`name`);

--
-- Indici per le tabelle `gameset`
--
ALTER TABLE `gameset`
  ADD PRIMARY KEY (`code`),
  ADD KEY `game_name` (`game_name`);

--
-- Indici per le tabelle `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `card_code` (`card_code`),
  ADD KEY `order_id` (`order_id`);

--
-- Indici per le tabelle `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indici per le tabelle `order_card`
--
ALTER TABLE `order_card`
  ADD PRIMARY KEY (`order_id`,`card_code`),
  ADD KEY `card_code` (`card_code`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `card`
--
ALTER TABLE `card`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `gameset`
--
ALTER TABLE `gameset`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`set_code`) REFERENCES `gameset` (`code`);

--
-- Limiti per la tabella `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE CASCADE;

--
-- Limiti per la tabella `cart_card`
--
ALTER TABLE `cart_card`
  ADD CONSTRAINT `cart_card_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_card_ibfk_2` FOREIGN KEY (`card_code`) REFERENCES `card` (`code`) ON DELETE CASCADE;

--
-- Limiti per la tabella `gameset`
--
ALTER TABLE `gameset`
  ADD CONSTRAINT `gameset_ibfk_1` FOREIGN KEY (`game_name`) REFERENCES `game` (`name`);

--
-- Limiti per la tabella `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`card_code`) REFERENCES `card` (`code`) ON DELETE SET NULL,
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE SET NULL;

--
-- Limiti per la tabella `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`) ON DELETE CASCADE;

--
-- Limiti per la tabella `order_card`
--
ALTER TABLE `order_card`
  ADD CONSTRAINT `order_card_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_card_ibfk_2` FOREIGN KEY (`card_code`) REFERENCES `card` (`code`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
