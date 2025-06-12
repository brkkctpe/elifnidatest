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
			<div class="col-md-12">
					<div class="aciklama">
					<?=ss($sayfaDizi["sayfa_aciklama"])?>
					</div>
			</div>
		</div>
	</div>
</section>

		