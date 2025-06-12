<?php
function rg($par){
	if($par!=""){
		return siteurl."app/Images/".$par;
	}else{
		return siteurl."app/Images/noimage.jpg";
	}
	
}
function trg($par){
	if($par!=""){
		return siteurl.themeurl."/assets/img/".$par;
	}else{
		return siteurl."app/Images/noimage.jpg";
	}
}
function resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef,$boyut=50485760){
	$site_ayar=row(query("SELECT * FROM ".prefix."_ayarlar "));	
	if($kaynak!=""){
		
	$uzanti = explode(".", $resim);
	$ruzanti= ".".$uzanti[(count($uzanti)-1)];
	$txt= str_replace($ruzanti,"",$resim);
	
	// $ruzanti=".".strtolower(explode('.',$resim));
	// $ruzanti	 = substr($resim, -4);
	// $yeniad		 = permalink(str_replace($ruzanti,"",$resim))."-".time();
	// $yeniad		 = date("d.m.Y")."-".substr(uniqid(md5(rand())), 0,35);
	$yeniresim 	 = permalink($txt)."_".time()."".$ruzanti;
		if($kaynak==""){
			return 1;
		}elseif($rboyut > $boyut){
			return 2;
		}elseif(($rtipi!="image/jpeg") && ($rtipi!="image/gif") && ($rtipi!="image/png") && ($rtipi!="image/x-icon") && ($rtipi!="image/svg+xml") && ($rtipi!="image/webp")){
			return 3;
		}else{
			if(@move_uploaded_file($kaynak,$hedef.'/'.$yeniresim)){
				$konu_resim=$yeniresim;
				$resimBilgi = getimagesize($hedef.'/'.$yeniresim);
				$resimWidth = $resimBilgi[0];
				correctImageOrientation($hedef.'/'.$yeniresim);
				
				if($rtipi!="image/png" and $rtipi!="image/webp"){
					$webp = webp_image($hedef.'/'.$yeniresim, $compression_quality = 80);
					if($webp!=""){
						unlink($hedef.'/'.$yeniresim);
						$konu_resim=str_replace(array('.jpg', '.jpeg', '.png', '.gif'), '', $yeniresim) . '.webp';
					}
				}
				
				// if($resimBilgi["mime"]=="image/jpeg"){
					// resize($hedef.'/'.$yeniresim,$yuzde,$resimBilgi["mime"]);
				// }
				
				if($konu_resim==""){
					return 5;
				}else{
					return $konu_resim;
				}
				
			}else{
				return 4;
			}
							
		}

	}
}
function webp_image($file, $compression_quality = 80)
{
    // check if file exists
    if (!file_exists($file)) {
        return false;
    }

    // If output file already exists return path
	$output_file = str_replace(array('.jpg', '.jpeg', '.png', '.gif'), '', $file) . '.webp';
    // $output_file = $file . '.webp';
    if (file_exists($output_file)) {
        return $output_file;
    }

    $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if (function_exists('imagewebp')) {

        switch ($file_type) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($file);
                break;

            case 'png':
                $image = imagecreatefrompng($file);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;

            case 'gif':
                $image = imagecreatefromgif($file);
                break;
            default:
                return false;
        }

        // Save the image
        $result = imagewebp($image, $output_file, $compression_quality);
        if (false === $result) {
            return false;
        }

        // Free up memory
        imagedestroy($image);

        return $output_file;
    } elseif (class_exists('Imagick')) {
        $image = new Imagick();
        $image->readImage($file);

        if ($file_type === 'png') {
            $image->setImageFormat('webp');
            $image->setImageCompressionQuality($compression_quality);
            $image->setOption('webp:lossless', 'true');
        }

        $image->writeImage($output_file);
        return $output_file;
    }

    return false;
}
function resim_damga($resim, $damga_resmi, $yeni_resim_adi,$konum,$uzanti)
{
    $foto = imagecreatefromjpeg($resim);
	if($uzanti==".jpg"){
	$damga = imagecreatefromjpeg($damga_resmi);
	}elseif($uzanti==".png"){
	$damga = imagecreatefrompng($damga_resmi);
	}elseif($uzanti==".gif"){
	$damga = imagecreatefromgif($damga_resmi);
	}
    // Damganın kenar boşluklarını ayarlayıp resmin
    // yükseklik ve genişliğini alalım
	if($konum==1){
		$sag_bosluk = 10;
		$alt_bosluk = 10;
		$sx = imagesx($damga);
		$sy = imagesy($damga);
		$x = imagesx($foto) - $sx - $sag_bosluk;
		$y = imagesy($foto) - $sy - $alt_bosluk;
	}elseif($konum==2){
		$sag_bosluk = 10;
		$alt_bosluk = 10;
		$sx = imagesx($damga);
		$sy = imagesy($damga);
		$x = imagesx($foto) - $sx - $sag_bosluk;
		$y = $alt_bosluk;		
	}elseif($konum==3){
		$sag_bosluk = 10;
		$alt_bosluk = 10;
		$sx = imagesx($damga);
		$sy = imagesy($damga);
		$x = $sag_bosluk;
		$y = $alt_bosluk;		
	}elseif($konum==4){
		$sag_bosluk = 10;
		$alt_bosluk = 10;
		$sx = imagesx($damga);
		$sy = imagesy($damga);
		$x = $sag_bosluk;
		$y = imagesy($foto) - $sy - $alt_bosluk;		
	}elseif($konum==5){
		$sag_bosluk = imagesx($foto)/2;
		$alt_bosluk = imagesy($foto)/2;
		$sx = imagesx($damga)/2;
		$sy = imagesy($damga)/2;
		$x = imagesx($foto) - $sx - $sag_bosluk;
		$y = imagesy($foto) - $sy - $alt_bosluk;		
	}
    // Damga resmini koordinatları belirterek kenar boşlukları ile
    // birlikte fotoğrafın üzerine kopyalayalım.
    imagecopy($foto, $damga,$x,$y, 0, 0, imagesx($damga), imagesy($damga));
    // Sonucu çıktılayıp belleği serbest bırakalım.
    imagejpeg($foto, $yeni_resim_adi);
    imagedestroy($foto);
}  

