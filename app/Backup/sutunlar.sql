ALTER TABLE `ekip_ayarlar` ADD `ayarlar_siteurl` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitetema` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitetitle` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitedesc` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitekeyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitedil` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_siteheader` text NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitefooter` text NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitemodul` longtext NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_logolight` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_logodark` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_logolightmobil` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_logodarkmobil` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_favicon` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_defaultresim` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_facebook` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_instagram` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_twitter` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_youtube` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_pinterest` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_linkedin` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_whatsapp` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_telefon1` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_telefon2` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_fax` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mail` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mail2` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_adres` text NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_adres2` text NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mapiframe` text NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mapiframe2` text NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_maplink` text NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_maplink2` text NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailhost` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailkadi` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailparola` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailport` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailssl` int(11) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailgit1` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailgit2` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailgit3` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_mailrecaptcha` int(11) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_recaptchaskey` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_recaptchagkey` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitecache` int(11) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_sitelazy` int(11) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_siteminify` int(11) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_otoceviri` int(11) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_bakimda` int(11) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_siterenk1` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_siterenk2` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_siterenk3` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_siterenk4` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_iyzico_api_key` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_iyzico_api_secret` varchar(225) NOT NULL;


ALTER TABLE `ekip_ayarlar` ADD `ayarlar_iyzico_base_url` varchar(225) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_id` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_sira` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_tur` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_video` varchar(225) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_aciklama` text NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_durum` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_dil` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_gid` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_basin` ADD `basin_logo` varchar(225) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_id` int(11) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_sira` int(11) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_kategori` int(11) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_aciklama` text NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_durum` int(11) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_dil` int(11) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_gid` int(11) NOT NULL;


ALTER TABLE `ekip_blog` ADD `blog_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_dil` ADD `dil_id` int(11) NOT NULL;


ALTER TABLE `ekip_dil` ADD `dil_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_dil` ADD `dil_uzanti` varchar(225) NOT NULL;


ALTER TABLE `ekip_dil` ADD `dil_bayrak` varchar(225) NOT NULL;


ALTER TABLE `ekip_dil` ADD `dil_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_dil` ADD `dil_durum` int(11) NOT NULL;


ALTER TABLE `ekip_dil` ADD `dil_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_diltext` ADD `diltext_id` int(11) NOT NULL;


ALTER TABLE `ekip_diltext` ADD `diltext_default` text NOT NULL;


ALTER TABLE `ekip_diltext` ADD `diltext_ceviri` longtext NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_id` int(11) NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_detay` longtext NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_durum` int(11) NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_gid` int(11) NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_dil` int(11) NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_sira` int(11) NOT NULL;


ALTER TABLE `ekip_diyettaslak` ADD `diyettaslak_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_ebulten` ADD `ebulten_id` int(11) NOT NULL;


ALTER TABLE `ekip_ebulten` ADD `ebulten_mail` varchar(225) NOT NULL;


ALTER TABLE `ekip_ebulten` ADD `ebulten_durum` int(11) NOT NULL;


ALTER TABLE `ekip_ebulten` ADD `ebulten_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_ebultentoplu` ADD `ebultentoplu_id` int(11) NOT NULL;


ALTER TABLE `ekip_ebultentoplu` ADD `ebultentoplu_mesaj` text NOT NULL;


ALTER TABLE `ekip_ebultentoplu` ADD `ebultentoplu_mailler` longtext NOT NULL;


ALTER TABLE `ekip_ekalan` ADD `ekalan_id` int(11) NOT NULL;


ALTER TABLE `ekip_ekalan` ADD `ekalan_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_ekalan` ADD `ekalan_sutunadi` varchar(225) NOT NULL;


ALTER TABLE `ekip_ekalan` ADD `ekalan_tur` int(11) NOT NULL;


ALTER TABLE `ekip_ekalan` ADD `ekalan_modul` varchar(225) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_id` int(11) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_sira` int(11) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_aciklama` text NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_durum` int(11) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_dil` int(11) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_gid` int(11) NOT NULL;


ALTER TABLE `ekip_etkinlikler` ADD `etkinlikler_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_id` int(11) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_sira` int(11) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_resimler` longtext NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_aciklama` text NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_durum` int(11) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_dil` int(11) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_gid` int(11) NOT NULL;


ALTER TABLE `ekip_fotografgaleri` ADD `fotografgaleri_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_id` int(11) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_banka` varchar(225) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_iban` varchar(225) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_hesapsahibi` varchar(225) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_durum` int(11) NOT NULL;


ALTER TABLE `ekip_hesapnumaralari` ADD `hesapnumaralari_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_il` ADD `Id` int(11) NOT NULL;


ALTER TABLE `ekip_il` ADD `IlAdi` varchar(255) NOT NULL;


ALTER TABLE `ekip_il` ADD `UlkeId` int(11) NOT NULL;


ALTER TABLE `ekip_il` ADD `Oncelik` int(11) NOT NULL;


ALTER TABLE `ekip_ilce` ADD `Id` int(11) NOT NULL;


ALTER TABLE `ekip_ilce` ADD `IlceAdi` varchar(255) NOT NULL;


ALTER TABLE `ekip_ilce` ADD `IlId` int(11) NOT NULL;


ALTER TABLE `ekip_ilce` ADD `Oncelik` int(11) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_id` int(11) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_ad` varchar(225) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_soyad` varchar(225) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_adsoyad` varchar(225) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_mail` varchar(225) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_telefon` varchar(225) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_konu` varchar(225) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_mesaj` text NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_durum` int(11) NOT NULL;


