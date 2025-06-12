<?php

function sqlaktar($modul){
	$dizin = $_SERVER['DOCUMENT_ROOT'].sitedizin."/admin/modul/".$modul."";
	$dizinac = opendir($dizin);
	if($dizinac){
		while($dyaz=readdir($dizinac)){
		
			if(strstr($dyaz,".sql") && $dyaz!="." && $dyaz!=".."){
		
				$filename=$_SERVER['DOCUMENT_ROOT'].sitedizin.'/admin/modul/'.$modul.'/'.$dyaz;
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
			}
		}
		return implode("<br>",$sonuc);
	}else{
		return "SQL Dosyası Bulunamadı.".$dizin;
	}
	
}

?>