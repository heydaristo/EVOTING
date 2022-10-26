-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 02:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` tinyint(1) NOT NULL,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `fullname`, `password`) VALUES
(1, 'admin', 'administrator', '$2y$10$5ok3rcIOv/yNIlPIGo49a.cXRAiA5ZsnxbpijFoyy5EuuYyVrZetu');

-- --------------------------------------------------------

--
-- Table structure for table `t_kandidat`
--

CREATE TABLE `t_kandidat` (
  `id_kandidat` smallint(4) NOT NULL,
  `nama_calon` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `periode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` varchar(3) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `nama_kelas`) VALUES
('K01', 'X - TPLF 1'),
('K02', 'X - TPFL 2'),
('K03', 'X - TO 1'),
('K04', 'X - TO 2'),
('K05', 'X - PPLG 1'),
('K06', 'X - PPLG 2'),
('K07', 'X - KULINER 1'),
('K08', 'X - KULINER 2'),
('K09', 'X - BUSANA 1'),
('K10', 'X - BUSANA 2'),
('K11', 'XI - TO'),
('K12', 'XI - TPFL 1'),
('K13', 'XI - TPFL 2'),
('K14', 'XI - PPLG 1'),
('K15', 'XI - PPLG 2'),
('K16', 'XI - KULINER 1'),
('K17', 'XI - KULINER 2'),
('K18', 'XI - BUSANA'),
('K19', 'XII - TBSM 1'),
('K20', 'XII - TBSM 2'),
('K21', 'XII - TL'),
('K22', 'XII - RPL 1'),
('K23', 'XII - RPL 2'),
('K24', 'XII - TBG 1'),
('K25', 'XII - TBG 2'),
('K26', 'XII - TB');

-- --------------------------------------------------------

--
-- Table structure for table `t_suara`
--

CREATE TABLE `t_suara` (
  `nis` varchar(10) NOT NULL,
  `id_kandidat` smallint(4) NOT NULL,
  `periode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_suara`
--

INSERT INTO `t_suara` (`nis`, `id_kandidat`, `periode`) VALUES
('2996', 1, '2022/2023');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `id_kelas` varchar(3) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `pemilih` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `fullname`, `id_kelas`, `jk`, `pemilih`) VALUES
('2972', 'ADINDA WIDIA CHOIRUNNISA', 'K14', 'P', 'Y'),
('2973', 'AHMAD ARDHI SETIAWAN', 'K15', 'L', 'Y'),
('2974', 'ANISATUR ROFIQOH', 'K15', 'P', 'Y'),
('2975', 'ANITA SARI', 'K14', 'P', 'Y'),
('2976', 'ARDIAN MUHAMMAD IQBAL', 'K14', 'L', 'Y'),
('2977', 'AYU FEBRIANA PUTRI', 'K15', 'P', 'Y'),
('2978', 'BAGAS SAPUTRA', 'K14', 'L', 'Y'),
('2979', 'BOWO SAKTI WIRATAMA', 'K15', 'L', 'Y'),
('2980', 'CHELSEA ADITYA SUYATNO', 'K14', 'L', 'Y'),
('2981', 'DANUARDI WAHYU PAMBUDI', 'K15', 'L', 'Y'),
('2982', 'DEVA BUDIYANA', 'K15', 'P', 'Y'),
('2983', 'DIMAS ILHAMSYAH RAMADHAN', 'K14', 'L', 'Y'),
('2984', 'DINA MUSTIKA', 'K14', 'P', 'Y'),
('2985', 'DWI FEBRI STIYANINGRUM', 'K15', 'P', 'Y'),
('2986', 'DWI RANI SYARIFAH', 'K14', 'P', 'Y'),
('2987', 'EVA ROHAS', 'K15', 'P', 'Y'),
('2988', 'FELIM ADI PRABOWO', 'K15', 'L', 'Y'),
('2989', 'FIFIT SHOLIKHATUL MUFALAH', 'K14', 'P', 'Y'),
('2990', 'FIKA ISMATUL HAWA', 'K14', 'P', 'Y'),
('2991', 'FIKI ZULKARNAIN', 'K14', 'L', 'Y'),
('2992', 'FITRI RAHMAWATI', 'K15', 'P', 'Y'),
('2993', 'HAMDAN AINUN NAIM', 'K15', 'L', 'Y'),
('2994', 'ANDREAS ADI MINARSO', 'K14', 'L', 'Y'),
('2995', 'HENI WIJAYANTI', 'K15', 'P', 'Y'),
('2996', 'HEYDARISTO ZHAHIR RAZAQ', 'K14', 'L', 'Y'),
('2997', 'IBNU RIFAN', 'K15', 'L', 'Y'),
('2998', 'IKHA NUR ROCHAYATIN', 'K14', 'P', 'Y'),
('2999', 'IMA AZKA ROSADAH', 'K14', 'P', 'Y'),
('3000', 'JIHAN SALWA FITRIANI', 'K15', 'P', 'Y'),
('3001', 'KHAMILA NUR LUTFI AZZAHRA', 'K14', 'P', 'Y'),
('3002', 'KHOTIMATUS SA ADAH', 'K15', 'P', 'Y'),
('3003', 'LADA ARDI SACHIO LAWIDYO', 'K15', 'L', 'Y'),
('3004', 'LAILATUL RISA ISTIFADHOH', 'K14', 'P', 'Y'),
('3005', 'LATIFAH IRSYADIAH', 'K15', 'P', 'Y'),
('3006', 'LUK LUUL LATIFAH', 'K14', 'P', 'Y'),
('3007', 'MAULANA ZAHRONY', 'K14', 'L', 'Y'),
('3008', 'MAULIDA INTAN NUR AINI', 'K15', 'P', 'Y'),
('3009', 'MAYA INDAH LESTARI', 'K14', 'P', 'Y'),
('3010', 'MIFTAKHUL JANNAH', 'K15', 'P', 'Y'),
('3011', 'MUH ASA SUSILO FARIKH', 'K15', 'L', 'Y'),
('3012', 'MUHAMMAD KHUSNU MAROM', 'K14', 'L', 'Y'),
('3013', 'MUHAMMAD HAIKAL', 'K15', 'L', 'Y'),
('3014', 'MUHAMMAD HUDA GUNAWAN', 'K14', 'L', 'Y'),
('3015', 'MUHAMMAD RIFQIL KHANIF', 'K15', 'L', 'Y'),
('3016', 'MUTMAINAH SEPTIARINI', 'K14', 'P', 'Y'),
('3017', 'NABHAN AFLAHU SYAFIQ', 'K15', 'L', 'Y'),
('3018', 'NASYWA SUKRIA HANIFA', 'K14', 'P', 'Y'),
('3019', 'NATASYA AYU LESTANTI', 'K15', 'P', 'Y'),
('3020', 'NOR HIDAYAH FITRIYANI', 'K14', 'P', 'Y'),
('3021', 'NOVI INDRIYANI', 'K15', 'P', 'Y'),
('3022', 'NOVITA SARI', 'K14', 'P', 'Y'),
('3023', 'NUR HESTI MUGI RAHAYU', 'K15', 'P', 'Y'),
('3024', 'NUR IZZA', '', 'P', 'Y'),
('3025', 'RIKA RAHMA AULIA', 'K15', 'P', 'Y'),
('3026', 'RISKA ANGGUN ANGRIANI', 'K14', 'P', 'Y'),
('3027', 'SAHRUL LUKMAN HAKIM', 'K14', 'L', 'Y'),
('3028', 'SALMA NADIA AGUSTINA', 'K15', 'P', 'Y'),
('3029', 'SALMA VILINDIA PUTRI', 'K15', 'P', 'Y'),
('3030', 'SETYA NENG RAHAYU', 'K14', 'P', 'Y'),
('3031', 'SILVI WIDYA MAULANI', 'K15', 'P', 'Y'),
('3032', 'SITI AGNIA AMALIA', 'K14', 'P', 'Y'),
('3033', 'SITI KOTIJAH', 'K15', 'P', 'Y'),
('3034', 'TIARA BINTANG LISWANDA', 'K14', 'P', 'Y'),
('3035', 'VIVI NUR AISYAH', 'K15', 'P', 'Y'),
('3036', 'WAHYU EKA PRASETYA', 'K14', 'L', 'Y'),
('3037', 'YULIA SURYA NINGTYAS', 'K15', 'P', 'Y'),
('3038', 'ZAHROTUN NISWAH', 'K14', 'P', 'Y'),
('3039', 'ZULFA SOFIANA', 'K15', 'P', 'Y'),
('3040', 'ZULIANA', 'K14', 'P', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `t_kandidat`
--
ALTER TABLE `t_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_kandidat`
--
ALTER TABLE `t_kandidat`
  MODIFY `id_kandidat` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
