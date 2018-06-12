-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jan 2018 pada 11.34
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(100) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan_barang` varchar(15) NOT NULL,
  `harga_beli_satuan` double NOT NULL,
  `harga_jual_satuan` double NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `ppn` decimal(10,0) NOT NULL,
  `stock_barang` int(10) NOT NULL,
  `id_supplier` int(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bonus`
--

CREATE TABLE `tbl_bonus` (
  `id_bonus` int(100) NOT NULL,
  `nomor_polisi` varchar(20) NOT NULL,
  `jumlah_cuci` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_costumer`
--

CREATE TABLE `tbl_costumer` (
  `id_costumer` int(100) NOT NULL,
  `nama_costumer` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` int(8) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hutang_supplier`
--

CREATE TABLE `tbl_hutang_supplier` (
  `id_hutang_supplier` int(100) NOT NULL,
  `id_supplier` int(100) NOT NULL,
  `jumlah` double NOT NULL,
  `bayar` double NOT NULL,
  `sisa` double NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jasa`
--

CREATE TABLE `tbl_jasa` (
  `id_jasa` int(100) NOT NULL,
  `nama_jasa` varchar(255) NOT NULL,
  `harga_pokok` double NOT NULL,
  `harga_jual` double NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `ppn` decimal(10,0) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jasa`
--

INSERT INTO `tbl_jasa` (`id_jasa`, `nama_jasa`, `harga_pokok`, `harga_jual`, `diskon`, `ppn`, `tanggal_input`, `id_user`) VALUES
(1, 'SERVICES', 0, 0, '0', '0', '2018-01-22 11:19:56', 1),
(2, 'CUCI MOBIL', 0, 0, '0', '0', '2018-01-22 11:20:08', 1),
(3, 'CUCI MOTOR', 0, 0, '0', '0', '2018-01-22 11:20:17', 1),
(4, 'SALON', 0, 0, '0', '0', '2018-01-22 11:27:52', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_piutang_costumer`
--

CREATE TABLE `tbl_piutang_costumer` (
  `id_piutang_costumer` int(100) NOT NULL,
  `id_costumer` int(100) NOT NULL,
  `nomor_bukti_transaksi` varchar(30) NOT NULL,
  `jumlah` double NOT NULL,
  `bayar` double NOT NULL,
  `sisa` double NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_hutang_supplier`
--

CREATE TABLE `tbl_sub_hutang_supplier` (
  `id_sub_hutang_supplier` int(100) NOT NULL,
  `id_hutang_supplier` int(100) NOT NULL,
  `bayar` double NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_piutang_costumer`
--

CREATE TABLE `tbl_sub_piutang_costumer` (
  `id_sub_piutang_costumer` int(100) NOT NULL,
  `id_piutang_costumer` int(100) NOT NULL,
  `bayar` double NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_transaksi_barang`
--

CREATE TABLE `tbl_sub_transaksi_barang` (
  `id_sub_transaksi_barang` int(100) NOT NULL,
  `id_transaksi` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `harga_jual` double NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `ppn` decimal(10,0) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `sub_total` double NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_transaksi_jasa`
--

CREATE TABLE `tbl_sub_transaksi_jasa` (
  `id_sub_transaksi_jasa` int(100) NOT NULL,
  `id_transaksi` int(100) NOT NULL,
  `id_jasa` int(100) NOT NULL,
  `harga_jual` double NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `ppn` decimal(10,0) NOT NULL,
  `sub_total` double NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(100) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `nomor_polisi` varchar(20) NOT NULL,
  `tipe_kendaraan` varchar(50) NOT NULL,
  `nomor_bukti_transaksi` varchar(30) NOT NULL,
  `id_costumer` int(100) NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `bayar` double NOT NULL,
  `kembalian` double NOT NULL,
  `keterangan` enum('BELUM LUNAS','LUNAS') NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL,
  `last_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `login`, `logout`, `last_ip`) VALUES
(1, 'alfigusman', 'a19a03ceeff62f89b591dd1bd2a16e3e', 'Alfi Gusman', '2018-01-22 11:27:12', '2018-01-07 02:30:14', '10.166.162.162'),
(2, 'piscalpratama', 'a19a03ceeff62f89b591dd1bd2a16e3e', 'Piscal Pratama', '2018-01-22 09:40:30', '0000-00-00 00:00:00', '10.166.162.83');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_sub_transaksi_barang`
--

CREATE TABLE `tmp_sub_transaksi_barang` (
  `id_tmp_sub_transaksi_barang` int(100) NOT NULL,
  `id_tmp_transaksi` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `harga_jual` double NOT NULL,
  `diskon` float NOT NULL,
  `ppn` float NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `sub_total` double NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_sub_transaksi_jasa`
--

CREATE TABLE `tmp_sub_transaksi_jasa` (
  `id_tmp_sub_transaksi_jasa` int(100) NOT NULL,
  `id_tmp_transaksi` int(100) NOT NULL,
  `id_jasa` int(100) NOT NULL,
  `harga_jual` double NOT NULL,
  `diskon` float NOT NULL,
  `ppn` float NOT NULL,
  `sub_total` double NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_transaksi`
--

CREATE TABLE `tmp_transaksi` (
  `id_tmp_transaksi` int(100) NOT NULL,
  `nomor_polisi` varchar(20) NOT NULL,
  `tipe_kendaraan` varchar(50) NOT NULL,
  `nomor_bukti_transaksi` varchar(30) NOT NULL,
  `id_costumer` int(100) NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `bayar` double NOT NULL,
  `kembalian` double NOT NULL,
  `keterangan` enum('BELUM LUNAS','LUNAS') NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang_supplier`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_barang_supplier` (
`id_barang` int(100)
,`nama_barang` varchar(255)
,`satuan_barang` varchar(15)
,`harga_beli_satuan` double
,`harga_jual_satuan` double
,`diskon` decimal(10,0)
,`ppn` decimal(10,0)
,`stock_barang` int(10)
,`tanggal_masuk` date
,`id_supplier` int(100)
,`nama_supplier` varchar(100)
,`alamat` varchar(255)
,`provinsi` varchar(50)
,`kota` varchar(50)
,`kode_pos` int(10)
,`telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hutang_supplier`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_hutang_supplier` (
`id_hutang_supplier` int(100)
,`jumlah` double
,`bayar` double
,`sisa` double
,`keterangan` varchar(100)
,`tanggal` date
,`id_supplier` int(100)
,`nama_supplier` varchar(100)
,`alamat` varchar(255)
,`provinsi` varchar(50)
,`kota` varchar(50)
,`kode_pos` int(10)
,`telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_piutang_costumer`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_piutang_costumer` (
`id_piutang_costumer` int(100)
,`id_costumer` int(100)
,`nomor_bukti_transaksi` varchar(30)
,`jumlah` double
,`bayar` double
,`sisa` double
,`keterangan` varchar(100)
,`tanggal` date
,`nama_costumer` varchar(100)
,`alamat` varchar(255)
,`provinsi` varchar(50)
,`kota` varchar(50)
,`kode_pos` int(8)
,`telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tmp_transaksi_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_tmp_transaksi_barang` (
`id_tmp_sub_transaksi_barang` int(100)
,`id_tmp_transaksi` int(100)
,`id_barang` int(100)
,`nama_barang` varchar(255)
,`harga_jual` double
,`diskon` float
,`ppn` float
,`jumlah_barang` int(10)
,`sub_total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tmp_transaksi_costumer`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_tmp_transaksi_costumer` (
`id_tmp_transaksi` int(100)
,`nomor_polisi` varchar(20)
,`tipe_kendaraan` varchar(50)
,`nomor_bukti_transaksi` varchar(30)
,`jumlah_bayar` double
,`bayar` double
,`kembalian` double
,`keterangan` enum('BELUM LUNAS','LUNAS')
,`id_costumer` int(100)
,`nama_costumer` varchar(100)
,`alamat` varchar(255)
,`provinsi` varchar(50)
,`kota` varchar(50)
,`kode_pos` int(8)
,`telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tmp_transaksi_jasa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_tmp_transaksi_jasa` (
`id_tmp_sub_transaksi_jasa` int(100)
,`id_tmp_transaksi` int(100)
,`id_jasa` int(100)
,`nama_jasa` varchar(255)
,`harga_jual` double
,`diskon` float
,`ppn` float
,`sub_total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi_barang` (
`id_sub_transaksi_barang` int(100)
,`id_transaksi` int(100)
,`id_barang` int(100)
,`nama_barang` varchar(255)
,`harga_jual` double
,`diskon` decimal(10,0)
,`ppn` decimal(10,0)
,`jumlah_barang` int(10)
,`sub_total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_costumer`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi_costumer` (
`id_transaksi` int(100)
,`nomor_polisi` varchar(20)
,`tipe_kendaraan` varchar(50)
,`nomor_bukti_transaksi` varchar(30)
,`jumlah_bayar` double
,`bayar` double
,`kembalian` double
,`keterangan` enum('BELUM LUNAS','LUNAS')
,`id_costumer` int(100)
,`nama_costumer` varchar(100)
,`alamat` varchar(255)
,`provinsi` varchar(50)
,`kota` varchar(50)
,`kode_pos` int(8)
,`telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_jasa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi_jasa` (
`id_sub_transaksi_jasa` int(100)
,`id_transaksi` int(100)
,`id_jasa` int(100)
,`nama_jasa` varchar(255)
,`harga_jual` double
,`diskon` decimal(10,0)
,`ppn` decimal(10,0)
,`sub_total` double
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_barang_supplier`
--
DROP TABLE IF EXISTS `view_barang_supplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang_supplier`  AS  select `a`.`id_barang` AS `id_barang`,`a`.`nama_barang` AS `nama_barang`,`a`.`satuan_barang` AS `satuan_barang`,`a`.`harga_beli_satuan` AS `harga_beli_satuan`,`a`.`harga_jual_satuan` AS `harga_jual_satuan`,`a`.`diskon` AS `diskon`,`a`.`ppn` AS `ppn`,`a`.`stock_barang` AS `stock_barang`,`a`.`tanggal_masuk` AS `tanggal_masuk`,`b`.`id_supplier` AS `id_supplier`,`b`.`nama_supplier` AS `nama_supplier`,`b`.`alamat` AS `alamat`,`b`.`provinsi` AS `provinsi`,`b`.`kota` AS `kota`,`b`.`kode_pos` AS `kode_pos`,`b`.`telepon` AS `telepon` from (`tbl_barang` `a` join `tbl_supplier` `b`) where (`a`.`id_supplier` = `b`.`id_supplier`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_hutang_supplier`
--
DROP TABLE IF EXISTS `view_hutang_supplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hutang_supplier`  AS  select `a`.`id_hutang_supplier` AS `id_hutang_supplier`,`a`.`jumlah` AS `jumlah`,`a`.`bayar` AS `bayar`,`a`.`sisa` AS `sisa`,`a`.`keterangan` AS `keterangan`,`a`.`tanggal` AS `tanggal`,`b`.`id_supplier` AS `id_supplier`,`b`.`nama_supplier` AS `nama_supplier`,`b`.`alamat` AS `alamat`,`b`.`provinsi` AS `provinsi`,`b`.`kota` AS `kota`,`b`.`kode_pos` AS `kode_pos`,`b`.`telepon` AS `telepon` from (`tbl_hutang_supplier` `a` join `tbl_supplier` `b`) where (`a`.`id_supplier` = `b`.`id_supplier`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_piutang_costumer`
--
DROP TABLE IF EXISTS `view_piutang_costumer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_piutang_costumer`  AS  select `a`.`id_piutang_costumer` AS `id_piutang_costumer`,`a`.`id_costumer` AS `id_costumer`,`a`.`nomor_bukti_transaksi` AS `nomor_bukti_transaksi`,`a`.`jumlah` AS `jumlah`,`a`.`bayar` AS `bayar`,`a`.`sisa` AS `sisa`,`a`.`keterangan` AS `keterangan`,`a`.`tanggal` AS `tanggal`,`b`.`nama_costumer` AS `nama_costumer`,`b`.`alamat` AS `alamat`,`b`.`provinsi` AS `provinsi`,`b`.`kota` AS `kota`,`b`.`kode_pos` AS `kode_pos`,`b`.`telepon` AS `telepon` from (`tbl_piutang_costumer` `a` join `tbl_costumer` `b`) where (`a`.`id_costumer` = `b`.`id_costumer`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_tmp_transaksi_barang`
--
DROP TABLE IF EXISTS `view_tmp_transaksi_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tmp_transaksi_barang`  AS  select `a`.`id_tmp_sub_transaksi_barang` AS `id_tmp_sub_transaksi_barang`,`a`.`id_tmp_transaksi` AS `id_tmp_transaksi`,`a`.`id_barang` AS `id_barang`,`b`.`nama_barang` AS `nama_barang`,`a`.`harga_jual` AS `harga_jual`,`a`.`diskon` AS `diskon`,`a`.`ppn` AS `ppn`,`a`.`jumlah_barang` AS `jumlah_barang`,`a`.`sub_total` AS `sub_total` from (`tmp_sub_transaksi_barang` `a` join `tbl_barang` `b`) where (`a`.`id_barang` = `b`.`id_barang`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_tmp_transaksi_costumer`
--
DROP TABLE IF EXISTS `view_tmp_transaksi_costumer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tmp_transaksi_costumer`  AS  select `a`.`id_tmp_transaksi` AS `id_tmp_transaksi`,`a`.`nomor_polisi` AS `nomor_polisi`,`a`.`tipe_kendaraan` AS `tipe_kendaraan`,`a`.`nomor_bukti_transaksi` AS `nomor_bukti_transaksi`,`a`.`jumlah_bayar` AS `jumlah_bayar`,`a`.`bayar` AS `bayar`,`a`.`kembalian` AS `kembalian`,`a`.`keterangan` AS `keterangan`,`b`.`id_costumer` AS `id_costumer`,`b`.`nama_costumer` AS `nama_costumer`,`b`.`alamat` AS `alamat`,`b`.`provinsi` AS `provinsi`,`b`.`kota` AS `kota`,`b`.`kode_pos` AS `kode_pos`,`b`.`telepon` AS `telepon` from (`tmp_transaksi` `a` join `tbl_costumer` `b`) where (`a`.`id_costumer` = `b`.`id_costumer`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_tmp_transaksi_jasa`
--
DROP TABLE IF EXISTS `view_tmp_transaksi_jasa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tmp_transaksi_jasa`  AS  select `a`.`id_tmp_sub_transaksi_jasa` AS `id_tmp_sub_transaksi_jasa`,`a`.`id_tmp_transaksi` AS `id_tmp_transaksi`,`a`.`id_jasa` AS `id_jasa`,`b`.`nama_jasa` AS `nama_jasa`,`a`.`harga_jual` AS `harga_jual`,`a`.`diskon` AS `diskon`,`a`.`ppn` AS `ppn`,`a`.`sub_total` AS `sub_total` from (`tmp_sub_transaksi_jasa` `a` join `tbl_jasa` `b`) where (`a`.`id_jasa` = `b`.`id_jasa`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi_barang`
--
DROP TABLE IF EXISTS `view_transaksi_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_barang`  AS  select `a`.`id_sub_transaksi_barang` AS `id_sub_transaksi_barang`,`a`.`id_transaksi` AS `id_transaksi`,`a`.`id_barang` AS `id_barang`,`b`.`nama_barang` AS `nama_barang`,`a`.`harga_jual` AS `harga_jual`,`a`.`diskon` AS `diskon`,`a`.`ppn` AS `ppn`,`a`.`jumlah_barang` AS `jumlah_barang`,`a`.`sub_total` AS `sub_total` from (`tbl_sub_transaksi_barang` `a` join `tbl_barang` `b`) where (`a`.`id_barang` = `b`.`id_barang`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi_costumer`
--
DROP TABLE IF EXISTS `view_transaksi_costumer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_costumer`  AS  select `a`.`id_transaksi` AS `id_transaksi`,`a`.`nomor_polisi` AS `nomor_polisi`,`a`.`tipe_kendaraan` AS `tipe_kendaraan`,`a`.`nomor_bukti_transaksi` AS `nomor_bukti_transaksi`,`a`.`jumlah_bayar` AS `jumlah_bayar`,`a`.`bayar` AS `bayar`,`a`.`kembalian` AS `kembalian`,`a`.`keterangan` AS `keterangan`,`b`.`id_costumer` AS `id_costumer`,`b`.`nama_costumer` AS `nama_costumer`,`b`.`alamat` AS `alamat`,`b`.`provinsi` AS `provinsi`,`b`.`kota` AS `kota`,`b`.`kode_pos` AS `kode_pos`,`b`.`telepon` AS `telepon` from (`tbl_transaksi` `a` join `tbl_costumer` `b`) where (`a`.`id_costumer` = `b`.`id_costumer`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi_jasa`
--
DROP TABLE IF EXISTS `view_transaksi_jasa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_jasa`  AS  select `a`.`id_sub_transaksi_jasa` AS `id_sub_transaksi_jasa`,`a`.`id_transaksi` AS `id_transaksi`,`a`.`id_jasa` AS `id_jasa`,`b`.`nama_jasa` AS `nama_jasa`,`a`.`harga_jual` AS `harga_jual`,`a`.`diskon` AS `diskon`,`a`.`ppn` AS `ppn`,`a`.`sub_total` AS `sub_total` from (`tbl_sub_transaksi_jasa` `a` join `tbl_jasa` `b`) where (`a`.`id_jasa` = `b`.`id_jasa`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`,`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tbl_bonus`
--
ALTER TABLE `tbl_bonus`
  ADD PRIMARY KEY (`id_bonus`);

--
-- Indexes for table `tbl_costumer`
--
ALTER TABLE `tbl_costumer`
  ADD PRIMARY KEY (`id_costumer`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_hutang_supplier`
--
ALTER TABLE `tbl_hutang_supplier`
  ADD PRIMARY KEY (`id_hutang_supplier`,`id_supplier`,`id_user`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_jasa`
--
ALTER TABLE `tbl_jasa`
  ADD PRIMARY KEY (`id_jasa`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_piutang_costumer`
--
ALTER TABLE `tbl_piutang_costumer`
  ADD PRIMARY KEY (`id_piutang_costumer`,`id_costumer`,`id_user`),
  ADD KEY `id_costumer` (`id_costumer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_sub_hutang_supplier`
--
ALTER TABLE `tbl_sub_hutang_supplier`
  ADD PRIMARY KEY (`id_sub_hutang_supplier`,`id_hutang_supplier`,`id_user`),
  ADD KEY `id_hutang_supplier` (`id_hutang_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_sub_piutang_costumer`
--
ALTER TABLE `tbl_sub_piutang_costumer`
  ADD PRIMARY KEY (`id_sub_piutang_costumer`,`id_piutang_costumer`,`id_user`),
  ADD KEY `id_piutang_costumer` (`id_piutang_costumer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_sub_transaksi_barang`
--
ALTER TABLE `tbl_sub_transaksi_barang`
  ADD PRIMARY KEY (`id_sub_transaksi_barang`,`id_user`,`id_transaksi`,`id_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_sub_transaksi_jasa`
--
ALTER TABLE `tbl_sub_transaksi_jasa`
  ADD PRIMARY KEY (`id_sub_transaksi_jasa`,`id_transaksi`,`id_jasa`,`id_user`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_jasa` (`id_jasa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`,`id_user`,`id_costumer`),
  ADD KEY `id_custumer` (`id_costumer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tmp_sub_transaksi_barang`
--
ALTER TABLE `tmp_sub_transaksi_barang`
  ADD PRIMARY KEY (`id_tmp_sub_transaksi_barang`,`id_user`,`id_tmp_transaksi`,`id_barang`),
  ADD KEY `id_transaksi` (`id_tmp_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tmp_sub_transaksi_jasa`
--
ALTER TABLE `tmp_sub_transaksi_jasa`
  ADD PRIMARY KEY (`id_tmp_sub_transaksi_jasa`,`id_tmp_transaksi`,`id_jasa`,`id_user`),
  ADD KEY `id_transaksi` (`id_tmp_transaksi`),
  ADD KEY `id_jasa` (`id_jasa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tmp_transaksi`
--
ALTER TABLE `tmp_transaksi`
  ADD PRIMARY KEY (`id_tmp_transaksi`,`id_user`,`id_costumer`),
  ADD KEY `id_custumer` (`id_costumer`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bonus`
--
ALTER TABLE `tbl_bonus`
  MODIFY `id_bonus` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_costumer`
--
ALTER TABLE `tbl_costumer`
  MODIFY `id_costumer` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_hutang_supplier`
--
ALTER TABLE `tbl_hutang_supplier`
  MODIFY `id_hutang_supplier` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jasa`
--
ALTER TABLE `tbl_jasa`
  MODIFY `id_jasa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_piutang_costumer`
--
ALTER TABLE `tbl_piutang_costumer`
  MODIFY `id_piutang_costumer` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sub_hutang_supplier`
--
ALTER TABLE `tbl_sub_hutang_supplier`
  MODIFY `id_sub_hutang_supplier` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sub_piutang_costumer`
--
ALTER TABLE `tbl_sub_piutang_costumer`
  MODIFY `id_sub_piutang_costumer` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sub_transaksi_barang`
--
ALTER TABLE `tbl_sub_transaksi_barang`
  MODIFY `id_sub_transaksi_barang` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sub_transaksi_jasa`
--
ALTER TABLE `tbl_sub_transaksi_jasa`
  MODIFY `id_sub_transaksi_jasa` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tmp_sub_transaksi_barang`
--
ALTER TABLE `tmp_sub_transaksi_barang`
  MODIFY `id_tmp_sub_transaksi_barang` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_sub_transaksi_jasa`
--
ALTER TABLE `tmp_sub_transaksi_jasa`
  MODIFY `id_tmp_sub_transaksi_jasa` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_transaksi`
--
ALTER TABLE `tmp_transaksi`
  MODIFY `id_tmp_transaksi` int(100) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_costumer`
--
ALTER TABLE `tbl_costumer`
  ADD CONSTRAINT `tbl_costumer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_hutang_supplier`
--
ALTER TABLE `tbl_hutang_supplier`
  ADD CONSTRAINT `tbl_hutang_supplier_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hutang_supplier_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_jasa`
--
ALTER TABLE `tbl_jasa`
  ADD CONSTRAINT `tbl_jasa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_piutang_costumer`
--
ALTER TABLE `tbl_piutang_costumer`
  ADD CONSTRAINT `tbl_piutang_costumer_ibfk_1` FOREIGN KEY (`id_costumer`) REFERENCES `tbl_costumer` (`id_costumer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_piutang_costumer_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sub_hutang_supplier`
--
ALTER TABLE `tbl_sub_hutang_supplier`
  ADD CONSTRAINT `tbl_sub_hutang_supplier_ibfk_1` FOREIGN KEY (`id_hutang_supplier`) REFERENCES `tbl_hutang_supplier` (`id_hutang_supplier`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_hutang_supplier_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sub_piutang_costumer`
--
ALTER TABLE `tbl_sub_piutang_costumer`
  ADD CONSTRAINT `tbl_sub_piutang_costumer_ibfk_1` FOREIGN KEY (`id_piutang_costumer`) REFERENCES `tbl_piutang_costumer` (`id_piutang_costumer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_piutang_costumer_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sub_transaksi_barang`
--
ALTER TABLE `tbl_sub_transaksi_barang`
  ADD CONSTRAINT `tbl_sub_transaksi_barang_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_transaksi_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_transaksi_barang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sub_transaksi_jasa`
--
ALTER TABLE `tbl_sub_transaksi_jasa`
  ADD CONSTRAINT `tbl_sub_transaksi_jasa_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_transaksi_jasa_ibfk_2` FOREIGN KEY (`id_jasa`) REFERENCES `tbl_jasa` (`id_jasa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sub_transaksi_jasa_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD CONSTRAINT `tbl_supplier_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_costumer`) REFERENCES `tbl_costumer` (`id_costumer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmp_sub_transaksi_barang`
--
ALTER TABLE `tmp_sub_transaksi_barang`
  ADD CONSTRAINT `tmp_sub_transaksi_barang_ibfk_1` FOREIGN KEY (`id_tmp_transaksi`) REFERENCES `tmp_transaksi` (`id_tmp_transaksi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_sub_transaksi_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_sub_transaksi_barang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmp_sub_transaksi_jasa`
--
ALTER TABLE `tmp_sub_transaksi_jasa`
  ADD CONSTRAINT `tmp_sub_transaksi_jasa_ibfk_1` FOREIGN KEY (`id_tmp_transaksi`) REFERENCES `tmp_transaksi` (`id_tmp_transaksi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_sub_transaksi_jasa_ibfk_2` FOREIGN KEY (`id_jasa`) REFERENCES `tbl_jasa` (`id_jasa`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_sub_transaksi_jasa_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tmp_transaksi`
--
ALTER TABLE `tmp_transaksi`
  ADD CONSTRAINT `tmp_transaksi_ibfk_1` FOREIGN KEY (`id_costumer`) REFERENCES `tbl_costumer` (`id_costumer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tmp_transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
