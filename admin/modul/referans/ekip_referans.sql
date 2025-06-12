

CREATE TABLE `ekip_referans` (
  `referans_id` int(11) NOT NULL AUTO_INCREMENT,
  `referans_adi` varchar(225) NOT NULL,
  `referans_permalink` varchar(225) NOT NULL,
  `referans_sira` int(11) NOT NULL,
  `referans_resim` varchar(225) NOT NULL,
  `referans_aciklama` text NOT NULL,
  `referans_desc` varchar(225) NOT NULL,
  `referans_keyw` varchar(225) NOT NULL,
  `referans_ekleyen` int(11) NOT NULL,
  `referans_durum` int(11) NOT NULL,
  `referans_kayitzaman` int(11) NOT NULL,
  `referans_dil` int(11) NOT NULL,
  `referans_gid` int(11) NOT NULL,
  `referans_anasayfa` int(11) NOT NULL,
  `referans_kilo` varchar(225) NOT NULL,
  `referans_sure` varchar(225) NOT NULL,
  PRIMARY KEY (`referans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_referans VALUES("4","Ahmet E.","ahmet-e-1820","0","galeri-1_1711010409.webp","<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>","","","1","1","1641382479","1","4","1","15 Kilo","1.5 Ay");
INSERT INTO ekip_referans VALUES("5","Ahmet E.","ahmet-e-6436","0","galeri-1_1711010409.webp","","","","1","1","1711349087","1","5","1","","");
INSERT INTO ekip_referans VALUES("6","Ahmet E.","ahmet-e-5998","0","galeri-1_1711010409.webp","","","","1","1","1711349098","1","6","1","","");



