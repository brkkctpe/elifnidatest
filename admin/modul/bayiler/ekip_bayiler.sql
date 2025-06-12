

CREATE TABLE `ekip_bayiler` (
  `bayiler_id` int(11) NOT NULL AUTO_INCREMENT,
  `bayiler_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bayiler_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bayiler_sira` int(11) NOT NULL,
  `bayiler_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bayiler_kategori` int(11) NOT NULL,
  `bayiler_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bayiler_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bayiler_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bayiler_ekleyen` int(11) NOT NULL,
  `bayiler_durum` int(11) NOT NULL,
  `bayiler_kayitzaman` int(11) NOT NULL,
  `bayiler_dil` int(11) NOT NULL,
  `bayiler_gid` int(11) NOT NULL,
  `bayiler_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`bayiler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ekip_bayiler VALUES("3","Bayi Adı","bayi-adi-5843","0","","0","","","","1","1","1631863967","1","3","0");



