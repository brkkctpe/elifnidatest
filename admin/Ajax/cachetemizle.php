
<?php

if($_POST){

	if($config["yetki"]["sil"]==1){
		$dizin = "../../app/Cache";
		$dizinac = opendir($dizin) or die("dizin açılamadı");
		while($dyaz=readdir($dizinac)){
		
			if(strstr($dyaz,".") && $dyaz!="." && $dyaz!=".."){
				unlink("../../app/Cache/".$dyaz);
			}
		
		}
		$json['tost'] = 'success';
		$json['mesaj'] = 'Cache temizlendi.';
			
		
	}else{
		$json['tost'] = 'success';
		$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
	}	

	
}

echo json_encode($json);