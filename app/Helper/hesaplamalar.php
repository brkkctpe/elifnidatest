<?php


function hesaplamaform($par){
	$hesapOku=row(query("SELECT * FROM ".prefix."_hesap WHERE hesap_keyw='".$par."'"));
	?>
	<form action="javascript:;" method="post" id="hesaplama" data-ajaxform="true" class="sagform">
		<input type="hidden" name="hesap" value="<?=$par?>">
		<div class="bas"><?=ss($hesapOku["hesap_adi"])?></div>
	<?php 
	if($par=="idealkilo" or $par=="bazalmetabolizma"){
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Yaşınız")?></label>
				<input type="text" class="form-control" name="yas">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Boy (cm)")?></label>
				<input type="text" class="form-control" name="boy">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Mevcut Kilo (kg)")?></label>
				<input type="text" class="form-control" name="kilo" >
			</div>
		<?php
	}elseif($par=="gunlukkaloriihtiyaci" or $par=="gunlukkarbonhidratihtiyaci" or $par=="gunlukyagihtiyaci" or $par=="gunlukproteinihtiyaci" or $par=="yagsizvucutkitlesi" or $par=="gunlukmakrobesin"){
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Aktivite Seviyesi")?></label>
				<select class="form-control" name="aktiviteSeviyesi">
					<option value="Sedanter"><?=pd("Sedanter")?></option>
					<option value="Hafif Hareketli"><?=pd("Hafif Hareketli")?></option>
					<option value="Orta Hareketli"><?=pd("Orta Hareketli")?></option>
					<option value="Çok Hareketli"><?=pd("Çok Hareketli")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Yaşınız")?></label>
				<input type="text" class="form-control" name="yas">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Boy (cm)")?></label>
				<input type="text" class="form-control" name="boy">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Mevcut Kilo (kg)")?></label>
				<input type="text" class="form-control" name="kilo" >
			</div>
		<?php
	}elseif($par=="belboyorani"){
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Boy (cm)")?></label>
				<input type="text" class="form-control" name="boy">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Bel Çevresi (cm)")?></label>
				<input type="text" class="form-control" name="bel">
			</div>
		<?php
	}elseif($par=="gunluksuihtiyaci"){
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Mevsim")?></label>
				<select class="form-control" name="mevsim">
					<option value=""><?=pd("Mevsim Seçiniz")?></option>
					<option value="Yaz"><?=pd("Yaz")?></option>
					<option value="Kış"><?=pd("Kış")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Aktivite Seviyesi")?></label>
				<select class="form-control" name="aktiviteSeviyesi">
					<option value="Sedanter"><?=pd("Sedanter")?></option>
					<option value="Hafif Hareketli"><?=pd("Hafif Hareketli")?></option>
					<option value="Orta Hareketli"><?=pd("Orta Hareketli")?></option>
					<option value="Çok Hareketli"><?=pd("Çok Hareketli")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Kilo (kg)")?></label>
				<input type="text" class="form-control" name="kilo">
			</div>
		<?php
	}elseif($par=="katojenikhesaplama"){
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Yaşınız")?></label>
				<input type="text" class="form-control" name="yas">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Boy (cm)")?></label>
				<input type="text" class="form-control" name="boy">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Mevcut Kilo (kg)")?></label>
				<input type="text" class="form-control" name="kilo" >
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Hedef Kilo (kg)")?></label>
				<input type="text" class="form-control" name="hedefkilo">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Aktivite Seviyesi")?></label>
				<select class="form-control" name="aktiviteSeviyesi">
					<option value="Sedanter"><?=pd("Sedanter")?></option>
					<option value="Hafif Hareketli"><?=pd("Hafif Hareketli")?></option>
					<option value="Orta Hareketli"><?=pd("Orta Hareketli")?></option>
					<option value="Çok Hareketli"><?=pd("Çok Hareketli")?></option>
				</select>
			</div>
		<?php
	}elseif($par=="kafeintuketimmiktari"){
		$kafeinMiktarlari = [
			'Kahve' => 40,               // Ortalama bir filtre kahve
			'Espresso' => 212,           // Tipik bir espresso shot'ı
			'Çay' => 20,                 // Siyah çay
			'Yeşil Çay' => 12,           // Ortalama bir yeşil çay
			'Kola' => 10,                // Çoğu kola içeceği
			'Enerji İçeceği' => 32,      // Ortalama bir enerji içeceği
			'Diyet Kola' => 12,          // Diyet kola içeceği
			'Soğuk Demleme Kahve' => 20, // Soğuk demleme kahve
			'Matcha Çayı' => 35,         // Matcha tozu ile yapılan çay
			'Çikolatalı Süt' => 5,       // Hafif kafein içeren çikolatalı süt
			'Kafeinsiz Kahve' => 2       // Kafeinsiz kahve
		];
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("İçecek Türü")?></label>
				<select class="form-control" name="icecekturu">
					<option value=""><?=pd("İçecek Türü Seçiniz")?></option>
					<?php foreach($kafeinMiktarlari as $key=>$deger){ ?>
					<option value="<?=$key?>"><?=$key?></option>
					<?php } ?>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Porsiyon (ml)")?></label>
				<input type="text" class="form-control" name="porsiyon">
			</div>
		<?php
	}elseif($par=="emzirenkaloriihtiyaci"){
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Yaşınız")?></label>
				<input type="text" class="form-control" name="yas">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Boy (cm)")?></label>
				<input type="text" class="form-control" name="boy">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Mevcut Kilo (kg)")?></label>
				<input type="text" class="form-control" name="kilo" >
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Aktivite Seviyesi")?></label>
				<select class="form-control" name="aktiviteSeviyesi">
					<option value="Sedanter"><?=pd("Sedanter")?></option>
					<option value="Hafif Hareketli"><?=pd("Hafif Hareketli")?></option>
					<option value="Orta Hareketli"><?=pd("Orta Hareketli")?></option>
					<option value="Çok Hareketli"><?=pd("Çok Hareketli")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Laktasyon")?></label>
				<select class="form-control" name="laktasyon">
					<option value=""><?=pd("Durum")?></option>
					<option value="Hayır"><?=pd("0-6 Ay")?></option>
					<option value="Evet"><?=pd("6 Aydan Fazla")?></option>
				</select>
			</div>
		<?php
	}elseif($par=="gebelik"){
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Son Adet Tarihi")?></label>
				<input type="date" class="form-control" name="tarih">
			</div>
		<?php
	}elseif($par=="adetgunuhesapla"){ 
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Adet Düzeni(Gün)")?></label>
				<input type="number" class="form-control" name="adetduzeni">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Son Adet Tarihi")?></label>
				<input type="date" class="form-control" name="sonadetarihi">
			</div>
		<?php
	}elseif($par=="gunlukvitamin"){ 
		$vitaminler = [
			'A' => ($yas < 50) ? ($cinsiyet == 'erkek' ? 900 : 700) : ($cinsiyet == 'erkek' ? 900 : 700),
			'C' => ($yas < 50) ? ($cinsiyet == 'erkek' ? 90 : 75) : ($cinsiyet == 'erkek' ? 90 : 75),
			'D' => ($yas < 70) ? 15 : 20,
			'E' => ($yas < 50) ? 15 : 15,
			'K' => ($yas < 50) ? ($cinsiyet == 'erkek' ? 120 : 90) : ($cinsiyet == 'erkek' ? 120 : 90),
			'B12' => 2.4,
			'Folat' => 400,
			'Kalsiyum' => ($yas < 50) ? 1000 : ($yas < 70 ? 1000 : 1200),
			'Demir' => ($cinsiyet == 'erkek' ? 8 : ($yas < 50 ? 18 : 8))
		];
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Yaşınız")?></label>
				<input type="text" class="form-control" name="yas">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Vitamin")?></label>
				<select class="form-control" name="vitamin">
					<option value=""><?=pd("Vitamin Seçiniz")?></option>
					<?php foreach($vitaminler as $key=>$deger){ ?>
					<option value="<?=$key?>"><?=$key?></option>
					<?php } ?>
				</select>
			</div>
		<?php
	}elseif($par=="vucutkitleindeksi"){ 
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Boy (cm)")?></label>
				<input type="text" class="form-control" name="boy">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Mevcut Kilo (kg)")?></label>
				<input type="text" class="form-control" name="kilo" >
			</div>
		<?php
	}elseif($par=="vucutyagorani"){ 
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Boy (cm)")?></label>
				<input type="text" class="form-control" name="boy">
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Mevcut Kilo (kg)")?></label>
				<input type="text" class="form-control" name="kilo" >
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Boyun (cm)")?></label>
				<input type="text" class="form-control" name="bel" >
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Bel (cm)")?></label>
				<input type="text" class="form-control" name="bel" >
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Kalça (cm)")?></label>
				<input type="text" class="form-control" name="kalca" >
			</div>
		<?php
	}elseif($par=="belkalcaorani"){ 
		?>
			<div class="mb-3">
				<label class="form-label"><?=pd("Cinsiyet")?></label>
				<select class="form-control" name="cinsiyet">
					<option value=""><?=pd("Cinsiyet Seçiniz")?></option>
					<option value="Erkek"><?=pd("Erkek")?></option>
					<option value="Kadın"><?=pd("Kadın")?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Bel (cm)")?></label>
				<input type="text" class="form-control" name="bel" >
			</div>
			<div class="mb-3">
				<label class="form-label"><?=pd("Kalça (cm)")?></label>
				<input type="text" class="form-control" name="kalca" >
			</div>
		<?php
	}
	?>
		<div class="mb-3">
			<button type="submit" class="btn btn-ana"><?=pd("Hesapla")?> <i class="las la-arrow-right"></i></button>
		</div>
		<div class="">
			<div class="loader"></div>
			<div class="sonuc"></div>
		</div>
	</form>
	<?php
}


