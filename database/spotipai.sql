-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 03:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id_artist` int(3) NOT NULL,
  `nama_artist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(3) NOT NULL,
  `nama_genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `song_album`
--

CREATE TABLE `song_album` (
  `id_song_album` int(3) NOT NULL,
  `id_song` int(3) NOT NULL,
  `id_album` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `song_artist`
--

CREATE TABLE `song_artist` (
  `id_song_artist` int(5) NOT NULL,
  `id_song` int(3) NOT NULL,
  `id_artist` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `song_genre`
--

CREATE TABLE `song_genre` (
  `id_song_genre` int(5) NOT NULL,
  `id_song` int(3) NOT NULL,
  `id_genre` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `id_user_role` int(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_role`, `username`, `email`, `nama`, `password`) VALUES
(1, 1, 'lais', 'lais315@gmail.com', 'lais', 'lais');

-- --------------------------------------------------------

--
-- Table structure for table `user_fav_song`
--

CREATE TABLE `user_fav_song` (
  `id_user_fav_song` int(5) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_song` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist`
--

CREATE TABLE `user_playlist` (
  `id_user_playlist` int(4) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama_playlist` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist_song`
--

CREATE TABLE `user_playlist_song` (
  `id_user_playlist_song` int(5) NOT NULL,
  `id_user_playlist` int(4) NOT NULL,
  `id_song` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_album` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id_artist` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id_song` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `song_album`
--
ALTER TABLE `song_album`
  MODIFY `id_song_album` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `song_artist`
--
ALTER TABLE `song_artist`
  MODIFY `id_song_artist` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `song_genre`
--
ALTER TABLE `song_genre`
  MODIFY `id_song_genre` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_fav_song`
--
ALTER TABLE `user_fav_song`
  MODIFY `id_user_fav_song` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_playlist`
--
ALTER TABLE `user_playlist`
  MODIFY `id_user_playlist` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_playlist_song`
--
ALTER TABLE `user_playlist_song`
  MODIFY `id_user_playlist_song` int(5) NOT NULL AUTO_INCREMENT;

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
