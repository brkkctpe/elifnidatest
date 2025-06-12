-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Eyl 2021, 05:56:25
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `newmvc`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekip_blogkategori`
--

CREATE TABLE `ekip_blogkategori` (
  `blogkategori_id` int(11) NOT NULL,
  `blogkategori_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blogkategori_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blogkategori_sira` int(11) NOT NULL,
  `blogkategori_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blogkategori_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blogkategori_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blogkategori_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `blogkategori_ekleyen` int(11) NOT NULL,
  `blogkategori_durum` int(11) NOT NULL,
  `blogkategori_kayitzaman` int(11) NOT NULL,
  `blogkategori_dil` int(11) NOT NULL,
  `blogkategori_gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ekip_blogkategori`
--
ALTER TABLE `ekip_blogkategori`
  ADD PRIMARY KEY (`blogkategori_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ekip_blogkategori`
--
ALTER TABLE `ekip_blogkategori`
  MODIFY `blogkategori_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
