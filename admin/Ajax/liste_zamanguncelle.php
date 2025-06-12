<?php

if($_POST){
	if($config["yetki"]["duzenle"]==1){
		
		$deger = explode("{:}",p("deger"));
		$tablo = $deger[0];
		$satir = $deger[1];
		$satirdeger = $deger[2];
		$sutun = $deger[3];
		$sutundeger = strtotime($deger[4]);	
		if($sutundeger==""){
			$json['tost'] = 'warning';
			$json['mesaj'] = "Bu veri boş olamaz...";
		}else{
			$query="UPDATE ".prefix."$tablo SET 
			$sutun='$sutundeger'
			WHERE $satir='$satirdeger'
			";
			$ekle=query($query);	
			if($ekle){
				$json['tost'] = 'success';
				$json['mesaj'] = "Kayıt işlemi başarılı.";
				logekle("Güncelleme ".$tablo." -> ".$sutun);
			}else{
				$json['tost'] = 'danger';
				$json['mesaj'] = queryalert($query);
			}
		}

	}else{
		$json['tost'] = 'success';
		$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
	}
}

echo json_encode($json);