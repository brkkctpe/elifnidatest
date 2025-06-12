

CREATE TABLE `ekip_oduller` (
  `oduller_id` int(11) NOT NULL AUTO_INCREMENT,
  `oduller_adi` varchar(225) NOT NULL,
  `oduller_permalink` varchar(225) NOT NULL,
  `oduller_sira` int(11) NOT NULL,
  `oduller_resim` varchar(225) NOT NULL,
  `oduller_aciklama` text NOT NULL,
  `oduller_desc` varchar(225) NOT NULL,
  `oduller_keyw` varchar(225) NOT NULL,
  `oduller_ekleyen` int(11) NOT NULL,
  `oduller_durum` int(11) NOT NULL,
  `oduller_kayitzaman` int(11) NOT NULL,
  `oduller_dil` int(11) NOT NULL,
  `oduller_gid` int(11) NOT NULL,
  `oduller_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`oduller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_oduller VALUES("1","Lorem ?psum Dolar Lorem ?psum Dolar","lorem-ipsum-dolar-lorem-ipsum-dolar-6067","0","istockphoto-1044382612-612x612_1649080889.webp","","Lorem ?psum Dolar Lorem ?psum Dolar Lorem ?psum Dolar Lorem ?psum Dolar Lorem ?psum Dolar Lorem ?psum Dolar","02.02.2019","1","1","1641802508","1","1","0");
INSERT INTO ekip_oduller VALUES("2","Lorem ?psum Dolar Lorem ?psum Dolar","lorem-ipsum-dolar-lorem-ipsum-dolar-6738","0","istockphoto-1044382612-612x612_1649080889.webp","","Lorem ?psum Dolar Lorem ?psum Dolar Lorem ?psum Dolar Lorem ?psum Dolar Lorem ?psum Dolar Lorem ?psum Dolar","02.02.2019","1","1","1641802514","1","2","0");



