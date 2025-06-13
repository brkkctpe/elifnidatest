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

$uyeler = liste("SELECT uye_id, uye_ad, uye_soyad, uye_mail, uye_telefon FROM ".prefix."_uye ORDER BY uye_ad ASC");
$urunler = liste("SELECT urun_id, urun_adi FROM ".prefix."_urun WHERE urun_durum='1' ORDER BY urun_adi ASC");

$saatOptions = '';
for($i=9*60; $i<17*60; $i+=30){
    $hour = floor($i/60);
    $min = $i%60;
    $saat = sprintf('%02d:%02d', $hour, $min);
    if(!in_array($saat, $alinan)){
        $saatOptions .= "<option value='$saat'>$saat</option>";
    }
}

?>
<form id="randevuForm">
    <input type="hidden" name="randevu_tarih" value="<?=$tarih?>">
    <div class="form-group">
        <label>Saat</label>
        <select name="randevu_saat" class="form-control" required>
            <?=$saatOptions?>
        </select>
    </div>
    <div class="form-group">
        <label>Üye</label>
        <input type="text" id="uyeFiltre" class="form-control mb-2" placeholder="Ara...">
        <select name="uye_id" id="uyeSelect" class="form-control" required>
            <?php foreach($uyeler as $u){ ?>
            <option value="<?=$u['uye_id']?>"><?=$u['uye_ad']?> <?=$u['uye_soyad']?> - <?=$u['uye_mail']?> - <?=$u['uye_telefon']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label>Paket / Ürün</label>
        <select name="urun_id" class="form-control" required>
            <?php foreach($urunler as $u){ ?>
            <option value="<?=$u['urun_id']?>"><?=$u['urun_adi']?></option>
            <?php } ?>
        </select>
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-success">Kaydet</button>
    </div>
</form>
<script>
$('#uyeFiltre').on('keyup', function(){
    var val = $(this).val().toLowerCase();
    $('#uyeSelect option').each(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(val) !== -1);
    });
});
</script>