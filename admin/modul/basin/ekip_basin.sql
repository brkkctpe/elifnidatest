

CREATE TABLE `ekip_basin` (
  `basin_id` int(11) NOT NULL AUTO_INCREMENT,
  `basin_adi` varchar(225) NOT NULL,
  `basin_permalink` varchar(225) NOT NULL,
  `basin_sira` int(11) NOT NULL,
  `basin_tur` int(11) NOT NULL,
  `basin_video` varchar(225) NOT NULL,
  `basin_resim` varchar(225) NOT NULL,
  `basin_aciklama` text NOT NULL,
  `basin_desc` varchar(225) NOT NULL,
  `basin_keyw` varchar(225) NOT NULL,
  `basin_ekleyen` int(11) NOT NULL,
  `basin_durum` int(11) NOT NULL,
  `basin_kayitzaman` int(11) NOT NULL,
  `basin_dil` int(11) NOT NULL,
  `basin_gid` int(11) NOT NULL,
  `basin_anasayfa` int(11) NOT NULL,
  `basin_logo` varchar(225) NOT NULL,
  PRIMARY KEY (`basin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_basin VALUES("3","Diyetisyen Elif Nida Zafer, Sa?l?k kö?emizde; Probiyotik ve Prebiyotiklerin etkilerinden bahsetti.","yazili-basin-3089","3","1","https://twitter.com/beINSPORTS_TR/status/1178405911167152128","beinsports-basin_1711458400.webp","","Diyetisyen Elif Nida Zafer, Sa?l?k kö?emizde; Probiyotik ve Prebiyotiklerin etkilerinden bahsetti.","","1","1","1641823872","1","3","0","bein-sports_1711458524.png");
INSERT INTO ekip_basin VALUES("4","E?lencenin dozu ‘biraz’ kaçt?ysa...","eglencenin-dozu-biraz-kactiysa","4","1","https://www.hurriyet.com.tr/kelebek/hurriyet-cumartesi/eglencenin-dozu-biraz-kactiysa-41972705","eglencenin-dozu-biraz-kactiysa_1711458914.webp","","","","1","1","1641823882","1","4","0","hurriyet-logo_1711458966.png");
INSERT INTO ekip_basin VALUES("5","Diyet yapmadan kilo verilir mi? Uzman?na sorduk, i?te yan?t?…","diyet-yapmadan-kilo-vermenin-yollari","5","1","https://www.formsante.com.tr/diyet-yapmadan-kilo-vermenin-yollari/","diyet-yapmadan-kilo-vermenin-yollari_1711459343.webp","","","","1","1","1641823893","1","5","0","formsante-logo_1711459368.png");
INSERT INTO ekip_basin VALUES("6","Zaman? Yava?latan Bir Beslenme Mümkün","zamani-yavaslatan-bir-beslenme-mumkun","6","1","https://www.hurriyet.com.tr/kelebek/hurriyet-cumartesi/zamani-yavaslatan-bir-beslenme-mumkun-41709960","zamani-yavaslatan-bir-beslenme-mumkun_1713354820.webp","","Son günlerde sa?l?kl? ya?am konusunda çok fazla okur ve ara?t?r?r olduk. Beslenmemize her zamankinden daha fazla dikkat ediyor, daha düzenli bir hayat ya?amaya özen gösteriyoruz.","09.01.2021","1","1","1713354834","1","6","0","hurriyet-logo_1711458966.png");



