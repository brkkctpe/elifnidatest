<?php

if($_POST){
	$deger = p("deger");
	ob_start();
	?>
	<div data-scroll="true" data-height="300">
		<button type="button" id="ortamguncelle" style="display:none;" data-islem="ortam" data-deger="<?=$deger?>" >Sunucudan Seç</button>
		<form action="javascript:;" method="post" id="resimyukle" data-ajaxform="true">
			<div class="row">
				<div class="col-md-8">
					<input type="hidden" name="o" value="1">
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="dosya[]" id="customFile" multiple />
						<label class="custom-file-label" for="customFile">Dosyaları Seç</label>
					</div>
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-block btn-primary">Yükle</button>
				</div>
				<div class="col-md-12">
					<div class="loader"></div>
				</div>
			</div>
		</form>
		<form action="javascript:;" method="post" id="ortamara" data-ajaxform="true">
			<div class="row">
				<div class="col-md-8">
					<input type="text" name="q" class="form-control" placeholder="Resim Ara">
					<input type="hidden" name="deger" value="<?=$deger?>">
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-block btn-primary">ara</button>
				</div>
				<div class="col-md-12">
					<div class="loader"></div>
				</div>
			</div>
		</form>
		<div class="row mt-3" id="ortamalan" style="overflow-y:scroll;height:500px;">
			<?php
				$limit = 32;
				$baslangic = 0;
				$say=rows(query("SELECT * FROM ".prefix."_ortam ORDER BY ortam_id DESC"));
				$bak=query("SELECT * FROM ".prefix."_ortam ORDER BY ortam_id DESC LIMIT $baslangic,$limit");
				if($say>0){
					while($yaz=row($bak)){
						?>
						<div class="col-md-3">
							<div class="img" 
							onclick="
								$('#<?=$deger?>resim img').attr('src','<?=rg($yaz["ortam_dosya"])?>');
								$('#<?=$deger?>ortam').val('<?=$yaz["ortam_dosya"]?>');
							"
							><img src="<?=rg($yaz["ortam_dosya"])?>"></div>
						</div>
						<?php
					}
				}else{
					?>
					<div class="col-md-12">
						<div class="alert alert-warning">Yüklü Resim Bulunamadı</div>
					</div>
					<?php
				}
			?>

		</div>
		<div class="row mt-3" id="ortamdahafazla">
			<?php if($say>($limit*($baslangic+1))){ ?>
			<div class="col-md-12">
				<button type="button" data-islem="ortamdahafazla" data-deger="<?=$baslangic?>{:}<?=$limit?>{:}<?=$deger?>" class="btn btn-block btn-primary">Daha Fazla Resim</button>
			</div>
			<?php } ?>

		</div>
	</div>
	<?php

	
	$output = ob_get_contents();
	ob_end_clean();
	$json["degis"] = "#ortam .modal-body";
	$json["degisicerik"] = $output;	
	
}

echo json_encode($json);