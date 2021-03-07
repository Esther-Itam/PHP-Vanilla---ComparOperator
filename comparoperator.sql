-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 07 mars 2021 à 08:39
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comparoperator`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(2, 'administrateur', '200ceb26807d6bf99fd6f4f0d1ca54d4');

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE `destinations` (
  `id_destination` int(10) NOT NULL,
  `location` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `id_tour_operator` int(10) NOT NULL,
  `picture` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`id_destination`, `location`, `price`, `id_tour_operator`, `picture`, `comments`) VALUES
(36, 'Martinique', 785, 3, 'https://www.autolagon.fr/blog/wp-content/uploads/2019/08/VisiterlaGuadeloupende%CC%81cembre-1000x675-1000x675.jpg', 'La Martinique est une île des Caraïbes qui fait partie des petites Antilles. Région d\'outre-mer de la France, sa culture reflète un mélange distinctif d\'influences françaises et antillaises. Sa plus grande ville, Fort-de-France, abrite des collines abruptes, des rues étroites et La Savane, un jardin bordé de boutiques et de cafés dans lequel a été érigée la statue de Joséphine de Beauharnais, première épouse de Napoléon Bonaparte, native de l\'île.'),
(37, 'Martinique', 800, 1, 'https://www.autolagon.fr/blog/wp-content/uploads/2019/08/VisiterlaGuadeloupende%CC%81cembre-1000x675-1000x675.jpg', 'La Martinique est une île des Caraïbes qui fait partie des petites Antilles. Région d\'outre-mer de la France, sa culture reflète un mélange distinctif d\'influences françaises et antillaises. Sa plus grande ville, Fort-de-France, abrite des collines abruptes, des rues étroites et La Savane, un jardin bordé de boutiques et de cafés dans lequel a été érigée la statue de Joséphine de Beauharnais, première épouse de Napoléon Bonaparte, native de l\'île.'),
(39, 'Philipines', 1700, 4, 'https://www.passporthealthglobal.com/wp-content/uploads/2018/07/conseils-vaccination-philippines.jpg', 'Les Philippines sont un pays d\'Asie du Sud-Est, à l\'ouest du Pacifique, comptant plus de 7 000 îles. Manille, sa capitale, est célèbre pour ses promenades au bord de l\'océan et son quartier chinois datant de plusieurs siècles, Binondo. Intramuros, cœur de la vieille ville, était une ville fortifiée à l\'époque coloniale. Ce quartier abrite l\'église baroque du XVIIe siècle Saint-Augustin et le Fort Santiago, une prison militaire et citadelle de plusieurs étages.'),
(40, 'Philipines', 1810, 5, 'https://www.passporthealthglobal.com/wp-content/uploads/2018/07/conseils-vaccination-philippines.jpg', 'Les Philippines sont un pays d\'Asie du Sud-Est, à l\'ouest du Pacifique, comptant plus de 7 000 îles. Manille, sa capitale, est célèbre pour ses promenades au bord de l\'océan et son quartier chinois datant de plusieurs siècles, Binondo. Intramuros, cœur de la vieille ville, était une ville fortifiée à l\'époque coloniale. Ce quartier abrite l\'église baroque du XVIIe siècle Saint-Augustin et le Fort Santiago, une prison militaire et citadelle de plusieurs étages.'),
(42, 'Japon', 1100, 1, 'https://quebec.openjaw.com/wp-content/uploads/2019/01/japon.jpg', 'Un voyage au Japon est une expérience unique, loin de toute référence connue, de tout code occidental. Et l’attachement pour ce pays, que créent la beauté, la politesse, la grâce en chaque chose, est inéluctable : depuis le XVIIe siècle, les visiteurs ne cessent de succomber à la fascination d’une civilisation séduisante et mystique, à la fois ultra-moderne et immuable. Ici planent les ombres des geishas, le souvenir des samouraïs, l’imagerie des mangas. Et aussi l’« harmonie » et la « paix », à l’image du nom de la nouvelle ère Reiwa, celle du règne du 126e empereur, Naruhito.'),
(43, 'Mexique', 1050, 4, 'https://www.sensationsdumonde.com/img/destination/39/13478468873_5c3351c38c_b_768a.jpg', 'Situé entre les États-Unis et l\'Amérique centrale, le Mexique est un pays réputé pour ses plages du Pacifique et du golfe du Mexique, ainsi que pour ses paysages variés - entre montagnes, déserts et jungles. Il est pourvu de ruines anciennes comme Teotihuacan et la cité maya de Chichén Itzá ainsi que de villes datant de l\'époque coloniale espagnole. Sa capitale Mexico propose un retour à la modernité avec ses boutiques haut de gamme, ses musées renommés et ses restaurants gastronomiques.'),
(44, 'Cambodge', 700, 5, 'https://www.amoureux-asie.com/wp-content/uploads/2018/08/voyage-cambodge-vietnam.6570xD6A39B.jpg', 'Le Cambodge est un pays d’Asie du Sud-est aux paysages variés : plaines de basse altitude, delta du Mékong, montagnes et littoral du golfe de Thaïlande. Phnom Penh, sa capitale, abrite le Marché central art déco, l’étincelant Palais royal et les expositions historiques et archéologiques du Musée national du Cambodge. Dans le nord-ouest du pays, on peut admirer les ruines du temple d’Angkor Vat, un immense complexe en pierre bâti sous l’Empire khmer.'),
(50, 'Maroc', 550, 5, 'https://www.acs-ami.com/fr/blog/wp-content/uploads/2015/06/Expatriation-Maroc-Rabat.jpg', 'Le Maroc, pays d\'Afrique du Nord sur le littoral de l\'Atlantique et de la Méditerranée, se distingue par ses influences berbères, arabes et européennes. La médina de Marrakech, quartier médiéval aux allures de labyrinthe, est un lieu animé, avec sa place Jemaa el-Fna et ses souks (marchés) vendant des céramiques, des bijoux et des lanternes en métal. La casbah des Oudayas à Rabat, la capitale, est un fort royal du XIIe siècle qui surplombe l\'océan.'),
(53, 'Los Angeles', 700, 3, 'https://fr.linguland.com/pics//backgr-pics/Los-Angeles.jpg', 'Los Angeles, ville tentaculaire en Californie du Sud, est le cœur de l\'industrie cinématographique et télévisuelle. Non loin du panneau Hollywood, les studios Paramount Pictures, Universal et Warner Brothers proposent des visites pour découvrir leurs installations. Sur Hollywood Boulevard, devant le Grauman\'s Chinese Theatre, les plus grandes stars du cinéma ont laissé leurs empreintes de pieds et de mains dans le ciment. Le Walk of Fame honore des milliers de célébrités et les vendeurs proposent des plans répertoriant les maisons des stars.'),
(54, 'Martinique', 500, 2, 'https://blogvoyages.fr/wp-content/uploads/2018/04/martinique.jpg', 'La Martinique est une île des Caraïbes qui fait partie des petites Antilles. Région d\'outre-mer de la France, sa culture reflète un mélange distinctif d\'influences françaises et antillaises. Sa plus grande ville, Fort-de-France, abrite des collines abruptes, des rues étroites et La Savane, un jardin bordé de boutiques et de cafés dans lequel a été érigée la statue de Joséphine de Beauharnais, première épouse de Napoléon Bonaparte, native de l\'île.');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `message` varchar(250) NOT NULL,
  `author` varchar(150) NOT NULL,
  `id_location` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `message`, `author`, `id_location`, `created_at`) VALUES
(21, 'Super voyage!', 'Ludo', 'Cambodge', '2021-03-04 16:39:00'),
(22, 'Merci pour cette organisation!', 'Sophie', 'Philipines', '2021-03-04 16:42:06'),
(23, 'Paysages à couper le souffle!', 'Arnaud', 'Martinique', '2021-03-05 10:26:24'),
(24, 'ff', 'ff', 'Los Angeles', '2021-03-07 08:38:07');

-- --------------------------------------------------------

--
-- Structure de la table `tour_operators`
--

CREATE TABLE `tour_operators` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `grade` int(2) NOT NULL,
  `link` varchar(255) NOT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tour_operators`
--

INSERT INTO `tour_operators` (`id`, `name`, `grade`, `link`, `is_premium`) VALUES
(1, 'Club med', 5, 'https://www.clubmed.fr/', 0),
(2, 'Tui', 4, 'https://www.tui.fr/', 0),
(3, 'FRAM', 3, 'https://www.fram.fr/', 1),
(4, 'Locatour', 5, 'https://www.locatour.com/', 0),
(5, 'Tohapi', 4, 'https://www.tohapi.fr/', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_tour_operator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `id_tour_operator`) VALUES
(11, 'FRAM', '1ebee5b3bcac949e0f3c75dff22b4ad2', 3),
(18, 'Tui', '9e85181ac3f10499ff3a66980f48c7cb', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id_destination`),
  ADD KEY `fk_operator` (`id_tour_operator`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tour_operators`
--
ALTER TABLE `tour_operators`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_tour_operator`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id_destination` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `tour_operators`
--
ALTER TABLE `tour_operators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `fk_operator` FOREIGN KEY (`id_tour_operator`) REFERENCES `tour_operators` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_tour_operator` FOREIGN KEY (`id_tour_operator`) REFERENCES `tour_operators` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
