<?php
require_once("../../app/Config/config-db.php");
header('Content-Type: application/json');

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
if($id){
    $sil = query("DELETE FROM ".prefix."_randevu WHERE randevu_id='$id'");
    if($sil){
        echo json_encode(['status'=>'ok']);
    }else{
        echo json_encode(['status'=>'error','msg'=>queryalert("DELETE")]);
    }
}else{
    echo json_encode(['status'=>'error','msg'=>'Eksik bilgi']);
}
?>