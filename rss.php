<?php	 	
include("config/config.php");
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
mysql_select_db($SQL_Base,$conwb) or exit('La DB No existe!');

// Elimina caracteres extraños que me pueden molestar en las cadenas que meto en los item de los RSS
function clrAll($str) {
   $str=str_replace("&","&amp;",$str);
   $str=str_replace('"','"',$str);
   $str=str_replace("'","'",$str);
   $str=str_replace(">",">",$str);
   $str=str_replace("<","<",$str);
   return $str;
}


//sentencia SQL para acceder a los últimos 20 artículos publicados
header("Content-Type: application/xml");

$fj = @mysql_query("SELECT 
series_anime.Url,
series_anime.Nombre,
series_anime.Categoria,
series_anime.Sipnosis,
episodios_anime.NumEpisodio
FROM series_anime INNER JOIN episodios_anime ON series_anime.Codigo=episodios_anime.CodSerie AND series_anime.Estado='1' AND episodios_anime.Visible='1' ORDER BY episodios_anime.CodEpisodio+0 DESC LIMIT 20");

//Cabeceras del RSS
// <title>'.$videolinkfj.'</title> lo he cambido por $titulito
echo '<?xml version="1.0" encoding="UTF-8"?>
<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:admin="http://webns.net/mvcb/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" version="2.0">
	<channel>
		<title>'.$videolinkfj.'</title>
		<link>'.$urlpath.'</link>
		<description>Mira y disfruta de los ultimos capitulos que han salido al aire subtitulados al espa&amp;ntilde;ol.</description>
		<pubDate>' . date("r", time()) . '</pubDate>
		<language>es</language>
		<atom:link rel="self" href="'.$urlpath.'rss.php"  type="application/rss+xml" />';

while($fja=mysql_fetch_array($fj)){
	if($fja['Sipnosis']){
		//$desc = clrAll($fja['Sipnosis']);
		$sipno=utf8_decode($fja['Sipnosis']);
		$sipno=str_replace('Ã±','ñ', $sipno);
		$sipno=str_replace('Ã©','é', $sipno);
		$sipno=str_replace('Ã¡','á', $sipno);
		$sipno=str_replace('&#xFFFD;','"', $sipno);
		
		$sipno=@htmlentities($sipno, ENT_QUOTES, 'UTF8');
		$sipno=@htmlspecialchars_decode($sipno, ENT_NOQUOTES);
		$desc = clrAll($sipno);
		$desc=$desc;
	}else{
		$desc = 'Ya tenemos el '.$fja['Categoria'].' '.$fja['NumEpisodio'].' de '.$fja['Categoria'].'';
	}
	echo '
	<item>
		<title>'.$fja['Nombre'].' '.$fja['NumEpisodio'].'</title>
		<link>'.$urlpath.'ver/'.$fja['Url'].'-'.urlencode($fja['NumEpisodio']).'.html</link>
		<comments>'.$urlpath.'ver/'.$fja['Url'].'-'.urlencode($fja['NumEpisodio']).'.html</comments>
		<pubDate>'.date("r",$fecha).'</pubDate>
		<dc:creator>'.$videolinkfj.'</dc:creator>
		<description><![CDATA['.$desc.']]></description>
		<guid>'.$urlpath.str_replace(' ','',strtolower($fja['Categoria'])).'/'.$fja['Url'].'.html</guid>
	</item>';

}


//cierro las etiquetas del XML
echo "
	</channel>
</rss>";

?>