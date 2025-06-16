<?php
require_once("../../app/Config/config-db.php");
require_once __DIR__ . "/../../app/Helper/smsgonder.php";
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
        $uye  = row(query("SELECT uye_ad, uye_soyad, uye_telefon FROM ".prefix."_uye WHERE uye_id='$uye_id'"));

        // SADECE urun_kategori = 0 olan ürünleri al
        $urun = row(query("SELECT urun_adi FROM ".prefix."_urun WHERE urun_id='$urun_id' AND urun_kategori = 0"));

        // Eğer ürün bulunamazsa hata döndür
        if(!$urun){
            echo json_encode(['status'=>'error','msg'=>'Seçilen ürün geçerli değil veya aktif değil.']);
            exit;
        }

        $title = $uye['uye_ad'].' '.$uye['uye_soyad'].' - '.$urun['urun_adi'];
        $start = date('Y-m-d\\TH:i:s', $zaman);

        $telefon = preg_replace('/\\D/', '', $uye['uye_telefon']);
        $smsMesaj = 'Sayın '.$uye['uye_ad'].' '.$uye['uye_soyad'].', En Sağlıklı Beslenme Danışmanlığında - Beslenme ve Diyet Uzmani Elif Nida Zafer için '.date('d.m.Y H:i', $zaman).' tarihinde '.$urun['urun_adi'].' randevunuz oluşturuldu. İptal ve değişiklik için 02162323639 veya 05314096220 numaralı telefonlardan bize ulaşabilirsiniz. Adres tarifi icin linke tiklayabilirsiniz. https://g.co/kgs/x7yYgLM';

        if(function_exists('smsgonder')){
            smsgonder($telefon, $smsMesaj);
        }

        echo json_encode(['status'=>'ok','title'=>$title,'start'=>$start]);
    }else{
        echo json_encode(['status'=>'error','msg'=>queryalert($query)]);
    }
}else{
    echo json_encode(['status'=>'error','msg'=>'Eksik bilgi']);
}
?>
