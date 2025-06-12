<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($hesapOku["hesap_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.ld("hesaplamalar")?>" class="active"><?=pd("Hesaplamalar")?></a>
		</div>
	</div>
</section>
<section id="blogdetay">
	<div class="container">
		<div class="row g-3">
			<div class="col-md-6">
				<?=hesaplamaform($hesapOku["hesap_keyw"])?>
			</div>
			<div class="col-md-6">
				<div class="aciklama">
					<?=ss($hesapOku["hesap_aciklama"])?>
				</div>
			</div>
		</div>
	</div>
</section>

