<?php

if($_POST){
	if($config["yetki"]["duzenle"]==1){
		
		$sonuc = backupDatabaseTables();
		if($sonuc){
			$json['tost'] = 'success';
			$json['mesaj'] = 'Yedek alındı.';
			$json['git'] = siteurl."app/Backup/fullbackup.sql";
			
		}else{
			$json['tost'] = 'warning';
			$json['mesaj'] = 'Yedek alınamadı';
			
		}

	}else{
		$json['tost'] = 'warning';
		$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
	}
}

echo json_encode($json);