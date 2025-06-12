

CREATE TABLE `ekip_hizmetler` (
  `hizmetler_id` int(11) NOT NULL AUTO_INCREMENT,
  `hizmetler_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hizmetler_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hizmetler_sira` int(11) NOT NULL,
  `hizmetler_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hizmetler_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hizmetler_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hizmetler_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hizmetler_ekleyen` int(11) NOT NULL,
  `hizmetler_durum` int(11) NOT NULL,
  `hizmetler_kayitzaman` int(11) NOT NULL,
  `hizmetler_dil` int(11) NOT NULL,
  `hizmetler_gid` int(11) NOT NULL,
  `hizmetler_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`hizmetler_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




