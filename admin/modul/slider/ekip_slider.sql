

CREATE TABLE `ekip_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_adi` varchar(225) NOT NULL,
  `slider_permalink` varchar(225) NOT NULL,
  `slider_sira` int(11) NOT NULL,
  `slider_yazi1` varchar(225) NOT NULL,
  `slider_yazi2` varchar(225) NOT NULL,
  `slider_yazi3` varchar(225) NOT NULL,
  `slider_resim` varchar(225) NOT NULL,
  `slider_mobilresim` varchar(225) NOT NULL,
  `slider_aciklama` text NOT NULL,
  `slider_ekleyen` int(11) NOT NULL,
  `slider_durum` int(11) NOT NULL,
  `slider_kayitzaman` int(11) NOT NULL,
  `slider_dil` int(11) NOT NULL,
  `slider_gid` int(11) NOT NULL,
  `slider_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_slider VALUES("1","Merhaba, Ben Beslenme Uzman? ve Diyetisyen","merhaba-ben-beslenme-uzmani-ve-diyetisyen-1385","0","Elif Nida Zafer","Bu platformda, sa?l?kl? beslenme için ipuçlar?, basit tarifler, enerjinizi art?rmak için pratik bilgiler ve ya?am tarz? önerileri bulacaks?n?z. Sizlere sa?l?kl? ve enerjik bir ya?am için ilham vermek amac?yla buraday?m. Kim d","#","slider_1711008143.png","slider_1711008143.png","","1","1","1641380524","1","1","1");



