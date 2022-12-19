-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 06:50 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rawrcake_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dtrans`
--

CREATE TABLE `dtrans` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `totalHarga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtrans`
--

INSERT INTO `dtrans` (`id`, `nama`, `paymentMethod`, `totalHarga`) VALUES
(2, 'vicko', 'COD', 'Rp.3855000');

-- --------------------------------------------------------

--
-- Table structure for table `htrans`
--

CREATE TABLE `htrans` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `namaItem` varchar(100) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `nama`, `namaItem`, `harga`) VALUES
('1', 'img/Toffieco_Perasa_Rum_Bakar_Kecil.jpg', 'Toffieco Rum Bakar', 2053500),
('10', 'img/colatta_white_250_gr_crt.jpg', 'Colatta White Compound', 350000),
('100', 'img/tepung_vla_instan_rap_harga_murah.jpg', 'Rap Instant', 769000),
('101', 'img/trans_colouring_-_kuning.jpg', 'Trans Coloring Kuning', 98000),
('11', 'img/donut_dusting_5_kg_2.jpg', 'Donut Dusting', 138000),
('12', 'img/eazee_spray.jpg', 'Eazee Spray', 120000),
('13', 'img/fodnx_black_1_kg_1.jpg', 'Fondx Roll Fondant Black', 550000),
('14', 'img/fondx_vanila_putih_5_kg_2.jpg', 'Fondx Vanila', 295000),
('15', 'img/Gula_Galus_Powder_500gr.jpg', 'Gula Halus Sarang Tawon', 295000),
('16', 'img/haan_fiesta_icing_sugar_grosir.jpg', 'Haan Fiesta Icing Sugar', 251000),
('17', 'img/harga_cokelat_colatta_glaze_cappucino_grosir_di_tokowahab.com.jpg', 'Colatta Glaze Cappucino', 350000),
('18', 'img/harga_colatta_glaze_white_grosir_di_tokowahab.com.jpg', 'Colatta Glaze White', 350000),
('19', 'img/Toffieco_Perasa_Kue_Rum_Bakar_Besar.jpg', 'Toffieco Rum Bakar', 769000),
('2', 'img/topping_wippy_200gr_grosir.jpg', 'Vivo Topping Ace', 681000),
('20', 'img/hercules_baking_powder_48x110_gr.jpg', 'Hercules Baking Powder', 1050000),
('21', 'img/hercules_custard_isi_kue_1.jpg', 'Hercules Custard Powder', 669000),
('22', 'img/Hollman_Butter_Soft_Cream_2-25kg.jpg', 'Hollman Soft Cream', 666000),
('23', 'img/icing_sugar_6_x_1_kg.jpg', 'Fiesta Icing Sugar', 166000),
('24', 'img/jual_angel_improver_untuk_roti_harga_murah_di_tokowahab.com.jpg', 'Angel Bread Improver', 146000),
('25', 'img/Toffieco_Perasa_Kue_Coklat_BlackForest.jpg', 'Toffieco Coklat Black Forest', 769000),
('26', 'img/jual_angel_instant_yeast_saset.jpg', 'Angel Instant Yeast Sachet', 200000),
('27', 'img/jual_angel_white_instant_yeast.jpg', 'Angel Instant Yeast White', 610000),
('28', 'img/jual_athena_baking_powder_grosir_harga_murah_di_tokowahab.com.jpg', 'Athena Baking powder', 310000),
('29', 'img/jual_baking_soda_arm_hammer_grosir_murah_di_tokowahab.com.jpg', 'Baking Soda Arm & Hammer', 60000),
('3', 'img/anchor_whipping_cream_1_ltr_harga_murah_tokowahab.com.jpg', 'anchor whipping cream', 1097000),
('30', 'img/jual_beli_bakels_pettinice_rtr_icing_7kg_tokowahab.com.jpg', 'Bakel-s Pettinice RTR Icing', 510000),
('31', 'img/jual_beli_hollman_butter_cream.jpg', 'Hollman Butter Cream', 727000),
('32', 'img/jual_biobianca_250_gr_harga_murah_di_tokowahab.com.jpg', 'Biobianca', 1218000),
('33', 'img/jual_cake_stabilizer_quick_75_grosir_di_tokowahab.com.jpg', 'Quick75', 1180000),
('34', 'img/jual_carlo_pan_grease_15_x_500_gr_harga_murah_di_tokowahab.com.jpg', 'Carlo Pan Grease', 570000),
('35', 'img/jual_coklat_colatta_glaze_dark_grosir_harga_murah_di_tokowahab.com_1.jpg', 'Colatta Glaze Dark', 350000),
('36', 'img/jual_coklat_colatta_glaze_tiramisu_grosir_harga_murah_di_tokowahab.com.jpg', 'Colatta Glaze Tiramisu', 350000),
('37', 'img/jual_colatta_glaze_matcha_atau_green_tea_grosir_di_tokowahab.com.jpg', 'Colatta Glaze Green Tea', 350000),
('38', 'img/jual_colatta_glaze_strawberry_1_kg.jpg', 'Colatta Glaze strawberry', 350000),
('39', 'img/jual_colatta_glaze_tiramusi_6_x_1_kg_harga_grosir_murah_di_tokowahab.com.jpg', 'Colatta Glaze Tiramisu', 350000),
('4', 'img/Bahan_Kue_Hollman_Softcream.jpg', 'Hollman Softcream', 727000),
('40', 'img/jual_cross_cherry_red_580gr_crt_harga_murah_tokowahab.com.jpg', 'Cross Cherry Red', 150000),
('41', 'img/jual_cross_leaf_green_580gr_crt_harga_murah_tokowahab.com.jpg', 'Cross Leaf Green', 150000),
('42', 'img/jual_cross_lemon_yellow_580gr_crt_harga_murah_tokowahab.com.jpg', 'Cross Lemon Yellow', 150000),
('43', 'img/jual_cross_orange_580gr_crt_harga_murah_tokowahab.com.jpg', 'Cross Orange', 150000),
('44', 'img/jual_cross_rose_pink_580gr_crt_harga_murah_tokowahab.com.jpg', 'Cross Rose Pink', 150000),
('45', 'img/jual_cross_sky_blue_580gr_crt_harga_murah_tokowahab.com.jpg', 'Cross Sky Blue', 150000),
('46', 'img/jual_cross_sweet_black_580gr_crt_harga_murah_tokowahab.com.jpg', 'Cross Sweet Black', 150000),
('47', 'img/jual_cross_violet_580_gr_crt_harga_murah_tokowahab.com.jpg', 'Cross Violet', 150000),
('48', 'img/jual_crumble_black_grosir_di_tokowahab.com.jpg', 'La Kreiva Black Crumble Fine', 270000),
('49', 'img/jual_crumble_caramel_grosir_di_tokowahab.com.jpg', 'La Kreiva Caramel Crumble Fine', 270000),
('5', 'img/Biobianca1kg.jfif', 'Biobianca', 1218000),
('50', 'img/jual_gelatin_halal_eceran_harga_murah_di_tokowahab.com_1.jpg', 'Halal Gelatine', 120000),
('51', 'img/jual_gelatin_halal_grosir_harga_murah_di_tokowahab.com.jpg', 'Halal Gelatine', 100000),
('52', 'img/jual_haan_emuplex_pengempuk.jpeg', 'Haan Emuplex', 713000),
('53', 'img/jual_haan_whiptop_grosir_harga_murah_di_tokowahab.com.jpg', 'Haan Whip Topping', 674000),
('54', 'img/jual_hercules_baking_powder_12_x_450_gr_grosir_di_tokowahab.com.jpg', 'Hercules Baking Powder', 1050000),
('55', 'img/jual_l_arome_chocolate_pasta_harga_grosir_murah_di_tokowahab.com.jpg', 'L-arome Chocolate Pasta', 330000),
('56', 'img/jual_l_arome_pandan_pasta_grosir_murah_di_tokowahab.com.jpg', 'L-arome Pandan Pasta', 330000),
('57', 'img/jual_l_arome_vanilla_milk_powder_harga_grosir_murah_di_tokowahab.com.jpg', 'L-arome Vanilla Milk Powder', 330000),
('58', 'img/jual_la_kreiva_crumble_matcha_grosir_di_tokowahab.com.jpg', 'La Kreiva Matcha Crumble Fine', 330000),
('59', 'img/jual_la_kreiva_original_crumble_extra_vine_promo_grosir_harga_murah_di_tokowahab.com.jpg', 'La Kreiva Original Crumble Fine', 330000),
('6', 'img/BruggemanInstantYeastBrown500gr.jpg', 'Bruggeman Instant Yeast', 850000),
('60', 'img/toffieco_coklat_black_forest_1_kg_crt_harga_murah_tokowahab.com.jpg', 'Toffieco Coklat Black Forest', 793000),
('61', 'img/jual_paletta_vla_sarikaya_grosir_harga_murah_di_tokowahab.com.jpg', 'Paletta Vla Sarikaya', 310000),
('62', 'img/jual_palm_sugar_wido_200gr_grosir_harga_murah_indonesia_tokowahab.com.jpeg', 'Wido Palm Sugar', 285000),
('63', 'img/jual_perasa_coklat_alami_grosir.jpg', 'Perasa Cokelat', 285000),
('64', 'img/jual_perasa_larome_harga_murah_grosir_di_tokowahab.com.jpg', 'Larome Vanilla Milk Powder', 235000),
('65', 'img/jual_perasa_mocca_super_100_gr_harga_murah_di_tokowahab.com.jpg', 'Toffieco Mocca Super', 793000),
('66', 'img/jual_pewarna_makanan_biru.jpg', 'Trans Coloring Biru', 98000),
('67', 'img/jual_pewarna_makanan_cross_egg_yellow_580_gr_crt_harga_murah_di_tokowahab.com.jpg', 'Cross Egg Yellow', 48000),
('68', 'img/jual_prambahan_fiesta_icing_sugar_bal_15_kg_hargamurah_tokowahab.com.jpg', 'Fiesta Icing Sugar', 98000),
('69', 'img/jual_quick_75_1_kg_harga_murah_tokowahab.com.jpg', 'Quick75', 1180000),
('7', 'img/Carlo20kg.jfif', 'Carlo Pan Grease', 570000),
('70', 'img/jual_ryoto_sp_1_kg_crt_harga_murah_tokowahab.com.jpg', 'Ryoto SP', 998000),
('71', 'img/jual_spikel_50kg_murah_meriah_tokowahab.com.jpeg', 'Werner Spikel Warna-Warni', 3100000),
('72', 'img/jual_sponge_28_grosir_murah_di_tokowahab.com.jpg', 'Sponge', 208000),
('73', 'img/jual_sunsweet_pitted_prunes_24_x_200_gr_grosir_murah_di_tokowahab.com.jpg', 'Sunweet Pitted Prunes', 681000),
('74', 'img/jual_toffieco_mocca_super_1_kg_crt_harga_murah_di_tokowahab.com.jpg', 'Toffieco Mocca Super', 793000),
('75', 'img/jual_toffieco_pandan_pasta_12_x_1_kg_murah_di_tokowahab.com.jpg', 'Toffieco Pandan Pasta', 793000),
('76', 'img/jual_toffieco_pandan_pasta_24_x_100_gr_murah_di_tokowahab.com.jpg', 'Toffieco Pandan Pasta', 793000),
('77', 'img/jual_toffieco_vanilla_pasta_12_x_100_gr_grosir_murah_di_tokowahab.com.jpg', 'Toffieco Vanilla Pasta', 793000),
('78', 'img/jual_toffieco_vanilla_pasta_grosir_murah_di_tokowahab.com.jpg', 'Toffieco Vanilla Pasta', 793000),
('79', 'img/jual_trans_coloring_-_hijau.jpg', 'Trans Coloring Hijau', 98000),
('8', 'img/colatta_glaze_banana.jpg', 'Colatta Glaze Banana', 350000),
('80', 'img/jual_trans_coloring_coklat.jpg', 'Trans Coloring Cokelat', 98000),
('81', 'img/jual_trans_coloring_hijau_appel.jpg', 'Trans Coloring Apple Hijau', 98000),
('82', 'img/jual_trans_coloring_warna_merah.jpg', 'Trans Coloring Merah', 98000),
('83', 'img/jual_trans_pewarna_maknan_hitam.jpg', 'Trans Coloring Hitam', 98000),
('84', 'img/jual_zeefine_choco_moist_grosir_harga_murah_di_tokowahab.com.jpg', 'Zeefine Choco Moist', 632000),
('85', 'img/KremaInstant400gr.jpg', 'Haan Krema Instant', 461000),
('86', 'img/la_kreiva_cumble_red_velvet_grosir_murah_di_tokowahab.com.jpg', 'La Kreiva Red Velvet Crumble', 461000),
('87', 'img/la_kreva_6_1.jpg', 'La Kreiva Black Crumble', 461000),
('88', 'img/la_kreva_red_vel_4.jpg', 'La Kreiva Red Velvet Crumble Fine', 461000),
('89', 'img/Ligo_Oat_Makanan_Sehat.jpg', 'Ligo Havermout', 330000),
('9', 'img/colatta_glaze_mango.jpg', 'Colatta Glaze Mango', 350000),
('90', 'img/Ovex500gr.jfif', 'Ovex Glanz', 1377000),
('91', 'img/Quick7520kg.jfif', 'Quick', 769000),
('92', 'img/Ragi_Saf_Instant_Grosir.jpg', 'Saft Instant', 945000),
('93', 'img/RapInstant1kg.jfif', 'Rap Instant', 769000),
('94', 'img/richwhiptoppingcrt.jpg', 'Rich Whip Topping', 510000),
('95', 'img/Rimulsoft20kg.jfif', 'Rimulsoft Super', 510000),
('96', 'img/RyotoSP15kg.jfif', 'Ryoto SP', 998000),
('98', 'img/tepung_hercules_baking_powder.jpg', 'Hercules Baking Powder', 1050000),
('99', 'img/tepung_roti_putih_250gr_x_24_2.jpg', 'Tepung Roti J Food Putih', 461000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'gaby', 'gaby@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtrans`
--
ALTER TABLE `dtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `htrans`
--
ALTER TABLE `htrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dtrans`
--
ALTER TABLE `dtrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `htrans`
--
ALTER TABLE `htrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
