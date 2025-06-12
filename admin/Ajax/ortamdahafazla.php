<?php

if($_POST){
	$deger = explode("{:}",p("deger"));
	
	ob_start();
	?>
		<?php
			$limit = $deger[1];
			$baslangic = $deger[0]+$limit;
			$say=rows(query("SELECT * FROM ".prefix."_ortam ORDER BY ortam_id DESC"));
			$bak=query("SELECT * FROM ".prefix."_ortam ORDER BY ortam_id DESC LIMIT $baslangic,$limit");
			if($say>0){
				while($yaz=row($bak)){
					?>
					<div class="col-md-4">
						<div class="img" 
						onclick="
							$('#<?=$deger[2]?>resim img').attr('src','<?=rg($yaz["ortam_dosya"])?>');
							$('#<?=$deger[2]?>ortam').val('<?=$yaz["ortam_dosya"]?>');
						"
						><img src="<?=rg($yaz["ortam_dosya"])?>"></div>
					</div>
					<?php
				}
			}else{
				?>
				<div class="col-md-12">
					<div class="alert alert-warning">Daha Fazla Resim Bulunamadı</div>
				</div>
				<?php
			}
		?>
	<?php

	
	$output = ob_get_contents();
	ob_end_clean();
	$json["sonaekle"] = "#ortamalan";
	$json["sonaekleicerik"] = $output;	
	
	
	ob_start();
	$limit = $deger[1];
	$baslangic = $deger[0]+$limit;
	$say=rows(query("SELECT * FROM ".prefix."_ortam ORDER BY ortam_id DESC"));
	?>
		<?php if($say>$baslangic+$limit){ ?>
		<div class="col-md-12">
			<button type="button" data-islem="ortamdahafazla" data-deger="<?=$baslangic?>{:}<?=$limit?>{:}<?=$deger[2]?>" class="btn btn-block btn-primary">Daha Fazla Resim</button>
		</div>
		<?php } ?>
	<?php

	
	$output = ob_get_contents();
	ob_end_clean();
	$json["degis"] = "#ortamdahafazla";
	$json["degisicerik"] = $output;	
	
}

echo json_encode($json);