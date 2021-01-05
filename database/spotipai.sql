-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 05:39 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotipai`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(3) NOT NULL,
  `title` varchar(150) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `title`, `year`) VALUES
(1, 'All Out', 2020),
(2, 'Wonder', 2020),
(3, 'Changes', 2020),
(4, 'This Dream of You', 2020),
(6, 'Nightmare', 2010),
(7, 'Free Spirit', 2019),
(8, 'Yang patah tumbuh yang hilang berganti', 2016),
(9, 'A Night at the Opera', 1975),
(10, 'City of Evil', 2005),
(11, 'Ocean Front Property', 1987),
(12, 'Speak Now', 2010),
(13, 'beerbongs and bentleys', 2018),
(14, 'Love Fake and Friendship', 2017),
(15, 'Meteora', 2003),
(17, 'Muddy Waters At Newport', 1996);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id_artist` int(3) NOT NULL,
  `nama_artist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id_artist`, `nama_artist`) VALUES
(1, 'Justin Bieber'),
(2, 'Ariana Grande'),
(3, 'Shawn Mendes'),
(4, 'Maroon 5'),
(5, 'K/DA'),
(6, 'Madison Beer'),
(7, 'Kim Petras'),
(8, 'Diana Krall'),
(10, 'Avenged Sevenfold'),
(11, 'Khalid'),
(12, 'Banda Neira'),
(13, 'Queen'),
(14, 'George Strait'),
(15, 'Taylor Swift'),
(16, 'Post Malone'),
(17, '21 savage'),
(18, 'Nidji'),
(19, 'Linkin Park'),
(20, 'Marshmellow'),
(22, 'Maddy Waters');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(3) NOT NULL,
  `nama_genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'K-Pop'),
(2, 'Pop'),
(3, 'Rock'),
(4, 'Classic Rock'),
(5, 'Jazz'),
(6, 'Alternatife'),
(7, 'Dance / Electronic'),
(8, 'R&B'),
(9, 'Blues'),
(10, 'Hip Hop'),
(11, 'Country'),
(12, 'Indie'),
(13, 'Chill'),
(14, 'Metal'),
(15, 'Accoustic');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id_song` int(3) NOT NULL,
  `title` varchar(220) NOT NULL,
  `year` int(4) NOT NULL,
  `song_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id_song`, `title`, `year`, `song_file`) VALUES
