<?php

include('config/config.php');
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
mysql_select_db($SQL_Base,$conwb) or exit('La DB No existe!');
@mysql_query("SET NAMES 'iso-8859-1'");

// Funcion para obtener los ultimos episodios agregados
function jm_ultimos_episodios($tipo){
include('config/config.php');

if($tipo=='home'){
					$cantidad='15';
}

else{
	$cantidad='20';
}
	
$jm = @mysql_query("SELECT 
series_anime.Nombre as NombreAnime,
series_anime.Sipnosis,
series_anime.Imagen,
series_anime.Imagen2,
series_anime.Mini,
series_anime.Url,
series_anime.Codigo,
series_anime.Categoria,
episodios_anime.CodSerie,
episodios_anime.hits,
episodios_anime.NumEpisodio,
episodios_anime.Nombre,
episodios_anime.CodEpisodio,
UNIX_TIMESTAMP(episodios_anime.Fecha) as Fecha
FROM series_anime INNER JOIN episodios_anime ON series_anime.Codigo=episodios_anime.CodSerie AND episodios_anime.Visible='1' ORDER BY episodios_anime.CodEpisodio+0 DESC LIMIT $cantidad");

//	series_anime.Estado='1' AND 

while($jma=@mysql_fetch_array($jm)){
if (strlen($jma['NombreAnime']) >27){$puntos_anime='&hellip;';}else{$puntos_anime='';}
if (strlen($jma['Sipnosis']) >=100){$puntos='&hellip;';}else{$puntos='';}
$sipno=html_entity_decode($jma['Sipnosis'],ENT_QUOTES);
$sipno=str_replace('Ã±','ñ', $sipno);
$sipno=str_replace('Ã©','é', $sipno);
$sipno=str_replace('Ã¡','á', $sipno);
$sipno=str_replace('&#xFFFD;','"', $sipno);
$sipno=str_replace('<br />','', $sipno);
$sipno=str_replace('<br>','', $sipno);

if($tipo=='home'){
echo '';
if(  str_replace(' ','',strtolower($jma['Categoria'])) == 'pelicula'  ){
echo '';
}
if(  str_replace(' ','',strtolower($jma['Categoria'])) == 'ova'  ){
echo '';
}
//$urlpathportadas.str_replace(' ','',strtolower($jma['Categoria'])).'/'.$jma['Url'].'.html
if($extension='si'){
					$urlepi = $urlpath.'ver/'.$jma['Url'].'-'.$jma['NumEpisodio'].'';
				}
	
				else{
					$urlepi = $urlpath.$jma['Url'].'/'.$jma['NumEpisodio'].'/';
				}

				echo '
					<div class="not">
					<div class="'.$jma['Categoria'].'"></div>
					<a href="'.$urlepi.'" title="'.$jma['NombreAnime'].' '.$jma['NumEpisodio'].'">
					<img class="imglstsr lazy" src="'.$urlpathmini.''.$jma['Mini'].'.jpg" border="0">
					<span class="tit_ep"><span class="">'.$jma['NombreAnime'].' '.$jma['NumEpisodio'].' '.$jma['hits'].'</span></span>
					</a>
					</div>
				';
}

else{
if (strlen($jma['NombreAnime']) >13)
									{
										$puntos='&hellip;';
									}
										else{
											$puntos='';
									}
		
echo '<li>
					   <a href="'.$urlpath.str_replace(' ','',strtolower($jma['Categoria'])).'/'.$jma['Url'].'.html" class="rated_avatar" style=""><img src="'.$jma['Mini'].'" title="'.$jma['NombreAnime'].'" alt="'.$jma['NombreAnime'].'"></a>
					   <a class="rated_title" href="'.$urlpath.str_replace(' ','',strtolower($jma['Categoria'])).'/'.$jma['Url'].'.html">'.substr($jma['NombreAnime'],0,26).$puntos.'</a>
					   <div class="rated_stars">
					       <span>
							 Episodio
																						 '.$jma['NumEpisodio'].' 														</span>
					       <img src="http://mundoanimehd.com/cdn/assets/images/star.png" style="height:11px; vertical-align:middle;" title="Progamacion MundoAnimeHD" alt="Progamacion MundoAnimeHD">
					       <span style="color: #ADADAD; font-family: verdana; font-size: 10px;">
						   
					       					       </span>
					   </div>
					   <a class="rated_more" href="'.$urlpath.str_replace(' ','',strtolower($jma['Categoria'])).'/'.$jma['Url'].'.html"><img style="vertical-align:middle;" src="http://mundoanimehd.com/cdn/assets/images/rated_ver_btn.png" alt="Ver Anime"></a>
					</li>';
	}

}
@mysql_free_result($jm);
}



// Funcion para obtener los ultimos animes agregados
function jm_ultimos_animes($tipo){
include('config/config.php');
if($tipo=='lista'){
$jm = @mysql_query("SELECT Nombre,Categoria,Url FROM series_anime ORDER BY Codigo DESC LIMIT 10");
while($jma=@mysql_fetch_array($jm)){
if (strlen($jma['Nombre']) >30){$puntos='&hellip;';}else{$puntos='';}
if($extension='si'){$urlserie=$urlpath.'anime/'.$jma['Url'].'';}else{$urlserie=$urlpath.'anime/'.$jma['Url'].'/';}
$categoriax = $jma['Categoria'];
$find = array('Pelicula', 'Ova', 'Anime');
$repl = array('tipo_2"', 'tipo_1', 'tipo_0');
$categoria = str_replace ($find, $repl, $categoriax);
echo '
<li><div class="'.$categoria.'"></div><a href="'.strtolower($urlserie).'">'.substr($jma['Nombre'],0,35).$puntos.'</a></li>
';

}
}

else{
$jm = @mysql_query("SELECT Nombre,Url,Imagen2 from series_anime ORDER by Codigo DESC LIMIT 6 ");//15//27
while($jma=@mysql_fetch_array($jm)){
if($extension='si'){$urlserie=$urlpath.$jma['Url'].'';}else{$urlserie=$urlpath.$jma['Url'].'/';}
if (strlen($jma['Nombre']) >27){$puntos='&hellip;';}else{$puntos='';}
if($imgremota=='si' && $jma['Imagen2']!==NULL){$portada=$jma['Imagen2'];}else{$portada=$urlpath_static_portadas.''.$jma['Imagen'];}
echo '<article class="rel"> <a href="'.$urlserie.'"><header>'.$jma['Nombre'].'</header> <figure><img src="'.$jma['Imagen2'].'" width="116" height="164" /></figure><div class="mask"></div></a> <p>'.$jma['Sipnosis'].'</p> </article>';
}
}
@mysql_free_result($jm);
}

// Funcion para obtener el top de capitulos mas vistos
function jm_capitulos_mas_vistos(){
include('config/config.php');
$jm = @mysql_query("SELECT 
series_anime.Nombre as NombreAnime,
series_anime.Url,
series_anime.Codigo,
episodios_anime.CodSerie,
episodios_anime.NumEpisodio,
episodios_anime.hits,
UNIX_TIMESTAMP(episodios_anime.Fecha) as Fecha
FROM series_anime INNER JOIN episodios_anime ON series_anime.Codigo=episodios_anime.CodSerie ORDER BY episodios_anime.hits DESC LIMIT 10");
while($jma=@mysql_fetch_array($jm)){
if (strlen($jma['Nombre']) >=38){$puntos='&hellip;';}else{$puntos='...';}

echo '
<li>
<a href="'.$urlpath.'ver/'.$jma['Url'].'-'.$jma['NumEpisodio'].'">'.substr($jma['NombreAnime'],0,40).' '.$jma['NumEpisodio'].'
</a>
</li>
';
}
@mysql_free_result($jm);
}

?>
