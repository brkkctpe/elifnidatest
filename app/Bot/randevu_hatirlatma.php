<?php
require "../Config/config-db.php";

$dir = "../Helper/";
if(is_dir($dir)){
    if($handle = opendir($dir)){
        while(($file = readdir($handle)) !== false){
            if($file != ".htaccess" && $file != "." && $file != ".." && $file != "Thumbs.db"){
                require "../Helper/".$file;
            }
        }
        closedir($handle);
    }
}

require "../Config/config-site.php";

// Kolon kontrolu ve gerekirse ekleme
$col = row(query("SHOW COLUMNS FROM ".prefix."_randevu LIKE 'randevu_hatirlatildi'"));
if(!$col){
    query("ALTER TABLE ".prefix."_randevu ADD `randevu_hatirlatildi` int(11) NOT NULL DEFAULT 0");
}

$now = time();
$start = $now + 12*60*60;
$end   = $start + 60; // 1 dakikalik zaman araligi

$q = query("SELECT r.randevu_id, r.randevu_zaman, r.randevu_hatirlatildi, u.uye_ad, u.uye_soyad, u.uye_telefon, ur.urun_adi FROM ".prefix."_randevu r INNER JOIN ".prefix."_uye u ON u.uye_id=r.randevu_uye INNER JOIN ".prefix."_urun ur ON ur.urun_id=r.randevu_tur WHERE r.randevu_zaman BETWEEN '$start' AND '$end'");

while($r = row($q)){
    if($r['randevu_hatirlatildi'] == 0){
        $tel = preg_replace('/\D/', '', $r['uye_telefon']);
        $mesaj = "Sayin \"{$r['uye_ad']} {$r['uye_soyad']}\", En Saglikli Beslenme Danismanligi'nda - Beslenme ve Diyet Uzmani Elif Nida Zafer ile \"".date('d.m.Y H:i', $r['randevu_zaman'])."\"'da \"{$r['urun_adi']}\" randevunuz bulunmaktadir. Randevunuzu iptal etmek veya degistirmek isterseniz, 02162323639 veya 05314096220 numarali telefonlardan bize ulasabilirsiniz. Saglikli gunler dileriz!";
        smsgonder($tel, $mesaj);
        query("UPDATE ".prefix."_randevu SET randevu_hatirlatildi='1' WHERE randevu_id='".$r['randevu_id']."'");
    }
}
?>