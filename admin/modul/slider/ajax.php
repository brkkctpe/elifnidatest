<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "slider";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$slider_adi=ass($_POST["slider_adi"]);
			$slider_yazi1=ass($_POST["slider_yazi1"]);
			$slider_yazi2=ass($_POST["slider_yazi2"]);
			$slider_yazi3=ass($_POST["slider_yazi3"]);
			$slider_resimortam=ass(p("slider_resimortam"));
			$slider_mobilresimortam=ass(p("slider_mobilresimortam"));
			$slider_aciklama=ass($_POST["slider_aciklama"]);
			$slider_dil=ass(p("slider_dil"));
			$slider_gid=ass(p("slider_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($slider_permalink==""){
				$slider_permalink = permalink($slider_adi)."-".rand(1000,9999);
			}else{
				$slider_permalink = permalink($slider_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$slider_permalink' and permalink_dil='$slider_dil'"));
			
			if($slider_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["slider_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["slider_resim"]["tmp_name"];
					$resim 		 = $_FILES["slider_resim"]["name"];
					$rtipi		 = $_FILES["slider_resim"]["type"];
					$rboyut		 = $_FILES["slider_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$slider_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("slider_resimortam")!=""){
					$slider_resim = $slider_resimortam;	
				}
				if($_FILES["slider_mobilresim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["slider_mobilresim"]["tmp_name"];
					$resim 		 = $_FILES["slider_mobilresim"]["name"];
					$rtipi		 = $_FILES["slider_mobilresim"]["type"];
					$rboyut		 = $_FILES["slider_mobilresim"]["size"];
					$hedef 		 = "../../app/Images";
					$slider_mobilresim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("slider_mobilresimortam")!=""){
					$slider_mobilresim = $slider_mobilresimortam;	
				}
				$query="INSERT INTO ".prefix."_slider SET 
				".implode("",$ekler)."
				slider_adi='$slider_adi',
				slider_permalink='$slider_permalink',
				slider_yazi1='$slider_yazi1',
				slider_yazi2='$slider_yazi2',
				slider_yazi3='$slider_yazi3',
				slider_resim='$slider_resim',
				slider_mobilresim='$slider_mobilresim',
				slider_aciklama='$slider_aciklama',
				slider_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				slider_durum='1',
				slider_kayitzaman='".time()."',
				slider_dil='$slider_dil',
				slider_gid='$slider_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_slider WHERE slider_permalink='$slider_permalink'"));
					if($slider_gid==""){
						query("UPDATE ".prefix."_slider SET slider_gid='".$sonid["slider_id"]."' WHERE slider_id='".$sonid["slider_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["slider_id"]."', 
							permalink_link='$slider_permalink', 
							permalink_git='$slider_permalink', 
							permalink_dil='$slider_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_slider WHERE slider_id='$slider_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["slider_id"]."', 
							permalink_link='".$orj["slider_permalink"]."', 
							permalink_git='$slider_permalink', 
							permalink_dil='$slider_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_slider WHERE slider_permalink='$slider_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["slider_gid"]."&dil=".$slider_dil;
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
			$slider_id=ass(p("slider_id"));
			$slider_adi=ass($_POST["slider_adi"]);
			$slider_yazi1=ass($_POST["slider_yazi1"]);
			$slider_yazi2=ass($_POST["slider_yazi2"]);
			$slider_yazi3=ass($_POST["slider_yazi3"]);
			$slider_resimortam=ass(p("slider_resimortam"));
			$slider_mobilresimortam=ass(p("slider_mobilresimortam"));
			$slider_aciklama=ass($_POST["slider_aciklama"]);
			$slider_dil=ass(p("slider_dil"));
			$slider_gid=ass(p("slider_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($slider_permalink==""){
				$slider_permalink = permalink($slider_adi)."-".rand(1000,9999);
			}else{
				$slider_permalink = permalink($slider_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_slider WHERE slider_id='$slider_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$slider_permalink' and permalink_dil='$slider_dil'"));
			
			if($slider_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["slider_permalink"]!=$slider_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["slider_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["slider_resim"]["tmp_name"];
					$resim 		 = $_FILES["slider_resim"]["name"];
					$rtipi		 = $_FILES["slider_resim"]["type"];
					$rboyut		 = $_FILES["slider_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$slider_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("slider_resimortam")!=""){
					$slider_resim = $slider_resimortam;	
				}
				if($_FILES["slider_mobilresim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["slider_mobilresim"]["tmp_name"];
					$resim 		 = $_FILES["slider_mobilresim"]["name"];
					$rtipi		 = $_FILES["slider_mobilresim"]["type"];
					$rboyut		 = $_FILES["slider_mobilresim"]["size"];
					$hedef 		 = "../../app/Images";
					$slider_mobilresim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("slider_mobilresimortam")!=""){
					$slider_mobilresim = $slider_mobilresimortam;	
				}
				$query="UPDATE ".prefix."_slider SET 
				".implode("",$ekler)."
				slider_adi='$slider_adi',
				slider_permalink='$slider_permalink',
				slider_yazi1='$slider_yazi1',
				slider_yazi2='$slider_yazi2',
				slider_yazi3='$slider_yazi3',
				slider_resim='$slider_resim',
				slider_mobilresim='$slider_mobilresim',
				slider_aciklama='$slider_aciklama'
				WHERE slider_id='$slider_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["slider_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$slider_id."', 
					permalink_link='$slider_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$slider_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$slider_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_slider WHERE slider_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["slider_durum"]==1){
					query("UPDATE ".prefix."_slider SET slider_durum='0' WHERE slider_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_slider SET slider_durum='1' WHERE slider_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_slider WHERE slider_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["slider_permalink"]."'");
				query("DELETE FROM ".prefix."_slider WHERE slider_gid='$id'");
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