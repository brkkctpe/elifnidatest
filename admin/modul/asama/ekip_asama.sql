

CREATE TABLE `ekip_asama` (
  `asama_id` int(11) NOT NULL AUTO_INCREMENT,
  `asama_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `asama_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `asama_sira` int(11) NOT NULL,
  `asama_anasayfa` int(11) NOT NULL,
  `asama_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `asama_ekleyen` int(11) NOT NULL,
  `asama_durum` int(11) NOT NULL,
  `asama_kayitzaman` int(11) NOT NULL,
  `asama_dil` int(11) NOT NULL,
  `asama_gid` int(11) NOT NULL,
  PRIMARY KEY (`asama_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ekip_asama VALUES("3","Kampanya","kampanya-5091","0","0","<p>Aşama Deneme<br></p>","1","1","1635856441","1","3");



