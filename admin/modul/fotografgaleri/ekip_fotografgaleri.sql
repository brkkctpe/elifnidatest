

CREATE TABLE `ekip_fotografgaleri` (
  `fotografgaleri_id` int(11) NOT NULL AUTO_INCREMENT,
  `fotografgaleri_adi` varchar(225) NOT NULL,
  `fotografgaleri_permalink` varchar(225) NOT NULL,
  `fotografgaleri_sira` int(11) NOT NULL,
  `fotografgaleri_resim` varchar(225) NOT NULL,
  `fotografgaleri_resimler` longtext NOT NULL,
  `fotografgaleri_aciklama` text NOT NULL,
  `fotografgaleri_desc` varchar(225) NOT NULL,
  `fotografgaleri_keyw` varchar(225) NOT NULL,
  `fotografgaleri_ekleyen` int(11) NOT NULL,
  `fotografgaleri_durum` int(11) NOT NULL,
  `fotografgaleri_kayitzaman` int(11) NOT NULL,
  `fotografgaleri_dil` int(11) NOT NULL,
  `fotografgaleri_gid` int(11) NOT NULL,
  `fotografgaleri_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`fotografgaleri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_fotografgaleri VALUES("1","Before After","before-after-6402","0","deeb0k1xgaax-hv_1649159272.webp","a:0:{}","","","","1","1","1641384441","1","1","1");
INSERT INTO ekip_fotografgaleri VALUES("2","Before After","before-after-9837","0","screenshot-20190826-140233_1649159272.webp","a:0:{}","","","","1","1","1641384446","1","2","1");
INSERT INTO ekip_fotografgaleri VALUES("3","Before After","before-after-4588","0","screenshot-20191211-195054_1649159273.webp","a:0:{}","","","","1","1","1641384452","1","3","1");
INSERT INTO ekip_fotografgaleri VALUES("4","Before After","before-after-8246","0","deeb0k1xgaax-hv_1649159272.webp","a:0:{}","","","","1","1","1649159300","1","4","1");
INSERT INTO ekip_fotografgaleri VALUES("5","Before After","before-after-1978","0","screenshot-20190826-140233_1649159272.webp","a:0:{}","","","","1","1","1649159305","1","5","1");
INSERT INTO ekip_fotografgaleri VALUES("6","Before After","before-after-6533","0","screenshot-20191211-195054_1649159273.webp","a:0:{}","","","","1","1","1649159308","1","6","1");
INSERT INTO ekip_fotografgaleri VALUES("7","Before After","before-after-5380","0","deeb0k1xgaax-hv_1649159272.webp","a:0:{}","","","","1","1","1649159312","1","7","1");
INSERT INTO ekip_fotografgaleri VALUES("8","Before After","before-after-5269","0","screenshot-20190826-140233_1649159272.webp","a:0:{}","","","","1","1","1649159315","1","8","1");
INSERT INTO ekip_fotografgaleri VALUES("9","Before After","before-after-4601","0","screenshot-20191211-195054_1649159273.webp","a:0:{}","","","","1","1","1649159319","1","9","1");



