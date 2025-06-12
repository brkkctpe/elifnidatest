<?php

function resimalan($name,$text,$image,$coklu=0){
	$gimage = $image=="" ? "noimage.jpg" : $image;
	$rand = rand(100000000,999999999);
	?>
	<div class="resimsecalan">
		<?php if($gimage!="noimage.jpg"){ ?>
		<div class="row">
			<div class="col-8">
				<button type="button" class="btn btn-block btn-sm btn-info mb-1" data-islem="ortam" data-deger="<?=$rand?>" data-toggle="modal" data-target="#ortam">Sunucudan Seç</button>
			</div>
			<div class="col-4">
				<button type="button" class="btn btn-block btn-sm btn-warning mb-1" 
				onclick="
				$(this).parents('.resimsecalan').find('.img img').attr('src','<?=rg("noimage.jpg")?>');
				$(this).parents('.resimsecalan').find('input').val('');
				"
				>Sil</button>
			</div>
		</div>
		<?php }else{ ?>
			<button type="button" class="btn btn-block btn-sm btn-info mb-1" data-islem="ortam" data-deger="<?=$rand?>" data-toggle="modal" data-target="#ortam">Sunucudan Seç</button>
		<?php } ?>
		
		<label class="resimupload" for="<?=$name?>">
			<span><?=$text?></span>
			<div class="img" id="<?=$rand?>resim" ><img src="<?=rg($gimage)?>"></div>
			<input type="file" id="<?=$name?>" name="<?=$name?><?=$coklu>0 ? "[]" : ""?>">
			<input type="hidden" id="<?=$rand?>ortam" name="<?=$name?>ortam<?=$coklu>0 ? "[]" : ""?>" value="<?=$image?>">
		</label>
	</div>
	<?php
}

?>