<?php
if($_POST){
	
	$deger = ass(p("deger"));
	ob_start();
	
	$sepetDizi = sepet();
	
	?>
		<a href="<?=url."sepet"?>" class="sepetlink">
			<i class="las la-shopping-cart"></i>
			<span class="sepetsayi"><?=$sepetDizi["toplamadet"]?></span>
		</a>
		<div class="acilan">
			<div class="ic">
				<?php foreach($sepetDizi["urunler"] as $deger){ ?>
				<div class="urun">
					<div class="urunsol">
						<a href="javascript:;" data-islem="sepetsil" data-deger="<?=$deger["urun_id"]?>" class="sil"><i class="las la-times"></i></a>
						<div class="adi"><?=ss($deger["urun_adi"])?></div>
						<div class="fiyat"><?=$deger["urun_fiyat"]?> ₺</div>
					</div>
					<div class="urunresim">
						<img src="<?=rg($deger["urun_resim"])?>">
					</div>
				</div>
				<?php } ?>
				<div class="toplam">
					<?=pd("Kupon")?> : -<?=$sepetDizi["toplamindirim"]?> ₺
				</div>
				<div class="toplam">
					<?=pd("Toplam")?> : <?=$sepetDizi["toplamfiyat"]?> ₺
				</div>
				<a href="<?=url."odeme"?>" class="tamamla">
					<?=pd("Siparişi Tamamla")?> <i class="las la-long-arrow-alt-right ms-2"></i>
				</a>
			</div>
		</div>
	<?php
	
	$output = ob_get_contents();
	ob_end_clean();
	$json["degis"] = "#header .sepet";
	$json["degisicerik"] = $output;
	
	
	ob_start();
	
	$sepetDizi = sepet();
	
	if(count($sepetDizi["urunler"])>0){
	?>
	<div class="row">
		<div class="col-md-8">
			<?php foreach($sepetDizi["urunler"] as $deger){ ?>
			<div class="urun">
				<div class="urunresim">
					<img src="<?=rg($deger["urun_resim"])?>">
				</div>
				<div class="urunsol">
					<a href="javascript:;" data-islem="sepetsil" data-deger="<?=$deger["urun_id"]?>" class="sil"><i class="las la-times"></i></a>
					<div class="adi"><?=ss($deger["urun_adi"])?></div>
					<div class="fiyat"><?=$deger["urun_fiyat"]?> ₺</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="col-md-4">
			<div class="toplam mb-3">
				<input type="text" class="form-control" placeholder="<?=pd("Kupon Kodu")?>" data-keyupislem="sepetkupon" data-keyupdeger="1" value="<?=$sepetDizi["kuponkod"]?>">
			</div>
			<div class="rakam mb-3">
				<?=pd("Kupon")?> : -<?=$sepetDizi["toplamindirim"]?> ₺
			</div>
			<div class="toplam mb-3">
				<?=pd("Toplam")?> : <?=$sepetDizi["toplamfiyat"]?> ₺
			</div>
			<a href="<?=url."odeme"?>" class="btn btn-success">
				<?=pd("Siparişi Tamamla")?> <i class="las la-long-arrow-alt-right ms-2"></i>
			</a>
		</div>
	</div>
	<?php
	}else{
	?>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="alert alert-info text-center">
				<h2>Sepetiniz Boş</h2>
				<p>Henüz hiç beslenme programı veya ürünü sepetinize eklemediniz.</p>
				<a href="<?=url.ld("beslenme-programlari")?>" class="btn btn-ana">Beslenme Programlarını Gör</a>
			</div>
		</div>
	</div>
	<?php
	}
	$output = ob_get_contents();
	ob_end_clean();
	$json["degis2"] = "#sepet .container";
	$json["degisicerik2"] = $output;
}

echo json_encode($json);
?>

