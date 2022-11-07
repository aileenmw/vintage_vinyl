-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 03. 11 2022 kl. 12:10:08
-- Serverversion: 10.4.21-MariaDB
-- PHP-version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vintage_vinyl`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `carts`
--

INSERT INTO `carts` (`id`, `time`, `status`, `user_id`) VALUES
(6, '2022-11-02 12:02:53', 1, 49),
(7, '2022-11-03 07:42:55', 1, 52),
(8, '2022-11-03 10:36:13', 1, 1),
(9, '2022-11-03 10:57:03', 1, 56);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `cart_items`
--

INSERT INTO `cart_items` (`id`, `record_id`, `cart_id`) VALUES
(2, 40, 6),
(4, 44, 6),
(5, 98, 6),
(8, 40, 6),
(12, 81, 6),
(14, 71, 6),
(15, 77, 6),
(17, 53, 6),
(20, 76, 6),
(21, 73, 6),
(22, 71, 6),
(23, 74, 6),
(24, 77, 6),
(27, 73, 6),
(32, 54, 6),
(36, 99, 6),
(37, 40, 6),
(38, 51, 6),
(39, 40, 6),
(40, 40, 6),
(41, 73, 7),
(46, 77, 7),
(47, 66, 6),
(48, 75, 6),
(49, 99, 6),
(55, 97, 9),
(56, 95, 9),
(58, 53, 9);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `displayName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `genres`
--