ALTER TABLE `ekip_iletisim` ADD `iletisim_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_kupon` ADD `kupon_id` int(11) NOT NULL;


ALTER TABLE `ekip_kupon` ADD `kupon_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_kupon` ADD `kupon_kod` varchar(225) NOT NULL;


ALTER TABLE `ekip_kupon` ADD `kupon_indirim` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_kupon` ADD `kupon_yuzde` int(11) NOT NULL;


ALTER TABLE `ekip_kupon` ADD `kupon_durum` int(11) NOT NULL;


ALTER TABLE `ekip_kupon` ADD `kupon_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_kupon` ADD `kupon_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_log` ADD `log_id` int(11) NOT NULL;


ALTER TABLE `ekip_log` ADD `log_yazi` varchar(225) NOT NULL;


ALTER TABLE `ekip_log` ADD `log_ip` varchar(225) NOT NULL;


ALTER TABLE `ekip_log` ADD `log_zaman` int(11) NOT NULL;


ALTER TABLE `ekip_menu` ADD `menu_id` int(11) NOT NULL;


ALTER TABLE `ekip_menu` ADD `menu_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_menu` ADD `menu_json` longtext NOT NULL;


ALTER TABLE `ekip_menu` ADD `menu_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_menu` ADD `menu_durum` int(11) NOT NULL;


ALTER TABLE `ekip_menu` ADD `menu_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_menu` ADD `menu_dil` int(11) NOT NULL;


ALTER TABLE `ekip_menu` ADD `menu_gid` int(11) NOT NULL;


ALTER TABLE `ekip_menulink` ADD `menulink_id` int(11) NOT NULL;


ALTER TABLE `ekip_menulink` ADD `menulink_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_menulink` ADD `menulink_link` varchar(225) NOT NULL;


ALTER TABLE `ekip_menulink` ADD `menulink_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_menulink` ADD `menulink_yenisekme` int(11) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_id` int(11) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_sira` int(11) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_aciklama` text NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_durum` int(11) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_dil` int(11) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_gid` int(11) NOT NULL;


ALTER TABLE `ekip_oduller` ADD `oduller_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_id` int(11) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_uye` int(11) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_tarih` varchar(225) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_agirlik` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_bel` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_gobek` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_ustkol` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_ustbacak` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_kalca` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_gogus` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_boyun` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_odem` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_kabizlik` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_regloncesi` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_reglsonrasi` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_uyum` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_egzersiz` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_mesaj` text NOT NULL;


ALTER TABLE `ekip_olcum` ADD `olcum_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_ortam` ADD `ortam_id` int(11) NOT NULL;


ALTER TABLE `ekip_ortam` ADD `ortam_dosya` varchar(225) NOT NULL;


ALTER TABLE `ekip_ortam` ADD `ortam_yol` varchar(225) NOT NULL;


ALTER TABLE `ekip_ortam` ADD `ortam_alt` varchar(225) NOT NULL;


ALTER TABLE `ekip_ortam` ADD `ortam_title` varchar(225) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_id` int(11) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_sira` int(11) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_aciklama` text NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_durum` int(11) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_dil` int(11) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_gid` int(11) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_instagram` varchar(225) NOT NULL;


ALTER TABLE `ekip_partner` ADD `partner_mail` varchar(225) NOT NULL;


ALTER TABLE `ekip_permalink` ADD `permalink_id` int(11) NOT NULL;


ALTER TABLE `ekip_permalink` ADD `permalink_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_permalink` ADD `permalink_modulid` int(11) NOT NULL;


ALTER TABLE `ekip_permalink` ADD `permalink_link` varchar(225) NOT NULL;


ALTER TABLE `ekip_permalink` ADD `permalink_git` varchar(225) NOT NULL;


ALTER TABLE `ekip_permalink` ADD `permalink_dil` int(11) NOT NULL;


ALTER TABLE `ekip_randevu` ADD `randevu_id` int(11) NOT NULL;


ALTER TABLE `ekip_randevu` ADD `randevu_uye` int(11) NOT NULL;


ALTER TABLE `ekip_randevu` ADD `randevu_sepet` int(11) NOT NULL;


ALTER TABLE `ekip_randevu` ADD `randevu_seans` int(11) NOT NULL;


ALTER TABLE `ekip_randevu` ADD `randevu_zaman` int(11) NOT NULL;
ALTER TABLE `ekip_randevu` ADD `randevu_durum` tinyint(1) NOT NULL DEFAULT '0';


ALTER TABLE `ekip_randevu` ADD `randevu_tur` int(11) NOT NULL;


ALTER TABLE `ekip_randevu` ADD `randevu_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_id` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_sira` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_aciklama` text NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_durum` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_dil` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_gid` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_kilo` varchar(225) NOT NULL;


ALTER TABLE `ekip_referans` ADD `referans_sure` varchar(225) NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_id` int(11) NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_ekle` int(11) NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_duzenle` int(11) NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_sil` int(11) NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_sayfa` longtext NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_durum` int(11) NOT NULL;


ALTER TABLE `ekip_rutbe` ADD `rutbe_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_id` int(11) NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_aciklama` text NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_durum` int(11) NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_dil` int(11) NOT NULL;