(1, 'Stuck With You', 2020, 'asdasdasdasdasdas.mp3'),
(2, 'Monster', 2020, 'asdasdasdsadasads.mp3'),
(3, 'Memories', 2019, 'Maroon 5 - Memories.mp3'),
(4, 'Villain', 2020, 'KDA - VILLAIN ft. Madison Beer & Kim Petras.mp3'),
(5, 'More', 2020, 'asdasdsadas.mp3'),
(6, 'Drum Go Dum', 2020, 'asdasdsadsadasdas.mp3'),
(7, 'All Around Me', 2020, 'asdsadsadasd.mp3'),
(8, 'I Wished On The Moon', 2020, 'asdsadsadsadas.mp3'),
(10, 'Nightmare', 2010, 'LAGUF1.MOBI - Avenged Sevenfold - Nightmare.mp3'),
(11, 'Talk', 2019, 'LAGU9.MOBI - Khalid - Talk.mp3'),
(12, 'Banda Neira', 2016, 'LAGUF1.MOBI - BANDA NEIRA - SAMPAI JADI DEBU.mp3'),
(13, 'Love of My Life', 1975, 'LAGUF1.MOBI - Queen - Love of My Life.mp3'),
(14, 'Bat Country', 2005, 'Avenged Sevenfold - Bat Country.mp3'),
(15, 'All My ex Live In Texas', 1987, 'LAGU9.MOBI - All My Ex s Live In Texas.mp3'),
(16, 'Mean', 2010, 'LAGUF1.MOBI - Taylor Swift - Mean.mp3'),
(17, 'Rockstar', 2018, 'LAGUF1.MOBI - Post Malone - rockstar ft. 21 Savage.mp3'),
(18, 'Bila Bersamamu', 2017, 'LAGUF1.MOBI - NIDJI - BILA BERSAMAMU.mp3'),
(19, 'Numb', 2003, 'LAGUF1.MOBI - Numb  - Linkin Park.mp3'),
(20, 'Alone', 2016, 'LAGUF1.MOBI - Marshmello - Alone.mp3'),
(21, 'Hoochie Coochie Man', 1996, 'LAGUF1.MOBI - Muddy Waters - Hoochie Coochie Man.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `song_album`
--

CREATE TABLE `song_album` (
  `id_song_album` int(3) NOT NULL,
  `id_song` int(3) NOT NULL,
  `id_album` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song_album`
--

INSERT INTO `song_album` (`id_song_album`, `id_song`, `id_album`) VALUES
(1, 4, 1),
(2, 2, 2),
(3, 6, 1),
(4, 5, 1),
(5, 7, 3),
(6, 8, 4),
(8, 10, 6),
(9, 11, 7),
(10, 12, 8),
(11, 13, 9),
(12, 14, 10),
(13, 15, 11),
(14, 16, 12),
(15, 17, 13),
(16, 18, 14),
(17, 19, 15),
(18, 21, 17);

-- --------------------------------------------------------

--
-- Table structure for table `song_artist`
--

CREATE TABLE `song_artist` (
  `id_song_artist` int(5) NOT NULL,
  `id_song` int(3) NOT NULL,
  `id_artist` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song_artist`
--

INSERT INTO `song_artist` (`id_song_artist`, `id_song`, `id_artist`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 4),
(6, 4, 5),
(7, 4, 6),
(8, 4, 7),
(9, 7, 1),
(10, 5, 5),
(11, 6, 5),
(12, 8, 8),
(14, 10, 10),
(15, 11, 11),
(16, 12, 12),
(17, 13, 13),
(18, 14, 10),
(19, 15, 14),
(20, 16, 15),
(21, 17, 16),
(22, 17, 17),
(23, 18, 18),
(24, 19, 19),
(25, 20, 20),
(26, 21, 22);

-- --------------------------------------------------------

--
-- Table structure for table `song_genre`
--

CREATE TABLE `song_genre` (
  `id_song_genre` int(5) NOT NULL,
  `id_song` int(3) NOT NULL,
  `id_genre` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song_genre`
--

INSERT INTO `song_genre` (`id_song_genre`, `id_song`, `id_genre`) VALUES
(1, 5, 1),
(2, 7, 2),
(3, 6, 1),
(4, 4, 1),
(5, 8, 5),
(6, 1, 2),
(7, 2, 2),
(8, 3, 2),
(10, 10, 3),
(11, 11, 8),
(12, 12, 12),
(13, 13, 3),
(14, 13, 4),
(15, 14, 14),
(16, 15, 11),
(17, 16, 11),
(18, 16, 13),
(19, 17, 10),
(20, 18, 15),
(21, 18, 13),
(22, 19, 6),
(23, 20, 7),
(24, 21, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `id_user_role` int(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_role`, `username`, `email`, `nama`, `password`) VALUES
(1, 1, 'lais', 'lais315@gmail.com', 'Lais', 'lais'),
(3, 2, 'arsyfpro', 'arsya@mail.com', 'Arsya Fikri Gengs', '12345678'),
(5, 2, 'haiqalrizkyr', 'haiqalrizkyr@gmail.com', 'Haiqal Rizky Ramadhan', 'password'),
(6, 2, 'mxl10', 'mxl10@gmail.com', 'mxl10', 'mxl12345'),
(7, 2, 'icad123', 'icad@gmail.com', 'irsyad', 'icad1234'),
(8, 2, 'nandaambiya', 'nanda@gmail.com', 'Nanda Ambiya', 'nandaambiya');

-- --------------------------------------------------------

--
-- Table structure for table `user_fav_song`
--

CREATE TABLE `user_fav_song` (
  `id_user_fav_song` int(5) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_song` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_fav_song`
--

INSERT INTO `user_fav_song` (`id_user_fav_song`, `id_user`, `id_song`) VALUES
(3, 3, 7),
(4, 3, 2),
(5, 3, 1),
(7, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist`
--

CREATE TABLE `user_playlist` (
  `id_user_playlist` int(4) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama_playlist` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_playlist`
--

INSERT INTO `user_playlist` (`id_user_playlist`, `id_user`, `nama_playlist`) VALUES
(2, 3, 'Lagu Santai'),
(3, 5, 'MyPlaylist');

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist_song`
--

CREATE TABLE `user_playlist_song` (
  `id_user_playlist_song` int(5) NOT NULL,
  `id_user_playlist` int(4) NOT NULL,
  `id_song` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_playlist_song`
--

INSERT INTO `user_playlist_song` (`id_user_playlist_song`, `id_user_playlist`, `id_song`) VALUES
(9, 2, 6),
(10, 2, 7),
(11, 2, 4),
(12, 3, 7),
(13, 3, 3),
(14, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(1) NOT NULL,
  `nama_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id_artist`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id_song`);

--
-- Indexes for table `song_album`
--
ALTER TABLE `song_album`
  ADD PRIMARY KEY (`id_song_album`),
  ADD KEY `id_song` (`id_song`),
  ADD KEY `id_album` (`id_album`);

--
-- Indexes for table `song_artist`
--
ALTER TABLE `song_artist`
  ADD PRIMARY KEY (`id_song_artist`),
  ADD KEY `id_song` (`id_song`),
  ADD KEY `id_artist` (`id_artist`);

--
-- Indexes for table `song_genre`
--
ALTER TABLE `song_genre`
  ADD PRIMARY KEY (`id_song_genre`),
  ADD KEY `id_song` (`id_song`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_role` (`id_user_role`);

--
-- Indexes for table `user_fav_song`
--
ALTER TABLE `user_fav_song`
  ADD PRIMARY KEY (`id_user_fav_song`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_song` (`id_song`);

--
-- Indexes for table `user_playlist`
--
ALTER TABLE `user_playlist`
  ADD PRIMARY KEY (`id_user_playlist`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_playlist_song`
--
ALTER TABLE `user_playlist_song`
  ADD PRIMARY KEY (`id_user_playlist_song`),
  ADD KEY `id_user_playlist` (`id_user_playlist`),
  ADD KEY `id_song` (`id_song`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id_artist` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id_song` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `song_album`
--
ALTER TABLE `song_album`
  MODIFY `id_song_album` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `song_artist`
--
ALTER TABLE `song_artist`
  MODIFY `id_song_artist` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `song_genre`
--
ALTER TABLE `song_genre`
  MODIFY `id_song_genre` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_fav_song`
--
ALTER TABLE `user_fav_song`
  MODIFY `id_user_fav_song` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_playlist`
--
ALTER TABLE `user_playlist`
  MODIFY `id_user_playlist` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_playlist_song`
--
ALTER TABLE `user_playlist_song`
  MODIFY `id_user_playlist_song` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `song_album`
--
ALTER TABLE `song_album`
  ADD CONSTRAINT `song_album_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`),
  ADD CONSTRAINT `song_album_ibfk_2` FOREIGN KEY (`id_song`) REFERENCES `song` (`id_song`);

--
-- Constraints for table `song_artist`
--
ALTER TABLE `song_artist`
  ADD CONSTRAINT `song_artist_ibfk_1` FOREIGN KEY (`id_artist`) REFERENCES `artist` (`id_artist`),
  ADD CONSTRAINT `song_artist_ibfk_2` FOREIGN KEY (`id_song`) REFERENCES `song` (`id_song`);

--
-- Constraints for table `song_genre`
--
ALTER TABLE `song_genre`
  ADD CONSTRAINT `song_genre_ibfk_1` FOREIGN KEY (`id_song`) REFERENCES `song` (`id_song`),
  ADD CONSTRAINT `song_genre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_role`) REFERENCES `user_role` (`id_user_role`);

--
-- Constraints for table `user_fav_song`
--
ALTER TABLE `user_fav_song`
  ADD CONSTRAINT `user_fav_song_ibfk_1` FOREIGN KEY (`id_song`) REFERENCES `song` (`id_song`),
  ADD CONSTRAINT `user_fav_song_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user_playlist`
--
ALTER TABLE `user_playlist`
  ADD CONSTRAINT `user_playlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user_playlist_song`
--
ALTER TABLE `user_playlist_song`
  ADD CONSTRAINT `user_playlist_song_ibfk_1` FOREIGN KEY (`id_user_playlist`) REFERENCES `user_playlist` (`id_user_playlist`),
  ADD CONSTRAINT `user_playlist_song_ibfk_2` FOREIGN KEY (`id_song`) REFERENCES `song` (`id_song`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