function idealkilo($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$yas = $post["yas"];
	$boy = $post["boy"];
	$kilo = $post["kilo"];
	
    // Devine Formülüne göre ideal kilo hesaplama
    if ($cinsiyet == 'Erkek') {
        $ideal_kilo = 50 + 2.3 * (($boy * 0.394) - 60);
    } else if ($cinsiyet == 'Kadın') {
        $ideal_kilo = 45.5 + 2.3 * (($boy * 0.394) - 60);
    } else {
        return "Geçersiz cinsiyet girildi.";
    }
	
	$fark = round($kilo - $ideal_kilo,0);
	
	if($fark>0){
		return pd("İdeal Kilonuz : ").round($ideal_kilo,0)."<br>İdeal kiloya uzaklığınız : ".$fark." ".pd("kilo");
	}else{
		return pd("İdeal Kilonuz : ").round($ideal_kilo,0)."<br>İdeal kiloya uzaklığınız : ".($fark * -1)." ".pd("kilo");
	}
	
}


function gunlukkaloriihtiyaci($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$aktiviteSeviyesi = $post["aktiviteSeviyesi"];
	$yas = $post["yas"];
	$boy = $post["boy"];
	$kilo = $post["kilo"];
	
	
    // Bazal Metabolizma Hızı (BMR) hesaplama
    if ($cinsiyet == 'Erkek') {
        $BMR = 88.362 + (13.397 * $kilo) + (4.799 * $boy) - (5.677 * $yas);
    } else {
        $BMR = 447.593 + (9.247 * $kilo) + (3.098 * $boy) - (4.330 * $yas);
    }

    // Aktivite Seviyesine Göre Kalori Ayarlama
    switch ($aktiviteSeviyesi) {
        case 'Sedanter':
            $kalori = $BMR * 1.2;
            break;
        case 'Hafif Hareketli':
            $kalori = $BMR * 1.375;
            break;
        case 'Orta Hareketli':
            $kalori = $BMR * 1.55;
            break;
        case 'Çok Hareketli':
            $kalori = $BMR * 1.725;
            break;
        default:
            $kalori = $BMR; // Eğer tanımlanmamış bir aktivite seviyesi girilirse
    }
	return pd("Günlük Kalori İhtiyacınız:")." <strong>".round($kalori)."(kcal)</strong>";
}

