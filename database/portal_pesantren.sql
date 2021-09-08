-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Sep 2021 pada 04.42
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_pesantren`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'sandi', 'sandi', '79672e479fc2fe12f79f44d48821fbb1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `animasi`
--

CREATE TABLE `animasi` (
  `id_animasi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `animasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `foto_galeri` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `foto_gedung` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `foto_gedung`, `keterangan`) VALUES
(9, 'Gerbang Utama Putra', 'desain-sekolah-islam-terbaru.jpg', 'Gerbang Putra Berada Didepan Masjid Sebelah kirif'),
(10, 'gerbang Utama Putri', 'desain-sekolah-islam-terbaru1.jpg', 'Gerbang Utama Putri Berada Di Sebelah Kanan Masjidf'),
(13, 'aula putri', 'aula.jpg', 'aula putri berada di lantai 2 sebelah kanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_pengurus`
--

CREATE TABLE `jabatan_pengurus` (
  `id_jabatan_pengurus` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan_pengurus`
--

INSERT INTO `jabatan_pengurus` (`id_jabatan_pengurus`, `nama_jabatan`) VALUES
(1, 'Guru Ngaji'),
(2, 'Guru kitab'),
(4, 'Ketua'),
(5, 'pengurus administrasi'),
(6, 'Guru Fiqih'),
(7, 'pengurus putri'),
(8, 'pengurus putra'),
(9, 'Wali Santri'),
(10, 'Asisten Wali Santri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `kuota` int(10) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `kuota`, `keterangan`) VALUES
(3, 'Kamar', 0, 'KAMAR PUTRI'),
(4, 'Kamar 1', 4, 'jj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `jam` datetime NOT NULL,
  `tempat` text NOT NULL,
  `foto_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `nama_pengurus` varchar(255) NOT NULL,
  `foto_pengurus` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_jabatan_pengurus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nama_pengurus`, `foto_pengurus`, `no_telepon`, `jenis_kelamin`, `id_jabatan_pengurus`) VALUES
(1, 'zahro maimunah', 'zahro_mainunah_santri.jpg', 'tidak ada', 'P', 7),
(4, 'Ustd kholil Ridwan', 'ketua.jpg', '081326822455', 'L', 4),
(5, 'eva khotamis', 'guru_2.png', 'tidak ada', 'P', 1),
(6, 'amilya ningsih', 'guru_1.png', 'tidak ada', 'P', 5),
(7, 'Nur Shoim', 'guru_6.png', 'tidak ada', 'L', 6),
(8, 'zainal abidin', 'guru_7.png', 'tidak ada', 'L', 8),
(9, 'saiful anwar', 'guru_5.png', 'tidak ada', 'L', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `foto_struktur_organisasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `id_admin`, `nama`, `logo`, `visi`, `misi`, `alamat`, `email`, `no_telepon`, `kode_pos`, `foto_struktur_organisasi`) VALUES
(1, 1, 'Pondok Pesantren Al-Ittihad Cianjur', 'AL.png', 'Menciptakan Generasi Santri  yang Idealis', 'Menata sistem tata kelola pesantren agar dapat menjadi model lembaga pendidikan yang unggul.', 'Jl Suherman Tarogong Kaler, Garut, Jawa Barat 44151, Indonesia.', 'dedenindra71@gmail.com', '0859110112246', '44151', 'STRUKTUR_1_001.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_santri` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `nama_bapak` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_pengurus_pengajar` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id_santri`, `foto`, `nama_santri`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `nama_bapak`, `nama_ibu`, `status`, `tgl_masuk`, `id_admin`, `id_pengurus_pengajar`, `id_kamar`, `nama_gedung`) VALUES
(84, '5dfc4f0aeba5a21.jpg', 'f', '2021-08-26', 'L', 'k', 'k', 'k', 'k', '2021-08-22', 2, 5, 3, 'Aula Putra'),
(85, '3.png', ';', '2021-08-18', 'L', 'k', 'k', 'k', 'k', '2021-08-22', 2, 5, 3, 'Aula Putra');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indeks untuk tabel `jabatan_pengurus`
--
ALTER TABLE `jabatan_pengurus`
  ADD PRIMARY KEY (`id_jabatan_pengurus`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `id_jabatan_pengurus` (`id_jabatan_pengurus`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pengurus_pengajar` (`id_pengurus_pengajar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `jabatan_pengurus`
--
ALTER TABLE `jabatan_pengurus`
  MODIFY `id_jabatan_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`id_jabatan_pengurus`) REFERENCES `jabatan_pengurus` (`id_jabatan_pengurus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `santri_ibfk_2` FOREIGN KEY (`id_pengurus_pengajar`) REFERENCES `pengurus` (`id_pengurus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;