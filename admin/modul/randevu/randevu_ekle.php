<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php
require_once("../../../app/Config/config-db.php");

$defTarih = isset($_GET['tarih']) ? $_GET['tarih'] : date('Y-m-d');
$defSaat  = isset($_GET['saat']) ? $_GET['saat'] : '09:00';
$uyeler = liste("SELECT uye_id, uye_ad, uye_soyad, uye_mail, uye_telefon FROM ".prefix."_uye ORDER BY uye_ad ASC");

if (isset($_POST["randevu_ekle"])) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $uye_id = (int)$_POST["uye_id"];
    $tarih = $_POST["randevu_tarih"];
    $saat = $_POST["randevu_saat"];
    $zaman = strtotime($tarih.' '.$saat);

    $query = "INSERT INTO ".prefix."_randevu SET
                randevu_uye='$uye_id',
                randevu_zaman='$zaman',
                randevu_kayitzaman='".time()."'";
    $ekle = query($query);
    if($ekle){
        echo "<div class='alert alert-success'>✅ Randevu başarıyla eklendi.</div>";
    }else{
        echo "<div class='alert alert-danger'>❌ Hata: ".queryalert($query)."</div>";
    }
}
?>

<div class="card card-custom">
  <div class="card-header">
    <h3 class="card-title">Yeni Randevu Ekle</h3>
  </div>
  <div class="card-body">
    <form action="" method="post">
      <div class="form-group">
        <label>Üye:</label>
        <input type="text" id="uyeFiltre" class="form-control mb-2" placeholder="Ara...">
        <select name="uye_id" id="uyeSelect" class="form-control" required>
          <?php foreach($uyeler as $u){ ?>
            <option value="<?=$u['uye_id']?>"><?=$u['uye_ad']?> <?=$u['uye_soyad']?> - <?=$u['uye_mail']?> - <?=$u['uye_telefon']?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Tarih:</label>
        <input type="date" name="randevu_tarih" value="<?=$defTarih?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Saat:</label>
        <input type="time" name="randevu_saat" value="<?=$defSaat?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Konu:</label>
        <input type="text" name="randevu_konu" class="form-control" disabled>
      </div>
      <button type="submit" name="randevu_ekle" class="btn btn-success">Randevu Ekle</button>
    </form>
    <script>
    $('#uyeFiltre').on('keyup', function(){
      var val = $(this).val().toLowerCase();
      $('#uyeSelect option').each(function(){
          $(this).toggle($(this).text().toLowerCase().indexOf(val) !== -1);
      });
    });
    </script>
  </div>
</div>
