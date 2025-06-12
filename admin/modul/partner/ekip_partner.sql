

CREATE TABLE `ekip_partner` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_adi` varchar(225) NOT NULL,
  `partner_permalink` varchar(225) NOT NULL,
  `partner_sira` int(11) NOT NULL,
  `partner_resim` varchar(225) NOT NULL,
  `partner_aciklama` text NOT NULL,
  `partner_desc` varchar(225) NOT NULL,
  `partner_keyw` varchar(225) NOT NULL,
  `partner_ekleyen` int(11) NOT NULL,
  `partner_durum` int(11) NOT NULL,
  `partner_kayitzaman` int(11) NOT NULL,
  `partner_dil` int(11) NOT NULL,
  `partner_gid` int(11) NOT NULL,
  `partner_anasayfa` int(11) NOT NULL,
  `partner_instagram` varchar(225) NOT NULL,
  `partner_mail` varchar(225) NOT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_partner VALUES("1","Dyt. Lorem Elmac?","dyt-lorem-elmaci","1","istockphoto-1044382612-612x612_1649080889.webp","<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non justo velit. Ut ornare a nisl ut vestibulum. Nulla sapien ex, tempus varius orci sit amet, gravida interdum lacus. Integer iaculis auctor nibh, id vehicula dolor rhoncus id. Suspendisse id urna vitae quam malesuada tincidunt. Duis et molestie turpis, ut imperdiet mauris. Integer fringilla, velit nec vulputate finibus, mauris nibh dapibus ligula, eu placerat arcu est id mauris.</span><p></p><p></p>","Lorem ipsum dolor sit amet, consectetur adipiscing elit.","Diyetisyen Lorem Elmac?","1","1","1641562031","1","1","0","#","#");
INSERT INTO ekip_partner VALUES("2","Estetisyen Lorem Y?lmaz","estetisyen-lorem-yilmaz","2","istockphoto-1044382612-612x612_1649080889.webp","<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Quisque vestibulum vel leo eu dapibus. Donec gravida, dui non condimentum aliquet, elit nulla luctus libero, vitae consectetur leo mi eget est. Vivamus ac elit sit amet enim imperdiet sodales. Duis aliquam eros sapien, nec hendrerit velit commodo et. Donec iaculis sem at odio semper cursus. Vivamus in pharetra nunc. Cras posuere urna orci, vel tempus risus finibus ac. In hac habitasse platea dictumst. Quisque lacus libero, laoreet at congue eu, luctus pulvinar justo. Suspendisse commodo aliquam tincidunt. Aenean vel ante lectus. Pellentesque a odio metus. Sed vitae arcu vulputate magna sodales facilisis. Sed in scelerisque sem, vehicula venenatis diam.</span><br></p>\n","Donec iaculis sem at odio semper cursus.","Diyetisyen Lorem Y?lmaz","1","1","1641562040","1","2","0","#","#");