ALTER TABLE `ekip_sabit` ADD `sabit_gid` int(11) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_id` int(11) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_sira` int(11) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_gitlink` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_modul` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_resim2` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_resim3` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_aciklama` text NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_aciklama2` text NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_aciklama3` text NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_durum` int(11) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_dil` int(11) NOT NULL;


ALTER TABLE `ekip_sayfa` ADD `sayfa_gid` int(11) NOT NULL;


ALTER TABLE `ekip_sepet` ADD `sepet_id` int(11) NOT NULL;


ALTER TABLE `ekip_sepet` ADD `sepet_kod` varchar(225) NOT NULL;


ALTER TABLE `ekip_sepet` ADD `sepet_uye` int(11) NOT NULL;


ALTER TABLE `ekip_sepet` ADD `sepet_tutar` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_sepet` ADD `sepet_odemetur` int(11) NOT NULL;


ALTER TABLE `ekip_sepet` ADD `sepet_odemedurum` int(11) NOT NULL;


ALTER TABLE `ekip_sepet` ADD `sepet_durum` int(11) NOT NULL;


ALTER TABLE `ekip_sepet` ADD `sepet_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_id` int(11) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_sira` int(11) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_yazi1` varchar(225) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_yazi2` varchar(225) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_yazi3` varchar(225) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_mobilresim` varchar(225) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_aciklama` text NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_durum` int(11) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_dil` int(11) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_gid` int(11) NOT NULL;


ALTER TABLE `ekip_slider` ADD `slider_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_id` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_sira` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_resimler` longtext NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_kategori` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_aciklama` text NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_durum` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_dil` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_gid` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_fiyat` decimal(11,2) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_seans` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_haftaseans` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_seanssure` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_yuzyuzeseans` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_takvimtur` int(11) NOT NULL;


ALTER TABLE `ekip_urun` ADD `urun_aralik` longtext NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_id` int(11) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_sira` int(11) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_aciklama` text NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_durum` int(11) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_dil` int(11) NOT NULL;


ALTER TABLE `ekip_urunkategori` ADD `urunkategori_gid` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_id` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_ad` varchar(225) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_soyad` varchar(225) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_mail` varchar(225) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_telefon` varchar(225) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_parola` varchar(225) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_parolayeni` varchar(225) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_parolazaman` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_tc` varchar(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_dogumtarihi` varchar(10) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_adres` text NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_il` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_ilce` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_meslek` varchar(225) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_cinsiyet` varchar(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_boy` int(3) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_kilo` int(3) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_hedefkilo` int(3) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_bildirimmail` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_bildirimsms` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_sozlesme` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_alerji` text NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_sevmediginiz` text NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_ilgilenmediginiz` text NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_notlar` text NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_tahlil` longtext NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_resimler` longtext NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_durum` int(11) NOT NULL;


ALTER TABLE `ekip_uye` ADD `uye_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_id` int(11) NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_uye` int(11) NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_aciklama` text NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_detay` longtext NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_notlar` longtext NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_uyediyet` ADD `uyediyet_durum` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_id` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_adi` varchar(225) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_permalink` varchar(225) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_sira` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_link` varchar(225) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_kategori` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_aciklama` text NOT NULL;


ALTER TABLE `ekip_video` ADD `video_desc` varchar(225) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_keyw` varchar(225) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_ekleyen` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_durum` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_kayitzaman` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_dil` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_gid` int(11) NOT NULL;


ALTER TABLE `ekip_video` ADD `video_anasayfa` int(11) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_id` int(11) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_ad` varchar(225) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_soyad` varchar(225) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_mail` varchar(225) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_telefon` varchar(225) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_parola` varchar(225) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_resim` varchar(225) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_ekip` int(11) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_durum` int(11) NOT NULL;


ALTER TABLE `ekip_yonetici` ADD `yonetici_kayitzaman` int(11) NOT NULL;


