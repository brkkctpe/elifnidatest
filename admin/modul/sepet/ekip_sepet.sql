

CREATE TABLE `ekip_sepet` (
  `sepet_id` int(11) NOT NULL AUTO_INCREMENT,
  `sepet_kod` varchar(225) NOT NULL,
  `sepet_uye` int(11) NOT NULL,
  `sepet_tutar` decimal(11,2) NOT NULL,
  `sepet_odemetur` int(11) NOT NULL,
  `sepet_odemedurum` int(11) NOT NULL,
  `sepet_durum` int(11) NOT NULL,
  `sepet_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`sepet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_sepet VALUES("6","1605268","1","1200.00","2","1","1","1641991274");
INSERT INTO ekip_sepet VALUES("7","7107111","1","3000.00","2","0","1","1641991320");
INSERT INTO ekip_sepet VALUES("8","6076038","1","1199.00","2","1","1","1641994623");
INSERT INTO ekip_sepet VALUES("9","4962354","1","3000.00","2","1","1","1642352113");
INSERT INTO ekip_sepet VALUES("10","2754720","1","200.00","2","0","1","1642408186");
INSERT INTO ekip_sepet VALUES("11","4671486","1","1000.00","2","0","1","1642433637");
INSERT INTO ekip_sepet VALUES("12","6323122","1","3000.00","2","1","1","1649764603");
INSERT INTO ekip_sepet VALUES("13","2413706","1","3000.00","2","1","1","1650103445");
INSERT INTO ekip_sepet VALUES("14","5285194","1","3000.00","2","1","1","1650275405");
INSERT INTO ekip_sepet VALUES("15","8895034","3","3000.00","2","1","1","1655134783");
INSERT INTO ekip_sepet VALUES("16","2156433","2","500.00","2","1","1","1711016157");
INSERT INTO ekip_sepet VALUES("17","2156433","2","0.00","2","1","1","1711016181");
INSERT INTO ekip_sepet VALUES("18","8750253","4","500.00","2","1","1","1711023706");



