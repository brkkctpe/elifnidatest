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


function eksiktablo($tables = '*',$dosya = ''){
    //veritabanı bağlantısı
    $db = new mysqli(dbhost, dbuser, dbpass, dbadi); 
 
    //tüm tabloları alalım
    if($tables == '*'){
        $tables = array();
        $result = $db->query("SHOW TABLES");
        while($row = $result->fetch_row()){
            $tables[] = $row[0];
        }
    }else{
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }
 
    //tablolar içerisinde dönelim
    foreach($tables as $table){
        $result = $db->query("SELECT * FROM $table");
        $numColumns = $result->field_count;
 
        $result2 = $db->query("SHOW CREATE TABLE $table");
        $row2 = $result2->fetch_row();
 
        $return .= "\n\n".$row2[1].";\n\n";
    }
 
    //dosyayı kaydedelim
	if($dosya==""){
		$handle = fopen($_SERVER['DOCUMENT_ROOT'].sitedizin.'/app/Backup/eksiktablo.sql','w+');
	}else{
		$handle = fopen($_SERVER['DOCUMENT_ROOT'].sitedizin.'/admin/modul/'.$dosya.'/ekip_'.$dosya.'.sql','w+');
	}
    
    fwrite($handle,$return);
    fclose($handle);
	
	return true;
}

eksiktablo();


function eksiksutun($tables = '*',$dosya = ''){
    //veritabanı bağlantısı
    $db = new mysqli(dbhost, dbuser, dbpass, dbadi); 
 
    //tüm tabloları alalım
    if($tables == '*'){
        $tables = array();
        $result = $db->query("SHOW TABLES");
        while($row = $result->fetch_row()){
            $tables[] = $row[0];
        }
    }else{
        $tables = is_array($tables)?$tables:explode(',',$tables);
    }
 
    //tablolar içerisinde dönelim
    foreach($tables as $table){
 
        $result2 = $db->query("SHOW FULL COLUMNS FROM $table");
        
		while($row2 = $result2->fetch_row()){
			// print_r($row2);
			$return .= "ALTER TABLE `$table` ADD `".$row2[0]."` ".$row2[1]." NOT NULL;";
			$return .= "\n\n\n";
		}
		
		
    }
     //dosyayı kaydedelim
	$handle = fopen($_SERVER['DOCUMENT_ROOT'].sitedizin.'/app/Backup/sutunlar.sql','w+');
    
    fwrite($handle,$return);
    fclose($handle);
	
	return true;
	
}

eksiksutun();

?>
