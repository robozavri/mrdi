-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 01, 2018 at 01:22 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excelgov`
--

-- --------------------------------------------------------

--
-- Table structure for table `statebuildingcompanies`
--

CREATE TABLE `statebuildingcompanies` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programa` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donori` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_registratsiis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regionis_dasakheleba_kartuli` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regionis_dasakheleba_inglisuri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `munitsipalitetis_dasakheleba_kartuli` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `munitsipalitetis_dasakheleba_inglisuri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_tipi_inglisuri_dasakheleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_kodi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_dasakheleba_kartuli` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_dasakheleba_inglisuri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_nomeri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktoris_dasakheleba_kartuli` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktoris_dasakheleba_inglisuri` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktoris_saidentifikatsio_kodi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktoris_sakontakto_piri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktoris_sakontakto_piri_tanamdeboba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktoris_sakontakto_piri_telefoni` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktoris_sakontakto_piris_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_datsqebis_savaraudo_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_dasrulebis_savaraudo_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenderis_gamotskhadebis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_gaformebis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `samushaota_datsqebis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `samushaota_dasrulebis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `samushaota_dasrulebis_vadis_tsvlileba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_dasrulebis_vada` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `samushaota_datsqeba_faktiuri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `samushaota_dasruleba_faktiuri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_pirveladi_migheba_chabarebis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_saboloo_migheba_chabarebis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipologiis_dasakheleba_kartuli` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipologiis_dasakheleba_inglisuri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_satsqisi_ghirebuleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tsvlileba_proektis_satsqis_ghirebulebashi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_saboloo_ghirebuleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shesrulebul_samushaota_ghirebuleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shesasrulebel_samushaota_ghirebuleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jarimis_motsuloba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jarimis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gadakhdili_tankha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gadasakhdeli_tankha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_zedamkhedveli` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_zedamkhedveli_tanamdeboba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_zedamkhedveli_telefoni` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `samushaota_mokle_aghtsera_kartuli` text COLLATE utf8_unicode_ci,
  `samushaota_mokle_aghtsera_inglisuri` text COLLATE utf8_unicode_ci,
  `shenishvna` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avansis_motsuloba_romelits_sheidzleba_gaitses_garantiisas` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gatsemuli_avansis_motsuleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dabrunebuli_avansis_motsuloba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dasabrunebeli_avansis_motsuloba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khariskhis_uzrunvelqofis_tankha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khariskhis_uzrunvelqofis_tankha_rezervi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktoris_sherchevis_tsesi_konkursipirdapiri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenderis_tipi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shesqidvis_safudzveli` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sakhazino_programuli_kodi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kategoriis_kodi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_shetsqvetis_indikatori` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_tsinastsari_ghirebuleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_obiektis_mimghebi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avansis_garantia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avansis_garantia_gatsemis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avansis_garantia_tankha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avansis_garantia_garantiis_gamtsemi_banki` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avansis_garantia_nomeri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avansis_garantia_mokmedebis_vada` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_garantia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_garantia_gatsemis_tarighi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_garantia_tankha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_garantia_garantiis_gamtsemi_banki` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_garantia_nomeri` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_garantia_mokmedebis_vada` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontraktis_dazghvevis_vada` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `defektebze_pasukhismgeblobis_vada` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dakavebuli_sarezervo_tankha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gadakhdili_sarezervo_tankha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gadasakhdeli_sarezervo_tankha` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_dafinanseba_donori` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_dafinanseba_tsentraluri_biujeti` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_dafinanseba_adgilobrivi_biujeti` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_dafinanseba_mgf` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proekti_gankutvnilia_idzulebit_gadaadgilebul_pirtatvis` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saoperatsio_kharjebi_kiara` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_menejeri_mgf` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_gankhortsielebis_statusi_kartuli_dasakheleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proektis_gankhortsielebis_statusi_inglisuri_dasakheleba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dasakmebulta_raodenoba` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bmuli_sakhelmtsifo_shesqidvebis_saagentos_saitze` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statebuildingcompanies`
--
ALTER TABLE `statebuildingcompanies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statebuildingcompanies`
--
ALTER TABLE `statebuildingcompanies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