function gunlukkarbonhidratihtiyaci($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$aktiviteSeviyesi = $post["aktiviteSeviyesi"];
	$yas = $post["yas"];
	$boy = $post["boy"];
	$kilo = $post["kilo"];
	
	
    // Bazal Metabolizma Hızı (BMR) hesaplama
    if ($cinsiyet == 'Erkek') {
        $BMR = 88.362 + (13.397 * $kilo) + (4.799 * $boy) - (5.677 * $yas);
    } else {
        $BMR = 447.593 + (9.247 * $kilo) + (3.098 * $boy) - (4.330 * $yas);
    }

    // Aktivite Seviyesine Göre Kalori Ayarlama
    switch ($aktiviteSeviyesi) {
        case 'Sedanter':
            $kalori = $BMR * 1.2;
            break;
        case 'Hafif Hareketli':
            $kalori = $BMR * 1.375;
            break;
        case 'Orta Hareketli':
            $kalori = $BMR * 1.55;
            break;
        case 'Çok Hareketli':
            $kalori = $BMR * 1.725;
            break;
        default:
            $kalori = $BMR; // Eğer tanımlanmamış bir aktivite seviyesi girilirse
    }
	
    // Karbonhidrat ihtiyacını hesaplayalım (%55 olarak).
    $karbonhidratKalori = $kalori * 0.55;

    // Karbonhidratların her gramı 4 kalori sağlar.
    $karbonhidratGram = $karbonhidratKalori / 4;
	
	return pd("Günlük Karbonhidrat İhtiyacınız:")." <strong>".round($karbonhidratGram)."(GR)</strong>";
}
function gunlukyagihtiyaci($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$aktiviteSeviyesi = $post["aktiviteSeviyesi"];
	$yas = $post["yas"];
	$boy = $post["boy"];
	$kilo = $post["kilo"];
	
	
    // Bazal Metabolizma Hızı (BMR) hesaplama
    if ($cinsiyet == 'Erkek') {
        $BMR = 88.362 + (13.397 * $kilo) + (4.799 * $boy) - (5.677 * $yas);
    } else {
        $BMR = 447.593 + (9.247 * $kilo) + (3.098 * $boy) - (4.330 * $yas);
    }

    // Aktivite Seviyesine Göre Kalori Ayarlama
    switch ($aktiviteSeviyesi) {
        case 'Sedanter':
            $kalori = $BMR * 1.2;
            break;
        case 'Hafif Hareketli':
            $kalori = $BMR * 1.375;
            break;
        case 'Orta Hareketli':
            $kalori = $BMR * 1.55;
            break;
        case 'Çok Hareketli':
            $kalori = $BMR * 1.725;
            break;
        default:
            $kalori = $BMR; // Eğer tanımlanmamış bir aktivite seviyesi girilirse
    }
	
    // Yağ ihtiyacını hesaplayalım (%30 olarak).
    $yagKalori = $kalori * 0.30;

    // Yağların her gramı 9 kalori sağlar.
    $yagGram = $yagKalori / 9;
	
	return pd("Günlük Yağ İhtiyacınız:")." <strong>".round($yagGram)."(GR)</strong>";
}
function gunlukproteinihtiyaci($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$aktiviteSeviyesi = $post["aktiviteSeviyesi"];
	$yas = $post["yas"];
	$boy = $post["boy"];
	$kilo = $post["kilo"];
	
	
    // Aktivite seviyesine göre protein ihtiyacı değişkenliği
    switch ($aktiviteSeviyesi) {
        case 'Sedanter':
            $proteinOrani = 0.8;  // Sedanter bireyler için düşük oran
            break;
        case 'Hafif Hareketli':
            $proteinOrani = 1.0;  // Hafif egzersiz yapanlar için standart oran
            break;
        case 'Orta Hareketli':
            $proteinOrani = 1.3;  // Düzenli egzersiz yapanlar için yüksek oran
            break;
        case 'Çok Hareketli':
            $proteinOrani = 1.6;  // Yoğun egzersiz yapanlar veya sporcular için çok yüksek oran
            break;
        default:
            $proteinOrani = 1.0;  // Tanımlanmamış bir aktivite seviyesi için varsayılan değer
    }

    // Günlük protein ihtiyacını hesapla
    $proteinGram = $kilo * $proteinOrani;
	
	return pd("Günlük Protein İhtiyacınız:")." <strong>".round($proteinGram)."(GR)</strong>";
}
function yagsizvucutkitlesi($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$aktiviteSeviyesi = $post["aktiviteSeviyesi"];
	$yas = $post["yas"];
	$boy = $post["boy"];
	$kilo = $post["kilo"];
	
     // Boer formülüne göre LBM hesaplama
    if ($cinsiyet == 'Erkek') {
        // Erkekler için Boer formülü
        $LBM = 0.407 * $kilo + 0.267 * $boy - 19.2;
    } else {
        // Kadınlar için Boer formülü
        $LBM = 0.252 * $kilo + 0.473 * $boy - 48.3;
    }
	
	return pd("Yağsız Vücut Kitleniz:")." <strong>".round($LBM)."(kg)</strong>";
}
function belboyorani($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$boy = $post["boy"];
	$bel = $post["bel"];
	
    // Bel-boy oranını hesaplama
    $belBoyOrani = $bel / $boy;

	return pd("Bel Boy Oranı:")." <strong>".round($belBoyOrani, 2)."(cm)</strong><br>".pd("Alt Sınır : 0.4")."<br>".pd("Üst Sınır : 0.49");
}

