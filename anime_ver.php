<?php
error_reporting(0);

session_start();
include('config/config.php');

$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);

$video_nombre=urldecode($_GET['anime']);
$video_nepi=urldecode($_GET['episodio']);
$url_getvideo=$urlpath;
$contador = $video_nombre.'_'.$video_nepi;
$contador2 = str_replace("-", "", $contador);

mysql_query("SET NAMES 'iso-8859-1'");
$serieinfo = @mysql_query("SELECT Codigo,Nombre,Url,Sipnosis,Imagen,Imagen2,Categoria,Estado FROM $SQL_Base.series_anime Where Url='$video_nombre'", $conwb);


$getvideoinfo = @mysql_query("SELECT * from $SQL_Base.episodios_anime where CodSerie='".mysql_result($serieinfo,0,'Codigo')."' and NumEpisodio='$video_nepi' order by NumEpisodio Desc ",$conwb)   or die(mysql_error());


while ($growsx = @mysql_fetch_array($getvideoinfo)){

$titulo=''.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' Sub Espa&ntilde;ol Online | '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' Anime Online | Ver Anime Online - '.$titulito;
$titulo_medio='Ver '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' | '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' Sub Espa&ntilde;ol | Descargar '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.'';
$titulo_footer=ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' sub español, ver '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' online, '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.'';
$description=ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' sub español, ver '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' online, ver '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' sub español, '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.'';
$description_1=ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' sub español, ver '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' online, '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.'';
$keywords=ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' sub español, ver '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' online, '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.'';
$fj_web_footer_keywords=ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' sub espa&ntilde;ol, ver '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.', '.ucwords(mysql_result($serieinfo,0,'Nombre')).' '.$video_nepi.' online, '.ucwords(mysql_result($serieinfo,0,'Nombre')).''.$video_nepi.'';
$img=$urlpath.'imagenes/animedroide.png';
$tit=ucwords(mysql_result($serieinfo,0,'Nombre')).' Capitulo '.$video_nepi;


$contador = $growsx['CodEpisodio'];

$miau = mysql_query("UPDATE `$SQL_Base`.`episodios_anime` SET `hits` = hits + 1 WHERE `episodios_anime`.`CodEpisodio` = $contador");

include('incluir/cabecera.php');

//Agrego el contador de visitas
//require('config/countbdd.php'); 

if($imgremota=='si' && mysql_result($serieinfo,0,'Imagen2')!==NULL){$portada=mysql_result($serieinfo,0,'Imagen2');}else{$portada=$urlpath_static_portadas.''.mysql_result($serieinfo,0,'Imagen');}
?>

	<!-- episodio head -->
    <div class="episodio_head">
    
    <!-- Listado -->        
        <a href="<?=$urlpath?>anime/<?=mysql_result($serieinfo,0,'Url')?>" class="lista_episodios"><img src="<?=$urlpath?>imagenes/img/i24/lista.png"> Lista de Episodios</a>   
	<!-- Listado --> 

        <div class="episodio_titulo">
	<!-- Anterior -->
	<?php
    $total_episodios = mysql_query("SELECT NumEpisodio from $SQL_Base.episodios_anime where CodSerie='".mysql_result($serieinfo,0,'Codigo')."' order by NumEpisodio+0 Desc Limit 1",$conwb)   or die(mysql_error());
    $total_episodios=@mysql_result($total_episodios,0,'NumEpisodio');
    if( ($video_nepi-1) <=0 ){}
        else{
            echo '<a href="'.$urlpath.'ver/'.$video_nombre.'-'.($video_nepi-1).'" style="float: left;"><img src="'.$urlpath.'imagenes/img/i24/prev.png"></a>';
            }
    ?>
    <!-- Anterior -->

    <!-- Siguiente -->
	<?php
    $total_episodios = mysql_query("SELECT NumEpisodio from $SQL_Base.episodios_anime where CodSerie='".mysql_result($serieinfo,0,'Codigo')."' order by NumEpisodio+0 Desc Limit 1",$conwb)   or die(mysql_error());
    $total_episodios=@mysql_result($total_episodios,0,'NumEpisodio');
    if( ($video_nepi+1) <= $total_episodios ){
		echo '<a href="'.$urlpath.'ver/'.$video_nombre.'-'.($video_nepi+1).'" style="float: right;"><img src="'.$urlpath.'imagenes/img/i24/next.png"></a>';}
    ?>
    <!-- Siguiente -->     

            <h1><?=mysql_result($serieinfo,0,'Nombre')?> (#<?=$growsx['NumEpisodio']?>) | Visto <?=$growsx['hits']?></h1>
        </div>
    </div>
    <!-- episodio head -->
 
<!-- epi cont -->   
<div class="epi_cont">

	<!-- menu episodios -->
    <div class="menu_epi" id="menu_epi">
        <div data-bloque="repro_box" class="opt actual"><img src="<?=$urlpath?>imagenes/img/i16/010.png"> Reproductor</div>
        <div data-bloque="opciones_box" class="opt"><img src="<?=$urlpath?>imagenes/img/i16/011.png"> Opciones Detalladas</div>
        <div data-bloque="descargas_box" class="opt"><img src="<?=$urlpath?>imagenes/img/i16/009.png"> Descargas</div> <br>
        
        <!-- anuncio izq -->
        <div align="center"> 
        Anuncio lateral
        </div>
        <!-- anuncio izq --> 
    </div>
    <!-- menu episodios -->
 
<!-- epi box -->  
<div class="epi_box">

<!-- reproductor y opciones -->
<?php include 'incluir/reproductores.php'; ?>
<!-- reproductor y opciones -->
    
    <!-- Descarga pestana -->
    <div class="box_opc" id="descargas_box" style="display: none;">
        <div class="opcion">
            <a href="#" target="_blank" rel="nofollow">
                <img src="<?=$urlpath?>imagenes/img/servers/desconocido.png" class="server">
                <b>Opción 1 [ MP4 | 480p | 0MB ]</b>
                <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
                </span>
            </a>
        </div>
        
        <div class="opcion">
            <a href="#" target="_blank" rel="nofollow">
                <img src="<?=$urlpath?>imagenes/img/servers/mirrorupload.png" class="server">
                <b>Opción 2 [ MP4 | 480p | 0MB ]</b>
                <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014
                </span>
            </a>
        </div>
        
        <div class="opcion">
            <a href="#" target="_blank" rel="nofollow">
                <img src="<?=$urlpath?>imagenes/img/servers/zippyshare.png" class="server">
                <b>Opción 3 [ MP4 | 480p | 0MB ]</b>
                <span>
                <b>Audio:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/JP.png"> | 
                <b>Subs:</b> <img src="<?=$urlpath?>imagenes/img/idiomas/ES.png"> | 
                <b>Fansub:</b> Desconocido | 
                <b>Fecha:</b> 03/07/2014</span>
            </a>
        </div>  
    </div>
    <!-- Descarga pestana -->

</div>
<!--  epi box -->

<div class="clear"></div>
</div>
<!-- epi cont -->

<!-- sub bloque -->
<div class="sub_bloque" style="margin-bottom: 0px">
	<div class="titulo"><img src="<?=$urlpath?>imagenes/img/i16/060.png">Comentarios
    <!-- boton me gusta -->
    <fb:like href="<?=($urlpath.'ver/'.mysql_result($serieinfo,0,'Url').'-'.$_GET['episodio'].'')?>" width="114px" layout="button_count" action="like" show_faces="true" share="false" style="position: relative; z-index: 60; float: right; height:20px; overflow: hidden; margin: 10px;"></fb:like>
    <!--boton me gusta -->
    </div>
    <div class="comentarios_warning">Los comentarios que contengan: spam, spoiler, o anuncien su número de comentario (primero, segundo, etc) serán eliminados.
    </div>
    
<!-- facebook comentarios -->  
<fb:comments href="<?=($urlpath.'ver/'.mysql_result($serieinfo,0,'Url').'-'.$_GET['episodio'].'')?>" width="1000px" numposts="5" colorscheme="light" order_by="social"></fb:comments>
 <!-- facebook comentarios -->   
 
</div>
<!-- sub bloque -->

<?php
}
if(mysql_num_rows($getvideoinfo)==0){
header("Location: ".$urlpath."?ref=404");
}

include('incluir/pie.php');
?>