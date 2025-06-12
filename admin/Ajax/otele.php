<?php

if($_POST){
	if($config["yetki"]["duzenle"]==1){
		
		$deger = explode("{:}",p("deger"));
		$uye_id = $deger[0];
		$art = $deger[1];
		
		$kurallar = "sepet_durum='1' and sepet_uye='$uye_id' and randevu_zaman>".time()." and";


		$kurallar = substr_replace($kurallar, '', -3);
		if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
			  
		$bak=query("SELECT * FROM ".prefix."_randevu 
		INNER JOIN ".prefix."_sepet ON ".prefix."_sepet.sepet_id = ".prefix."_randevu.randevu_sepet
		INNER JOIN ".prefix."_uye ON ".prefix."_uye.uye_id = ".prefix."_sepet.sepet_uye
		INNER JOIN ".prefix."_urun ON ".prefix."_urun.urun_id = ".prefix."_randevu.randevu_tur
		".$kurallar." ORDER BY randevu_zaman DESC");
		$no=1;
		while($yaz=row($bak)){
			$uye_ad = $yaz["uye_ad"];
			if($art==1){
				$yenizaman = $yaz["randevu_zaman"]+(60*60*24*10);
			}elseif($art==0){
				$yenizaman = $yaz["randevu_zaman"]-(60*60*24*10);
			}
			
			$ekle = query("UPDATE ".prefix."_randevu SET randevu_zaman='$yenizaman' WHERE randevu_id='".$yaz["randevu_id"]."'");
			if($ekle){
				$dizi[] = date("d.m.Y H:i",$yaz["randevu_zaman"])." -> ".date("d.m.Y H:i",$yenizaman);
			}
		}	
		
		
		$json["tost"] = "success";			
		$json["mesaj"] = $uye_ad." 10 Gün Ötelendi<br>".implode("<br>",$dizi);

	}else{
		$json['tost'] = 'success';
		$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
	}
}

echo json_encode($json);