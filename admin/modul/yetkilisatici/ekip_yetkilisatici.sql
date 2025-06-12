

CREATE TABLE `ekip_yetkilisatici` (
  `yetkilisatici_id` int(11) NOT NULL AUTO_INCREMENT,
  `yetkilisatici_adi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_permalink` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_sira` int(11) NOT NULL,
  `yetkilisatici_resim` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_tur` int(11) NOT NULL,
  `yetkilisatici_adres` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_telefon` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_gsm` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_il` int(11) NOT NULL,
  `yetkilisatici_ilce` int(11) NOT NULL,
  `yetkilisatici_websitesi` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_maplink` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_aciklama` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_desc` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_keyw` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yetkilisatici_ekleyen` int(11) NOT NULL,
  `yetkilisatici_durum` int(11) NOT NULL,
  `yetkilisatici_kayitzaman` int(11) NOT NULL,
  `yetkilisatici_dil` int(11) NOT NULL,
  `yetkilisatici_gid` int(11) NOT NULL,
  `yetkilisatici_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`yetkilisatici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO ekip_yetkilisatici VALUES("4","Mehmet İşleyen Yükselen Yapı","mehmet-isleyen-yukselen-yapi-4900","0","04.11.2021-7b1ef071e05fe5911b8430ded0b5b9ff618.png","0","Namık Kemal Mah. Sait Arvas Blv. Nuh Öztürk Apt.","(0322) 612 94 19","0(541) 418 54 61","6410","8","yukselenyapi.demirdokum.net","https://www.google.com/maps?ll=37.023708,35.812709&amp;z=18&amp;t=m&amp;hl=tr-TR&amp;gl=US&amp;mapclient=embed&amp;q=37%C2%B001%2725.4%22N+35%C2%B048%2745.8%22E+37.023708,+35.812709@37.023708,35.812709","","","","1","1","1636009333","1","4","0");
INSERT INTO ekip_yetkilisatici VALUES("5","Mehmet İşleyen Yükselen Yapı 2","mehmet-isleyen-yukselen-yapi-2-1609","0","","1","Namık Kemal Mah. Sait Arvas Blv. Nuh Öztürk Apt.","(0322) 612 94 19","0(541) 418 54 61","6410","1","yukselenyapi.demirdokum.net","https://www.google.com/maps?ll=37.023708,35.812709&amp;z=18&amp;t=m&amp;hl=tr-TR&amp;gl=US&amp;mapclient=embed&amp;q=37%C2%B001%2725.4%22N+35%C2%B048%2745.8%22E+37.023708,+35.812709@37.023708,35.812709","","","","1","1","1636009344","1","5","0");
INSERT INTO ekip_yetkilisatici VALUES("6","Mehmet İşleyen Yükselen Yapı 3","mehmet-isleyen-yukselen-yapi-3-3219","0","","0","Namık Kemal Mah. Sait Arvas Blv. Nuh Öztürk Apt.","(0322) 612 94 19","0(541) 418 54 61","6411","20","yukselenyapi.demirdokum.net","https://www.google.com/maps?ll=37.023708,35.812709&amp;z=18&amp;t=m&amp;hl=tr-TR&amp;gl=US&amp;mapclient=embed&amp;q=37%C2%B001%2725.4%22N+35%C2%B048%2745.8%22E+37.023708,+35.812709@37.023708,35.812709","","","","1","1","1636009357","1","6","0");



