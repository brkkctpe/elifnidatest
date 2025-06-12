<?php
require_once("../../app/Config/config-db.php");

$tarih = isset($_GET['tarih']) ? $_GET['tarih'] : date('Y-m-d');
$timestampBas = strtotime($tarih.' 00:00:00');
$timestampBit = strtotime($tarih.' 23:59:59');

$bak = query("SELECT randevu_zaman FROM ".prefix."_randevu WHERE randevu_zaman >= '$timestampBas' AND randevu_zaman <= '$timestampBit'");
$alinan = [];
while($yaz = row($bak)){
    $alinan[] = date('H:i', $yaz['randevu_zaman']);
}

$output = '';
for($i=9*60; $i<17*60; $i+=30){
    $hour = floor($i/60);
    $min = $i%60;
    $saat = sprintf('%02d:%02d', $hour, $min);
    $class = in_array($saat, $alinan) ? 'btn-danger disabled' : 'btn-success';
    $output .= "<a href='index.php?mo=randevu&do=randevu_ekle&tarih=$tarih&saat=$saat' class='btn $class m-1'>$saat</a>";
}

echo $output;
?>
