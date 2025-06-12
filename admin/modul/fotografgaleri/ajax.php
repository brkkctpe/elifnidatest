<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "fotografgaleri";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$fotografgaleri_adi=ass(p("fotografgaleri_adi"));
			$fotografgaleri_permalink=ass(p("fotografgaleri_permalink"));
			$fotografgaleri_desc=ass(p("fotografgaleri_desc"));
			$fotografgaleri_keyw=ass(p("fotografgaleri_keyw"));
			$fotografgaleri_resimortam=ass(p("fotografgaleri_resimortam"));
			$fotografgaleri_resimlerortam=$_POST["fotografgaleri_resimlerortam"];
			$fotografgaleri_aciklama=ass($_POST["fotografgaleri_aciklama"]);
			$fotografgaleri_dil=ass(p("fotografgaleri_dil"));
			$fotografgaleri_gid=ass(p("fotografgaleri_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($fotografgaleri_permalink==""){
				$fotografgaleri_permalink = permalink($fotografgaleri_adi)."-".rand(1000,9999);
			}else{
				$fotografgaleri_permalink = permalink($fotografgaleri_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$fotografgaleri_permalink' and permalink_dil='$fotografgaleri_dil'"));
			
			if($fotografgaleri_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["fotografgaleri_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["fotografgaleri_resim"]["tmp_name"];
					$resim 		 = $_FILES["fotografgaleri_resim"]["name"];
					$rtipi		 = $_FILES["fotografgaleri_resim"]["type"];
					$rboyut		 = $_FILES["fotografgaleri_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$fotografgaleri_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("fotografgaleri_resimortam")!=""){
					$fotografgaleri_resim = $fotografgaleri_resimortam;	
				}
				
				$fotografgaleri_resimler = array();
				for($i=0;$i<count($_FILES["fotografgaleri_resimler"]["tmp_name"]);$i++){
					if($_FILES["fotografgaleri_resimler"]["tmp_name"][$i]!=""){
						$kaynak		 = $_FILES["fotografgaleri_resimler"]["tmp_name"][$i];
						$resim 		 = $_FILES["fotografgaleri_resimler"]["name"][$i];
						$rtipi		 = $_FILES["fotografgaleri_resimler"]["type"][$i];
						$rboyut		 = $_FILES["fotografgaleri_resimler"]["size"][$i];
						$hedef 		 = "../../app/Images";
						$fotografgaleri_resimler[]=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
					}elseif($fotografgaleri_resimlerortam[$i]!=""){
						$fotografgaleri_resimler[] = $fotografgaleri_resimlerortam[$i];	
					}
				}
				$fotografgaleri_resimler = serialize($fotografgaleri_resimler);
				
				$query="INSERT INTO ".prefix."_fotografgaleri SET 
				".implode("",$ekler)."
				fotografgaleri_adi='$fotografgaleri_adi',
				fotografgaleri_permalink='$fotografgaleri_permalink',
				fotografgaleri_desc='$fotografgaleri_desc',
				fotografgaleri_keyw='$fotografgaleri_keyw',
				fotografgaleri_resim='$fotografgaleri_resim',
				fotografgaleri_resimler='$fotografgaleri_resimler',
				fotografgaleri_aciklama='$fotografgaleri_aciklama',
				fotografgaleri_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				fotografgaleri_durum='1',
				fotografgaleri_kayitzaman='".time()."',
				fotografgaleri_dil='$fotografgaleri_dil',
				fotografgaleri_gid='$fotografgaleri_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_fotografgaleri WHERE fotografgaleri_permalink='$fotografgaleri_permalink'"));
					if($fotografgaleri_gid==""){
						query("UPDATE ".prefix."_fotografgaleri SET fotografgaleri_gid='".$sonid["fotografgaleri_id"]."' WHERE fotografgaleri_id='".$sonid["fotografgaleri_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["fotografgaleri_id"]."', 
							permalink_link='$fotografgaleri_permalink', 
							permalink_git='$fotografgaleri_permalink', 
							permalink_dil='$fotografgaleri_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_fotografgaleri WHERE fotografgaleri_id='$fotografgaleri_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["fotografgaleri_id"]."', 
							permalink_link='".$orj["fotografgaleri_permalink"]."', 
							permalink_git='$fotografgaleri_permalink', 
							permalink_dil='$fotografgaleri_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_fotografgaleri WHERE fotografgaleri_permalink='$fotografgaleri_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["fotografgaleri_gid"]."&dil=".$fotografgaleri_dil;
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
			$fotografgaleri_id=ass(p("fotografgaleri_id"));
			$fotografgaleri_adi=ass(p("fotografgaleri_adi"));
			$fotografgaleri_permalink=ass(p("fotografgaleri_permalink"));
			$fotografgaleri_desc=ass(p("fotografgaleri_desc"));
			$fotografgaleri_keyw=ass(p("fotografgaleri_keyw"));
			$fotografgaleri_resimortam=ass(p("fotografgaleri_resimortam"));
			$fotografgaleri_resimlerortam=$_POST["fotografgaleri_resimlerortam"];
			$fotografgaleri_aciklama=ass($_POST["fotografgaleri_aciklama"]);
			$fotografgaleri_dil=ass(p("fotografgaleri_dil"));
			$fotografgaleri_gid=ass(p("fotografgaleri_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($fotografgaleri_permalink==""){
				$fotografgaleri_permalink = permalink($fotografgaleri_adi)."-".rand(1000,9999);
			}else{
				$fotografgaleri_permalink = permalink($fotografgaleri_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_fotografgaleri WHERE fotografgaleri_id='$fotografgaleri_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$fotografgaleri_permalink' and permalink_dil='$fotografgaleri_dil'"));
			
			if($fotografgaleri_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["fotografgaleri_permalink"]!=$fotografgaleri_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["fotografgaleri_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["fotografgaleri_resim"]["tmp_name"];
					$resim 		 = $_FILES["fotografgaleri_resim"]["name"];
					$rtipi		 = $_FILES["fotografgaleri_resim"]["type"];
					$rboyut		 = $_FILES["fotografgaleri_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$fotografgaleri_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("fotografgaleri_resimortam")!=""){
					$fotografgaleri_resim = $fotografgaleri_resimortam;	
				}
				$fotografgaleri_resimler = array();
				for($i=0;$i<count($_FILES["fotografgaleri_resimler"]["tmp_name"]);$i++){
					if($_FILES["fotografgaleri_resimler"]["tmp_name"][$i]!=""){
						$kaynak		 = $_FILES["fotografgaleri_resimler"]["tmp_name"][$i];
						$resim 		 = $_FILES["fotografgaleri_resimler"]["name"][$i];
						$rtipi		 = $_FILES["fotografgaleri_resimler"]["type"][$i];
						$rboyut		 = $_FILES["fotografgaleri_resimler"]["size"][$i];
						$hedef 		 = "../../app/Images";
						$fotografgaleri_resimler[]=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
					}elseif($fotografgaleri_resimlerortam[$i]!=""){
						$fotografgaleri_resimler[] = $fotografgaleri_resimlerortam[$i];	
					}
				}
				$fotografgaleri_resimler = serialize($fotografgaleri_resimler);
				
				$query="UPDATE ".prefix."_fotografgaleri SET 
				".implode("",$ekler)."
				fotografgaleri_adi='$fotografgaleri_adi',
				fotografgaleri_permalink='$fotografgaleri_permalink',
				fotografgaleri_desc='$fotografgaleri_desc',
				fotografgaleri_keyw='$fotografgaleri_keyw',
				fotografgaleri_resim='$fotografgaleri_resim',
				fotografgaleri_resimler='$fotografgaleri_resimler',
				fotografgaleri_aciklama='$fotografgaleri_aciklama'
				WHERE fotografgaleri_id='$fotografgaleri_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["fotografgaleri_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$fotografgaleri_id."', 
					permalink_link='$fotografgaleri_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$fotografgaleri_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$fotografgaleri_permalink'
					WHERE permalink_git='$eski_permalink'");
					
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
			$oku=row(query("SELECT * FROM ".prefix."_fotografgaleri WHERE fotografgaleri_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["fotografgaleri_durum"]==1){
					query("UPDATE ".prefix."_fotografgaleri SET fotografgaleri_durum='0' WHERE fotografgaleri_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_fotografgaleri SET fotografgaleri_durum='1' WHERE fotografgaleri_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_fotografgaleri WHERE fotografgaleri_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["fotografgaleri_permalink"]."'");
				query("DELETE FROM ".prefix."_fotografgaleri WHERE fotografgaleri_gid='$id'");
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