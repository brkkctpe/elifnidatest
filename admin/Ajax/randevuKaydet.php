<?php
require_once("../../app/Config/config-db.php");
header('Content-Type: application/json');

$uye_id   = isset($_POST['uye_id']) ? (int)$_POST['uye_id'] : 0;
$urun_id  = isset($_POST['urun_id']) ? (int)$_POST['urun_id'] : 0;
$tarih    = isset($_POST['randevu_tarih']) ? $_POST['randevu_tarih'] : '';
$saat     = isset($_POST['randevu_saat']) ? $_POST['randevu_saat'] : '';

if($uye_id && $urun_id && $tarih && $saat){
    $zaman = strtotime($tarih.' '.$saat);
    
     $data = [
        'randevu_uye'        => $uye_id,
        'randevu_tur'        => $urun_id,
        'randevu_zaman'      => $zaman,
        'randevu_kayitzaman' => time()
    ];

    $cols = query("SHOW COLUMNS FROM ".prefix."_randevu");
    while($c = row($cols)){
        if($c['Null']=='NO' && $c['Default']===NULL && strpos($c['Extra'],'auto_increment')===false){
            if(!isset($data[$c['Field']])){
                $data[$c['Field']] = '0';
            }
        }
    }

    $parts = [];
    foreach($data as $f=>$v){
        $parts[] = "$f='$v'";
    }
    $query = "INSERT INTO ".prefix."_randevu SET ".implode(',', $parts);
    $ekle = query($query);
    if($ekle){
        $uye  = row(query("SELECT uye_ad, uye_soyad FROM ".prefix."_uye WHERE uye_id='$uye_id'"));
        $urun = row(query("SELECT urun_adi FROM ".prefix."_urun WHERE urun_id='$urun_id'"));
        $title = $uye['uye_ad'].' '.$uye['uye_soyad'].' - '.$urun['urun_adi'];
        $start = date('Y-m-d\TH:i:s', $zaman);
        echo json_encode(['status'=>'ok','title'=>$title,'start'=>$start]);
    }else{
        echo json_encode(['status'=>'error','msg'=>queryalert($query)]);
    }
}else{
    echo json_encode(['status'=>'error','msg'=>'Eksik bilgi']);
}
?>