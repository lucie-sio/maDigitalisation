-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2023 at 01:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axes`
--

-- --------------------------------------------------------

--
-- Table structure for table `axe`
--

CREATE TABLE `axe` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `axe`
--

INSERT INTO `axe` (`id`, `name`, `img_url`) VALUES
(1, 'Compétences', 'https://thumbs.dreamstime.com/b/life-skills-icon-outline-vector-web-design-isolated-white-background-style-176301221.jpg'),
(2, 'Réactivité', 'https://static.vecteezy.com/system/resources/previews/000/583/361/original/timer-icon-vector.jpg'),
(3, 'Numérique', 'https://cdn-icons-png.flaticon.com/512/900/900967.png');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'A2micile Europe', 'Entreprise de services à la personne.', '2023-04-25 08:06:08'),
(2, 'Police Nationale', 'Service publique.', '2023-04-25 08:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `axe_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `axe_id`, `name`) VALUES
(1, 1, 'Excellence Technique/Communauté de pratiques'),
(2, 1, 'Faire agile'),
(3, 1, 'Gestion humaine des compétences'),
(4, 2, 'Vélocité de réponse'),
(5, 2, 'Environnements souples'),
(6, 2, 'Défi environnemental'),
(7, 2, 'Veille et benchmark'),
(8, 3, 'Business model'),
(9, 3, 'Relation client'),
(10, 3, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int NOT NULL,
  `item_id` int DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_score` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `item_id`, `question`, `max_score`) VALUES
(1, 1, 'Formations pour Apprendre à apprendre, changement de paradigme, \"être à la page\" (au-delà des compétences \"justes\" nécessaires)', 2),
(2, 1, 'Le co-développement (outil d\'intelligence collective) existe-t-il dans l\'entreprise ?', 2),
(3, 1, 'Les collaborateurs sont-ils amenés à partager leurs compétences et sous quelles formes ?', 2),
(4, 1, 'Le mentoring (fonctionnement en binôme) existe-t-il pour assurer le transfert de compétences ?', 2),
(5, 1, 'Les managers sont-ils aussi formateurs sur certains sujet pour l\'entreprise entière ?', 2),
(6, 1, 'L\'entreprise favorise-t-elle l\'excellence technique ? (Principe 9 du Manifeste Agile)', 2),
(7, 2, 'Déployez vous les pratiques du \'Faire Agile\', c\'est-à-dire une ou plusieurs des \'méthodes\' agiles ?', 2),
(8, 2, 'Votre entreprise promeut-elle un \'état d\'esprit agile\' ?', 2),
(9, 3, 'Votre entreprise gère-t-elle humainement les compétences ?', 2),
(10, 4, 'Valeur supérieure utilisable livrée plus tôt (Fonction principale utilisable dès les premières versions)', 2),
(11, 4, 'Réactivité face aux impératifs prépondérants', 2),
(12, 4, 'Mesure de la vélocité de l\'équipe (indicateur de suivi du travail d\'une équipe de conception)', 2),
(13, 5, 'Les installations techniques et de gestion sont modernes (TIC/ERP/CRM)', 2),
(14, 5, 'Les équipes sont en capacité d\'autonomiser une partie de leurs tâches', 2),
(15, 5, 'Les équipes s’inscrivent dans un cadre Agile Lean', 2),
(16, 5, 'Les mécanismes de livraison et de synchronisation sont matures', 2),
(17, 6, 'Les innovations produit tiennent compte de l\'urgence climatique', 2),
(18, 6, 'Les processus internes sont remis en cause pour diminuer leur impact environnemental', 2),
(19, 6, 'Les parties prenantes sont sélectionnées en fonction de leur éthique vis-à-vis du développement durable', 2),
(20, 7, 'Veille stratégique', 2),
(21, 8, 'Votre entreprise dégage t-elle une part de CA  par des produits ou services en ligne', 2),
(22, 8, 'La mise en place d’outils numériques a-t-elle permis d\'optimiser les coûts, les délais et la qualité ?', 2),
(23, 8, 'Comment les outils sont-ils intégrés dans les process de l’entreprise ?', 2),
(24, 8, 'Comment partagez-vous les données numériques avec les parties prenantes (clients, fournisseurs,…) ?', 2),
(25, 8, 'Mesurez-vous les impacts du numérique sur votre entreprise ?', 2),
(26, 8, 'Quel est l’impact du numérique sur la démarche RSE de l’entreprise ?', 2),
(27, 8, 'Existe-t-il des freins (stratégiques, financiers,…) à l’ investissement dans les outils numériques ?', 2),
(28, 9, 'L’entreprise dispose-t-elle : d’un site internet, d’un compte LinkedIn, d’une page Facebook, d’un compte Twitter,... ?', 2),
(29, 9, 'Comment utilisez-vous le numérique dans la relation client ? (nouveau modèle de vente, nouveau modèle d’échanges avec les clients, communauté, story, chat,...)', 2),
(30, 9, 'L’entreprise dispose-t-elle d’un community manager ?', 2),
(31, 9, 'Certains de vos collaborateurs sont-ils actifs sur les réseaux sociaux au nom de l’entreprise ?', 2),
(32, 9, 'Comment mesurez-vous et exploitez-vous les données issues du site de votre entreprise ?', 2),
(33, 9, 'Avez-vous observé chez vos concurrents des pratiques innovantes ?', 2),
(34, 10, 'Vos collaborateurs sont-ils équipés de nouveaux équipements numériques de travail (PC portable, tablette, smartphone,…) ? ', 2),
(35, 10, 'L’arrivée des outils digitaux a-t-elle eu un impact sur les pratiques et la culture de l’entreprise ?', 2),
(36, 10, 'Comment vous êtes-vous approprié et comment avez-vous accompagné ces évolutions?', 2),
(37, 10, 'Les nouvelles possibilités technologiques ont-elles fait évoluer le modèle d’organisation de l’entreprise et/ou votre management, vers plus de collaboration avec des acteurs internes ou externes ?', 2),
(38, 10, 'Mobilisez-vous des outils de veille et mettez-vous en œuvre des modalités de curation et de partage de l’ information ?', 2),
(39, 10, 'Les fonctionnalités des outils sont-elles augmentées par la pratique de vos collaborateurs ?', 2),
(40, 10, 'Comment accompagnez-vous vos collaborateurs dans la transition numérique ?', 2);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int NOT NULL,
  `company_id` int DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `score` int DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `company_id`, `question_id`, `score`, `comment`) VALUES
(1, 1, 1, 2, 'No comment'),
(2, 1, 2, 1, ''),
(3, 1, 3, 2, ''),
(4, 1, 4, 1, ''),
(5, 1, 5, 1, ''),
(6, 1, 6, 0, ''),
(7, 1, 7, 1, ''),
(8, 1, 8, 2, ''),
(9, 1, 9, 1, ''),
(10, 1, 10, 2, ''),
(11, 1, 11, 2, ''),
(12, 1, 12, 1, ''),
(13, 1, 13, 1, ''),
(14, 1, 14, 1, ''),
(15, 1, 15, 1, ''),
(16, 1, 16, 2, ''),
(17, 1, 17, 1, ''),
(18, 1, 18, 0, ''),
(19, 1, 19, 0, ''),
(20, 1, 20, 2, ''),
(21, 1, 21, 0, ''),
(22, 1, 22, 2, ''),
(23, 1, 23, 2, ''),
(24, 1, 24, 2, ''),
(25, 1, 25, 1, ''),
(26, 1, 26, 1, ''),
(27, 1, 27, 2, ''),
(28, 1, 28, 2, ''),
(29, 1, 29, 0, ''),
(30, 1, 30, 1, ''),
(31, 1, 31, 1, ''),
(32, 1, 32, 2, ''),
(33, 1, 33, 2, ''),
(34, 1, 34, 1, ''),
(35, 1, 35, 1, ''),
(36, 1, 36, 2, ''),
(37, 1, 37, 1, ''),
(38, 1, 38, 1, ''),
(39, 1, 39, 1, ''),
(40, 1, 40, 1, ''),
(41, 2, 2, 2, ''),
(42, 2, 3, 1, ''),
(43, 2, 4, 2, ''),
(44, 2, 5, 1, ''),
(45, 2, 6, 1, ''),
(46, 2, 7, 1, ''),
(47, 2, 8, 1, ''),
(48, 2, 9, 2, ''),
(49, 2, 10, 1, ''),
(50, 2, 11, 1, ''),
(51, 2, 12, 2, ''),
(52, 2, 13, 0, ''),
(53, 2, 14, 1, ''),
(54, 2, 15, 2, ''),
(55, 2, 16, 1, ''),
(56, 2, 17, 1, ''),
(57, 2, 18, 1, ''),
(58, 2, 19, 1, ''),
(59, 2, 20, 0, ''),
(60, 2, 21, 1, ''),
(61, 2, 22, 2, ''),
(62, 2, 23, 0, ''),
(63, 2, 24, 2, ''),
(64, 2, 25, 2, ''),
(65, 2, 26, 1, ''),
(66, 2, 27, 1, ''),
(67, 2, 28, 1, ''),
(68, 2, 29, 1, ''),
(69, 2, 30, 2, ''),
(70, 2, 31, 1, ''),
(71, 2, 32, 2, ''),
(72, 2, 33, 1, ''),
(73, 2, 34, 1, ''),
(74, 2, 35, 1, ''),
(75, 2, 36, 2, ''),
(76, 2, 37, 1, ''),
(77, 2, 38, 2, ''),
(78, 2, 39, 1, ''),
(79, 2, 40, 2, ''),
(80, 2, 1, 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `axe`
--
ALTER TABLE `axe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `axe_id` (`axe_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `axe`
--
ALTER TABLE `axe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
