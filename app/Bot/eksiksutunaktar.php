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


function eksiksqlaktar($dosya){
	
	$filename=$_SERVER['DOCUMENT_ROOT'].sitedizin."/app/Backup/".$dosya;
	// Temporary variable, used to store current query
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line)
	{
		// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		// Add this line to the current segment
		$templine .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';'){
			// Perform the query
			
			$ekle=query($templine);
			if($ekle){
				$sonuc[] = "Bölüm başarıyla aktarıldı<br>";
			}else{
				$sonuc[] = queryalert($templine)."<br>";
			}
			$templine = '';
		}
	}
	print_r($sonuc);
	
}

// eksiksutun();

echo eksiksqlaktar("eksiktablo.sql");
echo eksiksqlaktar("sutunlar.sql");
?>
