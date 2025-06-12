

CREATE TABLE `ekip_proje` (
  `proje_id` int(11) NOT NULL AUTO_INCREMENT,
  `proje_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `proje_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `proje_sira` int(11) NOT NULL,
  `proje_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `proje_kategori` int(11) NOT NULL,
  `proje_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `proje_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `proje_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `proje_ekleyen` int(11) NOT NULL,
  `proje_durum` int(11) NOT NULL,
  `proje_kayitzaman` int(11) NOT NULL,
  `proje_dil` int(11) NOT NULL,
  `proje_gid` int(11) NOT NULL,
  `proje_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`proje_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;




