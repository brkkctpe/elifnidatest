<?php
require "../Config/config-db.php";

$dir = "../Helper/";
if(is_dir($dir))
{
	if($handle = opendir($dir))
	{
		while(($file = readdir($handle)) !== false)
		{
			if($file != "." && $file != ".." && $file != "Thumbs.db"/*Bazi sinir bozucu windows dosyalari.*/)
			{
				require "../Helper/".$file;
				
			}
		}
		closedir($handle);
	}
}else{
}

require "../Config/config-site.php";
set_time_limit(0);


$dizin = "../Jquery/".theme;
$dizinac = opendir($dizin); //listelenecek dizin

while (($dosya = readdir($dizinac)) !== false){ 
	if(! is_dir($dosya) and strstr($dosya,".")){  
		$dosyaac = fopen($dizin."/".$dosya, 'r');
		$icerik = fread($dosyaac, filesize($dizin."/".$dosya));
		
		preg_match_all("#pd\((.*?)\)#",$icerik,$pd);
		if(count($pd[1])>0){
			foreach($pd[1] as $par){
				$par = rtrim(ltrim($par,'"'),'"');
				$par = rtrim(ltrim($par,"'"),"'");
				$par = ass($par);
				$dbak = query("SELECT * FROM ".prefix."_diltext WHERE diltext_default='$par'");
				$dsay = rows($dbak);
				if($dsay>0){
					echo "Zaten Kayıtlı --> ".$par."<br>";
				}else{
					query("INSERT INTO ".prefix."_diltext SET diltext_default='$par'");
					echo "Kayıt Edildi --> ".$par."<br>";
				}
			}
		}
		
		fclose($dosyaac);

	} 
}

closedir($dizinac);

$dizin = "../Pages/".theme;
$dizinac = opendir($dizin); //listelenecek dizin

while (($dosya = readdir($dizinac)) !== false){ 
	if(! is_dir($dosya) and strstr($dosya,".")){  
		$dosyaac = fopen($dizin."/".$dosya, 'r');
		$icerik = fread($dosyaac, filesize($dizin."/".$dosya));
		
		preg_match_all("#pd\((.*?)\)#",$icerik,$pd);
		if(count($pd[1])>0){
			foreach($pd[1] as $par){
				$par = rtrim(ltrim($par,'"'),'"');
				$par = rtrim(ltrim($par,"'"),"'");
				$par = ass($par);
				$dbak = query("SELECT * FROM ".prefix."_diltext WHERE diltext_default='$par'");
				$dsay = rows($dbak);
				if($dsay>0){
					echo "Zaten Kayıtlı --> ".$par."<br>";
				}else{
					query("INSERT INTO ".prefix."_diltext SET diltext_default='$par'");
					echo "Kayıt Edildi --> ".$par."<br>";
				}
			}
		}
		
		fclose($dosyaac);

	} 
}

closedir($dizinac);

$dizin = "../Themes/".theme;
$dizinac = opendir($dizin); //listelenecek dizin

while (($dosya = readdir($dizinac)) !== false){ 
	if(! is_dir($dosya) and strstr($dosya,".")){  
		$dosyaac = fopen($dizin."/".$dosya, 'r');
		$icerik = fread($dosyaac, filesize($dizin."/".$dosya));
		
		preg_match_all("#pd\((.*?)\)#",$icerik,$pd);
		if(count($pd[1])>0){
			foreach($pd[1] as $par){
				$par = rtrim(ltrim($par,'"'),'"');
				$par = rtrim(ltrim($par,"'"),"'");
				$par = ass($par);
				$dbak = query("SELECT * FROM ".prefix."_diltext WHERE diltext_default='$par'");
				$dsay = rows($dbak);
				if($dsay>0){
					echo "Zaten Kayıtlı --> ".$par."<br>";
				}else{
					query("INSERT INTO ".prefix."_diltext SET diltext_default='$par'");
					echo "Kayıt Edildi --> ".$par."<br>";
				}
			}
		}
		
		fclose($dosyaac);

	} 
}

closedir($dizinac);

?>