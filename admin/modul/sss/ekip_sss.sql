

CREATE TABLE `ekip_sss` (
  `sss_id` int(11) NOT NULL AUTO_INCREMENT,
  `sss_adi` varchar(225) NOT NULL,
  `sss_permalink` varchar(225) NOT NULL,
  `sss_sira` int(11) NOT NULL,
  `sss_aciklama` text NOT NULL,
  `sss_ekleyen` int(11) NOT NULL,
  `sss_durum` int(11) NOT NULL,
  `sss_kayitzaman` int(11) NOT NULL,
  `sss_dil` int(11) NOT NULL,
  `sss_gid` int(11) NOT NULL,
  `sss_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`sss_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_sss VALUES("3","Accordion Item #1","accordion-item-1-3587","0","<strong>This is the first item\'s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.","1","1","1711012729","1","3","1");
INSERT INTO ekip_sss VALUES("4","Accordion Item #1","accordion-item-1-6082","0","<strong>This is the first item\'s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.","1","1","1711012734","1","4","1");
INSERT INTO ekip_sss VALUES("5","Accordion Item #1","accordion-item-1-7705","0","<strong>This is the first item\'s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.","1","1","1711012739","1","5","1");



