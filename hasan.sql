-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2024 pada 14.04
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(7) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `id_kategori` varchar(7) NOT NULL,
  `tanggal` datetime NOT NULL,
  `dibaca` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `id_kategori`, `tanggal`, `dibaca`) VALUES
('B0001', 'Berita 1', 'isi berita, ini adalah isi dari berita pertama ......... dst.', 'k0002', '2024-02-23 01:39:37', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `komentar` varchar(150) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `nama`, `email`, `komentar`, `tanggal`) VALUES
(1, 'hasan', 'hasan@gmail.com', 'tes', '2024-01-27 08:46:30'),
(2, 'Hasan', 'hasan@gmail.com', 'coba isi buku tamu', '2024-01-29 07:54:43'),
(3, 'Hasan', 'hasan@gmail.com', '...', '2024-01-29 08:04:08'),
(4, 'Hasan', 'hasan@gmail.com', '...', '2024-01-29 08:04:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(7) NOT NULL,
  `nama_guru` varchar(35) NOT NULL,
  `id_mapel` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `id_mapel`, `no_hp`) VALUES
('G0001', 'Bambang', 'M0001', '081234567890'),
('G0002', 'Budi', 'M0003', '081234567891'),
('G0003', 'Sigit', 'M0002', '081234567892'),
('G0004', 'Susilo', 'M0004', '081234567890'),
('G0005', 'Bambang', 'M0004', '081234567893');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(7) NOT NULL,
  `kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('k0001', 'Ekstrakurikuler'),
('k0002', 'Event');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(7) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `id_guru` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_guru`) VALUES
('K0001', 'Kelas VII', 'G0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(7) NOT NULL,
  `mapel` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`) VALUES
('M0001', 'Bahasa Indonesia'),
('M0002', 'Matematika'),
('M0003', 'Bahasa Inggris'),
('M0004', 'Wali Kelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(7) NOT NULL,
  `nis` varchar(7) NOT NULL,
  `tugas1` decimal(5,2) NOT NULL,
  `tugas2` decimal(5,2) NOT NULL,
  `tugas3` decimal(5,2) NOT NULL,
  `ph1` decimal(5,2) NOT NULL,
  `ph2` decimal(5,2) NOT NULL,
  `ph3` decimal(5,2) NOT NULL,
  `pts` decimal(5,2) NOT NULL,
  `pas` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `tugas1`, `tugas2`, `tugas3`, `ph1`, `ph2`, `ph3`, `pts`, `pas`) VALUES
(1, '1', '0.00', '80.50', '75.40', '90.00', '0.00', '0.00', '0.00', '0.00'),
(2, '2', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `user` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `kerja` varchar(25) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`user`, `pass`, `nama`, `email`, `jenis`, `kerja`, `hobi`, `tanggal`) VALUES
('hasan123', 'hasan', 'Hasan', 'hasan@gmail.com', 'Pria', 'Lainnya', '', '2024-01-29'),
('hasan456', 'fc3f318fba8b3c1502bece62a27712df', 'Hasan', 'hasan@gmail.com', 'Pria', 'Lainnya', 'Lainnya ', '2024-01-29'),
('hasan789', '01c17306aec8a8dd1772c77e25c57daa', 'Hasan ', 'hasan@gmail.com', 'Pria', 'Lainnya', 'Lainnya ', '2024-01-29'),
('hsn123', '01c17306aec8a8dd1772c77e25c57daa', 'Hasan', 'hasan@gmail.com', 'Pria', 'ASN', '', '2024-01-29'),
('hsn456', '9cb70fec1989bc656eb262a5a4164cd1', 'Hasan', 'hasan@gmail.com', 'Pria', 'ASN', 'Travelling ', '2024-01-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(7) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `asal_sekolah` varchar(40) NOT NULL,
  `nilai` decimal(6,2) NOT NULL,
  `jarak` decimal(5,2) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_kelas` varchar(7) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `tanggal_mutasi` date NOT NULL,
  `pindahan_dari` varchar(30) NOT NULL,
  `pindahan_ke` varchar(30) NOT NULL,
  `alasan_mutasi_masuk` varchar(150) NOT NULL,
  `alasan_mutasi_keluar` varchar(150) NOT NULL,
  `tanggal_lulus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `asal_sekolah`, `nilai`, `jarak`, `no_hp`, `status`, `id_kelas`, `tanggal_daftar`, `tanggal_diterima`, `keterangan`, `tanggal_mutasi`, `pindahan_dari`, `pindahan_ke`, `alasan_mutasi_masuk`, `alasan_mutasi_keluar`, `tanggal_lulus`) VALUES
(1074, 1, 'Ahmad', 'Yogya', '2024-03-01', 'SD N 1 Yogya', '85.00', '20.00', '085111111111', 'Aktif', 'K0001', '2024-02-13 07:12:12', '0000-00-00', 'PPDB', '0000-00-00', '', '', '', '', '0000-00-00'),
(1075, 0, 'Hasan', 'Purworejo', '2021-06-10', 'SD N 2 Purworejo', '90.00', '85.00', '085222222222', 'Daftar', 'K0001', '2024-02-13 08:21:17', '0000-00-00', 'PPDB', '0000-00-00', '', '', '', '', '0000-00-00'),
(1085, 2, 'Budi', 'Jakarta', '2022-02-16', 'SD N 3 Jakarta', '91.00', '100.00', '085333333333', 'Aktif', 'K0002', '2024-02-13 08:42:03', '0000-00-00', 'Mutasi', '0000-00-00', 'SMP N 1 Jakarta', '', 'tidak mau di sekolah asal', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `user_role`) VALUES
('U0001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('U0002', 'hasan', 'f690d3b8d4b51c1f189d886b7bab26b7', 'admin'),
('U0003', 'budi', 'd5840f7173572092f8bfffbfe541ef62', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`user`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1088;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