function gunluksuihtiyaci($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$kilo = $post["kilo"];
	$mevsim = $post["mevsim"];
	$aktiviteSeviyesi = $post["aktiviteSeviyesi"];
	
    // Temel su ihtiyacını hesaplama (kilo başına 35 ml)
    $gunlukSu = $kilo * 35;

    // Mevsime göre su ihtiyacı ayarlama
    if ($mevsim == 'Yaz') {
        $gunlukSu *= 1.1;  // Yaz aylarında %10 fazla su
    }

    // Aktivite seviyesine göre su ihtiyacı ayarlama
    switch ($aktiviteSeviyesi) {
        case 'Sedanter':
            $gunlukSu += 0;  // Ekstra su gerekmez
            break;
        case 'Hafif Aktif':
            $gunlukSu += 250;  // Hafif aktiviteler için 250 ml ekstra
            break;
        case 'Aktif':
            $gunlukSu += 500;  // Aktif yaşam tarzı için 500 ml ekstra
            break;
        case 'Çok Aktif':
            $gunlukSu += 750;  // Çok aktif kişiler için 750 ml ekstra
            break;
    }

    // Cinsiyete göre ince ayar (isteğe bağlı)
    if ($cinsiyet == 'Kadın') {
        $gunlukSu *= 0.95;  // Kadınlar için %5 daha az su (isteğe bağlı ayarlama)
    }

	return pd("Günlük Su İhtyacı :")." <strong>".round($gunlukSu / 1000, 2)."(lt)</strong>";
}


