<?php
require "../Config/config-db.php";

$dir = "../Helper/";
if (is_dir($dir)) {
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false) {
            if ($file != ".htaccess" && $file != "." && $file != ".." && $file != "Thumbs.db") {
                require "../Helper/" . $file;
            }
        }
        closedir($handle);
    }
}

require "../Config/config-site.php";

$bugun = date('d/m');

$uyeler = liste("SELECT uye_id, uye_ad, uye_soyad, uye_telefon FROM " . prefix . "_uye WHERE DATE_FORMAT(STR_TO_DATE(uye_dogumtarihi, '%d/%m/%Y'), '%d/%m') = '$bugun' AND uye_bildirimsms='1'");

foreach ($uyeler as $uye) {
    $telefon = preg_replace('/\\D/', '', $uye['uye_telefon']);
    $mesaj = "Dogum gununuz kutlu olsun. Iyi ki varsiniz!\n\nBugun, kendinize saglikli ve lezzetli bir ziyafet cekmenin tam zamani. Saglikli beslenme yolculugunuzda attiginiz her adim, sizi daha guclu ve enerjik yapiyor. Yeni yasinizda da saglikli ve mutlu bir yil gecirmenizi dilerim! Unutmayin, saglikli secimler hayatiniza renk katar. Bu ozel gunde kendinize sevdiginiz saglikli bir yiyecekle kucuk bir odul vermeyi unutmayin. Nice mutlu ve saglikli yillar dilerim! Sevgilerle, Beslenme ve Diyet Uzmani Elif Nida Zafer";
    smsgonder($telefon, $mesaj);
    echo "SMS sent to " . $uye['uye_ad'] . " " . $uye['uye_soyad'] . "\n";
}
?>