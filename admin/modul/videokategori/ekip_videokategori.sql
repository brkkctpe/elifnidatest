-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Eyl 2021, 05:57:33
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
-- Tablo için tablo yapısı `ekip_videokategori`
--

CREATE TABLE `ekip_videokategori` (
  `videokategori_id` int(11) NOT NULL,
  `videokategori_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `videokategori_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `videokategori_sira` int(11) NOT NULL,
  `videokategori_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `videokategori_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `videokategori_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `videokategori_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `videokategori_ekleyen` int(11) NOT NULL,
  `videokategori_durum` int(11) NOT NULL,
  `videokategori_kayitzaman` int(11) NOT NULL,
  `videokategori_dil` int(11) NOT NULL,
  `videokategori_gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ekip_videokategori`
--
ALTER TABLE `ekip_videokategori`
  ADD PRIMARY KEY (`videokategori_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ekip_videokategori`
--
ALTER TABLE `ekip_videokategori`
  MODIFY `videokategori_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
