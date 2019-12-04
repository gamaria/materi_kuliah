-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Des 2019 pada 01.57
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ptsinar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_halaman`
--

CREATE TABLE `rb_halaman` (
  `id_halaman` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `judul_seo` varchar(255) NOT NULL,
  `isi_halaman` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` enum('psb','journal') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_halaman`
--

INSERT INTO `rb_halaman` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `username`, `status`) VALUES
(1, 'Selamat Datang di Sistem Pendaftaran Siswa Baru', 'selamat-datang-di-sistem-pendaftaran-siswa-baru', 'Sistem PSB online atau sistem informasi aplikasi penerimaan siswa baru online merupakan produk layanan aplikasi perangkat lunak  yang online real time dan 100%   berbasis web. Sistem   ini   berusaha   memenuhi kebutuhan   masyarakat khususnya  bagi orangtua  dan  calon  siswa  untuk  dapat melaksanakan  pendaftaran  ke sekolah dengan  aman  dan  tertib  dengan menyediakan  fitur  otomasi  proses penerimaan  siswa  baru secara  langsung  menggunakan  media internet,  mulai  dari proses pendaftaran, proses seleksi, hingga pengumuman hasil penerimaan siswa secara langsung nyata melalui internet.\r\n\r\nYayasan phpmu.com didirikan di Padang dengan Akte Notaris Leurentia Siti Nyoman tertanggal 6 Maret 1996.Pada tahun pertama ini dibukalah taman kanak-kanak dan plygroup dengan murid berjumlah 73 orang dan kampusnya berlokasi di jalan Thamrin No.22-25', 'admin', 'psb'),
(2, 'Prosedur Pendaftaran Siswa Baru', 'prosedur-pendaftaran-siswa-baru', 'Melakukan  pendaftaran secara online melalui website psb.dek.sch.id\nMembayar uang pendaftaran sebesar Rp 60.000,00 ke Rekening Sekolah :\nNo Rekening : xxxxxxxxxxxxxx\nAtas Nama : BPN 010 SMAK PADANG\nBRI UNIT PASAR BARU PADANG\n\n<b>Note : Bagi Bapak/Ibuk yang sudah melakukan pembayaran dan konfirmasi harap segera megirim pesan ke nomor 082384116431</b>\n\nUntuk Metode Tansfer.\ndengan format pesan : [jenis metode pembaran] [no_rekening] [nama anak/nama pesera] [nomor_konfirmasi]\nContoh Pesan Metode Transfer : Transfer 111112318923 Annisa Mardatilah QC401\n\nUntuk Metode Setoran.\nInvite/Add ID What''sApp dengan nomor 081267771344\ndengan format pesan : Kirim foto bukti slip setoran dan nama anak/peserta serta nomor konfirmasi\nContoh Format Pesan Whatsapp : [foto bukti slip setor] Annisa Mardatillah QC401\n\nMenyerahkan berkas dan ketentuan sebagai berikut apabila calon siswa dinyatakan lulus tes online.\nFoto kopi  rapor yang sudah dilegalisasi dari semester I - IV (1 rangkap)\nMemperlihatkan rapor asli\nSehat jasmani dan rohani (diperiksa di  SMK SMAK)\nTidak Buta Warna (diperiksa di SMK SMAK Padang)\nPas foto  warna terbaru ukuran 2x3 sebanyak 2 lembar dan 3X4 sebanyak 3 lembar', 'admin', 'psb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_menu`
--

CREATE TABLE `rb_menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `nama_menu` varchar(30) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `urutan` int(3) NOT NULL,
  `status` enum('psb','journal') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_menu`
--

