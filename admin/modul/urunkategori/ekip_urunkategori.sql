

CREATE TABLE `ekip_urunkategori` (
  `urunkategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `urunkategori_adi` varchar(225) NOT NULL,
  `urunkategori_permalink` varchar(225) NOT NULL,
  `urunkategori_sira` int(11) NOT NULL,
  `urunkategori_resim` varchar(225) NOT NULL,
  `urunkategori_resimk` varchar(225) NOT NULL,
  `urunkategori_aciklama` text NOT NULL,
  `urunkategori_desc` varchar(225) NOT NULL,
  `urunkategori_keyw` varchar(225) NOT NULL,
  `urunkategori_ust` int(11) NOT NULL,
  `urunkategori_ekleyen` int(11) NOT NULL,
  `urunkategori_durum` int(11) NOT NULL,
  `urunkategori_anasayfa` int(11) NOT NULL,
  `urunkategori_kayitzaman` int(11) NOT NULL,
  `urunkategori_dil` int(11) NOT NULL,
  `urunkategori_gid` int(11) NOT NULL,
  PRIMARY KEY (`urunkategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_urunkategori VALUES("1","Yüz Yüze Beslenme Dan??manl???","yuz-yuze-beslenme-danismanligi-5883","0","paket-1_1711009247.webp","","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","1","1711009271","1","1");
INSERT INTO ekip_urunkategori VALUES("2","Online Beslenme Dan??manl???","online-beslenme-danismanligi-7448","0","paket-1_1711009247.webp","","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","1","1711009281","1","2");
INSERT INTO ekip_urunkategori VALUES("3","Kurumsal Beslenme Dan??manl???","kurumsal-beslenme-danismanligi-3652","0","paket-1_1711009247.webp","","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","1","1711009288","1","3");
INSERT INTO ekip_urunkategori VALUES("4","Sporcu Beslenme Dan??manl???","sporcu-beslenme-danismanligi-8900","0","paket-1_1711009247.webp","","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","1","1711009295","1","4");
INSERT INTO ekip_urunkategori VALUES("5","Hastal?klarda Beslenme","hastaliklarda-beslenme-1557","0","paket-1_1711009247.webp","icon-2_1711009326.png","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","0","1711009329","1","5");
INSERT INTO ekip_urunkategori VALUES("6","Gebelik ve Emzirme Döneminde Beslenme","gebelik-ve-emzirme-doneminde-beslenme-5161","0","paket-1_1711009247.webp","icon-3_1711009326.png","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","0","1711009341","1","6");
INSERT INTO ekip_urunkategori VALUES("7","Kilo Alma Program?","kilo-alma-programi-4488","0","paket-1_1711009247.webp","icon-4_1711009326.png","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","0","1711009352","1","7");
INSERT INTO ekip_urunkategori VALUES("8","Çocuk Beslenmesi","cocuk-beslenmesi-3294","0","paket-1_1711009247.webp","icon-5_1711009326.png","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","0","1711009362","1","8");
INSERT INTO ekip_urunkategori VALUES("9","Bölgesel ?ncelme - Schwarzy","bolgesel-incelme-schwarzy-9234","0","paket-1_1711009247.webp","icon-6_1711009326.png","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","0","1711009372","1","9");
INSERT INTO ekip_urunkategori VALUES("10","Besin Intolerans Testi","besin-intolerans-testi-5288","0","paket-1_1711009247.webp","icon-7_1711009326.png","","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.","","0","1","1","0","1711009383","1","10");