function katojenikhesaplama($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$yas = $post["yas"];
	$kilo = $post["kilo"];
	$boy = $post["boy"];
	$hedefKilo = $post["hedefkilo"];
	$aktiviteSeviyesi = $post["aktiviteSeviyesi"];
	
    // Bazal Metabolizma Hızı (BMR) hesaplama
    if ($cinsiyet == 'Erkek') {
        $BMR = 88.362 + (13.397 * $kilo) + (4.799 * $boy) - (5.677 * $yas);
    } else {
        $BMR = 447.593 + (9.247 * $kilo) + (3.098 * $boy) - (4.330 * $yas);
    }

    // Aktivite Seviyesine Göre Kalori Ayarlama
    switch ($aktiviteSeviyesi) {
        case 'Sedanter':
            $kalori = $BMR * 1.2;
            break;
        case 'Hafif Aktif':
            $kalori = $BMR * 1.375;
            break;
        case 'Ortalama Aktif':
            $kalori = $BMR * 1.55;
            break;
        case 'Çok Aktif':
            $kalori = $BMR * 1.725;
            break;
        default:
            $kalori = $BMR; // Eğer tanımlanmamış bir aktivite seviyesi girilirse
    }

    // Kilo verme hedefi için kalori düşürme
    $kaloriHedef = $kalori - (($kilo - $hedefKilo) * 7700) / 180; // 180 gün üzerinden hesap

    // Ketojenik diyet makroları hesaplama
    $yagKalori = $kaloriHedef * 0.75; // Yağlar günlük kalorinin %75'i
    $proteinKalori = $kaloriHedef * 0.20; // Proteinler günlük kalorinin %20'si
    $karbonhidratKalori = $kaloriHedef * 0.05; // Karbonhidratlar günlük kalorinin %5'i

    // Kalorileri makro gram cinsine çevirme
    $yagGram = $yagKalori / 9; // Yağların her gramı 9 kalori
    $proteinGram = $proteinKalori / 4; // Proteinlerin her gramı 4 kalori
    $karbonhidratGram = $karbonhidratKalori / 4; // Karbonhidratların her gramı 4 kalori

    $dizi = array(
        'Yag' => round($yagGram),
        'Protein' => round($proteinGram),
        'Karbonhidrat' => round($karbonhidratGram)
    );

	return pd("Yağ :")." <strong>".$dizi["Yag"]."(gr)</strong><br>".pd("Protein :")." <strong>".$dizi["Protein"]."(gr)</strong><br>".pd("Karbonhidrat :")." <strong>".$dizi["Karbonhidrat"]."(gr)</strong>";
}