INSERT INTO `genres` (`id`, `name`, `displayName`) VALUES
(1, 'jazz', 'Jazz'),
(2, 'hiphop', 'HipHop'),
(3, 'motown', 'Motown'),
(4, 'r_n_b', 'R\'n\'B'),
(5, 'classical', 'Classical'),
(6, 'rock', 'Rock'),
(7, 'various', 'Various'),
(8, 'country', 'Country');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` varchar(250) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `year` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `records`
--

INSERT INTO `records` (`id`, `title`, `artist`, `text`, `genre_id`, `price`, `year`, `img`, `amount`) VALUES
(39, '100 Meisterwerke', 'Various', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 145, 1986, '100_meisterwerke.jpg', 20),
(40, 'Goldberg Variations', 'J.S. Bach', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 123, 1996, 'bach.jpg', 30),
(41, 'Beethoven Symphonies', 'Leonard Bernstein', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 214.95, 1988, 'beethovens_9.jpg', 25),
(42, 'Six', 'Andrea Boccelli', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 145, 2001, 'boccelli.jpg', 10),
(43, 'Chopin Ballades', 'Krystian Zimerman', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 159, 2002, 'chopin.jpg', 12),
(44, 'Beethoven Symphony No, 9', 'Herbert von Karajan', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 189, 1998, 'karajan.jpg', 20),
(45, 'Mozart, Klarinetkoncert', 'Wiener Philharmonika', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 156, 1979, 'mozart.jpg', 12),
(46, 'Various', 'Anne-Sophie Mutter', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 211, 2002, 'mutter.jpg', 20),
(47, 'Solo Piano', 'Philip Glass', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 139, 1989, 'philip_glass.jpg', 20),
(48, 'Quatro Stagnioni', 'Antonio Vivaldi', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 221, 2007, 'quatro_stagnioni.jpg', 35),
(49, 'Rogoletti', 'Verdi', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 156, 2004, 'rigoletto.jpg', 10),
(50, 'Symphony No. 3', 'Saint-Saens', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 5, 201, 1997, 'saint_saens.jpg', 5),
(51, 'Jazz', 'Acid', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 99, 2011, 'acid.png', 10),
(52, 'Quartet', 'Chet Baker', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 178, 1966, 'chet.jpg', 15),
(53, 'The complete Blue Note Recordings', 'Clifford Jones', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 245, 1963, 'clifford.jpg', 3),
(54, 'Blue Train', 'John Coltrane', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 189, 1969, 'coltrane.jpg', 5),
(55, 'Soul Jazz', 'Congo Revolution', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 111, 1974, 'congo_rev.jpg', 4),
(56, '\'Round about midnight at the Café Bohemia', 'Kenny Dorham', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 245, 1962, 'dorham.jpg', 20),
(57, 'Brunswick', 'Hans Koller and Jutta Hipp', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 249, 2018, 'german_jazz.jpg', 30),
(58, 'Greatest Hits', 'Billie Holiday', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 139, 1958, 'holiday.jpg', 33),
(59, 'The Complete Village Vanguard Recordings', 'Bill Evans', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 179, 1961, 'Jazz_BillEvans_7.jpg', 12),
(60, 'Kind of Blue', 'Miles Davis', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 199, 1978, 'miles.jpg', 5),
(61, 'Mood Indigo', 'Nina Simone', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 159, 1961, 'nina.jpg', 15),
(62, 'Night Train', 'Oscar Peterson', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 189, 1963, 'Oscar-Peterson-Night-Train.jpg', 30),
(63, 'Devine', 'Sarah Vaughan', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 1, 245, 1958, 'sarah_vaugham.jpg', 10),
(64, 'Best Of', 'David Ruffin', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 3, 159, 1984, 'david_ruffin.jpg', 4),
(65, 'The Ultimate Collection', 'Jackson5', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 3, 245, 1981, 'jackson_5.jpg', 15),
(66, 'The Singles', 'Stevie Wonder', 'Here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 3, 159, 1963, 'stevie_wonder.jpg', 15),
(67, 'In The Pocket', 'Commodores', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 3, 149, 1982, 'commodores.jpg', 10),
(68, 'What\'s going on', 'Marvin Gaye', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 3, 245, 1985, 'marvin_gaye.jpg', 28),
(69, 'Cloud Nine', 'The Temptations', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 3, 279, 1969, '1969-tempts-cloud9.jpg', 10),
(70, 'It\'s dark and hell is hot', 'DMX', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 2, 169, 1992, 'dmx.jpg', 20),
(71, 'Fettes Brot lässt Grüßen', 'Fettes Brot', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 2, 278, 2008, 'fettes_brot.jpg', 8),
(72, 'The Score', 'Fugees', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 2, 187, 1999, 'fugees.jpg', 249),
(73, 'Straight outa Compton', 'N.W.A.', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 2, 179, 1987, 'nwa..jpg', 10),
(74, 'Enter The Wu-Tang', 'The Wu-Tang Clan', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 2, 230, 1992, 'wu_tang.jpg', 10),
(75, 'Hip-Hop', 'Wanted', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 2, 139, 1989, 'wanted_hip_hop.jpg', 4),
(76, 'Hip Hop is Dead', 'NaS', 'Shere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 2, 279, 1999, 'nas.jpg', 25),
(77, 'Blackout!', 'Methodman Redman', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 2, 156, 2001, 'methodman_and_redman.jpg', 4),
(78, 'Renaissance', 'Aswad', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 4, 215, 1997, 'aswad.jpg', 12),
(79, 'Things have changed', 'Bettye Lavette', 'Shere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 4, 239, 1986, 'betty_lavette.jpg', 6),
(80, 'Hip Hop meets R\'n\'B', 'Various', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 4, 159, 2018, 'rnb.jpg', 20),
(81, 'In the lonely hour', 'Sam Smith', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 4, 249, 2018, 'sam_smith.jpg', 50),
(82, 'Subversive BEat', 'Working-Class Devils', 'Here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 4, 239, 1971, 'working_class_devils.jpg', 25),
(83, 'Love Power Peace', 'James Brown', 'Phere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 4, 269, 1972, 'james_brown.jpg', 13),
(84, 'New Favorite', 'Allison Krauss', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 179, 2014, 'alison_krauss_and_union_station.jpg', 10),
(85, 'SteelTown', 'Big Country', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 159, 1997, 'big_country.jpg', 22),
(86, 'Pure&amp;Simle', 'Dolly Parton', 'Ghere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 139, 1979, 'dolly_parton.jpg', 2),
(87, 'Country Music', 'Elvis Presley', 'Gere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 269, 1959, 'elvis.jpg', 25),
(88, 'Collected', 'J.J.Cale', 'Phere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 269, 1978, 'jjcale.jpg', 12),
(89, 'Best of', 'Kenny Rogers', 'Vhere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 158, 1996, 'kenny_rogers.jpg', 30),
(90, 'Country Hustle', 'Jeb Loy Nichols', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 139, 2016, 'nichols.jpg', 5),
(91, 'Sentimentally Yours', 'Patsy Cline', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 8, 157, 1972, 'patsy_cline.jpg', 13),
(92, 'Low', 'David Bowie', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 235, 1980, 'bowie.jpg', 30),
(93, 'The Doors', 'The Doors', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 169, 1977, 'doors.jpg', 20),
(94, 'Zeppelin', 'Led Zeppelin', 'Chere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 249, 1982, 'led-zeppelin-cover.jpg', 40),
(95, 'Nevermind', 'Nirvana', 'Here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 245, 1998, 'nirvana.jpg', 25),
(96, 'A night at the opera', 'Queen', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 245, 1984, 'queen-night-at-the-opera.jpg', 30),
(97, 'Sticky Fingers', 'Rolling Stones', 'Where are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 285, 1976, 'rolling-stones-sticky.jpg', 8),
(98, 'Born to Run', 'Bruce Springsteen', 'Mere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 325, 1982, 'springsteen-born-to-run.jpg', 10),
(99, 'The Wall', 'Pink Floyd', 'Are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 236, 1979, 'the-wall-album-cover.jpg', 20),
(100, 'War', 'U2', 'Many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 6, 278, 1986, 'u2.jpg', 22);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'employee'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `pWord` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `fName`, `lName`, `userName`, `pWord`, `email`, `role_id`) VALUES
(1, 'Aileen', 'Mason', 'admin', '1234', 'admin@example.com', 1),
(2, 'Mary', 'Moe', 'Mamo', '1234', 'mary@example.com', 2),
(3, 'Julie', 'Dooley', 'Jodo', '1234', 'julie@example.com', 2),
(49, 'Bunny', 'Pitt', 'BuPi', '1234', 'bun@pit.com', 3),
(52, 'Lisa', 'Hansen', 'liha', '1234', 'liha@gmail.com', 3),
(56, 'Conniecola', 'Larsen', 'cola', '1234', '', 3);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user` (`user_id`);

--
-- Indeks for tabel `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_record` (`record_id`),
  ADD KEY `item_to_cart` (`cart_id`);

--
-- Indeks for tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchased_cart` (`cart_id`);

--
-- Indeks for tabel `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `record_genre` (`genre_id`);

--
-- Indeks for tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role` (`role_id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tilføj AUTO_INCREMENT i tabel `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Tilføj AUTO_INCREMENT i tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tilføj AUTO_INCREMENT i tabel `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tilføj AUTO_INCREMENT i tabel `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Tilføj AUTO_INCREMENT i tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Begrænsninger for tabel `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_record` FOREIGN KEY (`record_id`) REFERENCES `records` (`id`),
  ADD CONSTRAINT `item_to_cart` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`);

--
-- Begrænsninger for tabel `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchased_cart` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`);

--
-- Begrænsninger for tabel `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `record_genre` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Begrænsninger for tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
