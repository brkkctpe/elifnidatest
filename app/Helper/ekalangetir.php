<?php

function ekalangetir($ilkkisim,$voku){
	$ekalanbak=query("SELECT * FROM ".prefix."_ekalan WHERE ekalan_modul='ekip_".$ilkkisim."'");
	$ekalanDizi = array();
	while($ekalanyaz=row($ekalanbak)){
		$ekalanDizi[] = $ekalanyaz;
	}
	foreach($ekalanDizi as $deger){
		if($deger["ekalan_tur"]==0){
			?>
			<div class="col-md-12">
				<div class="form-group">
					<label><?=$deger["ekalan_adi"]?></label>
					<input type="text" class="form-control" name="<?=$deger["ekalan_sutunadi"]?>" value="<?=ss($voku[$deger["ekalan_sutunadi"]])?>">
				</div>
			</div>
			<?php
		}
		elseif($deger["ekalan_tur"]==1){
			?>
			<div class="col-md-12">
				<div class="form-group">
					<label><?=$deger["ekalan_adi"]?></label>
					<textarea type="text" class="form-control" name="<?=$deger["ekalan_sutunadi"]?>"><?=ss($voku[$deger["ekalan_sutunadi"]])?></textarea>
				</div>
			</div>
			<?php
		}
		elseif($deger["ekalan_tur"]==2){
			?><div class="col-md-12"><?php
			resimalan($deger["ekalan_sutunadi"],$deger["ekalan_adi"],$voku[$deger["ekalan_sutunadi"]]);
			?></div><?php
		}
	}
}



function ekalangonder($ilkkisim,$post){
	$ekalanbak=query("SELECT * FROM ".prefix."_ekalan WHERE ekalan_modul='ekip_".$ilkkisim."'");
	$ekalanDizi = array();
	while($ekalanyaz=row($ekalanbak)){
		$ekalanDizi[] = $ekalanyaz;
	}
	$ekgiden = array();
	foreach($ekalanDizi as $deger){
		if($deger["ekalan_tur"]==0){
			$ekgiden[] = $deger["ekalan_sutunadi"]."='".$post[$deger["ekalan_sutunadi"]]."',";
		}
		elseif($deger["ekalan_tur"]==1){
			$ekgiden[] = $deger["ekalan_sutunadi"]."='".$post[$deger["ekalan_sutunadi"]]."',";
		}
		elseif($deger["ekalan_tur"]==2){
			$ekgiden[] = $deger["ekalan_sutunadi"]."='".$post[$deger["ekalan_sutunadi"]."ortam"]."',";
		}
	}
	return $ekgiden;
}
?>