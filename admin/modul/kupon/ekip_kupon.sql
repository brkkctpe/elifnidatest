

CREATE TABLE `ekip_kupon` (
  `kupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `kupon_adi` varchar(225) NOT NULL,
  `kupon_kod` varchar(225) NOT NULL,
  `kupon_indirim` decimal(11,2) NOT NULL,
  `kupon_yuzde` int(11) NOT NULL,
  `kupon_durum` int(11) NOT NULL,
  `kupon_ekleyen` int(11) NOT NULL,
  `kupon_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`kupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_kupon VALUES("1","indirimkupon","indirimkupon","1.00","0","1","1","1638358661");