function kafeintuketimmiktari($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$icecekTuru = $post["icecekturu"];
	$porsiyon = $post["porsiyon"];
	
    // Kafein miktarları (100 ml başına miligram cinsinden)
	$kafeinMiktarlari = [
		'Kahve' => 40,               // Ortalama bir filtre kahve
		'Espresso' => 212,           // Tipik bir espresso shot'ı
		'Çay' => 20,                 // Siyah çay
		'Yeşil Çay' => 12,           // Ortalama bir yeşil çay
		'Kola' => 10,                // Çoğu kola içeceği
		'Enerji İçeceği' => 32,      // Ortalama bir enerji içeceği
		'Diyet Kola' => 12,          // Diyet kola içeceği
		'Soğuk Demleme Kahve' => 20, // Soğuk demleme kahve
		'Matcha Çayı' => 35,         // Matcha tozu ile yapılan çay
		'Çikolatalı Süt' => 5,       // Hafif kafein içeren çikolatalı süt
		'Kafeinsiz Kahve' => 2       // Kafeinsiz kahve
	];

    // İçecek türüne göre kafein miktarını bulma
    if (array_key_exists($icecekTuru, $kafeinMiktarlari)) {
        $kafeinMg = ($porsiyon / 100) * $kafeinMiktarlari[$icecekTuru];
    } else {
        return "Bilinmeyen içecek türü";
    }


	return pd("Kafein Miktarı :")." <strong>".round($kafeinMg)."(mg)</strong>";
}

