<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php
if (isset($_POST["randevu_ekle"])) {
    $uye_id = (int)$_POST["uye_id"];
    $tarih = $_POST["randevu_tarih"];
    $saat = $_POST["randevu_saat"];
    $konu = $_POST["randevu_konu"];
    $not = $_POST["randevu_not"];
    $durum = $_POST["randevu_durum"];

    $sql = "INSERT INTO ekip_randevu (uye_id, randevu_tarih, randevu_saat, randevu_konu, randevu_not, randevu_durum)
            VALUES ('$uye_id', '$tarih', '$saat', '$konu', '$not', '$durum')";

    if (mysqli_query($baglanti, $sql)) {
        echo "<div class='alert alert-success'>✅ Randevu başarıyla eklendi.</div>";
    } else {
        echo "<div class='alert alert-danger'>❌ Hata: " . mysqli_error($baglanti) . "</div>";
    }
}
?>

<div class="container-fluid">
  <div class="card card-custom">
    <div class="card-header">
      <h3 class="card-title">Yeni Randevu Ekle</h3>
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="form-group">
          <label>Üye ID:</label>
          <input type="number" name="uye_id" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Tarih:</label>
          <input type="date" name="randevu_tarih" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Saat:</label>
          <input type="time" name="randevu_saat" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Konu:</label>
          <input type="text" name="randevu_konu" class="form-control">
        </div>
        <div class="form-group">
          <label>Not:</label>
          <textarea name="randevu_not" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label>Durum:</label>
          <select name="randevu_durum" class="form-control">
            <option value="Aktif">Aktif</option>
            <option value="İptal">İptal</option>
            <option value="Tamamlandı">Tamamlandı</option>
          </select>
        </div>
        <button type="submit" name="randevu_ekle" class="btn btn-success">Randevu Ekle</button>
      </form>
    </div>
  </div>
</div>