function convertImage($originalImage, $outputImage, $quality)
{
    // jpg, png, gif or bmp?
    $exploded = explode('.',$originalImage);
    $ext = $exploded[count($exploded) - 1]; 

    if (preg_match('/jpg|jpeg/i',$ext))
        $imageTmp=imagecreatefromjpeg($originalImage);
    else if (preg_match('/png/i',$ext))
        $imageTmp=imagecreatefrompng($originalImage);
    else if (preg_match('/gif/i',$ext))
        $imageTmp=imagecreatefromgif($originalImage);
    else if (preg_match('/bmp/i',$ext))
        $imageTmp=imagecreatefrombmp($originalImage);
    else
        return 0;

    // quality is a value from 0 (worst) to 100 (best)
    imagejpeg($imageTmp, $outputImage, $quality);
    imagedestroy($imageTmp);

    return 1;
}
function resize($resimcan,$yuzde,$uzanti){ 
	$boyutlar = getimagesize($resimcan); 
	$xcan = $boyutlar[0]; 
	$ycan = $boyutlar[1]; 
	if($xcan>900){
		$yenixcan=900; 
		$yeniycan=$ycan*($yenixcan/$xcan);
	}else{
		$yenixcan=$xcan; 
		$yeniycan=$ycan;
	}
	if($ycan>600){
		$yeniycan=600; 
		$yenixcan=$xcan*($yeniycan/$ycan);
	}else{
		$yenixcan=$xcan; 
		$yeniycan=$ycan;
	}
	
	if($uzanti=="image/jpeg"){
		$cancan = imagecreatefromjpeg($resimcan); 	
		
		$sefilcan= ImageCreateTrueColor($yenixcan,$yeniycan); 

		ImageCopyResampled($sefilcan, $cancan, 0,0,0,0,$yenixcan,$yeniycan,$boyutlar[0],$boyutlar[1]); 
		
		imagejpeg($sefilcan,$resimcan,60); 
		
	}elseif($uzanti=="image/png"){
		$im = ImageCreateFromPNG($resimcan);
		imagepng($im,$resimcan); 	
	
	}elseif($uzanti=="image/gif"){
		


		$sefilcan= ImageCreateTrueColor($yenixcan,$yeniycan); 

		ImageCopyResampled($sefilcan, $cancan, 0,0,0,0,$yenixcan,$yeniycan,$boyutlar[0],$boyutlar[1]); 
		$cancan = imagecreatefromgif($resimcan); 
		imagegif($sefilcan,$resimcan,60); 	
	}



} 

function hexToRgb($hex, $alpha = false) {
   $hex      = str_replace('#', '', $hex);
   $length   = strlen($hex);
   $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
   $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
   $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
   if ( $alpha ) {
      $rgb['a'] = $alpha;
   }
   return $rgb;
}
function watermarkImage ($kaynak, $text, $hedef, $fontsize,$r,$g,$b) { 
	list($width, $height) = getimagesize($kaynak);
	$image_p = imagecreatetruecolor($width, $height);
	$image = imagecreatefromjpeg($kaynak);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 

	$black = imagecolorallocate($image_p, 0, 0, 0); // Gölge rengi
	$renk = imagecolorallocate($image_p, $r, $g, $b); // Yazı rengi

	$font = realpath('../').'/Themes/'.theme.'/fonts/Roboto-Regular.ttf'; // Kullanılacak font
	$font_size = $fontsize; // Yazı büyüklüğü
	// Get image dimensions
	  $width = imagesx($image);
	  $height = imagesy($image);
	// Get center coordinates of image
	  $centerX = $width / 2;
	  $centerY = $height / 2;
	// Get size of text
	  list($left, $bottom, $right, , , $top) = imageftbbox($font_size, $angle, $font, $text);
	// Determine offset of text
	  $left_offset = ($right - $left) / 2;
	  $top_offset = ($bottom - $top) / 2;
	// Generate coordinates
	  $x = $centerX - $left_offset;
	  $y = $centerY - $top_offset;
	  
	imagettftext($image_p, $font_size, 0, $x, $y, $renk, $font, $text);

	if ($hedef<>'') {
	  imagejpeg ($image_p, $hedef, 100); } 

	else {
	  header('Content-Type: image/jpeg');
	  imagejpeg($image_p, null, 100);   
	}

	imagedestroy($image); 
	imagedestroy($image_p); 

}

function correctImageOrientation($filename)
{
    if (function_exists('exif_read_data')) {
        $exif = exif_read_data($filename);
        if ($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
            if ($orientation != 1) {
                $img = imagecreatefromjpeg($filename);
                $deg = 0;
                switch ($orientation) {
                    case 3:
                        $deg = 180;
                        break;
                    case 6:
                        $deg = 270;
                        break;
                    case 8:
                        $deg = 90;
                        break;
                }
                if ($deg) {
                    $img = imagerotate($img, $deg, 0);
                }
                imagejpeg($img, $filename, 95);
            }
        }
    }
}
?>