function emzirenkaloriihtiyaci($post) {
	
	$yas = $post["yas"];
	$kilo = $post["kilo"];
	$boy = $post["boy"];
	$aktivite = $post["aktiviteSeviyesi"];
	$laktasyon = $post["laktasyon"];
	
 // Bazal Metabolizma Hızı (BMR) hesaplama
    $BMR = 655.1 + (9.563 * $kilo) + (1.850 * $boy) - (4.676 * $yas);

    // Aktivite Seviyesine Göre Kalori Ayarlama
    switch ($aktivite) {
        case 'Sedanter':
            $kalori = $BMR * 1.2;
            break;
        case 'Hafif Aktif':
            $kalori = $BMR * 1.375;
            break;
        case 'Ortalama Aktif':
            $kalori = $BMR * 1.55;
            break;
        case 'Çok Aktif':
            $kalori = $BMR * 1.725;
            break;
        default:
            $kalori = $BMR; // Eğer tanımlanmamış bir aktivite seviyesi girilirse
    }

    // Laktasyon durumuna göre ekstra kalori eklenmesi
    if ($laktasyon == 'Evet') {
        $kalori += 500; // Emzirme için günde ekstra 500 kalori
    }

	return pd("Emziren Anne için Günlük Kalori İhtiyacınız:")." <strong>".round($kalori)."(kcal)</strong>";
}
function gebelik($post) {
	
	$sonAdetTarihi = $post["tarih"];
	
    // Ortalama gebelik süresi 40 hafta
    $ortalamaGebelikSuresi = 40;

    // Son adet tarihinden itibaren 280 gün ekleyerek tahmini doğum tarihini hesapla
    $tahminiDogumTarihi = date('Y-m-d', strtotime($sonAdetTarihi . ' +280 days'));

    // Bugünün tarihi
    $bugun = date('Y-m-d');

    // Tahmini doğum tarihi ile bugün arasındaki farkı hesapla
    $fark = strtotime($tahminiDogumTarihi) - strtotime($bugun);
    $kalanGun = floor($fark / (60 * 60 * 24));
    
    // Kalan günleri haftaya çevir
    $dogumaKalanSure = floor($kalanGun / 7);

    // Şu ana kadar geçen haftayı hesapla
    $gecenHafta = $ortalamaGebelikSuresi - $dogumaKalanSure;

    $gebelikBilgileri = array(
        'Tahmini Doğum Tarihi' => $tahminiDogumTarihi,
        'Ortalama Gebelik Süresi' => $ortalamaGebelikSuresi . ' hafta',
        'Doğuma Kalan Süre' => $dogumaKalanSure . ' hafta',
        'Şu Ana Kadar Geçen Süre' => $gecenHafta . ' hafta'
    );
	$dizi = array();
	foreach ($gebelikBilgileri as $bilgi => $deger) {
		$dizi[] = $bilgi . ": " . $deger;
	}
	return implode("<br>",$dizi);
}
function gunlukmakrobesin($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$yas = $post["yas"];
	$kilo = $post["kilo"];
	$boy = $post["boy"];
	$aktivite = $post["aktiviteSeviyesi"];
	
    // Bazal Metabolizma Hızı (BMR) hesaplama
    if ($cinsiyet == 'Erkek') {
        $BMR = 88.362 + (13.397 * $kilo) + (4.799 * $boy) - (5.677 * $yas);
    } else {
        $BMR = 447.593 + (9.247 * $kilo) + (3.098 * $boy) - (4.330 * $yas);
    }

    // Aktivite Seviyesine Göre Kalori Ayarlama
    switch ($aktivite) {
        case 'Sedanter':
            $kalori = $BMR * 1.2;
            break;
        case 'Hafif Aktif':
            $kalori = $BMR * 1.375;
            break;
        case 'Ortalama Aktif':
            $kalori = $BMR * 1.55;
            break;
        case 'Çok Aktif':
            $kalori = $BMR * 1.725;
            break;
        default:
            $kalori = $BMR; // Eğer tanımlanmamış bir aktivite seviyesi girilirse
    }

    // Makro besin ihtiyaçlarını hesaplama
    $proteinGram = $kilo * 1.6; // Genel öneri olarak kilo başına 1.6 gram protein
    $yagGram = ($kalori * 0.25) / 9; // Günlük kalorinin %25'i yağdan, her gram yağ 9 kalori
    $karbonhidratGram = ($kalori - ($proteinGram * 4) - ($yagGram * 9)) / 4; // Kalan kalori miktarını karbonhidrat olarak hesapla, her gram karbonhidrat 4 kalori

    $makrobilgiler = array(
        'Günlük Kalori İhtiyacı' => round($kalori)." (gr)",
        'Protein' => round($proteinGram)." (gr)",
        'Karbonhidrat' => round($karbonhidratGram)." (gr)",
        'Yağ' => round($yagGram)." (gr)"
    );
	
	$dizi = array();
	foreach ($makrobilgiler as $bilgi => $deger) {
		$dizi[] = $bilgi . ": " . $deger;
	}
	return implode("<br>",$dizi);
}
function adetgunuhesapla($post) {
	
	$adetDuzeni = $post["adetduzeni"];
	$sonAdetTarihi = $post["sonadetarihi"];
	
    // Sonraki adet tarihini hesaplama
    $sonrakiAdetTarihi = date('Y-m-d', strtotime($sonAdetTarihi . ' +' . $adetDuzeni . ' days'));

    // Yumurtlama genellikle sonraki adet başlangıcından yaklaşık 14 gün önce gerçekleşir
    $yumurtlamaTarihi = date('Y-m-d', strtotime($sonrakiAdetTarihi . ' -14 days'));

    $adettarihi = array(
        'Sonraki Adet Tarihi' => $sonrakiAdetTarihi,
        'Yumurtlama Tarihi' => $yumurtlamaTarihi
    );
	$dizi = array();
	foreach ($adettarihi as $bilgi => $deger) {
		$dizi[] = $bilgi . ": " . $deger;
	}
	return implode("<br>",$dizi);
}

