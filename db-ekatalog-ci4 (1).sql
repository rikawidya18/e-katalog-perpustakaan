-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2026 at 11:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-ekatalog-ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(4) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `id_kategori` int(1) NOT NULL,
  `id_penerbit` int(1) NOT NULL,
  `id_pengarang` int(1) NOT NULL,
  `id_rak` int(1) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `tempat_terbit` varchar(20) NOT NULL,
  `jenis_buku` varchar(20) NOT NULL,
  `bahasa` varchar(20) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `kode_eksemplar` varchar(100) NOT NULL,
  `eksemplar` int(1) NOT NULL,
  `cover` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` int(1) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `kode_buku`, `judul_buku`, `id_kategori`, `id_penerbit`, `id_pengarang`, `id_rak`, `tahun_terbit`, `tempat_terbit`, `jenis_buku`, `bahasa`, `isbn`, `kode_eksemplar`, `eksemplar`, `cover`, `deskripsi`, `id_user`, `tgl_input`) VALUES
(1, '303.SJA.a', 'Adaptasi Sosial Ekonomi Masyarakat Bajau di Pemukiman Baru Kalimantan Timur', 1, 4, 5, 1, '2017', 'Samarinda', 'Umum', 'Indonesia', '9786342881316', '2yhsja12', 2, '1776754828_034c9af53f2ff53375aa.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-01-14'),
(2, '390.SYA.a', 'Adat Istiadat Daerah Propinsi Daerah Istimewa Aceh', 2, 5, 10, 2, '1976', 'Banda Aceh', 'Umum', 'Indonesia', '2222222222', '12dk1k2j', 5, '1776755032_32201979c8e69c23d7b6.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2025-12-20'),
(3, '872gj.28e92', 'Analisis Kebudayaan Pewarisan dan Pembinaan Kebudayaan Indonesia Tahun III Nomor 2 1982/1983', 3, 7, 6, 3, '1972', 'Jakarta', 'Umum', 'Indonesia', '44444', '1332jwkkw', 7, '1776755344_78473798b24c849ee59e.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-02-03'),
(4, '12jk3189', 'Arsitektur Tradisional Batak Karo', 4, 8, 8, 4, '1962', 'Medan', 'Umum', 'Indonesia', '5555555', '1313hi89', 19, '1776755418_2db1cd2e2719df3efd89.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-02-12'),
(5, '1231h1hk189', 'Busana Betawi Sejarah & Prospek Pengembangan', 5, 8, 9, 1, '1985', 'Jakarta', 'Umum', 'Indonesia', '6666666', '12381yjhje', 12, '1776755494_028c61c30a0f6d3a4894.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 3, '2026-03-11'),
(6, '303.SJA.a', 'Adaptasi Sosial Ekonomi Masyarakat Bajau di Pemukiman Baru Kalimantan Timur', 6, 4, 5, 1, '2017', 'Samarinda', 'Umum', 'Indonesia', '11111111111', '2yhsja12', 2, '1776754828_034c9af53f2ff53375aa.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-01-16'),
(7, '390.SYA.a', 'Adat Istiadat Daerah Propinsi Daerah Istimewa Aceh', 7, 5, 10, 2, '1976', 'Banda Aceh', 'Umum', 'Indonesia', '2222222222', '12dk1k2j', 5, '1776755032_32201979c8e69c23d7b6.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-03-12'),
(8, '872gj.28e92', 'Analisis Kebudayaan Pewarisan dan Pembinaan Kebudayaan Indonesia Tahun III Nomor 2 1982/1983', 8, 7, 6, 3, '1972', 'Jakarta', 'Umum', 'Indonesia', '44444', '1332jwkkw', 7, '1776755344_78473798b24c849ee59e.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-03-19'),
(9, '12jk3189', 'Arsitektur Tradisional Batak Karo', 9, 8, 8, 4, '1962', 'Medan', 'Umum', 'Indonesia', '5555555', '1313hi89', 19, '1776755418_2db1cd2e2719df3efd89.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 3, '2026-04-23'),
(10, '1231h1hk189', 'Busana Betawi Sejarah & Prospek Pengembangan', 10, 8, 9, 1, '1985', 'Jakarta', 'Umum', 'Indonesia', '6666666', '12381yjhje', 12, '1776755494_028c61c30a0f6d3a4894.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 3, '2026-04-09'),
(11, '303.SJA.a', 'Adaptasi Sosial Ekonomi Masyarakat Bajau di Pemukiman Baru Kalimantan Timur', 1, 4, 5, 1, '2017', 'Samarinda', 'Umum', 'Indonesia', '11111111111', '2yhsja12', 2, '1776754828_034c9af53f2ff53375aa.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 3, '2026-02-13'),
(12, '390.SYA.a', 'Adat Istiadat Daerah Propinsi Daerah Istimewa Aceh', 2, 5, 10, 2, '1976', 'Banda Aceh', 'Umum', 'Indonesia', '2222222222', '12dk1k2j', 5, '1776755032_32201979c8e69c23d7b6.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 3, '2026-02-05'),
(13, '872gj.28e92', 'Buletin', 3, 7, 6, 3, '1972', 'Uganda', 'Umum', 'Indonesia', '44444', '1332jwkkw', 7, '1776755344_78473798b24c849ee59e.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 3, '2026-01-22'),
(14, '12jk3189', 'Arsitektur Tradisional Batak Karo', 4, 8, 8, 4, '1962', 'Medan', 'Umum', 'Indonesia', '', '1313hi89', 19, '1776755418_2db1cd2e2719df3efd89.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-04-07'),
(15, '1231h1hk189', 'Busana Betawi Sejarah & Prospek Pengembangan', 5, 8, 9, 1, '1985', 'Jakarta', 'Umum', 'Indonesia', '6666666', '12381yjhje', 12, '1776755494_028c61c30a0f6d3a4894.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-06'),
(16, '303.SJA.a', 'Adaptasi Sosial Ekonomi Masyarakat Bajau di Pemukiman Baru Kalimantan Timur', 6, 4, 5, 1, '2017', 'Samarinda', 'Umum', 'Indonesia', '11111111111', '2yhsja12', 2, '1776754828_034c9af53f2ff53375aa.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 3, '2026-02-19'),
(17, '390.SYA.a', 'Adat Istiadat Daerah Propinsi Daerah Istimewa Aceh', 7, 5, 10, 2, '1976', 'Banda Aceh', 'Umum', 'Indonesia', '2222222222', '12dk1k2j', 5, '1776755032_32201979c8e69c23d7b6.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-03-13'),
(18, '872gj.28e92', 'Analisis Kebudayaan Pewarisan dan Pembinaan Kebudayaan Indonesia Tahun III Nomor 2 1982/1983', 8, 7, 6, 3, '1972', 'Jakarta', 'Umum', 'Indonesia', '44444', '1332jwkkw', 7, '1776755344_78473798b24c849ee59e.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-04-19'),
(19, '12jk3189', 'Arsitektur Tradisional Batak Karo', 9, 8, 8, 4, '1962', 'Medan', 'Umum', 'Indonesia', '5555555', '1313hi89', 19, '1776755418_2db1cd2e2719df3efd89.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-04-15'),
(20, '1231h1hk189', 'Busana Betawi Sejarah & Prospek Pengembangan', 10, 8, 9, 1, '1985', 'Jakarta', 'Umum', 'Indonesia', '6666666', '12381yjhje', 12, '1776755494_028c61c30a0f6d3a4894.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2025-04-25'),
(21, '433.SJA.a', 'Metodologi Penelitian Kualitatif dan Kuantitatif', 11, 11, 5, 1, '2026', 'Jawa Timur', 'Umum', 'Indonesia', '5790941032992', '45dk1k2j', 1, '1779331157_7070acb89ca4de4ff652.jpg', 'Metodologi', 1, '2026-05-21'),
(23, '11111,h,,,', 'The Hunger Games', 6, 11, 2, 5, '0000', 'Sumbawa', 'Umum', 'Jerman', '112223344', 'jashih', 2, '1779345572_5cc1c0017887dab56735.jpg', 'Novel yang menceritakan kiamat', 1, '2026-05-21'),
(24, 'BK001', 'Laskar Pelangi', 12, 12, 11, 1, '2005', 'Yogyakarta', 'Umum', 'Indonesia', '9789793062657', 'EKS001', 3, '1781100247_04064156e4dcd4a7aaa1.jpg', 'Laskar Pelangi karya Andrea Hirata adalah novel inspiratif berlatar Pulau Belitung yang mengisahkan perjuangan sepuluh anak dari keluarga miskin dalam menempuh pendidikan di sebuah sekolah Muhammadiyah yang serbaketerbatasan. Melalui sudut pandang tokoh Ikal, novel ini menggambarkan dengan apik kisah persahabatan yang erat, dedikasi luar biasa para guru, serta kekuatan mimpi yang mampu menembus tembok kemiskinan dan ketimpangan sosial.', 1, '2026-06-10'),
(25, 'BK002', 'Bumi', 13, 13, 12, 1, '2014', 'Jakarta', 'Umum', 'Indonesia', '9779793062792', 'EKS002', 4, '1781100976_f95cae24ef2b9651e8ce.jpg', 'Bumi karya Tere Liye adalah novel fantasi petualangan yang mengisahkan Raib, seorang remaja 15 tahun yang memiliki kemampuan misterius untuk menghilang. Kehidupan normalnya berubah drastis ketika ia bersama dua sahabatnya, Seli (yang bisa mengeluarkan petir) dan Ali (si genius), terseret ke dalam konflik antardimensi dan terlempar ke dunia paralel bernama Klan Bulan. Di sana, ketiganya harus bersatu menggunakan kekuatan unik mereka untuk melawan kekuatan jahat yang mengancam keseimbangan dunia, sekaligus mengungkap rahasia besar asal-usul diri mereka.', 1, '2026-06-10'),
(26, 'BK003', 'Negeri 5 Menara', 12, 13, 13, 1, '2009', 'Jakarta', 'Umum', 'Indonesia', '9789793062777', 'EKS003', 2, '1781101301_3e09696c8eaa1803e7cc.jpg', '**Negeri 5 Menara** karya Ahmad Fuadi menceritakan perjalanan Alif Fikri yang menempuh pendidikan di Pondok Madani dan menjalin persahabatan dengan lima santri dari berbagai daerah. Bersama sahabat-sahabatnya, Alif belajar tentang kerja keras, disiplin, dan pentingnya memiliki cita-cita. Dengan berpegang pada semboyan *“Man Jadda Wajada”* (siapa yang bersungguh-sungguh akan berhasil), mereka berjuang meraih impian hingga berhasil mencapai kesuksesan di berbagai bidang.', 1, '2026-06-10'),
(27, 'BK004', 'Pulang', 12, 14, 12, 1, '2015', 'Jakarta', 'Umum', 'Indonesia', '9689793062792', 'EKS004', 3, '1781101441_f0dbd2d5de94b8fdf387.jpg', '**Pulang** karya Tere Liye menceritakan perjalanan hidup Bujang, seorang anak dari pedalaman Sumatra yang kemudian terlibat dalam dunia bisnis dan organisasi bayangan yang penuh konflik, kekuasaan, dan pengkhianatan. Dalam perjalanannya, Bujang menghadapi berbagai tantangan yang membentuk dirinya menjadi sosok yang kuat sekaligus mencari makna sejati dari rumah, keluarga, dan tempat untuk kembali pulang.\r\n', 1, '2026-06-10'),
(28, 'BK005', 'Cantik Itu Luka', 14, 13, 14, 2, '2002', 'Jakarta', 'Umum', 'Indonesia', '9789793062782', 'EKS005', 2, '1781101715_e559cb94be81f6393c35.jpg', '**Cantik Itu Luka** karya Eka Kurniawan mengisahkan kehidupan Dewi Ayu, seorang perempuan cantik keturunan Belanda-Indonesia di kota fiktif Halimunda yang hidup melalui masa kolonial hingga kemerdekaan Indonesia. Setelah meninggal dan bangkit kembali dari kuburnya 21 tahun kemudian, kisah hidupnya serta tragedi yang menimpa dirinya dan keempat putrinya terungkap, menggambarkan bagaimana kecantikan, cinta, kekerasan, dan sejarah kelam menjadi sumber penderitaan yang diwariskan dari generasi ke generasi.', 1, '2026-06-10'),
(29, 'BK006', 'Ronggeng Dukuh Paruk', 14, 13, 15, 2, '1982', 'Jakarta', 'Umum', 'Indonesia', '9789793062794', 'EKS006', 2, '1781101857_3914f673c5e47f3280b5.jpg', 'Ronggeng Dukuh Paruk karya Ahmad Tohari mengisahkan kehidupan Srintil, seorang gadis desa miskin di Dukuh Paruk yang dipercaya memiliki bakat menjadi ronggeng, penari tradisional yang dihormati sekaligus dipandang kontroversial oleh masyarakat. Ketika ketenarannya semakin meningkat, Srintil harus menghadapi berbagai konflik sosial, budaya, dan politik yang mengubah hidupnya, termasuk kisah cintanya dengan Rasus serta dampak tragedi politik tahun 1965 yang menimpa dirinya dan masyarakat Dukuh Paruk.', 1, '2026-06-10'),
(30, 'BK007', 'Ayat-Ayat Cinta', 15, 14, 16, 3, '2004', 'Jakarta', 'Umum', 'Indonesia', '9789793062792', 'EKS007', 4, '1781102010_fb279dc3fa43ec647055.jpg', 'Ayat-Ayat Cinta karya Habiburrahman El Shirazy mengisahkan Fahri, seorang mahasiswa Indonesia yang menempuh pendidikan di Universitas Al-Azhar, Kairo, Mesir. Di tengah perjuangannya menuntut ilmu, Fahri menghadapi berbagai persoalan hidup dan kisah cinta yang melibatkan beberapa perempuan dari latar belakang berbeda. Dengan berpegang teguh pada nilai-nilai Islam, ia berusaha menyelesaikan setiap konflik dengan kesabaran, keimanan, dan akhlak yang baik.', 1, '2026-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_download`
--

