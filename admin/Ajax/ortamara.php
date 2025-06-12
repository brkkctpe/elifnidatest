<?php

if($_POST){
	$q = p("q");
	$deger = p("deger");
	
	ob_start();
	?>
		<?php
			$limit = 32;
			$baslangic = 0;
			$say=rows(query("SELECT * FROM ".prefix."_ortam WHERE ortam_dosya LIKE '%".$q."%' ORDER BY ortam_id DESC"));
			$bak=query("SELECT * FROM ".prefix."_ortam WHERE ortam_dosya LIKE '%".$q."%' ORDER BY ortam_id DESC LIMIT $baslangic,$limit");
			if($say>0){
				while($yaz=row($bak)){
					?>
					<div class="col-md-4">
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
					<div class="alert alert-warning">Daha Fazla Resim Bulunamadı</div>
				</div>
				<?php
			}
		?>
	<?php

	
	$output = ob_get_contents();
	ob_end_clean();
	$json["degis"] = "#ortamalan";
	$json["degisicerik"] = $output;	
	
	
	
}

echo json_encode($json);