function gunlukvitamin($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$yas = $post["yas"];
	$vitaminAdi = $post["vitamin"];
	
    $vitaminler = array(
        'A' => ($yas < 50) ? ($cinsiyet == 'erkek' ? 900 : 700) : ($cinsiyet == 'erkek' ? 900 : 700),
        'C' => ($yas < 50) ? ($cinsiyet == 'erkek' ? 90 : 75) : ($cinsiyet == 'erkek' ? 90 : 75),
        'D' => ($yas < 70) ? 15 : 20,
        'E' => ($yas < 50) ? 15 : 15,
        'K' => ($yas < 50) ? ($cinsiyet == 'erkek' ? 120 : 90) : ($cinsiyet == 'erkek' ? 120 : 90),
        'B12' => 2.4,
        'Folat' => 400,
        'Kalsiyum' => ($yas < 50) ? 1000 : ($yas < 70 ? 1000 : 1200),
        'Demir' => ($cinsiyet == 'erkek' ? 8 : ($yas < 50 ? 18 : 8))
    );

    // İstenen vitaminin miktarını döndür
    return "Günlük ".$vitaminAdi." vitamin ihtiyacı: ".$vitaminler[$vitaminAdi] ." mikrogram";
}
function bazalmetabolizma($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$yas = $post["yas"];
	$kilo = $post["kilo"];
	$boy = $post["boy"];
	
    if ($cinsiyet == 'erkek') {
        // Erkekler için BMR hesaplama
        $BMR = 88.362 + (13.397 * $kilo) + (4.799 * $boy) - (5.677 * $yas);
    } else {
        // Kadınlar için BMR hesaplama
        $BMR = 447.593 + (9.247 * $kilo) + (3.098 * $boy) - (4.330 * $yas);
    }

    // İstenen vitaminin miktarını döndür
    return "Günlük Bazal Metabolizma Hızınız: <strong>$BMR</strong> (kalori)";
}
function vucutkitleindeksi($post) {
	
	$kilo = $post["kilo"];
	$boy = $post["boy"];
	
    if ($boy > 0) {
        $boyMetre = $boy / 100; // Boyu santimetreden metreye çevir
        $BMI = $kilo / ($boyMetre * $boyMetre);
        return "Vücut Kitle İndeksiniz: <strong>".round($BMI, 2)."</strong>"; // VKİ değerini iki ondalık basamağa kadar yuvarla
    } else {
        return "Boy sıfırdan büyük olmalıdır.";
    }
}
function vucutyagorani($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$kilo = $post["kilo"];
	$boy = $post["boy"];
	$boyun = $post["boyun"];
	$bel = $post["bel"];
	$kalca = $post["kalca"];
	
	$boyInches = $boy * 0.393701; // Boyu inç cinsine çevir (1 cm = 0.393701 inç)
    $boyunInches = $boyun * 0.393701; // Boyun ölçüsünü inç cinsine çevir
    $belInches = $bel * 0.393701; // Bel ölçüsünü inç cinsine çevir
    $kalcaInches = $kalca * 0.393701; // Kalça ölçüsünü inç cinsine çevir

    if ($cinsiyet == 'erkek') {
        // Erkekler için vücut yağ oranı hesaplama
        $yagOrani = 495 / (1.0324 - 0.19077 * log10($belInches - $boyunInches) + 0.15456 * log10($boyInches)) - 450;
    } else {
        // Kadınlar için vücut yağ oranı hesaplama
        $yagOrani = 495 / (1.29579 - 0.35004 * log10($belInches + $kalcaInches - $boyunInches) + 0.22100 * log10($boyInches)) - 450;
    }
	
	return "Vücut Yağ Oranınız: <strong>".round($yagOrani)."</strong>%";
}
function belkalcaorani($post) {
	
	$cinsiyet = $post["cinsiyet"];
	$bel = $post["bel"];
	$kalca = $post["kalca"];
	
    if ($kalca > 0) {
        $WHR = $bel / $kalca;
        return "Bel-Kalça Oranınız: ".round($WHR, 2); // Bel-Kalça Oranını iki ondalık basamağa kadar yuvarla
    } else {
        return "Kalça çevresi sıfırdan büyük olmalıdır.";
    }
	
}

?>