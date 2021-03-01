-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 sep. 2020 à 20:48
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `student_attendance`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `datesign` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `statut` varchar(100) NOT NULL,
  `Why` varchar(50) NOT NULL DEFAULT 'RAS',
  `cours` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attendance`
--

INSERT INTO `attendance` (`id`, `iduser`, `datesign`, `time`, `statut`, `Why`, `cours`) VALUES
(155, 1, '2020-08-24', '11:43:12', 'present', '', 0),
(156, 2, '2020-08-24', '11:44:49', 'present', '', 0),
(157, 3, '2020-08-24', '11:45:19', 'present', '', 0),
(158, 4, '2020-08-24', '11:45:50', 'abscent', 'Grève de transport', 0),
(159, 4, '2020-08-23', '11:45:50', 'present', '', 0),
(160, 1, '2020-08-25', '11:34:24', 'present', '', 0),
(161, 0, '2020-08-25', '12:38:36', 'present', '', 0),
(162, 2, '2020-08-25', '14:48:24', 'present', '', 0),
(186, 1, '2020-08-26', '12:18:05', 'abscent', 'Fatigue', 0),
(187, 2, '2020-08-22', '12:18:05', 'present', 'Voyage', 0),
(188, 3, '2020-08-26', '12:18:05', 'present', 'cool', 0),
(189, 4, '2020-08-26', '12:18:05', 'present', '', 0),
(190, 5, '2020-08-26', '12:18:05', 'present', 'Méteo', 0),
(191, 6, '2020-08-26', '12:18:05', 'present', 'Voyage', 0),
(192, 7, '2020-08-26', '12:18:05', 'present', 'Malade', 0),
(193, 4, '2020-08-25', '12:21:43', 'present', '', 0),
(194, 4, '2020-08-23', '09:21:50', 'abscent', 'Hopital pour bilan', 0),
(195, 2, '2020-08-26', '12:18:05', 'present', 'Repos', 0),
(196, 2, '2020-01-06', '21:55:17', 'present', 'RAS', 0),
(197, 5, '2020-01-06', '21:55:17', 'present', 'Malade', 0),
(198, 2, '2020-01-07', '10:55:17', 'present', 'RAS', 0),
(199, 5, '2020-01-07', '21:55:17', 'present', 'RAS', 0),
(200, 3, '2020-01-07', '10:55:17', 'present', 'RAS', 0),
(201, 4, '2020-01-07', '21:55:17', 'present', 'RAS', 0),
(202, 1, '2020-01-07', '21:55:17', 'present', 'RAS', 0),
(203, 2, '2020-02-07', '10:55:17', 'present', 'RAS', 0),
(204, 5, '2020-02-07', '21:55:17', 'present', 'RAS', 0),
(205, 3, '2020-02-07', '10:55:17', 'present', 'RAS', 0),
(206, 4, '2020-02-07', '21:55:17', 'present', 'RAS', 0),
(207, 1, '2020-02-07', '21:55:17', 'present', 'RAS', 0),
(208, 2, '2020-03-07', '10:55:17', 'present', 'Transport', 0),
(209, 5, '2020-03-07', '21:55:17', 'present', 'RAS', 0),
(210, 3, '2020-03-07', '10:55:17', 'present', 'RAS', 0),
(211, 4, '2020-03-07', '21:55:17', 'present', 'Méteo', 0),
(212, 1, '2020-03-07', '21:55:17', 'abscent', 'Repos', 0),
(213, 2, '2020-04-07', '10:55:17', 'present', 'Méteo', 0),
(214, 5, '2020-04-07', '21:55:17', 'present', 'RAS', 0),
(215, 3, '2020-04-07', '10:55:17', 'present', 'RAS', 0),
(216, 4, '2020-04-07', '21:55:17', 'present', 'RAS', 0),
(217, 1, '2020-04-07', '21:55:17', 'present', 'grève', 0),
(218, 2, '2020-04-07', '10:55:17', 'present', 'RAS', 0),
(219, 5, '2020-04-07', '21:55:17', 'present', 'RAS', 0),
(220, 3, '2020-04-07', '10:55:17', 'present', 'RAS', 0),
(221, 4, '2020-04-07', '21:55:17', 'present', 'RAS', 0),
(222, 1, '2020-04-07', '21:55:17', 'present', 'RAS', 0),
(223, 2, '2020-05-07', '10:55:17', 'present', 'RAS', 0),
(224, 5, '2020-05-07', '21:55:17', 'present', 'RAS', 0),
(225, 3, '2020-05-07', '10:55:17', 'present', 'RAS', 0),
(226, 4, '2020-05-07', '21:55:17', 'present', 'RAS', 0),
(227, 1, '2020-05-07', '21:55:17', 'present', 'RAS', 0),
(228, 2, '2020-05-06', '10:55:17', 'present', 'RAS', 0),
(229, 5, '2020-06-07', '21:55:17', 'present', 'RAS', 0),
(230, 3, '2020-06-07', '10:55:17', 'present', 'RAS', 0),
(231, 4, '2020-06-07', '21:55:17', 'present', 'RAS', 0),
(232, 1, '2020-06-07', '21:55:17', 'present', 'RAS', 0),
(233, 2, '2020-07-07', '10:55:17', 'present', 'Fatigue', 0),
(234, 5, '2020-07-07', '21:55:17', 'present', 'RAS', 0),
(235, 3, '2020-07-07', '10:55:17', 'present', 'RAS', 0),
(236, 4, '2020-07-07', '21:55:17', 'abscent', 'Voyage', 0),
(237, 1, '2020-07-07', '21:55:17', 'present', 'RAS', 0),
(238, 2, '2020-07-08', '10:55:17', 'present', 'RAS', 0),
(239, 5, '2020-07-08', '21:55:17', 'present', 'RAS', 0),
(240, 3, '2020-07-08', '10:55:17', 'present', 'RAS', 0),
(241, 4, '2020-07-08', '21:55:17', 'present', 'RAS', 0),
(242, 1, '2020-07-08', '21:55:17', 'present', 'RAS', 0),
(243, 1, '2020-08-26', '23:08:39', 'present', 'RAS', 0),
(244, 2, '2020-08-26', '23:08:39', 'present', 'Grève', 0),
(245, 3, '2020-08-26', '23:08:39', 'present', 'RAS', 0),
(246, 4, '2020-08-26', '23:08:39', 'present', 'RAS', 0),
(247, 5, '2020-08-26', '23:08:39', 'present', 'Hopital', 0),
(248, 6, '2020-08-26', '23:08:39', 'present', 'RAS', 0),
(249, 7, '2020-08-26', '23:08:39', 'present', 'RAS', 0),
(258, 2, '2020-08-27', '23:08:13', 'present', 'Maison', 0),
(259, 3, '2020-08-27', '23:08:13', 'present', 'RAS', 0),
(260, 4, '2020-08-27', '23:08:13', 'present', 'RAS', 0),
(261, 5, '2020-08-27', '23:08:13', 'present', 'Covid 19', 0),
(262, 6, '2020-08-27', '23:08:13', 'present', 'RAS', 0),
(263, 7, '2020-08-27', '23:08:13', 'present', 'RAS', 0),
(320, 1, '2020-08-28', '20:04:50', 'present', 'RAS', 1),
(321, 2, '2020-08-28', '20:04:50', 'present', 'RAS', 1),
(322, 3, '2020-08-28', '20:04:50', 'present', 'RAS', 1),
(323, 4, '2020-08-28', '20:04:50', 'abscent', 'Malade', 1),
(324, 5, '2020-08-28', '20:04:50', 'present', 'RAS', 1),
(325, 6, '2020-08-28', '20:04:50', 'present', 'RAS', 1),
(326, 7, '2020-08-28', '20:04:50', 'present', 'RAS', 1),
(333, 7, '2020-08-28', '23:32:06', 'present', 'RAS', 0),
(334, 1, '2020-08-28', '23:33:37', 'present', 'RAS', 0),
(335, 2, '2020-08-28', '23:33:37', 'present', 'RAS', 0),
(336, 3, '2020-08-28', '23:33:37', 'present', 'RAS', 0),
(337, 4, '2020-08-28', '23:33:37', 'abscent', 'RAS', 0),
(338, 5, '2020-08-28', '23:33:37', 'present', 'RAS', 0),
(339, 6, '2020-08-28', '23:33:37', 'present', 'RAS', 0),
(340, 7, '2020-08-28', '23:33:37', 'present', 'RAS', 0),
(341, 1, '2020-08-28', '23:38:00', 'present', 'RAS', 0),
(342, 2, '2020-08-28', '23:38:00', 'present', 'RAS', 0),
(343, 3, '2020-08-28', '23:38:00', 'present', 'RAS', 0),
(344, 4, '2020-08-28', '23:38:00', 'abscent', 'RAS', 0),
(345, 5, '2020-08-28', '23:38:00', 'present', 'RAS', 0),
(346, 6, '2020-08-28', '23:38:00', 'present', 'RAS', 0),
(347, 7, '2020-08-28', '23:38:00', 'present', 'RAS', 0),
(355, 1, '2020-08-29', '19:45:47', 'present', 'RAS', 0),
(356, 2, '2020-08-29', '19:45:47', 'present', 'RAS', 0),
(357, 3, '2020-08-29', '19:45:47', 'present', 'RAS', 0),
(358, 4, '2020-08-29', '19:45:47', 'abscent', 'RAS', 0),
(359, 5, '2020-08-29', '19:45:47', 'present', 'RAS', 0),
(360, 6, '2020-08-29', '19:45:47', 'present', 'RAS', 0),
(361, 7, '2020-08-29', '19:45:47', 'present', 'RAS', 0),
(404, 1, '2020-08-30', '23:05:56', 'abscent', 'transport', 0),
(405, 2, '2020-08-30', '23:05:56', 'abscent', 'RAS', 0),
(406, 3, '2020-08-30', '23:05:56', 'abscent', 'RAS', 0),
(407, 4, '2020-08-30', '23:05:56', 'abscent', 'RAS', 0),
(408, 5, '2020-08-30', '23:05:56', 'abscent', 'RAS', 0),
(409, 6, '2020-08-30', '23:05:56', 'abscent', 'RAS', 0),
(410, 7, '2020-08-30', '23:05:56', 'abscent', 'RAS', 0),
(411, 1, '2020-08-30', '23:49:27', 'abscent', 'Malade', 0),
(412, 2, '2020-08-30', '23:49:27', 'abscent', 'RAS', 0),
(413, 3, '2020-08-30', '23:49:27', 'abscent', 'RAS', 0),
(414, 4, '2020-08-30', '23:49:27', 'abscent', 'RAS', 0),
(415, 5, '2020-08-30', '23:49:27', 'abscent', 'RAS', 0),
(416, 6, '2020-08-30', '23:49:27', 'abscent', 'RAS', 0),
(417, 7, '2020-08-30', '23:49:27', 'abscent', 'RAS', 0),
(434, 1, '2020-08-31', '02:27:05', 'abscent', 'RAS', 1),
(435, 2, '2020-08-31', '02:27:05', 'abscent', 'RAS', 1),
(436, 3, '2020-08-31', '02:27:05', 'abscent', 'RAS', 1),
(437, 4, '2020-08-31', '02:27:05', 'abscent', 'RAS', 1),
(438, 5, '2020-08-31', '02:27:05', 'present', 'RAS', 1),
(439, 6, '2020-08-31', '02:27:05', 'abscent', 'RAS', 1),
(440, 7, '2020-08-31', '02:27:05', 'abscent', 'RAS', 1),
(448, 1, '2020-09-01', '11:46:12', 'abscent', 'RAS', 1),
(449, 2, '2020-09-01', '11:46:12', 'present', 'RAS', 1),
(450, 3, '2020-09-01', '11:46:12', 'abscent', 'RAS', 1),
(451, 4, '2020-09-01', '11:46:12', 'abscent', 'RAS', 1),
(452, 5, '2020-09-01', '11:46:12', 'present', 'RAS', 1),
(453, 6, '2020-09-01', '11:46:12', 'abscent', 'RAS', 1),
(454, 7, '2020-09-01', '11:46:12', 'abscent', 'RAS', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `name`, `email`, `tel`, `sex`, `password`, `file_name`) VALUES
(1, 'nkflc', 'nkflc@gmail.com', 78945612, 'F', '', ''),
(2, 'azerty', 'azerty@gmail.com', 78945612, 'F', 'azerty', ''),
(3, 'chris', 'chris@gmail.com', 45785156, 'M', 'chris', ''),
(4, 'remi', 'remi@gmail.com', 2857412, 'M', 'remi', ''),
(5, 'kj', 'kj@gmail.com', 78945662, 'M', 'kj', ''),
(6, 'Emerson', 'Emerson@gmail.com', 789456, 'M', 'emerson', '');

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `liste`
--

INSERT INTO `liste` (`id`, `name`, `email`, `password`) VALUES
(1, 'Teacher', 'teacher@gmail.com', '789');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `tel`, `sex`, `password`, `file_name`) VALUES
(1, 'Katinan', ' leon@gmail.com', 54869524, 'Homme', '789', 'empphoto/be2e6a286941a08a1e3466af4f80bab2'),
(2, ' Kouassi ', ' kouassi@gmail.com', 402457836, 'Homme', '456', 'empphoto/d5ce71570e3a7be0d8225697c02c6a50'),
(3, 'Odilon', 'odilon@gmail.com', 45781245, 'Homme', '789', 'empphoto/326057dje bi odilon.jpeg'),
(4, 'Astrid', ' astrid@gmail.com', 57198724, 'Femme', '456', 'empphoto/515604images (5).jpg'),
(5, 'Edano', 'edano@gmail.com', 4578145, 'Femme', '123', 'empphoto/131959www_3d_man_sitting_desk_headset.jpg'),
(6, 'Jeanne', 'jeanne@gmail.com', 7895412, 'Femme', '789', 'empphoto/715085mvi_5310_moment.jpg'),
(7, 'Clarisse', ' clarisse@gmail.com', 25877444, 'Femme', '456', 'empphoto/fa8578a24abfa534357deacddb0b5972');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