INSERT INTO `rb_menu` (`id_menu`, `id_parent`, `nama_menu`, `icon`, `link`, `aktif`, `urutan`, `status`) VALUES
(1, 0, 'Beranda', 'home', 'index.mu', 'Ya', 1, 'psb'),
(2, 0, 'Aturan & Prosedur', 'th-list', 'halaman-prosedur-pendaftaran-siswa-baru.mu', 'Ya', 2, 'psb'),
(3, 0, 'Jadwal Pelaksanaan', 'calendar', '#', 'Ya', 3, 'psb'),
(4, 0, 'Alur Pendaftaran', 'retweet', '#', 'Ya', 4, 'psb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_users`
--

CREATE TABLE `rb_users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'sekolah',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `rb_users`
--

INSERT INTO `rb_users` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `no_telpon`, `jabatan`, `level`, `aktif`) VALUES
(1, 'admin', 'bff0cc42103de1b4721370e84dc24f635a7afeca41198c9b3e03946a1b6b7191d14356408a5e57ce6daf77e6e800c66fac7ab0482d57d48d23e6808e4b562daa', 'Administrator', 'admin@sman3bukittinggi.sch.id', '081267771344', 'Kepala IT', 'superuser', 'Y'),
(2, 'kepalabidang', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', 'Drs. Amri Jaya, M.Pd', 'amri.jaya@gmail.com', '082173054501', 'Kepala Bidang', 'kepala', 'Y'),
(107, 'admin', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'gamar', 'gamariamandar20@gmail.com', '000', 'administartor', 'superuser', 'Y'),
(110, 'admin2', '52162b7c164a3a97d217ebcca3bc268864d122f2650138efee7969eb80855a17cc0bae0d16560a7b2e9a9e50c7ec035024bc5e0d69ae48b0ad9198855e80ddfd', 'admin2', 'admin2', 'admin2', 'admin2', 'superuser', 'Y'),
(115, 'baim', 'bb46f404f7fb4adebfc759fce9c3ac9bfd311781384b10f0fdc8e80986ee16c4220ef5991baf3e6254bf75ed03c88a0db70bcdda0b6c422889471b77d796c43c', 'baim', 'ioido', 'ISOIDO', 'SIODSD', 'petugas', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_users_aktivitas`
--

CREATE TABLE `rb_users_aktivitas` (
  `id_users_aktivitas` int(10) NOT NULL,
  `identitas` varchar(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `os` varchar(50) NOT NULL,
  `status` enum('siswa','guru','superuser') NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rb_users_aktivitas`
--

INSERT INTO `rb_users_aktivitas` (`id_users_aktivitas`, `identitas`, `ip_address`, `browser`, `os`, `status`, `jam`, `tanggal`) VALUES
(1, '195704111980032004', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '10:59:57', '2016-04-13'),
(2, '9991268756', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '11:00:27', '2016-04-13'),
(3, '9994030915', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '11:01:44', '2016-04-14'),
(4, '9975540740', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '11:20:43', '2016-04-14'),
(5, '195901241986032002', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '11:21:04', '2016-04-14'),
(6, '0006223671', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '12:18:06', '2016-04-15'),
(7, '195912121986021004', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '12:18:32', '2016-04-15'),
(8, '197110292005011003', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '12:18:40', '2016-04-15'),
(9, '196109191988031006', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '12:18:49', '2016-04-16'),
(10, '196202191990032001', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '12:19:02', '2016-04-16'),
(11, '9999344284', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '12:19:24', '2016-04-16'),
(12, '9980725248', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '12:19:32', '2016-04-16'),
(13, '0006223671', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '12:19:42', '2016-04-16'),
(14, '2', '', ' Chrome 49.0.2623.112', 'Windows 7', 'guru', '06:13:43', '2016-04-23'),
(15, '195704111980032004', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '06:15:28', '2016-04-23'),
(16, '1', '', ' Chrome 49.0.2623.112', 'Windows 7', 'superuser', '06:27:20', '2016-04-23'),
(17, '195704111980032004', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '06:34:28', '2016-04-23'),
(18, '9980708111', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '06:36:21', '2016-04-23'),
(19, '195704111980032004', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '06:37:05', '2016-04-23'),
(20, '9994030915', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '06:41:40', '2016-04-23'),
(21, '195704111980032004', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '06:43:49', '2016-04-23'),
(22, '9991268756', '::1', 'Firefox 46.0', 'Windows 7', 'siswa', '06:46:06', '2016-04-23'),
(23, '1', '', ' Chrome 49.0.2623.112', 'Windows 7', 'superuser', '07:02:03', '2016-04-23'),
(24, '9980708111', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '07:21:03', '2016-04-23'),
(25, '9980720559', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '07:21:21', '2016-04-23'),
(26, '9991268756', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '07:22:01', '2016-04-23'),
(27, '9999152999', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'siswa', '07:29:17', '2016-04-23'),
(28, '195704111980032004', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'guru', '08:40:14', '2016-04-23'),
(29, '1', '', 'Chrome 49.0.2623.112', 'Windows 7', 'superuser', '08:45:52', '2016-04-23'),
(30, '1', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'superuser', '06:13:18', '2016-04-16'),
(31, '1', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'superuser', '03:12:26', '2016-04-15'),
(32, '1', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'superuser', '06:13:18', '2016-04-14'),
(33, '1', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'superuser', '03:12:26', '2016-04-13'),
(34, '1', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'superuser', '07:13:18', '2016-04-14'),
(35, '1', '::1', 'Chrome 49.0.2623.112', 'Windows 7', 'superuser', '05:12:26', '2016-04-13'),
(36, '1', '36.68.12.49', 'Chrome 49.0.2623.112', 'Windows 7', 'superuser', '10:32:19', '2016-04-23'),
(48, '1', '114.4.79.250', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '15:08:36', '2016-04-27'),
(47, '1', '36.84.224.134', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '10:17:00', '2016-04-27'),
(40, '195704111980032004', '114.4.21.153', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '07:50:45', '2016-04-27'),
(41, '1', '114.4.21.153', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '07:54:08', '2016-04-27'),
(42, '9980708111', '114.4.21.153', 'Chrome 50.0.2661.87', 'Windows 7', 'siswa', '07:55:08', '2016-04-27'),
(43, '9980722436', '114.4.21.153', 'Chrome 50.0.2661.87', 'Windows 7', 'siswa', '07:55:23', '2016-04-27'),
(44, '198605012009011001', '114.4.21.153', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '07:55:38', '2016-04-27'),
(45, '1', '114.4.21.153', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '07:55:51', '2016-04-27'),
(46, '1', '114.4.21.153', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '08:01:10', '2016-04-27'),
(49, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '20:16:59', '2016-04-27'),
(50, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '08:27:54', '2016-04-28'),
(51, '198710052010012011', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '10:41:56', '2016-04-28'),
(52, '195704111980032004', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '10:42:15', '2016-04-28'),
(53, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '13:12:06', '2016-04-28'),
(54, '9991268756', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'siswa', '13:30:48', '2016-04-28'),
(55, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '19:15:10', '2016-04-28'),
(56, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '10:02:22', '2016-04-29'),
(57, '195806161984000001', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '22:37:57', '2016-04-29'),
(58, '9991268756', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'siswa', '22:41:40', '2016-04-29'),
(59, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '23:09:20', '2016-04-29'),
(60, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '23:20:06', '2016-04-29'),
(61, '195704111980032004', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '06:14:36', '2016-04-30'),
(62, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '06:14:55', '2016-04-30'),
(63, '195806161984000001', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '06:18:35', '2016-04-30'),
(64, '195806161984000001', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '06:19:47', '2016-04-30'),
(65, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '10:00:28', '2016-04-30'),
(66, '9991268756', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'siswa', '10:01:25', '2016-04-30'),
(67, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '10:01:44', '2016-04-30'),
(68, '2', '::1', 'Chrome 50.0.2661.87', 'Windows 7', '', '10:02:29', '2016-04-30'),
(69, '196209051987031007', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '10:02:51', '2016-04-30'),
(70, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '10:37:52', '2016-04-30'),
(71, '195806161984000001', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'guru', '10:58:18', '2016-04-30'),
(72, '1', '::1', 'Chrome 50.0.2661.87', 'Windows 7', 'superuser', '12:57:17', '2016-04-30'),
(74, '1', '::1', 'Chrome 50.0.2661.94', 'Windows 7', 'superuser', '20:17:11', '2016-05-04'),
(75, '1', '::1', 'Chrome 50.0.2661.94', 'Windows 7', 'superuser', '22:34:59', '2016-05-11'),
(76, '1', '::1', 'Chrome 50.0.2661.102', 'Windows 7', 'superuser', '07:21:10', '2016-06-02'),
(77, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '22:52:32', '2016-06-19'),
(78, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '15:06:29', '2016-06-22'),
(79, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '15:45:59', '2016-06-22'),
(80, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '07:40:52', '2016-06-23'),
(81, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '11:41:34', '2016-06-23'),
(82, '9991268756', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'siswa', '04:56:37', '2016-06-29'),
(83, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '08:46:48', '2016-07-01'),
(84, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '15:32:49', '2016-07-02'),
(85, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '06:37:49', '2016-07-03'),
(86, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '11:24:00', '2016-07-04'),
(87, '9991268756', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'siswa', '12:24:55', '2016-07-04'),
(88, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '13:38:17', '2016-07-04'),
(89, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '16:41:51', '2016-07-04'),
(90, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '05:45:25', '2016-07-05'),
(91, '195704111980032004', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'guru', '09:59:50', '2016-07-05'),
(92, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '10:12:22', '2016-07-05'),
(93, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '10:34:34', '2016-07-05'),
(94, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '08:09:08', '2016-07-08'),
(95, '195806161984000002', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'guru', '11:15:49', '2016-07-08'),
(96, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '11:32:28', '2016-07-08'),
(97, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '13:30:18', '2016-07-08'),
(98, '9991268756', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'siswa', '13:31:00', '2016-07-08'),
(99, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '13:49:22', '2016-07-08'),
(100, '9991268756', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'siswa', '13:50:02', '2016-07-08'),
(101, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '15:27:03', '2016-07-08'),
(102, '9991268756', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'siswa', '15:54:51', '2016-07-08'),
(103, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '05:36:38', '2016-07-09'),
(104, '9991268756', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'siswa', '06:12:14', '2016-07-09'),
(105, '2', '::1', 'Chrome 51.0.2704.103', 'Windows 7', '', '06:18:50', '2016-07-09'),
(106, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '06:27:53', '2016-07-09'),
(107, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '06:57:52', '2016-07-09'),
(108, '195806161984000002', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'guru', '07:01:50', '2016-07-09'),
(109, '1', '::1', 'Chrome 51.0.2704.103', 'Windows 7', 'superuser', '05:41:14', '2016-07-10'),
(110, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '12:59:54', '2019-10-24'),
(111, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '13:06:23', '2019-10-24'),
(112, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '18:44:52', '2019-10-24'),
(113, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '08:00:09', '2019-10-25'),
(114, '123456', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'siswa', '08:10:30', '2019-10-25'),
(115, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '08:11:55', '2019-10-25'),
(116, '198710052010012011', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'guru', '08:13:35', '2019-10-25'),
(117, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '08:14:25', '2019-10-25'),
(118, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '18:56:41', '2019-10-25'),
(119, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '19:28:53', '2019-10-27'),
(120, '1', '::1', 'Chrome 77.0.3865.120', 'Windows 7', 'superuser', '07:45:38', '2019-10-29'),
(121, '1', '::1', 'Chrome 78.0.3904.70', 'Windows 7', 'superuser', '19:57:19', '2019-11-03'),
(122, '1', '::1', 'Chrome 78.0.3904.70', 'Windows 7', 'superuser', '20:01:43', '2019-11-03'),
(123, '107', '::1', 'Chrome 78.0.3904.70', 'Windows 7', 'superuser', '20:05:45', '2019-11-03'),
(124, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '20:08:20', '2019-11-10'),
(125, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '21:57:26', '2019-11-10'),
(126, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '21:57:45', '2019-11-10'),
(127, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '22:02:31', '2019-11-10'),
(128, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '22:04:06', '2019-11-10'),
(129, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '07:13:47', '2019-11-11'),
(130, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '07:17:36', '2019-11-11'),
(131, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '07:18:14', '2019-11-11'),
(132, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '07:19:25', '2019-11-11'),
(133, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '19:21:46', '2019-11-15'),
(134, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:12:15', '2019-11-15'),
(135, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '12:33:17', '2019-11-17'),
(136, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '13:05:14', '2019-11-17'),
(137, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '14:33:47', '2019-11-17'),
(138, '', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'siswa', '14:35:54', '2019-11-17'),
(139, '', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'siswa', '14:41:06', '2019-11-17'),
(140, '', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'siswa', '14:42:08', '2019-11-17'),
(141, '', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'siswa', '14:46:51', '2019-11-17'),
(142, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '14:51:15', '2019-11-17'),
(143, '', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'siswa', '14:53:35', '2019-11-17'),
(144, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '14:58:25', '2019-11-17'),
(145, '', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'siswa', '14:59:54', '2019-11-17'),
(146, '4', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:06:52', '2019-11-17'),
(147, '4', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:07:57', '2019-11-17'),
(148, '4', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:16:05', '2019-11-17'),
(149, '4', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:17:42', '2019-11-17'),
(150, '4', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:19:21', '2019-11-17'),
(151, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '15:23:49', '2019-11-17'),
(152, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '15:24:49', '2019-11-17'),
(153, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '15:25:37', '2019-11-17'),
(154, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '15:29:49', '2019-11-17'),
(155, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:31:11', '2019-11-17'),
(156, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:32:53', '2019-11-17'),
(157, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '15:33:30', '2019-11-17'),
(158, '111', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:53:46', '2019-11-17'),
(159, '111', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '15:57:02', '2019-11-17'),
(160, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '19:00:57', '2019-11-18'),
(161, '113', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '19:02:51', '2019-11-18'),
(162, '113', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '19:04:24', '2019-11-18'),
(163, '113', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '19:06:48', '2019-11-18'),
(164, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '19:14:48', '2019-11-18'),
(165, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '19:19:19', '2019-11-18'),
(166, '114', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '19:19:47', '2019-11-18'),
(167, '114', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '19:30:36', '2019-11-18'),
(168, '114', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '19:36:39', '2019-11-18'),
(169, '114', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '19:40:00', '2019-11-18'),
(170, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '19:41:47', '2019-11-18'),
(171, '114', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '19:42:16', '2019-11-18'),
(172, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '20:09:45', '2019-11-18'),
(173, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '20:14:19', '2019-11-18'),
(174, '114', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:32:53', '2019-11-18'),
(175, '114', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:33:38', '2019-11-18'),
(176, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '20:34:56', '2019-11-18'),
(177, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:39:34', '2019-11-18'),
(178, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:45:21', '2019-11-18'),
(179, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:48:42', '2019-11-18'),
(180, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:54:49', '2019-11-18'),
(181, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:57:53', '2019-11-18'),
(182, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '20:58:34', '2019-11-18'),
(183, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '20:58:44', '2019-11-18'),
(184, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '21:01:51', '2019-11-18'),
(185, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '21:05:05', '2019-11-18'),
(186, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '21:16:14', '2019-11-18'),
(187, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '21:18:09', '2019-11-18'),
(188, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '21:18:35', '2019-11-18'),
(189, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '21:19:01', '2019-11-18'),
(190, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '21:19:27', '2019-11-18'),
(191, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '21:19:59', '2019-11-18'),
(192, '115', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '21:20:43', '2019-11-18'),
(193, '107', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '21:24:11', '2019-11-18'),
(194, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '18:00:10', '2019-11-19'),
(195, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '18:17:59', '2019-11-19'),
(196, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '18:22:39', '2019-11-19'),
(197, '1', '::1', 'Chrome 78.0.3904.97', 'Windows 7', 'superuser', '18:23:55', '2019-11-19'),
(198, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '18:24:30', '2019-11-19'),
(199, '2', '::1', 'Chrome 78.0.3904.97', 'Windows 7', '', '18:26:13', '2019-11-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jkendaraan`
--

CREATE TABLE `tb_jkendaraan` (
  `id_jkendaraan` int(5) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jkendaraan`
--

INSERT INTO `tb_jkendaraan` (`id_jkendaraan`, `merek`, `ket`) VALUES
(2, 'esemka7', 'sdadsds7'),
(3, 'yamaha8', 'sdsdassf8'),
(4, 'fdfs', 'ffs'),
(5, 'toyota', 'dlfkldfkdlkfld'),
(6, 'admin', 'sllsas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan_keluar`
--

CREATE TABLE `tb_kendaraan_keluar` (
  `id_keluar` int(5) NOT NULL,
  `tgl_keluar` varchar(20) NOT NULL,
  `no_regis_keluar` varchar(20) NOT NULL,
  `kendaraan` varchar(20) NOT NULL,
  `dg_sementara` varchar(10) NOT NULL,
  `nm_seles` varchar(50) NOT NULL,
  `nm_pelangan` varchar(50) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `status_keluar` varchar(50) NOT NULL,
  `ket_k` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kendaraan_keluar`
--

INSERT INTO `tb_kendaraan_keluar` (`id_keluar`, `tgl_keluar`, `no_regis_keluar`, `kendaraan`, `dg_sementara`, `nm_seles`, `nm_pelangan`, `no_ktp`, `alamat`, `tlp`, `status_keluar`, `ket_k`) VALUES
(5, '20/11/1991', 'K001', '1234455A', 'DG555', 'Anif', 'Yusuf', '093033300093', 'Maliaoro', '233313131', 'Kredit', '-'),
(10, '20/11/1991', '232323232323', '12333', '323232', '3323', '32232', '343434', '3434343', '32332', 'Cash', '-'),
(11, '11/10/2019', 'K01920', 'A2009', '23311', 'Rudi', 'Gamaria Mandar', '02930394948494849', 'Kampung Pisang', '0852133339111', 'Cash', 'ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan_masuk`
--

CREATE TABLE `tb_kendaraan_masuk` (
  `id_masuk` int(25) NOT NULL,
  `tgl_masuk` varchar(20) NOT NULL,
  `no_regis` varchar(25) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `tahun_cc` int(5) NOT NULL,
  `no_rangka` varchar(100) NOT NULL,
  `no_mesin` varchar(100) NOT NULL,
  `ket_gudang` varchar(200) NOT NULL,
  `status_` varchar(200) NOT NULL,
  `ket_masuk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kendaraan_masuk`
--

INSERT INTO `tb_kendaraan_masuk` (`id_masuk`, `tgl_masuk`, `no_regis`, `merek`, `jenis`, `model`, `tahun_cc`, `no_rangka`, `no_mesin`, `ket_gudang`, `status_`, `ket_masuk`) VALUES
(7, '20/11/1990', '12333', 'yamaha8', 'jenis2', 'model toyota', 223444, '211', '121', '12121', '32323', 'djksjkdsjksk'),
(8, '11/09/2019', '023232923023', 'yamaha8', '11212', '211', 212121, '1212', '121212', '2121', '12121', 'qwqwq'),
(9, '09/12/2019', 'A2009', 'esemka7', 'J1234', 'M1234', 2009, 'R092829', 'M093030', 'G102920', 'New', '-'),
(10, '22/11/2019', 'M001', 'yamaha8', 'j1213', 'm11323', 2011, 'r5555656', 'm345454', 'A.', '-', '-'),
(11, '9090', 'ioio', 'yamaha8', 'klklk', 'lklk', 0, 'klk', 'lkl', 'lkl', 'lkl', ''),
(12, '000', 'llk', 'yamaha8', 'llk', 'kl', 0, 'kl', 'lkl', 'lkl', 'lkl', 'lk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id` int(11) NOT NULL,
  `id_petugas` varchar(30) NOT NULL,
  `nm_petugas` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `id_petugas`, `nm_petugas`, `password`, `level`) VALUES
(4, '131313a', 'yuyuna', '131313a', 'kepala'),
(5, '141414', 'gamar', '141414', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Cash'),
(2, 'Kredit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rb_halaman`
--
ALTER TABLE `rb_halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `rb_menu`
--
ALTER TABLE `rb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `rb_users`
--
ALTER TABLE `rb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `rb_users_aktivitas`
--
ALTER TABLE `rb_users_aktivitas`
  ADD PRIMARY KEY (`id_users_aktivitas`);

--
-- Indexes for table `tb_jkendaraan`
--
ALTER TABLE `tb_jkendaraan`
  ADD PRIMARY KEY (`id_jkendaraan`);

--
-- Indexes for table `tb_kendaraan_keluar`
--
ALTER TABLE `tb_kendaraan_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD UNIQUE KEY `kendaraan` (`kendaraan`),
  ADD UNIQUE KEY `no_regis_keluar` (`no_regis_keluar`);

--
-- Indexes for table `tb_kendaraan_masuk`
--
ALTER TABLE `tb_kendaraan_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rb_halaman`
--
ALTER TABLE `rb_halaman`
  MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rb_menu`
--
ALTER TABLE `rb_menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `rb_users`
--
ALTER TABLE `rb_users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `rb_users_aktivitas`
--
ALTER TABLE `rb_users_aktivitas`
  MODIFY `id_users_aktivitas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `tb_jkendaraan`
--
ALTER TABLE `tb_jkendaraan`
  MODIFY `id_jkendaraan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_kendaraan_keluar`
--
ALTER TABLE `tb_kendaraan_keluar`
  MODIFY `id_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_kendaraan_masuk`
--
ALTER TABLE `tb_kendaraan_masuk`
  MODIFY `id_masuk` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
