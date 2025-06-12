

CREATE TABLE `ekip_video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_adi` varchar(225) NOT NULL,
  `video_permalink` varchar(225) NOT NULL,
  `video_sira` int(11) NOT NULL,
  `video_link` varchar(225) NOT NULL,
  `video_resim` varchar(225) NOT NULL,
  `video_kategori` int(11) NOT NULL,
  `video_aciklama` text NOT NULL,
  `video_desc` varchar(225) NOT NULL,
  `video_keyw` varchar(225) NOT NULL,
  `video_ekleyen` int(11) NOT NULL,
  `video_durum` int(11) NOT NULL,
  `video_kayitzaman` int(11) NOT NULL,
  `video_dil` int(11) NOT NULL,
  `video_gid` int(11) NOT NULL,
  `video_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO ekip_video VALUES("1","Lorem ipsum dolor sit amet","lorem-ipsum-dolor-sit-amet-5362","0","https://www.youtube.com/watch?v=DJTNl6RsEHo","istockphoto-1044382612-612x612_1649080889.webp","0","","","","1","1","1641561051","1","1","1");
INSERT INTO ekip_video VALUES("2","Lorem ipsum dolor sit amet","lorem-ipsum-dolor-sit-amet-8970","0","https://www.youtube.com/watch?v=DJTNl6RsEHo","nutritionist-vs-dietitian-e1582067560645_1649081019.webp","0","","","","1","1","1641561054","1","2","1");
INSERT INTO ekip_video VALUES("3","Lorem ipsum dolor sit amet","lorem-ipsum-dolor-sit-amet-9404","0","https://www.youtube.com/watch?v=DJTNl6RsEHo","dietitian-nutritionist-radius_1649081019.webp","0","","","","1","1","1641561061","1","3","1");



