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
		<div class="row g-3 justify-content-center">
			<div class="col-md-6">
				<form action="javascript:;" method="post" id="girisq" data-ajaxform="true" class="sagform needs-validation" novalidate>
					<div class="bas"><?=pd("Oturum Aç")?></div>
					<div class="mb-3">
						<input type="text" class="form-control" name="uye_mail" placeholder="<?=pd("E-Posta")?>*" required>
					</div>
					<div class="mb-3">
						<input type="text" class="form-control" name="uye_parola" placeholder="<?=pd("Şifre")?>*" required>
					</div>
					<div class="mb-3">
						<a href="<?=url.ld("sifremi-unuttum")?>" class="git"><?=pd("Şifrenizi mi unuttunuz?")?></a>
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-ana">Giriş Yap <i class="las la-arrow-right"></i></button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="kayitbanner">
					<img src="<?=sabitr("Giriş Sağ")?>" class="resim">
					<div class="bilgi">
						<div class="yazi1"><?=sabit("Giriş Sağ")?></div>
						<div class="yazi2"><?=sabit("Giriş Sağ",2)?></div>
						<div>
							 <a href="<?=url.ld("kayit")?>" class="btn btn-ana"><?=pd("Hemen Üye Ol")?><i class="las la-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	
	