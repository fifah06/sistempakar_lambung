-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2024 pada 04.25
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idpenyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `basis_aturan`
--

INSERT INTO `basis_aturan` (`idaturan`, `idpenyakit`) VALUES
(11, 1),
(12, 2),
(13, 3),
(14, 4),
(15, 5),
(16, 6),
(17, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`idaturan`, `idgejala`) VALUES
(2, 12),
(2, 11),
(2, 7),
(2, 9),
(3, 15),
(3, 9),
(3, 14),
(3, 8),
(2, 10),
(2, 16),
(5, 7),
(5, 12),
(5, 8),
(6, 12),
(6, 8),
(6, 11),
(6, 2),
(7, 7),
(7, 12),
(7, 8),
(8, 7),
(8, 12),
(8, 8),
(8, 11),
(9, 7),
(9, 12),
(9, 8),
(10, 7),
(10, 12),
(10, 8),
(10, 11),
(11, 1),
(11, 2),
(11, 5),
(11, 3),
(11, 8),
(11, 21),
(12, 17),
(12, 5),
(12, 16),
(12, 15),
(12, 3),
(12, 14),
(12, 21),
(13, 20),
(13, 19),
(13, 17),
(13, 9),
(13, 13),
(13, 10),
(13, 1),
(13, 7),
(13, 2),
(13, 5),
(13, 6),
(13, 4),
(14, 9),
(14, 23),
(14, 7),
(14, 5),
(14, 6),
(14, 8),
(15, 20),
(15, 19),
(15, 9),
(15, 10),
(15, 2),
(15, 5),
(15, 16),
(15, 4),
(15, 11),
(15, 14),
(15, 8),
(15, 12),
(16, 19),
(16, 1),
(16, 2),
(16, 5),
(16, 4),
(16, 3),
(16, 12),
(17, 1),
(17, 2),
(17, 5),
(17, 4),
(17, 3),
(17, 22),
(17, 8),
(17, 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_diagnosa`
--

CREATE TABLE `detail_diagnosa` (
  `iddiagnosa` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_diagnosa`
--

INSERT INTO `detail_diagnosa` (`iddiagnosa`, `idgejala`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 2),
(3, 3),
(3, 4),
(4, 2),
(4, 4),
(4, 6),
(4, 13),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `iddiagnosa` int(11) NOT NULL,
  `idpenyakit` int(11) NOT NULL,
  `persentase` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penyakit`
--

INSERT INTO `detail_penyakit` (`iddiagnosa`, `idpenyakit`, `persentase`) VALUES
(2, 4, 17),
(5, 1, 83),
(5, 2, 43),
(5, 3, 42),
(5, 4, 33),
(5, 5, 25),
(5, 6, 71),
(5, 7, 63);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `iddiagnosa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`iddiagnosa`, `tanggal`, `nama`) VALUES
(1, '2024-07-21', 'caniago'),
(2, '2024-07-22', 'indah'),
(3, '2024-07-22', 'beti'),
(4, '2024-07-24', 'Dita'),
(5, '2024-07-28', 'Fadilah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int(11) NOT NULL,
  `kdgejala` varchar(5) NOT NULL,
  `nmgejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgejala`, `kdgejala`, `nmgejala`) VALUES
(1, 'G01', 'Mual dan Muntah'),
(2, 'G02', 'Nafsu Makan Berkurang'),
(3, 'G03', 'Perut Sakit'),
(4, 'G04', 'Perut Kembung'),
(5, 'G05', 'Nyeri di Ulu Hati'),
(6, 'G06', 'Panas Di Dada'),
(7, 'G07', 'Muntah Darah'),
(8, 'G08', 'Sendawa Berlebihan'),
(9, 'G09', 'Berat Badan Turun'),
(10, 'G10', 'Lemah Letih Lesu'),
(11, 'G11', 'Sakit Pada Tukak Lambung'),
(12, 'G12', 'Sesak Napas'),
(13, 'G13', 'Kejang Perut'),
(14, 'G14', 'Sembelit'),
(15, 'G15', 'Perubahan Suhu dan Keringat Dingin'),
(16, 'G16', 'Perasaan Kenyang Berlebihan '),
(17, 'G17', 'BAB Hitam'),
(18, 'G18', 'Sering Cegukan'),
(19, 'G19', 'BAB Berdarah'),
(20, 'G20', 'Anemia'),
(21, 'G21', 'Sulit Tidur'),
(22, 'G22', 'Sakit Tenggorokan'),
(23, 'G23', 'Kadar Gula Tidak Terkontrol'),
(24, 'G24', 'Asam dan Pahit pada Mulut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `idpenyakit` int(11) NOT NULL,
  `kdpenyakit` varchar(5) NOT NULL,
  `nmpenyakit` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`idpenyakit`, `kdpenyakit`, `nmpenyakit`, `keterangan`, `solusi`) VALUES
