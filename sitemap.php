<?php	 	
header("Content-type: text/xml");
include("config/config.php");

date_default_timezone_set('GMT');

$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
mysql_select_db($SQL_Base,$conwb) or exit('La DB No existe!');
echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
  <loc>'.$urlpath.'</loc>
  <changefreq>daily</changefreq>
  <priority>1.0</priority>
</url>';

// OBTENER ANIMES
$animes = mysql_query("SELECT Url,Categoria FROM series_anime WHERE Estado='1' ORDER BY Nombre ASC");
while ($fja=mysql_fetch_array($animes)) {
	echo '
<url>
  <loc>'. $urlpath .str_replace(' ','',strtolower($fja['Categoria'])).'/'. $fja['Url'] .'</loc>
  <changefreq>weekly</changefreq>
  <priority>0.5</priority>
</url>';
}
echo '
</urlset>';
?>