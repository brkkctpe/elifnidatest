<?php
require "../Config/config-db.php";

$dir = "../Helper/";
if(is_dir($dir))
{
	if($handle = opendir($dir))
	{
		while(($file = readdir($handle)) !== false)
		{
			if($file != ".htaccess" && $file != "." && $file != ".." && $file != "Thumbs.db"/*Bazi sinir bozucu windows dosyalari.*/)
			{
				require "../Helper/".$file;
				
			}
		}
		closedir($handle);
	}
}else{
}

require "../Config/config-site.php";

$sonuc = file_get_contents(siteurl."app/Bot/eksiksutun.php");

function klasorsil($klasor){
	if(file_exists($klasor)){
		
		if (substr($klasor, -1) != '/')
		$klasor .= '/';
		if ($handle = opendir($klasor)) {
		while ($obj = readdir($handle)) {
		if ($obj!= '.' && $obj!= '..') {
		if (is_dir($klasor.$obj)) {
		if (!klasorsil($klasor.$obj))
		return false;
		}elseif (is_file($klasor.$obj)) {
		if (!unlink($klasor.$obj))
		return false;
		}
		}
		}
		closedir($handle);
		if (!@rmdir($klasor))
		return false;
		return true;
		}
		return false;
	}

}

function dosyayoldegis($par){
	$eski = array("../../app","../../admin");
	$yeni = array("../../versiyon/app","../../versiyon/admin");
	$cikti = str_replace($eski,$yeni,$par);
	return $cikti;
}

function dosyaac($dizin){
	$versiyontime = filemtime("../../versiyon.zip");
	$dizinac = opendir($dizin) or die("dizin açılamadı");
	while($dyaz=readdir($dizinac)){
		if($dyaz!="." and $dyaz!=".." and $dyaz!="..."){  
			if(is_file($dizin."/".$dyaz)){  
				$filetime = filemtime($dizin."/".$dyaz);
				$filetarih = date("d.m.Y H:i",$filetime);
				if($filetime>(time()-60*60*24*30)){
					$eskidosya = $dizin."/".$dyaz;
					$yenidosya = dosyayoldegis($dizin."/".$dyaz);
					copy($eskidosya,$yenidosya);
					echo $dizin."---".$dyaz." -- ".$filetime." -- ".$filetarih."<br>";
				}
				
			}elseif(is_dir($dizin."/".$dyaz)){
				$eskidosya = $dizin."/".$dyaz;
				$yenidosya = dosyayoldegis($dizin."/".$dyaz);
				if(!file_exists($yenidosya)){
					mkdir($yenidosya);
				}
				dosyaac($dizin."/".$dyaz);
			}
		}else{
			// echo $dyaz;
		}
	}

	closedir($dizinac);
}

klasorsil("../../versiyon");

if(!file_exists("../../versiyon")){
	mkdir("../../versiyon");
}
if(!file_exists("../../versiyon/admin")){
	mkdir("../../versiyon/admin");
}
if(!file_exists("../../versiyon/app")){
	mkdir("../../versiyon/app");
}

if(!file_exists("../../versiyon/app/Addition")){
	mkdir("../../versiyon/app/Pages");
}
if(!file_exists("../../versiyon/app/Backup")){
	mkdir("../../versiyon/app/Backup");
}
if(!file_exists("../../versiyon/app/Bot")){
	mkdir("../../versiyon/app/Bot");
}
if(!file_exists("../../versiyon/app/Helper")){
	mkdir("../../versiyon/app/Helper");
}
if(!file_exists("../../versiyon/app/Jquery")){
	mkdir("../../versiyon/app/Jquery");
}
if(!file_exists("../../versiyon/app/Output")){
	mkdir("../../versiyon/app/Output");
}
if(!file_exists("../../versiyon/app/Pages")){
	mkdir("../../versiyon/app/Pages");
}
if(!file_exists("../../versiyon/app/Themes")){
	mkdir("../../versiyon/app/Themes");
}


$dizin = "../../admin";
dosyaac($dizin);

$dizin = "../../app/Addition";
dosyaac($dizin);

$dizin = "../../app/Backup";
dosyaac($dizin);

$dizin = "../../app/Bot";
dosyaac($dizin);

$dizin = "../../app/Helper";
dosyaac($dizin);

$dizin = "../../app/Jquery";
dosyaac($dizin);

$dizin = "../../app/Output";
dosyaac($dizin);

$dizin = "../../app/Pages";
dosyaac($dizin);

$dizin = "../../app/Themes";
dosyaac($dizin);

function diziAra($aranan, $aranan_yer)
{
    foreach ($aranan_yer as $deger)
    {
        if (($deger === $aranan)) return true;
        elseif(is_array($deger))
        {
            $sonuc = diziAra($aranan, $deger);
            if($sonuc == true) return true;
        }
    }
    return false;
}
/*** ################################################################################ ***/
function NTGYedeklemeServisi($yedeklenecekler)
{
    $input = array();
    $say = 1;
    
    if (extension_loaded('zip'))
    {
        if((is_array($yedeklenecekler)) AND (count($yedeklenecekler) > 0))
        {
            foreach($yedeklenecekler as $yedeklenecek)
            {
                echo '<hr /><p>'.$yedeklenecek['dizin'].'</p>';
            
                if (file_exists($yedeklenecek['dizin']))
                {
                    $dizin = realpath($yedeklenecek['dizin']);
                    $zip = new ZipArchive();
                    
                    if((is_array($yedeklenecek['yedekle'])) AND (count($yedeklenecek['yedekle']) > 0))
                    {
                        foreach($yedeklenecek['yedekle'] as $zipDosyasi)
                        {
                            if(file_exists($zipDosyasi)) unlink($zipDosyasi);
                            
                            if ($zip->open($zipDosyasi, ZIPARCHIVE::CREATE))
                            {
                                if (is_dir($dizin))
                                {
                                    $dosyalar = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dizin), RecursiveIteratorIterator::SELF_FIRST);
                                    foreach ($dosyalar as $dosya)
                                    {
                                        $dosya = realpath($dosya);
                                        if (is_file($dosya))
                                        {
                                            if((realpath($_SERVER['SCRIPT_FILENAME']) != $dosya) AND (!diziAra($dosya, $yedeklenecekler)))
                                            {
                                                echo '<p style="padding:0; margin:0;"><strong>Yedekleniyor ['.$say.'] : </strong>'.$dosya.'</p>';
                                                $dosyaEkle = @trim(str_replace('\\', '/', end(explode(end(explode('\\', $dizin)), $dosya))), '/');
                                                // $zip->setPassword($yedeklenecek['sifre']);
                                                $zip->addFile($dosya, $dosyaEkle);
                                                // if (version_compare(phpversion(), '7.1', '>')) $zip->setEncryptionIndex($dosyaEkle, ZipArchive::EM_AES_256);
                                                
                                                $say++;
                                            }
                                        }
                                    }
                                }
                                
                                if($yedeklenecek['input'] == true) $input[] = $zipDosyasi;
                            }
                        }
                    }
                    $zip->close();
                }
            }
        }
    }
    echo '<hr />';
    
    if(count($input) > 0) foreach($input as $inputDosya) if(file_exists($inputDosya)) echo '<p><input value="'.$inputDosya.'" style="width:500px;" /></p>';
    
    echo '<hr /><p>Yedekleme Bitti...<p><hr />';
}


NTGYedeklemeServisi(array(
    array(
        'dizin' => '../../versiyon',
        'yedekle' => array(
            '../../versiyon.zip'
        ),
        'input' => false
    )
));
?>