<?php
header('Content-type: Application/xml; charset="utf8"', true);
ob_start();
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
function temizle($par){
	$description = strip_tags($par);
	$description=preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $description);
	$description= preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $description);
	$description=str_replace('&', ' &amp; ', html_entity_decode((htmlspecialchars_decode($description))));
	return $description;
}

header('Content-type: text/xml');
set_time_limit(0);
 
$xml_output = "<rss xmlns:g=\"http://base.google.com/ns/1.0\" version=\"2.0\">";
$xml_output .= "
<channel>";
$xml_output .= "
	<title>".info("sitetitle")."</title>";
$xml_output .= "
	<description>".info("sitedesc")."</description>";
$xml_output .= "
	<link>".siteurl."</link>";


$kurallar = "urun_id=urun_gid and";

$kurallar = substr_replace($kurallar, '', -3);
if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}

$bak=query("SELECT * FROM ".prefix."_urun 
".$kurallar." ORDER BY urun_sira DESC ");
$tableDizi = array();
while($yaz=row($bak)){
	$tableDizi[] = $yaz;
}
foreach($tableDizi as $deger){
	
$markaOku=row(query("SELECT * FROM ".prefix."_markalar WHERE markalar_id='".$deger["urun_marka"]."'"));

##----------------------Kategoriler-----------------------------------##
preg_match_all('#{(.*?)}#',$deger["urun_kategori"],$kategoriler);
$katoku=row(query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_id='".$kategoriler[1][0]."'"));

$urunfiyat = $deger["urun_fiyat"];
$googlekatagoriid = $katoku["urunkategori_googlekatagoriid"];

	
$xml_output .= "
	<item>";
$xml_output .= "
		<g:id>".temizle($deger["urun_kod"])."</g:id>";
$xml_output .= "
		<g:link>".url.temizle($deger["urun_permalink"])."</g:link>";
$xml_output .= "
		<g:title>".mb_convert_case(temizle($deger["urun_adi"]), MB_CASE_TITLE, "UTF-8")."</g:title>";
$xml_output .= "
		<g:description>".mb_convert_case(temizle($deger["urun_adi"]), MB_CASE_TITLE, "UTF-8")."</g:description>";
$xml_output .= "
		<g:image_link>".rg($deger["urun_resim"])."</g:image_link>";
$xml_output .= "
		<g:brand>".temizle(info("sitetitle"))."</g:brand>";
$xml_output .= "
		<g:condition>new</g:condition>";
$xml_output .= "
		<g:availability>in stock</g:availability>";
$xml_output .= "
		<g:price>".str_replace(",",".",$urunfiyat)." TRY</g:price>";
$xml_output .= "
		<g:google_product_category>".$googlekatagoriid."</g:google_product_category>";
// $xml_output .= "
		// <g:shipping>";
// $xml_output .= "
		// <g:shipping_country>TR</g:shipping_country>";
// $xml_output .= "
		// <g:shipping_service>Standart</g:shipping_service>";
// $xml_output .= "
		// <g:shipping_price_value>0.00</g:shipping_price_value>";
// $xml_output .= "
		// <g:shipping_price_currency>TRY</g:shipping_price_currency>";
// $xml_output .= "
		// </g:shipping>";
$xml_output .= "
	</item>";
}
	
$xml_output .= "
</channel>";
$xml_output .= "
</rss>";
echo $xml_output;
$output = ob_get_contents();
ob_end_clean();
echo trim($output);


?>