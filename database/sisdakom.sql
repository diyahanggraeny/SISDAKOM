-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2021 pada 14.13
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisdakom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `action_log`
--

CREATE TABLE `action_log` (
  `id_actlog` int(11) NOT NULL,
  `ip_adress` varchar(255) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_name`, `admin_email`, `admin_username`, `admin_password`, `admin_picture`) VALUES
(6, 'ilmu komputer 2017', 'ilmukomputer2017@gmail.com', 'admin_ilkom17', '$2y$10$WCgoxyU1FgGm2FBfFlmhHuaUH1ZWE9AlmqVrPN1vkZuPhH.05QJym', '5fe2f7e3a6b07.png'),
(8, 'ilmu komputer 2018', 'ilmukomputer2018@gmail.com', 'admin_ilkom18', '$2y$10$QArkdu5BlLK5xSacZPHOpebu7L1t2j.3CTwFq85DvU2XLUqWQ37gW', '5ff38e04e1d2f.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `htm` int(20) DEFAULT NULL,
  `kategori_event` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `informasi_event` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal_event` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `waktu_event` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `tempat_event` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `max_partisipan` int(10) DEFAULT NULL,
  `poster_event` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status_event` varchar(10) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `htm`, `kategori_event`, `informasi_event`, `tanggal_event`, `waktu_event`, `tempat_event`, `max_partisipan`, `poster_event`, `status_event`) VALUES
(23, 'Webinar web programming', 100000, 'Online', 'paling diminati 2020!', '2020-12-25', '12:00', 'Zoom', 50, '5fe44ccc24628.jpg', 'On Process'),
(30, 'Webinar Artificial Intelligence', 0, 'Online', 'Webinar paling dicari!', '2020-12-25', '12:30', 'Google meet', 1, '5fe44313c860d.jpg', 'Done'),
(34, 'Shop of Courage', 0, 'Online', 'Ikutilah event ini', '2021-01-09', '00:50', 'Zoom Meeting', 100, '5fecbce962d0b.png', 'Done'),
(35, 'Zadira', 50000, 'Online', 'Ikutilah seminar ini untuk mendapatkan pengetahuan tentang bisnis', '2021-01-20', '14:00', 'Universitas Negeri Jakarta', 100, '5fecbd4c8b4ee.png', 'Done'),
(36, 'Words of Courage', 70000, 'Online', 'Yuk daftar event ini', '2021-01-10', '17:50', 'Google Meet', 50, '5fecbd934863e.png', 'On Process');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_detail`
--

CREATE TABLE `event_detail` (
  `id_detail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `judul_pesan` varchar(255) NOT NULL,
  `isi_pesan` varchar(1000) NOT NULL,
  `file` varchar(255) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event_detail`
--

INSERT INTO `event_detail` (`id_detail`, `id_user`, `id_admin`, `id_event`, `judul_pesan`, `isi_pesan`, `file`, `timedate`) VALUES
(12, 1, 8, 30, 'link webinar', 'link zoom ', 'None', '2020-12-28 13:23:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_partisipan_bayar`
--

CREATE TABLE `event_partisipan_bayar` (
  `id_partisipan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event_partisipan_bayar`
--

INSERT INTO `event_partisipan_bayar` (`id_partisipan`, `id_user`, `id_event`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(22, 1, 23, '5ff45ed64c5bb.jpg', 'Cancel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_partisipan_gratis`
--

CREATE TABLE `event_partisipan_gratis` (
  `id_partisipan` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event_partisipan_gratis`
--

INSERT INTO `event_partisipan_gratis` (`id_partisipan`, `id_event`, `id_user`) VALUES
(7, 34, 2),
(10, 30, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `instansi` varchar(75) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `user_picture` blob NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user_username`, `user_email`, `full_name`, `instansi`, `angkatan`, `user_picture`, `user_password`, `phone_number`) VALUES
(1, 'carnation123', 'carnation123@gmail.com', 'carnation', '', '', '', '$2y$10$EX.Gj39H.oJumNxVd4sCk.abphNXhWBPhxPJ9ewIEZVbyXmFGMI8e', ''),
(2, 'azalea123', 'azalea@gmail.com', 'azalea', '', '', '', '$2y$10$MShMzBQWX1br3p8MxxxS2urqf.TBw0MQxedQfPc8ljtGKwKSzRs22', ''),
(3, 'sapphire123', 'sapphire@gmail.com', 'sapphire', '', '', '', '$2y$10$UV7C2U5FjyNZSSYXdtzKresv0bt7zZRzl/9JLIUYU2NqEsOrhTHva', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `action_log`
--
ALTER TABLE `action_log`
  ADD PRIMARY KEY (`id_actlog`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `event_detail`
--
ALTER TABLE `event_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_event` (`id_event`);

--
-- Indeks untuk tabel `event_partisipan_bayar`
--
ALTER TABLE `event_partisipan_bayar`
  ADD PRIMARY KEY (`id_partisipan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_event` (`id_event`);

--
-- Indeks untuk tabel `event_partisipan_gratis`
--
ALTER TABLE `event_partisipan_gratis`
  ADD PRIMARY KEY (`id_partisipan`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `action_log`
--
ALTER TABLE `action_log`
  MODIFY `id_actlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `event_detail`
--
ALTER TABLE `event_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `event_partisipan_bayar`
--
ALTER TABLE `event_partisipan_bayar`
  MODIFY `id_partisipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `event_partisipan_gratis`
--
ALTER TABLE `event_partisipan_gratis`
  MODIFY `id_partisipan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
