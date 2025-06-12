<?php
require "app/Config/config-db.php";

$dir = "app/Helper/";
if(is_dir($dir))
{
	if($handle = opendir($dir))
	{
		while(($file = readdir($handle)) !== false)
		{
			if($file != ".htaccess" && $file != "." && $file != ".." && $file != "Thumbs.db"/*Bazi sinir bozucu windows dosyalari.*/)
			{
				require "app/Helper/".$file;
				
			}
		}
		closedir($handle);
	}
}else{
}


require "app/Config/config-site.php";
 
$xml_path = "sitemap.xml";
define("PATH",siteurl);
 
$xml_output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$xml_output .= '<urlset
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1" xmlns:geo="http://www.google.com/geo/schemas/sitemap/1.0" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9" xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0" xmlns:pagemap="http://www.google.com/schemas/sitemap-pagemap/1.0" xmlns:xhtml="http://www.w3.org/1999/xhtml" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" >';
 
$xml_output.="<url>
<loc>".PATH."</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>weekly</changefreq>
<priority>1</priority>
</url>";
 
$bak=query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_durum='1'");
$perDizi=array();
while($yaz=row($bak)){
	$perDizi[] = $yaz;
}
 
foreach($perDizi as $deger) {
$url= siteurl.$deger["sayfa_permalink"];
$xml_output .= "\t<url>\n";
$xml_output .= "\t\t<loc>".$url."</loc>\n
\t<lastmod>".date("Y-m-d")."</lastmod>\n";
$xml_output .= "\t\t<changefreq>monthly</changefreq>\n";
$xml_output .= "\t\t<priority>0.9</priority>\n";
$xml_output .= "\t</url>\n";
}

$bak=query("SELECT * FROM ".prefix."_urun WHERE urun_durum='1'");
$perDizi=array();
while($yaz=row($bak)){
	$perDizi[] = $yaz;
}
 
foreach($perDizi as $deger) {
$url= siteurl.$deger["urun_permalink"];
$xml_output .= "\t<url>\n";
$xml_output .= "\t\t<loc>".$url."</loc>\n
\t<lastmod>".date("Y-m-d")."</lastmod>\n";
$xml_output .= "\t\t<changefreq>monthly</changefreq>\n";
$xml_output .= "\t\t<priority>0.8</priority>\n";
$xml_output .= "\t</url>\n";
}

$bak=query("SELECT * FROM ".prefix."_blog WHERE blog_durum='1'");
$perDizi=array();
while($yaz=row($bak)){
	$perDizi[] = $yaz;
}
 
foreach($perDizi as $deger) {
$url= siteurl.$deger["blog_permalink"];
$xml_output .= "\t<url>\n";
$xml_output .= "\t\t<loc>".$url."</loc>\n
\t<lastmod>".date("Y-m-d")."</lastmod>\n";
$xml_output .= "\t\t<changefreq>monthly</changefreq>\n";
$xml_output .= "\t\t<priority>0.7</priority>\n";
$xml_output .= "\t</url>\n";
}
 
$xml_output .= "</urlset>";
$yaz=fopen($xml_path, "w");
echo "<p>Sayfa &amp;amp;amp;amp;amp;amp; Kanal XML Sitemap Hazırlandı. (".date("d.m.Y").")</p><hr>";
 
fwrite($yaz,$xml_output);
fclose($yaz);
 
 
 
$xml_path = "sitemapimage.xml";
define("PATH",siteurl);
 
$xml_output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$xml_output .= '<urlset
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1" xmlns:geo="http://www.google.com/geo/schemas/sitemap/1.0" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9" xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0" xmlns:pagemap="http://www.google.com/schemas/sitemap-pagemap/1.0" xmlns:xhtml="http://www.w3.org/1999/xhtml" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" >';
 
$bak=query("SELECT * FROM ".prefix."_ortam");
$ortamDizi=array();
while($yaz=row($bak)){
	$ortamDizi[] = $yaz;
}
 
foreach($ortamDizi as $deger) {
if(file_exists("app/Images/".$deger["ortam_dosya"])){
$url= rg($deger["ortam_dosya"]);
$xml_output .= "\t<url>\n";
$xml_output .= "\t\t<loc>".$url."</loc>\n
\t<lastmod>".date("Y-m-d")."</lastmod>\n";
$xml_output .= "\t\t<changefreq>monthly</changefreq>\n";
$xml_output .= "\t\t<priority>0.8</priority>\n";
$xml_output .= "\t</url>\n";
}
}
 
$xml_output .= "</urlset>";
$yaz=fopen($xml_path, "w");
echo "<p>Sayfa &amp;amp;amp;amp;amp;amp; Kanal XML Sitemap Hazırlandı. (".date("d.m.Y").")</p><hr>";
 
fwrite($yaz,$xml_output);
fclose($yaz);
 

?>