

CREATE TABLE `ekip_markalar` (
  `markalar_id` int(11) NOT NULL AUTO_INCREMENT,
  `markalar_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `markalar_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `markalar_sira` int(11) NOT NULL,
  `markalar_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `markalar_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `markalar_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `markalar_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `markalar_ekleyen` int(11) NOT NULL,
  `markalar_durum` int(11) NOT NULL,
  `markalar_kayitzaman` int(11) NOT NULL,
  `markalar_dil` int(11) NOT NULL,
  `markalar_gid` int(11) NOT NULL,
  `markalar_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`markalar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




