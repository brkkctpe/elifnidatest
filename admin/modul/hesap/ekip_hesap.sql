

CREATE TABLE `ekip_hesap` (
  `hesap_id` int(11) NOT NULL AUTO_INCREMENT,
  `hesap_adi` varchar(225) NOT NULL,
  `hesap_permalink` varchar(225) NOT NULL,
  `hesap_sira` int(11) NOT NULL,
  `hesap_resim` varchar(225) NOT NULL,
  `hesap_aciklama` text NOT NULL,
  `hesap_desc` varchar(225) NOT NULL,
  `hesap_keyw` varchar(225) NOT NULL,
  `hesap_ekleyen` int(11) NOT NULL,
  `hesap_durum` int(11) NOT NULL,
  `hesap_kayitzaman` int(11) NOT NULL,
  `hesap_dil` int(11) NOT NULL,
  `hesap_gid` int(11) NOT NULL,
  `hesap_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`hesap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;




