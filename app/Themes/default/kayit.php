<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($sayfaDizi["sayfa_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($sayfaDizi["sayfa_adi"])?></a>
		</div>
	</div>
</section>
<section id="kayitpage">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
						
				<form action="javascript:;" method="post" id="kayitq" data-ajaxform="true" class="sagform needs-validation" novalidate>
					<div class="form-group mb-3">
						<input type="text" class="form-control" name="uye_tc" placeholder="<?=pd("Tc Kimlik / Pasaport No")?> *" data-zorunlu="1" required>
					</div>
					<div class="form-group mb-3">
						<div class="row">
							<div class="col-6">
								<input type="text" class="form-control" name="uye_ad" placeholder="<?=pd("Adınız")?> *" data-zorunlu="1" required>
							</div>
							<div class="col-6">
								<input type="text" class="form-control" name="uye_soyad" placeholder="<?=pd("Soyadınız")?> *" data-zorunlu="1" required>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<input type="text" class="form-control" name="uye_mail" placeholder="<?=pd("E-mail")?> *" data-zorunlu="1" required>
					</div>
					<div class="form-group mb-3">
						<input type="text" class="form-control telefon" name="uye_telefon" placeholder="<?=pd("Cep Telefonu Numaranız")?> *" data-zorunlu="1" required>
					</div>
					<div class="form-group mb-3">
						<input type="password" class="form-control" name="uye_parola" placeholder="<?=pd("Şifre")?> *" data-zorunlu="1" required>
					</div>
					<div class="form-group mb-3">
						<input type="password" class="form-control" name="uye_parolat" placeholder="<?=pd("Şifre Onay")?> *" data-zorunlu="1" required>
					</div>
					<div class="form-group mb-3">
						<label class="mb-2"><?=pd("Doğum Tarihiniz")?> *</label>
						<div class="row">
							<div class="col-4">
								<select class="form-control" name="uye_dgun" data-zorunlu="1" required>
									<option><?=pd("Gün")?></option>
									<?php for($i=1;$i<32;$i++){ ?>
									<option value="<?=$i?>"><?=$i?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-4">
								<select class="form-control" name="uye_day" data-zorunlu="1" required>
									<option><?=pd("Ay")?></option>
									<?php for($i=1;$i<13;$i++){ ?>
									<option value="<?=$i?>"><?=$i?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-4">
								<select class="form-control" name="uye_dyil" data-zorunlu="1" required>
									<option><?=pd("Yıl")?></option>
									<?php for($i=(date("Y")-68);$i<(date("Y")-1);$i++){ ?>
									<option value="<?=$i?>"><?=$i?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<textarea class="form-control" name="uye_adres" placeholder="<?=pd("Adres")?> *" data-zorunlu="1" required ></textarea>
					</div>
					<div class="form-group mb-3">
						<div class="row">
							<div class="col-6">
								<select class="form-control" name="uye_il" id="il">
									<option><?=pd("İl")?></option>
									<?= iller(); ?>
								</select>
							</div>
							<div class="col-6">
								<select class="form-control" name="uye_ilce" id="ilce">
									<option><?=pd("İlçe")?></option>
									<?= ilceler(); ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="row">
							<div class="col-6">
								<input type="text" class="form-control" name="uye_meslek" placeholder="<?=pd("Meslek")?>">
							</div>
							<div class="col-6">
								<select class="form-control" name="uye_cinsiyet">
                                    <option value="Erkek" <?=($veri["uye_cinsiyet"] == "Erkek") ? "selected" : ""?>><?=pd("Erkek")?></option>
                                    <option value="Kadın" <?=($veri["uye_cinsiyet"] == "Kadın") ? "selected" : ""?>><?=pd("Kadın")?></option>
                                </select>

							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="row">
							<div class="col-6">
								<input type="text" class="form-control" name="uye_boy" placeholder="<?=pd("Boy")?> (cm) * " required>
							</div>
							<div class="col-6">
								<input type="text" class="form-control" name="uye_kilo" placeholder="<?=pd("Kilo")?> (kg) * " required>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="row">
							<div class="col-6">
								<input type="text" class="form-control" name="uye_hedefkilo" placeholder="<?=pd("Hedef Kilo")?> (kg) * " required>
							</div>
							<div class="col-6">
								<input type="file" class="form-control" name="uye_resim" id="validatedCustomFile">
							</div>
						</div>
					</div>
					<div class="form-group form-check mb-3">
						<input type="checkbox" class="form-check-input" name="uye_bildirimmail" value="1" id="bileposta" checked>
						<label class="form-check-label" for="uye_bildirimmail"><?=pd("Kampanyalardan e-posta yoluyla haberdar olmak istiyorum.")?></label>
					</div>
					<div class="form-group form-check mb-3">
						<input type="checkbox" class="form-check-input" name="uye_bildirimsms" value="1" id="bilsms" checked>
						<label class="form-check-label" for="uye_bildirimsms"><?=pd("Kampanyalardan SMS yoluyla haberdar olmak istiyorum.")?></label>
					</div>
					<div class="form-group form-check mb-3">
						<input type="checkbox" class="form-check-input" name="sozlesme" value="1" id="sozlesme">
						<label class="form-check-label" for="sozlesme"><a href="<?=url.ld("danisan-kullanici-uyelik-sozlesmesi")?>" target="_blank"><?=pd("Kullanıcı Sözleşmesi")?></a> & <a href="<?=url.ld("gizlilik-politikasi")?>" target="_blank"><?=pd("Gizlilik Politikalarını")?></a> <?=pd("okudum, kabul ediyorum.")?></label>
					</div>
					<div class="form-group mb-3">
						<div class="loader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="form-group mb-3">
						<button type="submit" class="btn btn-success w-100 mb-3"><?=pd("Kayıt Ol")?></button>
					</div>
					<div class="form-group mb-3 text-center">
						<a href="<?=url.ld("giris")?>" class="link"><?=pd("Zaten Hesabım Var")?></a>
					</div>
				</form>
				
			</div>
		</div>
	</div>
</section>

<script>
$(document).ready(function() {
  $('#kayitq').on('submit', function(e) {
    e.preventDefault();
    var form = $(this);
    $.post("admin/Ajax/uye.php", form.serialize(), function(response) {
      try {
        var json = JSON.parse(response);
        if (json.tost === "success") {
          alert(json.mesaj || "Kayıt başarılı.");
          window.location.href = "/";
        } else {
          $('.sonuc').html('<div class="alert alert-danger">'+(json.mesaj || "Bir hata oluştu")+'</div>');
        }
      } catch (e) {
        $('.sonuc').html('<div class="alert alert-danger">Beklenmeyen bir hata oluştu</div>');
      }
    });
  });
});
</script>
