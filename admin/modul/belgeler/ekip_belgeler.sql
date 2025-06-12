

CREATE TABLE `ekip_belgeler` (
  `belgeler_id` int(11) NOT NULL AUTO_INCREMENT,
  `belgeler_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `belgeler_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `belgeler_sira` int(11) NOT NULL,
  `belgeler_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `belgeler_belge` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `belgeler_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `belgeler_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `belgeler_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `belgeler_ekleyen` int(11) NOT NULL,
  `belgeler_durum` int(11) NOT NULL,
  `belgeler_kayitzaman` int(11) NOT NULL,
  `belgeler_dil` int(11) NOT NULL,
  `belgeler_gid` int(11) NOT NULL,
  `belgeler_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`belgeler_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




