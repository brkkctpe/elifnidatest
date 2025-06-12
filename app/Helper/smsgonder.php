<?php
function sendRequest($url, $xml) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/xml']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);

    return curl_exec($ch);
}

function smsgonder($tel, $mesaj) {
    $api_key = 'd2c1c809a067a68f99cf8c4c5780204d';  // Gerçek API bilgilerini buraya ekle
    $api_hash = 'bc716ca91131a083f42ca2d36c60a6c068db34eb69dcbc4ca4660f5ebf67b268';
    $sender   = 'ELIFNIDAZAF';

    // XML içine değişkenleri ekleyerek oluştur
    $xml = <<<EOS
    <request>
      <authentication>
        <key>{$api_key}</key>
        <hash>{$api_hash}</hash>
      </authentication>
      <order>
        <sender>{$sender}</sender>
        <sendDateTime></sendDateTime>
        <message>
          <text><![CDATA[{$mesaj}]]></text>
          <receipents>
            <number>{$tel}</number>
          </receipents>
        </message>
      </order>
    </request>
    EOS;

    $result = sendRequest(
        'https://api.iletimerkezi.com/v1/send-sms',
        $xml
    );

    return $result;
}

// Örnek kullanım
//echo smsgonder("531277xxxx", "Bu bir test mesajıdır.");
?>
