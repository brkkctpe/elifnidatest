<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($sayfaDizi["sayfa_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($sayfaDizi["sayfa_adi"])?></a>
		</div>
	</div>
</section>
		
<section id="iletisimpage">
	<div class="container">
		<div class="row g-3 justify-content-center">
			<div class="col-md-6">
				<div class="yazi1"><?=pd("GELİN TANIŞALIM!")?></div>
				<div class="yazi2"><?=pd("Bize Ulaşın!")?></div>
				<div class="row g-4">
					<div class="col-md-12">
						<a href="#" class="bilgi">
							<div class="icon">
								<i class="las la-map-marker"></i>
							</div>
							<div class="yazi">
								<b><?=pd("LOKASYON")?></b>
								<span><?=info("adres")?></span>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="tel:<?=info("telefon1")?>" class="bilgi">
							<div class="icon">
								<i class="las la-phone-volume"></i>
							</div>
							<div class="yazi">
								<b><?=pd("TELEFON")?></b>
								<span><?=info("telefon1")?></span>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="mailto:<?=info("mail")?>" class="bilgi">
							<div class="icon">
								<i class="las la-envelope"></i>
							</div>
							<div class="yazi">
								<b><?=pd("EMAIL")?></b>
								<span><?=info("mail")?></span>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<form action="javascript:;" method="post" id="iletisim" data-ajaxform="true" class="sagform needs-validation" novalidate>
					<div class="mb-3">
						<input type="text" class="form-control" name="iletisim_ad" placeholder="<?=pd("Ad Soyad")?>" required>
					</div>
					<div class="mb-3">
						<input type="mail" class="form-control" name="iletisim_mail" placeholder="<?=pd("E-Posta")?>" required>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="iletisim_telefon" id="phone" placeholder="<?=pd("Telefon Numarası")?>" required>
					</div>
					<div class="mb-3">
						<textarea class="form-control" name="iletisim_mesaj" placeholder="<?=pd("Mesajınız")?>" required></textarea>
					</div>
					<div class="form-check mb-3">
					  <input class="form-check-input" type="checkbox" value="1" name="sozlesme" required id="flexCheckDefault">
					  <label class="form-check-label" for="flexCheckDefault">
						<a href="<?=url.ld("alisveris-aydinlatma-metni")?>" target="_blank"><?=pd("KVKK Aydınlatma Metnini okudum, ")?></a><?=pd("Kabul Ediyorum.")?>
					  </label>
					</div>
					<div class="form-check mb-3">
					  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked>
					  <label class="form-check-label" for="flexCheckChecked">
						<?=pd("Önemli kampanyalardan haberdar olmak için Açık Rıza Metni kapsamında elektronik ileti almak istiyorum.")?>
					  </label>
					</div>
					<?php if($siteayar["ayarlar_mailrecaptcha"]==1){ ?>
					<div class="mb-3">
						<div class="g-recaptcha" data-sitekey="<?=$siteayar["ayarlar_recaptchaskey"]?>"></div>
					</div>
					<?php } ?>
					<div class="mb-3 text-end">
						<button type="submit" class="btn btn-ana w-100"><?=pd("Formu Gönder")?></button>
					</div>
					<div class="">
						<div class="loader"></div>
						<div class="sonuc"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?=info("mapiframe")?>
	<div class="mb-3 text-center">
	<a href="<?=info("maplink")?>" target="_blank">
	<button type="submit" class="btn btn-ana"><?=pd("Yol Tarifi Al")?></button>
	</a>
	</div>
</section>		
