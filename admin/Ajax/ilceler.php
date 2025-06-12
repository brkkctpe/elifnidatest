<?php
$il=p("il_id");
if($il>0){
	$kbak=query("SELECT * FROM ".prefix."_ilce WHERE IlId='$il'");
	while($kyaz=row($kbak)){
		?><option value="<?php echo $kyaz["Id"];?>"><?php echo ss($kyaz["IlceAdi"]);?></option><?php	
	}	
}else{
	?><option>İlçe Seçiniz</option><?php
}
echo p("il_id");
?>

