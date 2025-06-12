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
				<form action="javascript:;" method="post" id="sifremiunuttumq" data-ajaxform="true" class="sagform needs-validation" novalidate>
					<div class="form-group mb-3">
						<label class="mb-2"><?=pd("E-Posta")?>*</label>
						<input type="text" class="form-control" name="uye_mail">
					</div>
					<div class="form-group mb-3">
						<div class="loader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="form-group mb-3">
						<button type="submit" class="btn btn-success w-100 mb-3"><?=pd("Parola Gönder")?></button>
					</div>
					<div class="form-group mb-3 d-flex align-items-center">
						<a href="<?=url.ld("kayit")?>" class="link"><?=pd("Kayıt Ol")?></a>
						<a href="<?=url.ld("giris")?>" class="link ms-auto"><?=pd("Giriş Yap")?></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>