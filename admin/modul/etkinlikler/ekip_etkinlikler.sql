

CREATE TABLE `ekip_etkinlikler` (
  `etkinlikler_id` int(11) NOT NULL AUTO_INCREMENT,
  `etkinlikler_adi` varchar(225) NOT NULL,
  `etkinlikler_permalink` varchar(225) NOT NULL,
  `etkinlikler_sira` int(11) NOT NULL,
  `etkinlikler_resim` varchar(225) NOT NULL,
  `etkinlikler_aciklama` text NOT NULL,
  `etkinlikler_desc` varchar(225) NOT NULL,
  `etkinlikler_keyw` varchar(225) NOT NULL,
  `etkinlikler_ekleyen` int(11) NOT NULL,
  `etkinlikler_durum` int(11) NOT NULL,
  `etkinlikler_kayitzaman` int(11) NOT NULL,
  `etkinlikler_dil` int(11) NOT NULL,
  `etkinlikler_gid` int(11) NOT NULL,
  `etkinlikler_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`etkinlikler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_etkinlikler VALUES("1","Lorem ipsum dolor sit amet, consectetur adipiscing elit","lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-8633","0","istockphoto-1044382612-612x612_1649080889.webp","","Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit","02.03.2019","1","1","1641803086","1","1","0");
INSERT INTO ekip_etkinlikler VALUES("2","Lorem ipsum dolor sit amet, consectetur adipiscing elit","lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-9944","0","istockphoto-1044382612-612x612_1649080889.webp","","Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit","02.03.2019","1","1","1641803093","1","2","0");



