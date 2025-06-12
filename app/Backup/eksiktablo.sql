

CREATE TABLE `ekip_ayarlar` (
  `ayarlar_siteurl` varchar(225) NOT NULL,
  `ayarlar_sitetema` varchar(225) NOT NULL,
  `ayarlar_sitetitle` varchar(225) NOT NULL,
  `ayarlar_sitedesc` varchar(225) NOT NULL,
  `ayarlar_sitekeyw` varchar(225) NOT NULL,
  `ayarlar_sitedil` varchar(225) NOT NULL,
  `ayarlar_siteheader` text NOT NULL,
  `ayarlar_sitefooter` text NOT NULL,
  `ayarlar_sitemodul` longtext NOT NULL,
  `ayarlar_logolight` varchar(225) NOT NULL,
  `ayarlar_logodark` varchar(225) NOT NULL,
  `ayarlar_logolightmobil` varchar(225) NOT NULL,
  `ayarlar_logodarkmobil` varchar(225) NOT NULL,
  `ayarlar_favicon` varchar(225) NOT NULL,
  `ayarlar_defaultresim` varchar(225) NOT NULL,
  `ayarlar_facebook` varchar(225) NOT NULL,
  `ayarlar_instagram` varchar(225) NOT NULL,
  `ayarlar_twitter` varchar(225) NOT NULL,
  `ayarlar_youtube` varchar(225) NOT NULL,
  `ayarlar_pinterest` varchar(225) NOT NULL,
  `ayarlar_linkedin` varchar(225) NOT NULL,
  `ayarlar_whatsapp` varchar(225) NOT NULL,
  `ayarlar_telefon1` varchar(225) NOT NULL,
  `ayarlar_telefon2` varchar(225) NOT NULL,
  `ayarlar_fax` varchar(225) NOT NULL,
  `ayarlar_mail` varchar(225) NOT NULL,
  `ayarlar_mail2` varchar(225) NOT NULL,
  `ayarlar_adres` text NOT NULL,
  `ayarlar_adres2` text NOT NULL,
  `ayarlar_mapiframe` text NOT NULL,
  `ayarlar_mapiframe2` text NOT NULL,
  `ayarlar_maplink` text NOT NULL,
  `ayarlar_maplink2` text NOT NULL,
  `ayarlar_mailhost` varchar(225) NOT NULL,
  `ayarlar_mailkadi` varchar(225) NOT NULL,
  `ayarlar_mailparola` varchar(225) NOT NULL,
  `ayarlar_mailport` varchar(225) NOT NULL,
  `ayarlar_mailssl` int(11) NOT NULL,
  `ayarlar_mailgit1` varchar(225) NOT NULL,
  `ayarlar_mailgit2` varchar(225) NOT NULL,
  `ayarlar_mailgit3` varchar(225) NOT NULL,
  `ayarlar_mailrecaptcha` int(11) NOT NULL,
  `ayarlar_recaptchaskey` varchar(225) NOT NULL,
  `ayarlar_recaptchagkey` varchar(225) NOT NULL,
  `ayarlar_sitecache` int(11) NOT NULL,
  `ayarlar_sitelazy` int(11) NOT NULL,
  `ayarlar_siteminify` int(11) NOT NULL,
  `ayarlar_otoceviri` int(11) NOT NULL,
  `ayarlar_bakimda` int(11) NOT NULL,
  `ayarlar_siterenk1` varchar(225) NOT NULL,
  `ayarlar_siterenk2` varchar(225) NOT NULL,
  `ayarlar_siterenk3` varchar(225) NOT NULL,
  `ayarlar_siterenk4` varchar(225) NOT NULL,
  `ayarlar_iyzico_api_key` varchar(225) NOT NULL,
  `ayarlar_iyzico_api_secret` varchar(225) NOT NULL,
  `ayarlar_iyzico_base_url` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_basin` (
  `basin_id` int(11) NOT NULL AUTO_INCREMENT,
  `basin_adi` varchar(225) NOT NULL,
  `basin_permalink` varchar(225) NOT NULL,
  `basin_sira` int(11) NOT NULL,
  `basin_tur` int(11) NOT NULL,
  `basin_video` varchar(225) NOT NULL,
  `basin_resim` varchar(225) NOT NULL,
  `basin_aciklama` text NOT NULL,
  `basin_desc` varchar(225) NOT NULL,
  `basin_keyw` varchar(225) NOT NULL,
  `basin_ekleyen` int(11) NOT NULL,
  `basin_durum` int(11) NOT NULL,
  `basin_kayitzaman` int(11) NOT NULL,
  `basin_dil` int(11) NOT NULL,
  `basin_gid` int(11) NOT NULL,
  `basin_anasayfa` int(11) NOT NULL,
  `basin_logo` varchar(225) NOT NULL,
  PRIMARY KEY (`basin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_adi` varchar(225) NOT NULL,
  `blog_permalink` varchar(225) NOT NULL,
  `blog_sira` int(11) NOT NULL,
  `blog_resim` varchar(225) NOT NULL,
  `blog_kategori` int(11) NOT NULL,
  `blog_aciklama` text NOT NULL,
  `blog_desc` varchar(225) NOT NULL,
  `blog_keyw` varchar(225) NOT NULL,
  `blog_ekleyen` int(11) NOT NULL,
  `blog_durum` int(11) NOT NULL,
  `blog_kayitzaman` int(11) NOT NULL,
  `blog_dil` int(11) NOT NULL,
  `blog_gid` int(11) NOT NULL,
  `blog_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_dil` (
  `dil_id` int(11) NOT NULL AUTO_INCREMENT,
  `dil_adi` varchar(225) NOT NULL,
  `dil_uzanti` varchar(225) NOT NULL,
  `dil_bayrak` varchar(225) NOT NULL,
  `dil_ekleyen` int(11) NOT NULL,
  `dil_durum` int(11) NOT NULL,
  `dil_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`dil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_diltext` (
  `diltext_id` int(11) NOT NULL AUTO_INCREMENT,
  `diltext_default` text NOT NULL,
  `diltext_ceviri` longtext NOT NULL,
  PRIMARY KEY (`diltext_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_diyettaslak` (
  `diyettaslak_id` int(11) NOT NULL AUTO_INCREMENT,
  `diyettaslak_adi` varchar(225) NOT NULL,
  `diyettaslak_detay` longtext NOT NULL,
  `diyettaslak_durum` int(11) NOT NULL,
  `diyettaslak_ekleyen` int(11) NOT NULL,
  `diyettaslak_kayitzaman` int(11) NOT NULL,
  `diyettaslak_gid` int(11) NOT NULL,
  `diyettaslak_dil` int(11) NOT NULL,
  `diyettaslak_sira` int(11) NOT NULL,
  `diyettaslak_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`diyettaslak_id`)
) ENGINE=InnoDB AUTO_INCREMENT=336 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_ebulten` (
  `ebulten_id` int(11) NOT NULL AUTO_INCREMENT,
  `ebulten_mail` varchar(225) NOT NULL,
  `ebulten_durum` int(11) NOT NULL,
  `ebulten_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`ebulten_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_ebultentoplu` (
  `ebultentoplu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ebultentoplu_mesaj` text NOT NULL,
  `ebultentoplu_mailler` longtext NOT NULL,
  PRIMARY KEY (`ebultentoplu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_ekalan` (
  `ekalan_id` int(11) NOT NULL AUTO_INCREMENT,
  `ekalan_adi` varchar(225) NOT NULL,
  `ekalan_sutunadi` varchar(225) NOT NULL,
  `ekalan_tur` int(11) NOT NULL,
  `ekalan_modul` varchar(225) NOT NULL,
  PRIMARY KEY (`ekalan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_etkinlikler` (
  `etkinlikler_id` int(11) NOT NULL AUTO_INCREMENT,
  `etkinlikler_adi` varchar(225) NOT NULL,
  `etkinlikler_permalink` varchar(225) NOT NULL,
  `etkinlikler_sira` int(11) NOT NULL,
  `etkinlikler_resim` varchar(225) NOT NULL,
  `etkinlikler_aciklama` text NOT NULL,
  `etkinlikler_desc` varchar(225) NOT NULL,
  `etkinlikler_keyw` varchar(225) NOT NULL,
  `etkinlikler_ekleyen` int(11) NOT NULL,
  `etkinlikler_durum` int(11) NOT NULL,
  `etkinlikler_kayitzaman` int(11) NOT NULL,
  `etkinlikler_dil` int(11) NOT NULL,
  `etkinlikler_gid` int(11) NOT NULL,
  `etkinlikler_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`etkinlikler_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_il` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IlAdi` varchar(255) DEFAULT NULL,
  `UlkeId` int(11) DEFAULT NULL,
  `Oncelik` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6941 DEFAULT CHARSET=latin5;



CREATE TABLE `ekip_ilce` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IlceAdi` varchar(255) DEFAULT NULL,
  `IlId` int(11) DEFAULT NULL,
  `Oncelik` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=967 DEFAULT CHARSET=latin5;



CREATE TABLE `ekip_iletisim` (
  `iletisim_id` int(11) NOT NULL AUTO_INCREMENT,
  `iletisim_ad` varchar(225) NOT NULL,
  `iletisim_soyad` varchar(225) NOT NULL,
  `iletisim_adsoyad` varchar(225) NOT NULL,
  `iletisim_mail` varchar(225) NOT NULL,
  `iletisim_telefon` varchar(225) NOT NULL,
  `iletisim_konu` varchar(225) NOT NULL,
  `iletisim_mesaj` text NOT NULL,
  `iletisim_ekleyen` int(11) NOT NULL,
  `iletisim_durum` int(11) NOT NULL,
  `iletisim_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`iletisim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_yazi` varchar(225) NOT NULL,
  `log_ip` varchar(225) NOT NULL,
  `log_zaman` int(11) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=652 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_adi` varchar(225) NOT NULL,
  `menu_json` longtext NOT NULL,
  `menu_ekleyen` int(11) NOT NULL,
  `menu_durum` int(11) NOT NULL,
  `menu_kayitzaman` int(11) NOT NULL,
  `menu_dil` int(11) NOT NULL,
  `menu_gid` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_menulink` (
  `menulink_id` int(11) NOT NULL AUTO_INCREMENT,
  `menulink_adi` varchar(225) NOT NULL,
  `menulink_link` varchar(225) NOT NULL,
  `menulink_resim` varchar(225) NOT NULL,
  `menulink_yenisekme` int(11) NOT NULL,
  PRIMARY KEY (`menulink_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_oduller` (
  `oduller_id` int(11) NOT NULL AUTO_INCREMENT,
  `oduller_adi` varchar(225) NOT NULL,
  `oduller_permalink` varchar(225) NOT NULL,
  `oduller_sira` int(11) NOT NULL,
  `oduller_resim` varchar(225) NOT NULL,
  `oduller_aciklama` text NOT NULL,
  `oduller_desc` varchar(225) NOT NULL,
  `oduller_keyw` varchar(225) NOT NULL,
  `oduller_ekleyen` int(11) NOT NULL,
  `oduller_durum` int(11) NOT NULL,
  `oduller_kayitzaman` int(11) NOT NULL,
  `oduller_dil` int(11) NOT NULL,
  `oduller_gid` int(11) NOT NULL,
  `oduller_anasayfa` int(11) NOT NULL,
  PRIMARY KEY (`oduller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_olcum` (
  `olcum_id` int(11) NOT NULL AUTO_INCREMENT,
  `olcum_uye` int(11) NOT NULL,
  `olcum_tarih` varchar(225) NOT NULL,
  `olcum_resim` varchar(225) NOT NULL,
  `olcum_agirlik` decimal(11,2) NOT NULL,
  `olcum_bel` decimal(11,2) NOT NULL,
  `olcum_gobek` decimal(11,2) NOT NULL,
  `olcum_ustkol` decimal(11,2) NOT NULL,
  `olcum_ustbacak` decimal(11,2) NOT NULL,
  `olcum_kalca` decimal(11,2) NOT NULL,
  `olcum_gogus` decimal(11,2) NOT NULL,
  `olcum_boyun` decimal(11,2) NOT NULL,
  `olcum_odem` decimal(11,2) NOT NULL,
  `olcum_kabizlik` decimal(11,2) NOT NULL,
  `olcum_regloncesi` decimal(11,2) NOT NULL,
  `olcum_reglsonrasi` decimal(11,2) NOT NULL,
  `olcum_uyum` decimal(11,2) NOT NULL,
  `olcum_egzersiz` decimal(11,2) NOT NULL,
  `olcum_mesaj` text NOT NULL,
  `olcum_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`olcum_id`),
  KEY `olcum_id` (`olcum_id`),
  KEY `olcum_uye` (`olcum_uye`),
  KEY `olcum_tarih` (`olcum_tarih`),
  KEY `olcum_agirlik` (`olcum_agirlik`),
  KEY `olcum_bel` (`olcum_bel`),
  KEY `olcum_gobek` (`olcum_gobek`),
  KEY `olcum_ustkol` (`olcum_ustkol`),
  KEY `olcum_ustbacak` (`olcum_ustbacak`),
  KEY `olcum_kalca` (`olcum_kalca`),
  KEY `olcum_gogus` (`olcum_gogus`),
  KEY `olcum_boyun` (`olcum_boyun`),
  KEY `olcum_odem` (`olcum_odem`),
  KEY `olcum_kabizlik` (`olcum_kabizlik`),
  KEY `olcum_regloncesi` (`olcum_regloncesi`),
  KEY `olcum_reglsonrasi` (`olcum_reglsonrasi`),
  KEY `olcum_uyum` (`olcum_uyum`),
  KEY `olcum_kayitzaman` (`olcum_kayitzaman`),
  KEY `olcum_egzersiz` (`olcum_egzersiz`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_ortam` (
  `ortam_id` int(11) NOT NULL AUTO_INCREMENT,
  `ortam_dosya` varchar(225) NOT NULL,
  `ortam_yol` varchar(225) NOT NULL,
  `ortam_alt` varchar(225) NOT NULL,
  `ortam_title` varchar(225) NOT NULL,
  PRIMARY KEY (`ortam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_permalink` (
  `permalink_id` int(11) NOT NULL AUTO_INCREMENT,
  `permalink_adi` varchar(225) NOT NULL,
  `permalink_modulid` int(11) NOT NULL,
  `permalink_link` varchar(225) NOT NULL,
  `permalink_git` varchar(225) NOT NULL,
  `permalink_dil` int(11) NOT NULL,
  PRIMARY KEY (`permalink_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_randevu` (
  `randevu_id` int(11) NOT NULL AUTO_INCREMENT,
  `randevu_uye` int(11) NOT NULL,
  `randevu_sepet` int(11) NOT NULL,
  `randevu_seans` int(11) NOT NULL,
  `randevu_zaman` int(11) NOT NULL,
  `randevu_tur` int(11) NOT NULL,
  `randevu_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`randevu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_referans` (
  `referans_id` int(11) NOT NULL AUTO_INCREMENT,
  `referans_adi` varchar(225) NOT NULL,
  `referans_permalink` varchar(225) NOT NULL,
  `referans_sira` int(11) NOT NULL,
  `referans_resim` varchar(225) NOT NULL,
  `referans_aciklama` text NOT NULL,
  `referans_desc` varchar(225) NOT NULL,
  `referans_keyw` varchar(225) NOT NULL,
  `referans_ekleyen` int(11) NOT NULL,
  `referans_durum` int(11) NOT NULL,
  `referans_kayitzaman` int(11) NOT NULL,
  `referans_dil` int(11) NOT NULL,
  `referans_gid` int(11) NOT NULL,
  `referans_anasayfa` int(11) NOT NULL,
  `referans_kilo` varchar(225) NOT NULL,
  `referans_sure` varchar(225) NOT NULL,
  PRIMARY KEY (`referans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_rutbe` (
  `rutbe_id` int(11) NOT NULL AUTO_INCREMENT,
  `rutbe_adi` varchar(225) NOT NULL,
  `rutbe_ekle` int(11) NOT NULL,
  `rutbe_duzenle` int(11) NOT NULL,
  `rutbe_sil` int(11) NOT NULL,
  `rutbe_sayfa` longtext NOT NULL,
  `rutbe_ekleyen` int(11) NOT NULL,
  `rutbe_durum` int(11) NOT NULL,
  `rutbe_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`rutbe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_sabit` (
  `sabit_id` int(11) NOT NULL AUTO_INCREMENT,
  `sabit_adi` varchar(225) NOT NULL,
  `sabit_aciklama` text NOT NULL,
  `sabit_resim` varchar(225) NOT NULL,
  `sabit_ekleyen` int(11) NOT NULL,
  `sabit_durum` int(11) NOT NULL,
  `sabit_kayitzaman` int(11) NOT NULL,
  `sabit_dil` int(11) NOT NULL,
  `sabit_gid` int(11) NOT NULL,
  PRIMARY KEY (`sabit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_sayfa` (
  `sayfa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa_adi` varchar(225) NOT NULL,
  `sayfa_permalink` varchar(225) NOT NULL,
  `sayfa_sira` int(11) NOT NULL,
  `sayfa_anasayfa` int(11) NOT NULL,
  `sayfa_gitlink` varchar(225) NOT NULL,
  `sayfa_modul` varchar(225) NOT NULL,
  `sayfa_resim` varchar(225) NOT NULL,
  `sayfa_resim2` varchar(225) NOT NULL,
  `sayfa_resim3` varchar(225) NOT NULL,
  `sayfa_aciklama` text NOT NULL,
  `sayfa_aciklama2` text NOT NULL,
  `sayfa_aciklama3` text NOT NULL,
  `sayfa_desc` varchar(225) NOT NULL,
  `sayfa_keyw` varchar(225) NOT NULL,
  `sayfa_ekleyen` int(11) NOT NULL,
  `sayfa_durum` int(11) NOT NULL,
  `sayfa_kayitzaman` int(11) NOT NULL,
  `sayfa_dil` int(11) NOT NULL,
  `sayfa_gid` int(11) NOT NULL,
  PRIMARY KEY (`sayfa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_urun` (
  `urun_id` int(11) NOT NULL AUTO_INCREMENT,
  `urun_adi` varchar(225) NOT NULL,
  `urun_permalink` varchar(225) NOT NULL,
  `urun_sira` int(11) NOT NULL,
  `urun_resim` varchar(225) NOT NULL,
  `urun_resimler` longtext NOT NULL,
  `urun_kategori` int(11) NOT NULL,
  `urun_aciklama` text NOT NULL,
  `urun_desc` varchar(225) NOT NULL,
  `urun_keyw` varchar(225) NOT NULL,
  `urun_ekleyen` int(11) NOT NULL,
  `urun_durum` int(11) NOT NULL,
  `urun_kayitzaman` int(11) NOT NULL,
  `urun_dil` int(11) NOT NULL,
  `urun_gid` int(11) NOT NULL,
  `urun_anasayfa` int(11) NOT NULL,
  `urun_fiyat` decimal(11,2) NOT NULL,
  `urun_seans` int(11) NOT NULL,
  `urun_haftaseans` int(11) NOT NULL,
  `urun_seanssure` int(11) NOT NULL,
  `urun_yuzyuzeseans` int(11) NOT NULL,
  `urun_takvimtur` int(11) NOT NULL,
  `urun_aralik` longtext NOT NULL,
  PRIMARY KEY (`urun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_urunkategori` (
  `urunkategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `urunkategori_adi` varchar(225) NOT NULL,
  `urunkategori_permalink` varchar(225) NOT NULL,
  `urunkategori_sira` int(11) NOT NULL,
  `urunkategori_resim` varchar(225) NOT NULL,
  `urunkategori_aciklama` text NOT NULL,
  `urunkategori_desc` varchar(225) NOT NULL,
  `urunkategori_keyw` varchar(225) NOT NULL,
  `urunkategori_ekleyen` int(11) NOT NULL,
  `urunkategori_durum` int(11) NOT NULL,
  `urunkategori_kayitzaman` int(11) NOT NULL,
  `urunkategori_dil` int(11) NOT NULL,
  `urunkategori_gid` int(11) NOT NULL,
  PRIMARY KEY (`urunkategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_uye` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_ad` varchar(225) NOT NULL,
  `uye_soyad` varchar(225) NOT NULL,
  `uye_mail` varchar(225) NOT NULL,
  `uye_telefon` varchar(225) NOT NULL,
  `uye_parola` varchar(225) NOT NULL,
  `uye_parolayeni` varchar(225) NOT NULL,
  `uye_parolazaman` int(11) NOT NULL,
  `uye_resim` varchar(225) NOT NULL,
  `uye_tc` varchar(11) NOT NULL,
  `uye_dogumtarihi` varchar(10) NOT NULL,
  `uye_adres` text NOT NULL,
  `uye_il` int(11) NOT NULL,
  `uye_ilce` int(11) NOT NULL,
  `uye_meslek` varchar(225) NOT NULL,
  `uye_cinsiyet` varchar(11) NOT NULL,
  `uye_boy` int(3) NOT NULL,
  `uye_kilo` int(3) NOT NULL,
  `uye_hedefkilo` int(3) NOT NULL,
  `uye_bildirimmail` int(11) NOT NULL,
  `uye_bildirimsms` int(11) NOT NULL,
  `uye_sozlesme` int(11) NOT NULL,
  `uye_alerji` text NOT NULL,
  `uye_sevmediginiz` text NOT NULL,
  `uye_ilgilenmediginiz` text NOT NULL,
  `uye_notlar` text NOT NULL,
  `uye_tahlil` longtext NOT NULL,
  `uye_resimler` longtext NOT NULL,
  `uye_durum` int(11) NOT NULL,
  `uye_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_uyediyet` (
  `uyediyet_id` int(11) NOT NULL AUTO_INCREMENT,
  `uyediyet_uye` int(11) NOT NULL,
  `uyediyet_adi` varchar(225) NOT NULL,
  `uyediyet_aciklama` text NOT NULL,
  `uyediyet_detay` longtext NOT NULL,
  `uyediyet_notlar` longtext NOT NULL,
  `uyediyet_kayitzaman` int(11) NOT NULL,
  `uyediyet_ekleyen` int(11) NOT NULL,
  `uyediyet_durum` int(11) NOT NULL,
  PRIMARY KEY (`uyediyet_id`),
  KEY `uyediyet_id` (`uyediyet_id`),
  KEY `uyediyet_uye` (`uyediyet_uye`),
  KEY `uyediyet_adi` (`uyediyet_adi`),
  KEY `uyediyet_kayitzaman` (`uyediyet_kayitzaman`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;



CREATE TABLE `ekip_yonetici` (
  `yonetici_id` int(11) NOT NULL AUTO_INCREMENT,
  `yonetici_ad` varchar(225) NOT NULL,
  `yonetici_soyad` varchar(225) NOT NULL,
  `yonetici_mail` varchar(225) NOT NULL,
  `yonetici_telefon` varchar(225) NOT NULL,
  `yonetici_parola` varchar(225) NOT NULL,
  `yonetici_resim` varchar(225) NOT NULL,
  `yonetici_ekip` int(11) NOT NULL,
  `yonetici_durum` int(11) NOT NULL,
  `yonetici_kayitzaman` int(11) NOT NULL,
  PRIMARY KEY (`yonetici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

