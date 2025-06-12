<?php

function ulkeler($sid=213){
	$ibak=query("SELECT * FROM ".prefix."_ulke ORDER BY Oncelik DESC");

	while($iyaz=row($ibak)){
		if($sid==$iyaz["Id"]){$selected="selected";}else{$selected="";}
		$option = $option.'<option '.$selected.' value="'.ss($iyaz["Id"]).'">'.ss($iyaz["UlkeAdi"]).'</option>';
	$no++;
	}
	return $option;
}
function iller($sid="",$ulke=213){
	if($ulke>0){
		$ibak=query("SELECT * FROM ".prefix."_il WHERE UlkeId='$ulke' ORDER BY IlAdi ASC");
	}else{
		$ibak=query("SELECT * FROM ".prefix."_il WHERE UlkeId='213' ORDER BY IlAdi ASC");		
	}

	while($iyaz=row($ibak)){
		if($sid==$iyaz["Id"]){$selected="selected";}else{$selected="";}
		$option = $option.'<option '.$selected.' value="'.ss($iyaz["Id"]).'">'.ss($iyaz["IlAdi"]).'</option>';
	$no++;
	}
	return $option;
}
function ilceler($sid="",$il=6410){
	if($il>0){
		$ibak=query("SELECT * FROM ".prefix."_ilce WHERE IlId='$il' ORDER BY IlceAdi ASC");
	}else{
		$ibak=query("SELECT * FROM ".prefix."_ilce WHERE IlId='6444' ORDER BY IlceAdi ASC");		
	}	

	while($iyaz=row($ibak)){
		if($sid==$iyaz["Id"]){$selected="selected";}else{$selected="";}
		$option = $option.'<option '.$selected.' value="'.ss($iyaz["Id"]).'">'.ss($iyaz["IlceAdi"]).'</option>';
	$no++;
	}
	return $option;
}
/*--
	1 - il select box a id="il" 
	2 - il select box içine iller()
	3 - ilçe select box a id="ilce" 
	4 - ilçe select box içine ilceler("",1)
	
	---------------- İl İlçe Getirme (.js dosyasına eklenmeli)-----------------------
	$('#ulke').on('change',function(e){
		var value = $(this).val();
		ilgetir(value);
	});	
	$('#il').on('change',function(e){
		var value = $(this).val();
		ilcegetir(value);
	});
	function ilcegetir(il_id){
		var url = $('body').attr('data-url');
		$.ajax({
			url: url+"app/Jquery/index.php?page=ilceler",
			data: "il_id="+il_id,
			type: "POST",
			success: function (sonuc) {
				$('#ilce').html(sonuc);
			}
		});		
	}
	function ilgetir(ulke_id){
		var url = $('body').attr('data-url');
		$.ajax({
			url: url+"app/Jquery/index.php?page=ulkeler",
			data: "ulke_id="+ulke_id,
			type: "POST",
			success: function (sonuc) {
				$('#il').html(sonuc);
			}
		});		
	}
--*/
?>