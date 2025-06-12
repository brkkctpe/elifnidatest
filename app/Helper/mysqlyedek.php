<?php

function backupDatabaseTables($tables = '*',$dosya = ''){
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
 
        for($i = 0; $i < $numColumns; $i++){
            while($row = $result->fetch_row()){
                $return .= "INSERT INTO $table VALUES(";
                for($j=0; $j < $numColumns; $j++){
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = @preg_replace("#\n#","\\n",$row[$j]);
                    if (isset($row[$j])) { $return .= '"'.$row[$j].'"' ; } else { $return .= '""'; }
                    if ($j < ($numColumns-1)) { $return.= ','; }
                }
                $return .= ");\n";
            }
        }
 
        $return .= "\n\n\n";
    }
 
    //dosyayı kaydedelim
	if($dosya==""){
		$handle = fopen($_SERVER['DOCUMENT_ROOT'].sitedizin.'/app/Backup/fullbackup.sql','w+');
	}else{
		$handle = fopen($_SERVER['DOCUMENT_ROOT'].sitedizin.'/admin/modul/'.$dosya.'/ekip_'.$dosya.'.sql','w+');
	}
    
    fwrite($handle,$return);
    fclose($handle);
	
	return true;
}

?>