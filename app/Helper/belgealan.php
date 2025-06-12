<?php

function belgealan($name,$text,$image,$coklu=0){
	$bol = explode(".",$image);
	$gimage = $image=="" ? "Belge Yok" : mb_strtoupper (".".$bol[count($bol)-1]);
	$rand = rand(100000000,999999999);
	?>
	<div class="resimsecalan">
		<label class="resimupload" for="<?=$name?>" style="height: 241px;">
			<span><?=$text?></span>
			<a href="<?=url."app/File/".$image?>" target="_blank" class="doc" id="<?=$rand?>resim" ><?=$gimage?></a>
			<input type="file" id="<?=$name?>" name="<?=$name?><?=$coklu>0 ? "[]" : ""?>">
			<input type="hidden" id="<?=$rand?>ortam" name="<?=$name?>ortam<?=$coklu>0 ? "[]" : ""?>" value="<?=$image?>">
		</label>
	</div>
	<?php
}

?>