CREATE TABLE `tbl_download` (
  `id_download` int(1) NOT NULL,
  `tgl_download` date NOT NULL,
  `id_ebook` int(1) NOT NULL,
  `id_pengunjung` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_download`
--

INSERT INTO `tbl_download` (`id_download`, `tgl_download`, `id_ebook`, `id_pengunjung`) VALUES
(1, '2026-04-07', 1, 104),
(2, '2026-03-11', 11, 103),
(3, '2026-03-08', 2, 1),
(4, '2026-02-10', 12, 2),
(5, '2026-02-12', 21, 3),
(6, '2026-01-15', 22, 4),
(7, '2026-01-16', 23, 5),
(8, '2026-02-12', 3, 6),
(9, '2026-01-28', 2, 7),
(10, '2026-01-03', 7, 8),
(11, '2025-12-18', 27, 8),
(12, '2025-12-11', 3, 7),
(13, '2025-12-19', 13, 6),
(14, '2025-12-11', 4, 5),
(15, '2026-04-21', 14, 4),
(16, '2026-04-21', 24, 3),
(17, '2026-04-09', 5, 2),
(18, '2026-02-12', 15, 1),
(19, '2026-01-23', 25, 5),
(20, '2026-02-20', 6, 5),
(21, '2026-02-20', 16, 7),
(22, '2026-04-20', 7, 2),
(23, '2026-04-18', 17, 3),
(24, '2026-04-20', 26, 5),
(25, '2026-03-20', 27, 1),
(26, '2026-03-19', 8, 8),
(27, '2026-04-20', 18, 103),
(28, '2026-04-09', 28, 103),
(29, '2026-03-20', 29, 103),
(30, '2026-03-14', 9, 104),
(31, '2026-04-13', 19, 104),
(32, '2026-04-10', 10, 104),
(33, '2026-05-07', 2, 1),
(34, '2026-05-07', 2, 1),
(35, '2026-05-07', 2, 1),
(36, '2026-05-07', 2, 1),
(37, '2026-05-07', 2, 1),
(38, '2026-05-07', 2, 1),
(39, '2026-05-07', 18, 1),
(40, '2026-05-07', 18, 8),
(41, '2026-05-07', 31, 4),
(42, '2026-05-08', 31, 4),
(43, '2026-05-08', 2, 8),
(44, '2026-05-08', 8, 8),
(45, '2026-05-08', 18, 4),
(46, '2026-05-13', 2, 104),
(64, '2026-07-08', 34, 1),
(65, '2026-07-09', 34, 1),
(66, '2026-07-09', 32, 2),
(67, '2026-07-09', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ebook`
--

CREATE TABLE `tbl_ebook` (
  `id_ebook` int(4) NOT NULL,
  `judul_ebook` varchar(100) NOT NULL,
  `id_kategori` int(1) NOT NULL,
  `id_penerbit` int(1) NOT NULL,
  `id_pengarang` int(1) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `tempat_terbit` varchar(20) NOT NULL,
  `bahasa` varchar(20) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `cover` text NOT NULL,
  `file_ebook` text NOT NULL,
  `download` int(1) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` int(1) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ebook`
--

INSERT INTO `tbl_ebook` (`id_ebook`, `judul_ebook`, `id_kategori`, `id_penerbit`, `id_pengarang`, `tahun_terbit`, `tempat_terbit`, `bahasa`, `isbn`, `cover`, `file_ebook`, `download`, `deskripsi`, `id_user`, `tgl_input`) VALUES
(1, 'Manajemen Perpustakaan Digital', 1, 2, 6, '2005', 'Sumbawa', 'Indonesia', '124wefs', '1776756211_c866bc372278eb1889c3.png', '1776756211_19d572326b3031da3421.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-02-23'),
(2, 'Arkeologi Benda Purbakala', 2, 1, 8, '1982', 'Mataram', 'Indonesia', 't5r6tiuh', '1776756266_d3a5af86e6528441284c.png', '1776756266_71b27c39ff9df7065649.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-02-23'),
(3, 'Budaya Sasak Samawa dan Mbojo', 3, 7, 4, '2017', 'Mataram', 'Indonesia', '547ugjnjk', '1776756299_eb43605dac4118b0c944.png', '1776756299_cc2af64df91d55776062.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 5, '2026-02-23'),
(4, 'Drijaya Koleksi Museum', 4, 2, 6, '1988', 'Mataram', 'Indonesia', '123456ygh', '1776756329_2c2b90f646f0056e5b8f.png', '1776756329_5355e4c28e4a2006d9a7.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-02-23'),
(5, 'Museum dan Pelestarian Warisan Budaya', 5, 4, 2, '1978', 'Sumbawa', 'Indonesia', '345rtfyh', '1776756579_d19b525aac5bf17f86eb.png', '1776756579_7e667b533c269982ab8d.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-02-23'),
(6, 'Manajemen Perpustakaan Digital', 6, 2, 6, '2005', 'Sumbawa', 'Indonesia', '124wefs', '1776756211_c866bc372278eb1889c3.png', '1776756211_19d572326b3031da3421.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 5, '2026-02-23'),
(7, 'Arkeologi Benda Purbakala', 7, 1, 8, '1982', 'Mataram', 'Indonesia', 't5r6tiuh', '1776756266_d3a5af86e6528441284c.png', '1776756266_71b27c39ff9df7065649.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-01-23'),
(8, 'Budaya Sasak Samawa dan Mbojo', 8, 7, 4, '2017', 'Mataram', 'Indonesia', '547ugjnjk', '1776756299_eb43605dac4118b0c944.png', '1776756299_cc2af64df91d55776062.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-01-23'),
(9, 'Drijaya Koleksi Museum', 9, 2, 6, '1988', 'Mataram', 'Indonesia', '123456ygh', '1776756329_2c2b90f646f0056e5b8f.png', '1776756329_5355e4c28e4a2006d9a7.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 5, '2026-01-23'),
(10, 'Museum dan Pelestarian Warisan Budaya', 10, 4, 2, '1978', 'Sumbawa', 'Indonesia', '345rtfyh', '1776756579_d19b525aac5bf17f86eb.png', '1776756579_7e667b533c269982ab8d.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-01-23'),
(11, 'Manajemen Perpustakaan Digital', 1, 2, 6, '2005', 'Sumbawa', 'Indonesia', '124wefs', '1776756211_c866bc372278eb1889c3.png', '1776756211_19d572326b3031da3421.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-01-23'),
(12, 'Arkeologi Benda Purbakala', 2, 1, 8, '1982', 'Mataram', 'Indonesia', 't5r6tiuh', '1776756266_d3a5af86e6528441284c.png', '1776756266_71b27c39ff9df7065649.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 5, '2026-01-23'),
(13, 'Budaya Sasak Samawa dan Mbojo', 3, 7, 4, '2017', 'Mataram', 'Indonesia', '547ugjnjk', '1776756299_eb43605dac4118b0c944.png', '1776756299_cc2af64df91d55776062.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-01-23'),
(14, 'Drijaya Koleksi Museum', 4, 2, 6, '1988', 'Mataram', 'Indonesia', '123456ygh', '1776756329_2c2b90f646f0056e5b8f.png', '1776756329_5355e4c28e4a2006d9a7.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-02-01'),
(15, 'Museum dan Pelestarian Warisan Budaya', 5, 4, 2, '1978', 'Sumbawa', 'Indonesia', '345rtfyh', '1776756579_d19b525aac5bf17f86eb.png', '1776756579_7e667b533c269982ab8d.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 5, '2026-05-04'),
(16, 'Manajemen Perpustakaan Digital', 6, 0, 6, '2005', 'Sumbawa', 'Indonesia', '124wefs', '1776756211_c866bc372278eb1889c3.png', '1776756211_19d572326b3031da3421.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-05-04'),
(17, 'Arkeologi Benda Purbakala', 7, 1, 8, '1982', 'Mataram', 'Indonesia', 't5r6tiuh', '1776756266_d3a5af86e6528441284c.png', '1776756266_71b27c39ff9df7065649.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-18'),
(18, 'Budaya Sasak Samawa dan Mbojo', 8, 7, 4, '2017', 'Mataram', 'Indonesia', '547ugjnjk', '1776756299_eb43605dac4118b0c944.png', '1776756299_cc2af64df91d55776062.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 5, '2026-05-11'),
(19, 'Drijaya Koleksi Museum', 9, 2, 6, '1988', 'Mataram', 'Indonesia', '123456ygh', '1776756329_2c2b90f646f0056e5b8f.png', '1776756329_5355e4c28e4a2006d9a7.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-18'),
(20, 'Museum dan Pelestarian Warisan Budaya', 10, 4, 2, '1978', 'Sumbawa', 'Indonesia', '345rtfyh', '1776756579_d19b525aac5bf17f86eb.png', '1776756579_7e667b533c269982ab8d.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-05-25'),
(21, 'Manajemen Perpustakaan Digital', 2, 2, 6, '2005', 'Sumbawa', 'Indonesia', '124wefs', '1776756211_c866bc372278eb1889c3.png', '1776756211_19d572326b3031da3421.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-18'),
(22, 'Arkeologi Benda Purbakala', 2, 1, 8, '1982', 'Mataram', 'Indonesia', 't5r6tiuh', '1776756266_d3a5af86e6528441284c.png', '1776756266_71b27c39ff9df7065649.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-05-05'),
(23, 'Budaya Sasak Samawa dan Mbojo', 2, 7, 4, '2017', 'Mataram', 'Indonesia', '547ugjnjk', '1776756299_eb43605dac4118b0c944.png', '1776756299_cc2af64df91d55776062.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-05-24'),
(24, 'Drijaya Koleksi Museum', 4, 2, 6, '1988', 'Mataram', 'Indonesia', '123456ygh', '1776756329_2c2b90f646f0056e5b8f.png', '1776756329_5355e4c28e4a2006d9a7.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-12'),
(25, 'Museum dan Pelestarian Warisan Budaya', 5, 4, 2, '1978', 'Sumbawa', 'Indonesia', '345rtfyh', '1776756579_d19b525aac5bf17f86eb.png', '1776756579_7e667b533c269982ab8d.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-10'),
(26, 'Manajemen Perpustakaan Digital', 7, 2, 6, '2005', 'Sumbawa', 'Indonesia', '124wefs', '1776756211_c866bc372278eb1889c3.png', '1776756211_19d572326b3031da3421.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-05-18'),
(27, 'Arkeologi Benda Purbakala', 7, 1, 8, '1982', 'Mataram', 'Indonesia', 't5r6tiuh', '1776756266_d3a5af86e6528441284c.png', '1776756266_71b27c39ff9df7065649.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-10'),
(28, 'Budaya Sasak Samawa dan Mbojo', 8, 7, 4, '2017', 'Mataram', 'Indonesia', '547ugjnjk', '1776756299_eb43605dac4118b0c944.png', '1776756299_cc2af64df91d55776062.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-03'),
(29, 'Drijaya Koleksi Museum', 8, 2, 6, '1988', 'Mataram', 'Indonesia', '123456ygh', '1776756329_2c2b90f646f0056e5b8f.png', '1776756329_5355e4c28e4a2006d9a7.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 2, '2026-05-04'),
(30, 'Museum dan Pelestarian Warisan Budaya', 10, 4, 2, '1978', 'Sumbawa', 'Indonesia', '345rtfyh', '1776756579_d19b525aac5bf17f86eb.png', '1776756579_7e667b533c269982ab8d.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 5, '2026-05-10'),
(31, 'Nusa Tenggara Barat', 9, 8, 8, '1997', 'Mataram', 'Indonesia', '12345ftg', '1776853870_77072e5080c6860bf899.png', '1776853870_92f9a82dbe002b612787.pdf', 0, 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. ', 1, '2026-05-11'),
(32, ' KOMPUTER MODERN: HARDWARE, SOFTWARE, DAN JARINGAN', 16, 15, 17, '2026', 'Sumatera Barat', 'Indonesia', '6349672836', '1782197254_990fab3baef7e3e4549a.png', '1782197254_3674c395d5bd149ddb21.pdf', 1, 'Buku ini berisikan bahasan tentang Pengantar Komputer Modern, Sejarah dan Evolusi Teknologi Komputer, Konsep Sistem Komputer dan Komponen Utama, Perangkat Keras: Input Devices, Perangkat Keras: Output Devices, Arsitektur dan Organisasi Komputer, Sistem Operasi: Konsep, Fungsi, dan Jenis, Dasar-Dasar Jaringan Komputer.\r\nSumber: Penayang', 1, '2026-06-23'),
(33, 'PENGEMBANGAN WEB PHP (Hypertext Preprocessor) Language', 16, 16, 18, '2025', 'Semarang', 'Indonesia', '978-634-7227-21-8', '1782198369_989cfa5954ae81cf7f7e.png', '1782198369_96f6bd511eb51538052b.pdf', 0, 'PHP adalah salah satu bahasa pemrograman server-side yang sangat populer dan banyak digunakan dalam dunia pengembangan web karena kemudahan, fleksibilitas, serta kemampuannya untuk membuat konten web dinamis dan interaktif. Buku ini dirancang untuk memberikan pemahaman yang mendalam dan menyeluruh mulai dari konsep dasar hingga teknik-teknik lanjutan dalam PHP, sehingga pembaca dapat menguasai berbagai aspek penting dalam pengembangan web modern. \r\nSumber: Penayang', 1, '2026-06-23'),
(34, 'PENGANTAR PEMBELAJARAN MACHINE LEARNING', 16, 17, 19, '2025', 'Sumatera Barat', 'Indonesia', '978-634-7072-69-6', '1782198744_c9e12baf43f3984aeaf0.png', '1782198744_877fad0596f68d0e4d00.pdf', 3, 'Buku ini berisi pemahaman menyeluruh tentang konsep pembelajaran mesin. Tidak hanya mahasiswa, tetapi juga profesional perangkat lunak akan menemukan berbagai teknik dengan pembahasan yang memadai dalam buku ini yang memenuhi kebutuhan lingkungan profesional. Manajer teknis akan memperoleh wawasan tentang penerapan pembelajaran mesin ke dalam keseluruhan proses rekayasa perangkat lunak. Mahasiswa, pengembang, dan manajer teknis dengan latar belakang dasar ilmu komputer akan merasa materi dalam buku ini mudah dibaca. Setiap bab dimulai dengan paragraf pengantar, yang memberikan gambaran umum bab tersebut beserta tabel cakupan bab yang mencantumkan topik-topik yang dibahas dalam bab tersebut. Contoh pertanyaan di akhir bab membantu siswa mempersiapkan diri untuk ujian. Poin-poin pembahasan dan Poin-poin untuk direnungkan yang diberikan di dalam bab-bab membantu memperjelas dan memahami bab-bab tersebut dengan mudah dan juga mengeksplorasi kemampuan berpikir siswa dan profesional. Ringkasan diberikan di akhir setiap bab untuk tinjauan singkat topik-topik tersebut. Di seluruh buku ini, Anda akan melihat banyak latihan dan pertanyaan diskusi. Jangan lewatkan latihan-latihan ini – latihan-latihan ini penting untuk memahami konsep-konsep machine learning secara menyeluruh. Buku ini dimulai dengan pengantar tentang Pembelajaran Mesin yang menjadi landasan teori untuk bab-bab selanjutnya. Pemodelan, Rekayasa fitur, dan probabilitas dasar dibahas sebagai bab-bab sebelum memasuki dunia pembelajaran mesin yang membantu memahami konsep pembelajaran mesin dengan mudah di lain waktu. \r\nSumber: Penayang', 5, '2026-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(1) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Ilmu Sosial'),
(2, 'Sejarah dan Geografi'),
(3, 'Karya Umum'),
(4, 'Kesenian dan Olahraga'),
(5, 'Ilmu Murni / Pasti'),
(6, 'Kesusastraan'),
(7, 'Ilmu Terapan'),
(8, 'Agama'),
(9, 'Arsip'),
(10, 'Bahasa'),
(11, 'Metodologi Penelitian'),
(12, 'Novel'),
(13, 'Fantasi'),
(14, 'Sastra'),
(15, 'Religi'),
(16, 'Buku Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(1) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'TK'),
(2, 'SD'),
(3, 'SMP'),
(4, 'SMA'),
(5, 'Mahasiswa'),
(6, 'Pegawai '),
(7, 'Umum'),
(8, 'Peneliti');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` int(1) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(1, 'Departemen Pendidikan dan Kebudayaan Bagian Proyek Pengkajian dan Pembinaan Nilai-Nilai Budaya Kalimantan Timur'),
(2, 'Departemen Pendidikan dan Kebudayaan direktorat Jenderal Kebudayaan Proyek Pengembangan Media Kebudayaan'),
(3, 'Departemen Pendidikan dan Kebudayaan'),
(4, 'Bagian Proyek Pembinaan Permuseuman Jawa Barat 1995 - 1996'),
(5, 'Pemerintah Daerah Istimewa Atjeh'),
(6, 'Pemerintah Provinsi Daerah Khusus Ibukota Jakarta dinas Museum dan Pemugaran'),
(7, 'departemen Pendidikan dan Kebudayaan Proyek Penerbitan dan Buku Sastra Indonesia dan Daerah'),
(8, 'Departemen Pendidikan dan Kebudayaan Proyek Inventarisasi dan Dokumentasi Kebudayaan Daerah'),
(9, 'United Nations Educations, Scientific and Cultural Organization'),
(10, 'Proyek Media Kebudayaan Jakarta direktorat Jenderal Kebudayaan Departemen Pendidikan dan Kebudayaan'),
(11, 'Lingkar Edukasi Indonesia'),
(12, 'Bentang Pustaka'),
(13, 'Gramedia Pustaka Utama'),
(14, 'Republika'),
(15, 'MMFAST PUBLISHING'),
(16, 'Yayasan Prima Agus Teknik Bekerja sama dengan Universitas Sains & Teknologi Komputer (Universitas STEKOM)'),
(17, 'CV. Gita Lentera');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengarang`
--

CREATE TABLE `tbl_pengarang` (
  `id_pengarang` int(1) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengarang`
--

INSERT INTO `tbl_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'Drs. H. Sjahbandi'),
(2, 'Drs. T. Syamsuddin'),
(3, 'Subroto SM'),
(4, 'Soedarso SP.'),
(5, 'Arif Eko Suprihono'),
(6, 'Subrantini Soekamto'),
(7, 'Pitoyo Darmosugito'),
(8, 'Dra. Nunung Ruliah'),
(9, 'Dra. Hilderia Sitanggang, dkk'),
(10, 'B. Soelarto'),
(11, 'Andreaa Hirata'),
(12, 'Tere Liye'),
(13, 'Ahmad Fuadi'),
(14, 'Eka Kurniawan'),
(15, 'Ahmad Tohari'),
(16, 'Habiburrahman El Shirazy'),
(17, 'Agung Yuliyanto Nugroho, Pande Putu Ode Juliantara, I Putu GD Sukenada Andisana, Anak Agung Gde Wahyu Sukma Erlangga, Putu Widia Prasetia, Acep Taufik Hidayat, Ni Nyoman Emang Smrti, Abwabul Jinan'),
(18, 'Dr. Budi Raharjo, S.Kom, M.Kom, MM'),
(19, 'Januardi Nasir, Yonky Pernando, Masna Wati, Yodhi Yuniarthe, Oktavia Oktavia, Siti Nurhayati, Sri Lestari, Pradita Eko Prasetyo Utomo, Sharfina Faza, Yuliana Yuliana, Rezza Anugrah Mutiarawan, Santi Prayudani, Zulfan Zulfan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id_pengunjung` int(4) NOT NULL,
  `nama_pengunjung` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_kelas` int(1) NOT NULL,
  `verifikasi` int(1) DEFAULT NULL,
  `tgl_verifikasi` date DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id_pengunjung`, `nama_pengunjung`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `foto`, `password`, `id_kelas`, `verifikasi`, `tgl_verifikasi`, `tgl_input`) VALUES
(1, 'Rika', 'Perempuan', 'Cakra', '123456789098', 'rika@gmail.com', '1776927994_5fc3015f4b9063da5e6a.jpg', 'rika1234', 5, 1, '2026-04-23', '2026-04-22'),
(2, 'Salwa', 'Perempuan', 'Jempong', '123456789000', 'salwa@gmail.com', '1776927973_bbc6853618f17f296399.jpg', 'sakwa1234', 5, 1, '2026-04-23', '2026-04-22'),
(3, 'rizal', 'Laki-Laki', 'Ampenan', '123456789987', 'rizal@gmail.com', '1776927949_679f98a8291c1daf1cf8.jpg', 'rizal1234', 4, 1, '2026-04-23', '2026-04-22'),
(4, 'Ira', 'Perempuan', 'Pejanggik', '123456789076', 'ira@gmail.com', '1776927933_0d4648f98f9f79496f57.jpg', 'ira1234', 6, 1, '2026-04-23', '2026-03-12'),
(5, 'Surya', 'Laki-Laki', 'Pagesangan', '123456789876', 'surya@gmail.com', '1776927916_2fda5b369b59bf3b53b3.jpg', 'surya1234', 6, 1, '2026-04-23', '2026-02-18'),
(6, 'Dini', 'Perempuan', 'Labuapi', '123456789752', 'dini@gmail.com', '1776920706_9a53c7187f9ed4ba6a81.jpg', 'dini1234', 4, 2, '2026-04-23', '2026-04-23'),
(7, 'Putra', 'Laki-Laki', 'Kekalik', '098765432123', 'putra@gmail.com', '1776927896_08e499830e8d85bd2877.jpg', 'putra1234', 3, 1, '2026-04-23', '2026-04-23'),
(8, 'Raka', 'Laki-Laki', 'Pagutan', '123456789043', 'raka@gmail.com', '1776927884_9a1684796a73440134c6.jpg', 'raka1234', 3, 1, '2026-04-23', '2026-04-23'),
(103, 'Shane Hollander', 'Laki-Laki', 'Montreal, Canada', '1234567789', 'shanehocky@gmail.com', '1779345300_cb5f6218ba73d7301315.jpg', '1221', 7, 1, NULL, '2026-05-21'),
(104, 'Tara', 'Laki-Laki', 'Kekalik', '123456789000', 'tara@gmail.com', '1779619921_bd7eeb9f3171f23ff478.png', 'tara1234', 4, 1, NULL, '2026-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(1) NOT NULL,
  `nama_rak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak A'),
(2, 'Rak B'),
(3, 'Rak C'),
(4, 'Rak D'),
(5, 'Rak G');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(1) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `no_hp`, `password`, `foto`, `level`) VALUES
(1, 'Admin', 'admin@gmail.com', '111111111111', '1234', 'logo.jpg', 'Admin'),
(2, 'Wawa', 'wawa@gmail.com', '123456789876', 'wawa1234', '1776928057_f80b3ced0dfffd7fa8ff.jpg', 'Petugas'),
(5, 'Widya', 'widya@gmail.com', '000099998888777', 'widya1234', '1780758371_33e6d41931156b1815ac.jpg', 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web`
--

CREATE TABLE `tbl_web` (
  `id_web` int(1) NOT NULL,
  `nama_perpus` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kab_kota` text NOT NULL,
  `pos` varchar(10) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `sejarah` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_web`
--

INSERT INTO `tbl_web` (`id_web`, `nama_perpus`, `alamat`, `kecamatan`, `kab_kota`, `pos`, `no_telpon`, `sejarah`, `visi`, `misi`, `logo`) VALUES
(1, 'PERPUSTAKAAN MUSEUM NUSA TENGGARA BARAT', 'Jl. Panji Tilar Negara No.6,Taman Sari', 'Kec. Ampenan', 'Kota Mataram', '83114', '111111111111', '1976-1981\r\nMuseum Negeri Nusa Tenggara Barat mulai dirintis melalui Proyek Rehabilitasi dan Perluasan Museum pada tahun 1976.\r\n1982\r\nMuseum Negeri Nusa Tenggara Barat diresmikan pada tanggal 23 Januari 1982 oleh Menteri oleh Mendikbud RI Dr. Daoed Joesoef berdasarkan Surat Keputusan Mendikbud RI No. 022/0/1/1982.\r\n1982-2000\r\nMuseum Negeri Nusa Tenggara Barat menjadi UPT (Unit Pelaksana Teknis) Diktorat Jenderal Kebudayaan.\r\n2000-2016\r\nMuseum Negeri Nusa Tenggara Barat bernaung di bawah Pemerintah Provinsi Nusa Tenggara Barat dan menjadi UPTD (Unit Pelaksana Teknis Dinas) pada Dinas Kebudayaan dan Pariwisata Provinsi Nusa Tenggara Barat.\r\n2017\r\nSejak tanggal 1 Januari 2017, Museum Negeri Nusa Tenggara Barat merupakan UPTD pada Dinas Pendidikan dan Kebudayaan Provinsi Nusa Tenggara Barat', '“Jendela Informasi Budaya dan Ilmu Pengetahuan\"', 'Melakukan pengumpulan, penelitian, perawatan, pengawetan, dan penyajian benda yang mempunyai nilai budaya dan ilmiah;\r\nMelakukan urusan perpustakaan dan dokumentasi ilmiah;\r\nMemperkenalkan dan menyebarluaskan hasil penelitia koleksi benda yang mempunyai nilai budaya dan ilmiah;\r\nMelakukan bimbingan edukatif kultural dan penyajian rekreatif benda yang mempunyai nilai budaya dan ilmiah;\r\nMelakukan urusan tata usaha', '1762831137_7d9856ad8327fd207fe2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_download`
--
ALTER TABLE `tbl_download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `tbl_ebook`
--
ALTER TABLE `tbl_ebook`
  ADD PRIMARY KEY (`id_ebook`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `tbl_pengarang`
--
ALTER TABLE `tbl_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_web`
--
ALTER TABLE `tbl_web`
  ADD PRIMARY KEY (`id_web`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_download`
--
ALTER TABLE `tbl_download`
  MODIFY `id_download` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_ebook`
--
ALTER TABLE `tbl_ebook`
  MODIFY `id_ebook` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  MODIFY `id_penerbit` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pengarang`
--
ALTER TABLE `tbl_pengarang`
  MODIFY `id_pengarang` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id_pengunjung` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_web`
--
ALTER TABLE `tbl_web`
  MODIFY `id_web` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
