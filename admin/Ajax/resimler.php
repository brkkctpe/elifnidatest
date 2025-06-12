<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "resimler";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	

	##-------------------------İletişim Sil----------------------#
	if($ickisim=="sil"){
		if($config["yetki"]["sil"]==1){
			$id = p("deger");
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				$oku=row(query("SELECT * FROM ".prefix."_ortam WHERE ortam_id='$id'"));
				unlink("../../app/Images/".$oku["ortam_dosya"]);
				query("DELETE FROM ".prefix."_ortam WHERE ortam_id='$id'");
				$json['tost'] = 'success';
				$json['mesaj'] = 'Satır silindi.';
				$json['sil'] = '#satir'.$id;
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
		
}

echo json_encode($json);