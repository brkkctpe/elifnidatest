<section id="bread">
	<div class="container">
		<h1 class="baslik"><?=ss($sayfaDizi["sayfa_adi"])?></h1>
		<div class="linkler">
			<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
			<a href="<?=url.$urlget[0]?>" class="active"><?=ss($sayfaDizi["sayfa_adi"])?></a>
		</div>
	</div>
</section>
<section id="urunpage">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card mt-4">
					<div class="card-body">
						<?=$sonuc?>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>