<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "dil";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$dil_adi=ass(p("dil_adi"));
			$dil_uzanti=ass(p("dil_uzanti"));
			$dil_bayrakortam=ass(p("dil_bayrakortam"));
			
			$kont=rows(query("SELECT * FROM ".prefix."_dil WHERE dil_uzanti='$dil_uzanti'"));
			
			if($dil_adi=="" or $dil_uzanti==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu uzantıda bir dil var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu uzantıda bir dil var.</div>';
			}else{
				
				if($_FILES["dil_bayrak"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["dil_bayrak"]["tmp_name"];
					$resim 		 = $_FILES["dil_bayrak"]["name"];
					$rtipi		 = $_FILES["dil_bayrak"]["type"];
					$rboyut		 = $_FILES["dil_bayrak"]["size"];
					$hedef 		 = "../../app/Images";
					$dil_bayrak=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("dil_bayrakortam")!=""){
					$dil_bayrak = $dil_bayrakortam;	
				}
				
				$query="INSERT INTO ".prefix."_dil SET 
				dil_adi='$dil_adi',
				dil_uzanti='$dil_uzanti',
				dil_bayrak='$dil_bayrak',
				dil_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				dil_durum='1',
				dil_kayitzaman='".time()."'
				";
				$ekle=query($query);
				if($ekle){
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?do=".$ilkkisim."_listele";
				}else{
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($query);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
				}
				
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Düzenle----------------------#
	if($ickisim=="duzenle"){
		if($config["yetki"]["duzenle"]==1){
			$dil_id=ass(p("dil_id"));
			$dil_adi=ass(p("dil_adi"));
			$dil_uzanti=ass(p("dil_uzanti"));
			$dil_bayrakortam=ass(p("dil_bayrakortam"));
			
			$kont=rows(query("SELECT * FROM ".prefix."_dil WHERE dil_uzanti='$dil_uzanti' and dil_id!='$dil_id'"));
			
			if($dil_adi=="" or $dil_uzanti==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu uzantıda bir dil var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu uzantıda bir dil var.</div>';
			}else{
				if($_FILES["dil_bayrak"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["dil_bayrak"]["tmp_name"];
					$resim 		 = $_FILES["dil_bayrak"]["name"];
					$rtipi		 = $_FILES["dil_bayrak"]["type"];
					$rboyut		 = $_FILES["dil_bayrak"]["size"];
					$hedef 		 = "../../app/Images";
					$dil_bayrak=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("dil_bayrakortam")!=""){
					$dil_bayrak = $dil_bayrakortam;	
				}
				$query="UPDATE ".prefix."_dil SET 
				dil_adi='$dil_adi',
				dil_uzanti='$dil_uzanti',
				dil_bayrak='$dil_bayrak'
				WHERE dil_id='$dil_id'
				";
				$ekle=query($query);
				if($ekle){
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
				}else{
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($query);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
				}
				
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Durum----------------------#
	if($ickisim=="durum"){
		if($config["yetki"]["duzenle"]==1){
			$id = p("deger");
			$oku=row(query("SELECT * FROM ".prefix."_dil WHERE dil_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["dil_durum"]==1){
					query("UPDATE ".prefix."_dil SET dil_durum='0' WHERE dil_id='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_dil SET dil_durum='1' WHERE dil_id='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-success">Aktif</span>';
				}
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Sil----------------------#
	if($ickisim=="sil"){
		if($config["yetki"]["sil"]==1){
			$id = p("deger");
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_dil WHERE dil_id='$id'");
				$json['tost'] = 'success';
				$json['mesaj'] = 'Satır silindi.';
				$json['sil'] = '#satir'.$id;
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Durum----------------------#
	if($ickisim=="text"){
		if($config["yetki"]["duzenle"]==1){
			$deger = explode("{:}",p("deger"));
			$diltext_id = $deger[0];
			$dil_id = $deger[1];
			$text = ass($deger[2]);
			
			$oku=row(query("SELECT * FROM ".prefix."_diltext WHERE diltext_id='$diltext_id'"));
			$diltext_ceviri = unserialize($oku["diltext_ceviri"]);
			
			$bak=query("SELECT * FROM ".prefix."_dil");
			$ceviri = array();
			while($yaz=row($bak)){
				if($yaz["dil_id"]==$dil_id){
					$ceviri[$yaz["dil_id"]] = $text;
				}else{
					$ceviri[$yaz["dil_id"]] = $diltext_ceviri[$yaz["dil_id"]];
				}
				
			}
			$ceviri = serialize($ceviri);
			
			$query="UPDATE ".prefix."_diltext SET 
			diltext_ceviri='$ceviri'
			WHERE diltext_id='$diltext_id'
			";
			$ekle=query($query);
			if($ekle){
				$json['tost'] = 'success';
				$json['mesaj'] = 'Kayıt işlemi başarılı.';
			}else{
				$json['tost'] = 'danger';
				$json['mesaj'] = queryalert($query);
			}
			
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
		
}

echo json_encode($json);