(1, 'A01', 'Maag', 'Porsi makan yang terlalu banyak, Makan makanan penyebab maag\r\nMakan terlalu cepat, Banyak minum minuman berkafein seperti kopi, teh, dan cokelat.\r\nMerokok, Kecemasan dan stres yang tidak terkelola dengan baik, Kebiasaan makan mendekati waktu tidur.', 'Makan makanan hanya dalam porsi yang sesuai, Mengusahakan untuk selalu makan tepat waktu, Memperhatikan menu makanan yang dimakan, Batasi makanan yang terlalu pedas, asin, dan berlemak, Mencoba untuk makan secara perlahan, Mencoba mengurangi atau berhenti merokok'),
(2, 'A02', 'Dyspepsia', 'Merokok, terlalu banyak minum alkohol,\r\nEfek samping dari obat-obatan (terutama obat antiinflamasi non steroid, seperti aspirin, ibuprofen, dan naproxen)', 'Kurangi atau hindari makanan dan minuman yang mengandung kafein, Jika stres adalah pemicu terjadinya dispepsia pada diri Anda, pelajari metode baru untuk mengelola stres, seperti teknik relaksasi,Jika Anda merokok, Anda disarankan untuk berhenti. Merokok dapat mengiritasi lapisan perut.\r\nKurangi konsumsi alkohol, karena alkohol juga dapat mengiritasi lapisan perut'),
(3, 'A03', 'Kanker lambung', 'Memiliki Berat Badan Berlebih, Memiliki Kebiasaan Merokok, Jarang berolahraga, \r\nJarang makan sayur dan buah', 'Menghentikan kebiasaan merokok, rutin berolahraga dan makan buah, rutin menjalani pengobatan kanker yang disarnkan oleh dokter'),
(4, 'A04', 'Gastroparesis', 'Disebabkan oleh infeksi virus, efek samping obat-obatan', 'Menerapkan pola makan sehat, berhenti minum obat-obatan.'),
(5, 'A05', 'Tukak Lambung', 'Merokok, terutama pada seseorang yang terinfeksi bakteri H. pylori,\r\nKonsumsi makanan asam atau pedas\r\nStres yang tidak terkelola dengan baik,\r\nKonsumsi minuman beralkohol,\r\nKonsumsi obat antidepresan golongan SSRI', 'Cuci bahan makanan dan masak hingga benar-benar matang,\r\nHindari mengonsumsi minuman beralkohol,\r\nPastikan air yang diminum bersih dan sudah dimasak,\r\nBatasi penggunaan obat antiinflamasi nonsteroid (OAINS) sesuai anjuran dokter,\r\nPerbanyak makan sayur, buah, dan biji-bijian,\r\nHentikan kebiasaan merokok'),
(6, 'A06', 'Gastritis', 'Pola makan tidak teratur dan stres yang membuat produksi asam lambung berlebih,\r\nKebiasaan makan terlalu pedas, terlalu panas, makanan berlemak, serta makanan yang menghasilkan gas sehingga dapat mengiritasi lambung,\r\nKonsumsi obat-obatan yang dapat mengiritasi lambung, seperti beberapa jenis antibiotik, obat anti-nyeri, obat steroid, dan lain-lain, Infeksi bakteri\r\n', 'Atur pola makan agar lebih teratur, kurangi stres, kurangi makan pedas, kurangi obat-obatan yang menyebabkan iritasi lambung'),
(7, 'A07', 'GERD', 'Kebiasaan sering berbaring atau tidur setelah makan, Sering makan dalam porsi besar atau makan pada tengah malam, \r\nMengonsumsi makanan yang asam, berlemak, atau berbumbu pedas, \r\nMengonsumsi minuman berkafein, beralkohol, atau bersoda, \r\nMengalami gangguan kecemasan atau stres yang tidak terkelola dengan baik', 'Menurunkan berat badan bila menderita obesitas, \r\nMenghindari makanan dan minuman penyebab asam lambung naik, seperti makanan berlemak, serta minuman berkafein dan beralkohol, \r\nMakan secara perlahan dalam porsi kecil, tetapi sering, \r\nTidak membungkuk, duduk bersandar, atau berbaring, setidaknya sampai 2 jam setelah makan, \r\nMenghindari penggunaan pakaian ketat agar tidak menekan perut, Tidak merokok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`, `role`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(10, 'fifah', '1ccc2fbaefc5be46264865be9ec49038', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`idaturan`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`iddiagnosa`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`idpenyakit`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `iddiagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `idpenyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
