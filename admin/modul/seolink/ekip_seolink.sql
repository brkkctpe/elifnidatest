

CREATE TABLE `ekip_seolink` (
  `seolink_id` int(11) NOT NULL AUTO_INCREMENT,
  `seolink_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seolink_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seolink_sira` int(11) NOT NULL,
  `seolink_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seolink_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seolink_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seolink_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seolink_anasayfa` int(11) NOT NULL,
  `seolink_ekleyen` int(11) NOT NULL,
  `seolink_durum` int(11) NOT NULL,
  `seolink_kayitzaman` int(11) NOT NULL,
  `seolink_dil` int(11) NOT NULL,
  `seolink_gid` int(11) NOT NULL,
  PRIMARY KEY (`seolink_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




