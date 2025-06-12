<?php

if($_POST){
	if($config["yetki"]["duzenle"]==1){
		
		ob_start();
		
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		  <head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title><?=pd("İletişim Mesajı")?></title>
				<style type="text/css">
				body {margin: 0; padding: 0; min-width: 100%!important;}
				.content {width: 100%; max-width: 600px;}  
				</style>
			</head>
			<body style="background:#F3F6F8;">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>
							<table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td style="text-align:center;"><br><br>
										<img src="<?=str_replace(".webp",".png",info("logodark"))?>" height="100px">
										<br><br><br><br>
									</td>
								</tr>
								<tr>
									<td style="
											border-radius: 20px 20px 0px 0px;
											text-align: center;
											background:linear-gradient(180deg,#ffffff,#F6F8F9)
										">
										<h3><?=pd("Deneme Mesajı")?></h3>
									</td>
								</tr>
								<tr>
									<td style="background:#ffffff;padding:20px;">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget libero sit amet nisl bibendum porttitor. Praesent pretium faucibus dolor, quis bibendum augue egestas sit amet. Aenean vel dolor purus. Mauris imperdiet est sed diam faucibus, sit amet bibendum purus volutpat. Ut venenatis vitae erat et suscipit. Quisque scelerisque imperdiet hendrerit. Nulla facilisi.</p>
									</td>
								</tr>
							</table>
							<br><br><br>
						</td>
					</tr>
				</table>
			</body>
		</html>
		<?php
		
		$icerik = ob_get_contents();
		ob_end_clean();	
		
		if($siteayar["ayarlar_mailgit1"]){
			$alici[] = $siteayar["ayarlar_mailgit1"];
		}
		if($siteayar["ayarlar_mailgit2"]){
			$alici[] = $siteayar["ayarlar_mailgit2"];
		}
		if($siteayar["ayarlar_mailgit3"]){
			$alici[] = $siteayar["ayarlar_mailgit3"];
		}
		
		$sonuc = mailgonder($alici,info("sitetitle"),pd("Deneme Mesajı"),$icerik,$dosya);
		// if($sonuc==1){
			$json['tost'] = 'success';
			$json['mesaj'] = 'Test Maili Gönderildi. Sonuç : '.$sonuc;
			
		// }else{
			// $json['tost'] = 'warning';
			// $json['mesaj'] = 'Test Maili Gönderilemedi. Sonuç : '.$sonuc;
			
		// }

	}else{
		$json['tost'] = 'warning';
		$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
	}
}

echo json_encode($json);