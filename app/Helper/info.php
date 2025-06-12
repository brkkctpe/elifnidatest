<?php

	function info($par){
		$siteayar = row(query("SELECT * FROM ".prefix."_ayarlar"));

		if($par=="siteurl"){
			return $siteayar["ayarlar_siteurl"];
		}
		if($par=="sitetema"){
			return $siteayar["ayarlar_sitetema"];
		}
		if($par=="sitetitle"){
			return $siteayar["ayarlar_sitetitle"];
		}
		if($par=="sitedesc"){
			return $siteayar["ayarlar_sitedesc"];
		}
		if($par=="sitekeyw"){
			return $siteayar["ayarlar_sitekeyw"];
		}
		if($par=="sitedil"){
			return $siteayar["ayarlar_sitedil"];
		}
		if($par=="siteheader"){
			return $siteayar["ayarlar_siteheader"];
		}
		if($par=="sitefooter"){
			return $siteayar["ayarlar_sitefooter"];
		}
		
		
		if($par=="logolight"){
			return rg($siteayar["ayarlar_logolight"]);
		}
		if($par=="logodark"){
			return rg($siteayar["ayarlar_logodark"]);
		}
		if($par=="logolightmobil"){
			return rg($siteayar["ayarlar_logolightmobil"]);
		}
		if($par=="logodarkmobil"){
			return rg($siteayar["ayarlar_logodarkmobil"]);
		}
		if($par=="favicon"){
			return rg($siteayar["ayarlar_favicon"]);
		}
		if($par=="defaultresim"){
			return rg($siteayar["ayarlar_defaultresim"]);
		}
		
		
		
		if($par=="facebook"){
			return $siteayar["ayarlar_facebook"];
		}
		if($par=="instagram"){
			return $siteayar["ayarlar_instagram"];
		}
		if($par=="twitter"){
			return $siteayar["ayarlar_twitter"];
		}
		if($par=="youtube"){
			return $siteayar["ayarlar_youtube"];
		}
		if($par=="pinterest"){
			return $siteayar["ayarlar_pinterest"];
		}
		if($par=="linkedin"){
			return $siteayar["ayarlar_linkedin"];
		}
		if($par=="whatsapp"){
			return $siteayar["ayarlar_whatsapp"];
		}
		if($par=="telefon1"){
			return $siteayar["ayarlar_telefon1"];
		}
		if($par=="telefon2"){
			return $siteayar["ayarlar_telefon2"];
		}
		if($par=="fax"){
			return $siteayar["ayarlar_fax"];
		}
		if($par=="mail"){
			return $siteayar["ayarlar_mail"];
		}
		if($par=="mail2"){
			return $siteayar["ayarlar_mail2"];
		}
		if($par=="adres"){
			return $siteayar["ayarlar_adres"];
		}
		if($par=="adres2"){
			return $siteayar["ayarlar_adres2"];
		}
		if($par=="maplink"){
			return $siteayar["ayarlar_maplink"];
		}
		if($par=="maplink2"){
			return $siteayar["ayarlar_maplink2"];
		}
		if($par=="mapiframe"){
			return $siteayar["ayarlar_mapiframe"];
		}
		if($par=="mapiframe2"){
			return $siteayar["ayarlar_mapiframe2"];
		}
		
		if($par=="mailhost"){
			return $siteayar["ayarlar_mailhost"];
		}
		if($par=="mailkadi"){
			return $siteayar["ayarlar_mailkadi"];
		}
		if($par=="mailparola"){
			return $siteayar["ayarlar_mailparola"];
		}
		if($par=="mailport"){
			return $siteayar["ayarlar_mailport"];
		}
		if($par=="mailssl"){
			return $siteayar["ayarlar_mailssl"];
		}
		
	}

?> 