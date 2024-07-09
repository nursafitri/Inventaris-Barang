-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2022 pada 08.55
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggalkeluar` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlahbarangkeluar` int(11) NOT NULL,
  `keterangankeluar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barangkeluar`
--

INSERT INTO `barangkeluar` (`idkeluar`, `idbarang`, `tanggalkeluar`, `jumlahbarangkeluar`, `keterangankeluar`) VALUES
(10, 168, '2022-11-04 05:50:42', 300, 'Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggalmasuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlahbarangmasuk` int(11) NOT NULL,
  `keteranganmasuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`idmasuk`, `idbarang`, `tanggalmasuk`, `jumlahbarangmasuk`, `keteranganmasuk`) VALUES
(39, 168, '2022-11-04 05:13:53', 500, 'Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidangpenerima`
--

CREATE TABLE `bidangpenerima` (
  `idbidang` int(11) NOT NULL,
  `namabidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidangpenerima`
--

INSERT INTO `bidangpenerima` (`idbidang`, `namabidang`) VALUES
(1, 'Sub bagian umum & kepegawaian'),
(2, 'subag program dan pelaporan'),
(3, 'subag keuangan'),
(4, 'lalu lintas'),
(5, 'angkutan dan sarana'),
(6, 'pengembangan dan keselamatan'),
(7, 'prasana'),
(8, 'UPTD pelayaran dan pelabuhan'),
(9, 'UPTD pengujian kendaraan bermotor'),
(10, 'UPTD terminal'),
(11, 'UPTD perparkiran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`iduser`, `username`, `password`) VALUES
(1, 'admin1', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlahbarang` int(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `satuan`, `jumlahbarang`, `image`) VALUES
(13, 'Kertas HVS F.4 (70/80 gr)', 'Rim', 46, '35f0df207dc3e1c0b8a9daa46d8e773a.jpg'),
(14, 'Kertas HVS A.4 (70/80 gr)', 'Rim', 6, 'd7be7d7f7faac2934da46bef85bc9fde.jpg'),
(15, 'Kertas Burem', 'Rim', 0, '3d9e16d3c9e63f74a4135e9820ea9c8b.jpg'),
(16, 'Gel Liner', 'Buah', 59, '4c67d00d59cbfefc1e7bf382d31a22a6.jpeg'),
(17, 'Balpoin Biasa', 'Buah', 103, '79f5e19b5f9820e8f9a14e1d81ffd7ab.jpg'),
(18, 'Pita Mesin Tik', 'Buah', 8, 'aa29a39cb3b4bc577e50fb4eaa20912c.jpg'),
(19, 'Pita Mesin Tik Elektrik', 'Buah', 5, 'ce69f27876dfa0d9cfeb1d5aa5e70282.jpg'),
(20, 'Pita Komputer', 'Buah', 0, '78c4d3bf368a05d135b61269c84e9581.png'),
(21, 'Tinta Printer Botol Kardus', 'Buah', 9, '2d22fd9ad298561e8d2c63478492c72c.jpg'),
(22, 'Tinta Printer Botol', 'Buah', 3, '9c3035e635d95a9251eccb7be3fea263.jpg'),
(24, 'Cartridge Warna', 'Buah', 3, '9bb379597689577dcb19bad629c15ee5.jpg'),
(25, 'Cartridge Hitam', 'Buah', 4, '9b2f4f77ff4b588e4e5e8776f9457526.jpg'),
(26, 'Amplop Jaya Kecil No. 104', 'Buah', 4, '143ef0bc501be44611dc8696b90eb546.jpg'),
(27, 'Amplop Jaya Besar No. 110/90+', 'Buah', 4, 'd9286734ce4aa99f67dd15e7bc5aef72.jpg'),
(28, 'Bantex File', 'Buah', 2, '7109cb97e6a0b714a2efff50961d514e.jpg'),
(29, 'Box File', 'Buah', 2, '08a2632a5d6ec42904f1d14ee452f96a.jpg'),
(30, 'Spidol Permanent', 'Buah', 1, '13ef3dafbeb3e040268d2a0c4f0cb7f7.jpg'),
(31, 'Spidol White Board', 'Buah', 16, 'd410f44fff4e8ee924c12cf3cd461464.jpg'),
(32, 'Map Spring File Plastik Bening', 'Buah', 79, '556a6b1cc967ffa8ab388b8feb0c0e65.jpg'),
(33, 'Map Spring File Plastik Jepit', 'Buah', 0, '117d432f038f01381063bfc35175545c.jpg'),
(34, 'Map Jepit Plastik Pembolong', 'Buah', 0, '181136f4e321f23c191d715c628ad1d7.jpg'),
(35, 'Map Kertas', 'Buah', 258, 'f400a70563bf8f0915282e0a2b20d678.jpg'),
(36, 'Binder Klip No. 105', 'Dus', 1, 'ddde2d0efce8579860361a20c4a12f5c.jpg'),
(37, 'Binder Klip No. 111', 'Dus', 12, '683ebfb4e62beddbdd73c03fba45e168.jpg'),
(38, 'Binder Klip No. 260/280', 'Dus', 2, '00102ccf4d3ce262eaf6ac0647b67002.jpg'),
(39, 'Binder Klip No. 200', 'Dus', 0, '9be17a223c3da00f5c539c66c353809c.jpg'),
(40, 'Klip No. 3', 'Dus', 17, 'c5e4437f6a76395f7c95f9b9df913244.jpg'),
(41, 'Klip No. 5', 'Dus', 1, 'd91e180bb925d30e1294708ce85cbe3d.jpg'),
(42, 'Isi Hekter No. 3', 'Dus', 67, '84c1e62884f32b100eccc04fe99bbc2f.jpg'),
(43, 'Isi Hekter No. 10/50', 'Dus', 7, 'f5313839a8f4ac30e42798f6fbbbb1fd.jpg'),
(44, 'Hekter HD 10', 'Buah', 10, '39520b69fad5bc0a4a33ab534291ecfe.jpg'),
(45, 'Hekter HD 50', 'Buah', 2, 'f4e5c30dfaf233b39bd1d20aa524b13d.jpg'),
(46, 'Stabilo', 'Buah', 20, 'c8abaa9bb4b52cbc365a6373f707babb.jpg'),
(47, 'Cutter A-300/L-500', 'Buah', 28, 'e4bbb927cc909bc2fe76bf5460596b1d.jpg'),
(48, 'Isi Cutter A-300/L-150/L-100', 'Buah', 17, 'c16f08e61956ea78f7e7a5b6f24ba610.webp'),
(49, 'Pembolong Kertas', 'Buah', 3, '6a3893e11b09a323d93ce507bd593b51.jpg'),
(50, 'Lakban Hitam', 'Buah', 8, 'f5492f2673cfd73b921fc7ebac918e06.jpg'),
(51, 'Lakban Bening', 'Buah', 5, '1598935818f23a7e76834a0855de966e.jpg'),
(52, 'Tipe X Cair', 'Buah', 10, '0095cb05cf6bbe392e3c9c05272fa437.jpg'),
(53, 'Tipe X Kertas', 'Buah', 0, 'be561fe8696b7ef1602fa2b8e8ff7ac4.jpg'),
(54, 'Isolatif Kecil Bening', 'Buah', 6, '318e9758c1691470f038f380a0d2eee7.jpg'),
(55, 'Isolatif Kecil Hitam', 'Buah', 0, 'e589a33b8f55bcabdfdaa42abd0aead7.jpg'),
(56, 'Pensil 2B', 'Buah', 9, 'dd80cc98da953f4b8c7e9467adb19936.jpeg'),
(57, 'Kertas Photo', 'Pack', 2, '61ddb4e077121b416848f942143befb1.jpg'),
(58, 'Penggaris', 'Buah', 21, '48c159c0f57a39e50bd202e76bda80ee.jpg'),
(59, 'Kertas Termal/Antrian', 'Pack', 1, 'a1580c11922eac0209d90d3a04e8ada6.png'),
(60, 'Lem Cair', 'Buah', 14, '9ccc0e768f93fa6c5d5d6802c8520962.jpg'),
(61, 'Penghapus', 'Buah', 28, '43f79a4e28d76e5408ffe1fc2c42d999.jpg'),
(62, 'Gunting', 'Buah', 5, '32d36a58951fe63b74d3eb1c767a3fd8.jpg'),
(63, 'Tinta Stempel', 'Buah', 10, 'a76ba4174b905ee2825e3d570093001c.jpg'),
(64, 'Bak Stempel', 'Buah', 1, 'ef15b6702e705b3366d2f73f80f0c7d8.jpg'),
(65, 'Spidol Kecil', 'Buah', 14, 'f5bff76add9c46a5c7bba1cbbb94834c.jpg'),
(71, 'Kartu Uji Berupa Kartu Pintar', 'pcs', 5200, NULL),
(72, 'Kartu Uji Berupa Kertas Berpengaman', 'lembar', 10400, NULL),
(73, 'Stiker Hologram', 'lembar', 10400, NULL),
(74, 'Surat Keterangan Perjalanan', 'blok', 6, NULL),
(75, 'F 3. P', 'blok', 380, NULL),
(76, 'F 4. P', 'blok', 72, NULL),
(77, 'Kartu Persediaan Benda Berharga Gudang', 'blok', 2, NULL),
(78, 'Hasil Pemeriksaan Teknis', 'Rim', 2, NULL),
(79, 'Mutasi Kendaraan', 'Rim', 1, NULL),
(80, 'Persetujuan Numpang Uji', 'Rim', 1, NULL),
(81, 'Barang Koasi Parkir dan Terminal', 'Blok', 15, NULL),
(82, 'Kop Surat Dinas', 'Rim', 20, NULL),
(83, 'Amplop Dinas', 'Pack', 12, NULL),
(84, 'Amplop Dinas', 'Pack', 12, NULL),
(85, 'Map Jepit/Map Snell Hekter', 'Lembar', 41, NULL),
(86, 'Kartu Induk Mobil Bus', 'Lembar', 288, NULL),
(87, 'Kartu Induk Mobil Barang', 'Lembar', 3856, NULL),
(88, 'Kartu Induk Kend. Khusus/K. Tempelan/Gandengan', 'Lembar', 300, NULL),
(89, 'Map Dinas Biasa', 'Buah', 150, NULL),
(90, 'Disposisi', 'Blok', 8, NULL),
(91, 'Kendali Masuk', 'Blok', 62, NULL),
(92, 'Kwitansi (Tanda Pembayaran)', 'Blok', 66, NULL),
(93, 'Sppd', 'Rim', 11, NULL),
(94, 'Hasil Pemeriksaan Kendaraan Baru', 'Rim', 0, NULL),
(95, 'Surat Permohonan', 'Rim', 2, NULL),
(96, 'Stiker Emisi Kadar Asap', 'Buah', 1556, NULL),
(97, 'Stiker Emisi Co', 'Buah', 0, NULL),
(98, 'Permohonan Pengujian Pertama/Berkala K. Bermotor', 'Rim', 2, NULL),
(99, 'Kartu Persediaan', 'Lembar', 270, NULL),
(100, 'Kop Surat UPTD Pengujian Kendaraan Bermotor', 'Rim', 0, NULL),
(101, 'Kop Surat UPTD Terminal', 'Rim', 0, NULL),
(102, 'Kop Surat UPTD Perparkiran', 'Rim', 2, NULL),
(103, 'Kop Surat UPTD Pelayaran dan Pelabuhan', 'Rim', 4, NULL),
(104, 'Amplop UPTD Pengujian Kendaraan Bermotor', 'Pak', 0, NULL),
(105, 'Amplop UPTD Terminal', 'Pak', 3, NULL),
(106, 'Amplop UPTD Perparkiran', 'Pak', 3, NULL),
(107, 'Amplop UPTD Pelayaran dan Pelabuhan', 'Pak', 4, NULL),
(108, 'CPL', 'Blok', 164, NULL),
(109, 'Buku Harian Koordinator Pemungut', 'Blok', 4, NULL),
(110, 'Buku Harian Petugas Pemungut', 'Blok', 10, NULL),
(111, 'NCR (Pembuatan SPP)', 'Buku', 39, NULL),
(112, 'Buku Uji Kendaraan Roda 4 atau lebih', 'Buku', 38670, NULL),
(113, 'Buku Uji Kendaraan Roda 2', 'Buku', 249210, NULL),
(114, 'Stiker Hologram Uji Emisi Kendaraan Roda 2', 'Buah', 154954, NULL),
(115, 'Stiker Hologram Uji Emisi Kendaraan Roda 4/lebih', 'Buah', 157664, NULL),
(116, 'Kartu Pengawasan Angkutan Umum/Orang', 'Blok', 27, NULL),
(117, 'Kartu Pengawasan Angkutan Khusus Karyawan', 'Blok', 37, NULL),
(118, 'Kartu Bongkar Muat', 'Lembar', 7800, NULL),
(119, 'Thermoplastic', 'Kg', 0, NULL),
(120, 'Glass Bead', 'Kg', 0, NULL),
(121, 'Sapu Injuk Biasa', 'Buah', 0, NULL),
(122, 'Sapu Lidi Biasa', 'Buah', 0, NULL),
(123, 'Sapu Lidi Jumbo', 'Buah', 0, NULL),
(124, 'Bak Sampah', 'Buah', 0, NULL),
(125, 'Tempat Sampah Besar dan Beroda', 'Buah', 1, NULL),
(126, 'Kamoceng Besar', 'Buah', 0, NULL),
(127, 'Alat Pel Dorong', 'Buah', 0, NULL),
(128, 'Pengepelan', 'Buah', 1, NULL),
(129, 'Alat Pel Kain Jepit', 'Buah', 1, NULL),
(130, 'Sikat WC/Sikat Pullser', 'Buah', 0, NULL),
(131, 'Tissu Biasa', 'Buah', 20, NULL),
(132, 'Asbak Rokok', 'Buah', 0, NULL),
(133, 'Parfum Mobil', 'Buah', 0, NULL),
(134, 'Parfum Mobil Gantung', 'Buah', 1, NULL),
(135, 'Pengharum Ruangan Spray', 'Buah', 0, NULL),
(136, 'Pengharum Ruangan Gantung', 'Buah', 25, NULL),
(137, 'Stella Refill', 'Buah', 6, NULL),
(138, 'Pengharum Ruangan Otomatis', 'Buah', 0, NULL),
(139, 'Kamper', 'Buah', 2, NULL),
(140, 'Wipol Botol', 'Buah', 0, NULL),
(141, 'Wipol/Super Sol/Harpic/Forstex/WPC', 'Buah', 1, NULL),
(142, 'Pembersih Lantai Soklin Lantai', 'Buah', 6, NULL),
(143, 'Sabun Lifeboy', 'Buah', 0, NULL),
(144, 'Sunlight', 'Buah', 7, NULL),
(145, 'Serbet', 'Buah', 1, NULL),
(146, 'Sabun Pencuci Tangan/Hand Soap', 'Buah', 2, NULL),
(147, 'Sabun Pencuci Tangan Anti Bakteri/Sanitaizer', 'Buah', 0, NULL),
(148, 'Gayung ', 'Buah', 2, NULL),
(149, 'Tempat Tisu', 'Buah', 1, NULL),
(150, 'Semir Ban', 'Buah', 3, NULL),
(151, 'Baygon/Hit Botol', 'Botol', 0, NULL),
(152, 'Baygon/Hit Refill', 'Pouch', 0, NULL),
(153, 'Lap Kanebo', 'Buah', 4, NULL),
(154, 'Pengepelan Lobby', 'Buah', 0, NULL),
(155, 'Ember Plastik', 'Buah', 1, NULL),
(156, 'Taplak Meja', 'Buah', 0, NULL),
(157, 'Pembersih Kaca', 'Buah', 1, NULL),
(158, 'Gunting Tanaman', 'Buah', 0, NULL),
(159, 'Pisau', 'Buah', 0, NULL),
(160, 'Peralatan Makan/Piring/Sendok/Mangkuk', 'Set', 0, NULL),
(161, 'Serok Sampah Plastik', 'Buah', 1, NULL),
(162, 'Kain Pel Biasa', 'Buah', 0, NULL),
(163, 'Politex Sabut Spon', 'Buah', 3, NULL),
(164, 'Keset', 'Buah', 0, NULL),
(165, 'Wiper Kaca', 'Buah', 1, NULL),
(166, 'Alat Cuci Tangan', 'Buah', 0, NULL),
(167, 'Semir Sepatu', 'Buah', 1, NULL),
(168, 'Barang Test', 'Test', 700, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `bidangpenerima`
--
ALTER TABLE `bidangpenerima`
  ADD PRIMARY KEY (`idbidang`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `bidangpenerima`
--
ALTER TABLE `bidangpenerima`
  MODIFY `idbidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
