

CREATE TABLE `ekip_hesapnumaralari` (
  `hesapnumaralari_id` int(11) NOT NULL AUTO_INCREMENT,
  `hesapnumaralari_adi` varchar(225) NOT NULL,
  `hesapnumaralari_resim` varchar(225) NOT NULL,
  `hesapnumaralari_banka` varchar(225) NOT NULL,
  `hesapnumaralari_iban` varchar(225) NOT NULL,
  `hesapnumaralari_hesapsahibi` varchar(225) NOT NULL,
  `hesapnumaralari_ekleyen` int(11) NOT NULL,
  `hesapnumaralari_durum` int(11) NOT NULL,
  `hesapnumaralari_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`hesapnumaralari_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_hesapnumaralari VALUES("1","Ziraat","ziraat-bankasi-logotype-jpeg_1642076601.webp","Ziraat","TR54323123124314123123","Mustafa Karacan","1","1","1642076603");
INSERT INTO ekip_hesapnumaralari VALUES("2","?? Bankas?","","?? Bankas?","TR54323123124314123123","Mustafa Karacan","1","1","1642076615");



