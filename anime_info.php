<?php	 	
error_reporting(0);
session_start();
include('config/config.php');

$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
$serie = $_GET['id'];

mysql_query("SET NAMES 'utf8'");
$serieinfo = @mysql_query("SELECT Codigo,Nombre,Nombre_Alternativo,Url,Sipnosis,Imagen,Categoria,Generos,Estado,views,Fecha FROM $SQL_Base.series_anime Where Url='$serie'", $conwb) or die(mysql_error());

while ($crow = @mysql_fetch_array($serieinfo)){
$titulo=ucwords($crow['Nombre']).' Online | Todos los cap&iacute;tulos de '.ucwords($crow['Nombre']).' | '.ucwords($crow['Nombre']).' Anime Online - '.$titulito;
$titulo_medio='<a href="'.$urlpath.str_replace(' ','',strtolower($crow['Categoria'])).'/'.$crow['Url'].'">Ver '.ucwords($crow['Nombre']).' Online</a> | <a href="'.$urlpath.str_replace(' ','',strtolower($crow['Categoria'])).'/'.$crow['Url'].'">Todos los cap&iacute;tulos de '.ucwords($crow['Nombre']).'</a> | <a href="'.$urlpath.str_replace(' ','',strtolower($crow['Categoria'])).'/'.$crow['Url'].'">Descargar '.ucwords($crow['Nombre']).'</a>';

$description='Anime '.ucwords($crow['Nombre']).': Cap&iacute;tulos de '.ucwords($crow['Nombre']).' para ver online y descargar, completamente gratis.';
$keywords='anime online '.ucwords($crow['Nombre']).', ver '.ucwords($crow['Nombre']).' anime online, capitulos de '.ucwords($crow['Nombre']).', '.ucwords($crow['Nombre']).', '.ucwords($crow['Nombre']).' sub espa&ntilde;ol, '.ucwords($crow['Nombre']).' online, '.ucwords($crow['Nombre']).' megaupload, '.ucwords($crow['Nombre']).' descargar, ver '.ucwords($crow['Nombre']);
$fj_web_footer_keywords=ucwords($crow['Nombre']).', ver '.ucwords($crow['Nombre']).', '.ucwords($crow['Nombre']).' sub esp, '.ucwords($crow['Nombre']).' online, '.ucwords($crow['Nombre']).' sub espa&ntilde;ol';
$img=''.mysql_result($serieinfo,0,'Imagen2').'';
$tit=ucwords($crow['Nombre']).' Online';

$conwbx = @mysql_query("UPDATE $SQL_Base.series_anime SET views = views + 1 WHERE Url='$serie'");

include('incluir/cabecera.php');
?>


<!-- anime box -->
<div class="anime_box">
    <div class="anime_info">
    	<img src="<?= $urlpathportadas.$crow['Imagen'].'.jpg'?>" width="180" height="240" class="portada">
        <div class="menu">
        <a href="#" class="actual">Vista General</a>
        </div>
    </div>

<!-- anime contenido -->
<div class="anime_cont">
	    <!-- boton me gusta -->
    <fb:like href="<?=($urlpath.'anime/'.mysql_result($serieinfo,0,'Url').'')?>" width="114px" layout="button_count" action="like" show_faces="true" share="false" style="position: relative; z-index: 60; float: right; height:20px; overflow: hidden;"></fb:like>
    <!--boton me gusta -->
	<h1><?=$crow['Nombre']?></h1>

    <div class="sinopsis">
	<?=$crow['Sipnosis']?>
    </div>
    
    <ul class="ainfo">
    <li><b>Tipo:</b> <?=$crow['Categoria']?></li>
    <li><b>Estado:</b> <span class="serie_estado_1"><? if($crow['Estado']==0){echo 'Finalizada';}else{echo 'En emisión';}?></span></li>
    <li><b>Generos:</b>
        <?php
        $arraygeneros = explode(',', str_replace('.','',$crow['Generos']) );
        $eachurl_total = count($arraygeneros);
        $totalxd='0';
        foreach($arraygeneros as $e){
        $totalxd++;
        if($eachurl_total==$totalxd){$coma='.';}else{$coma=', ';}
        echo '<a href="'.$urlpath.'genero/'.urlencode(strtolower($e)).'" >'.ucwords($e).'</a>'.$coma;
        }
        $crow['Generos']
		?>
    </li>
    <li><b>Fecha de Inicio:</b> <?=$crow['Fecha']?></li>
    </ul>

	<br>
	
    <div class="relacionados">
<?php
$jm = @mysql_query("SELECT Nombre, Url, Categoria FROM $SQL_Base.series_anime WHERE Nombre like '%".substr($crow['Nombre'],0,5)."%' ORDER BY Codigo ASC") or die("Query failed : " . mysql_error());
while($jma=@mysql_fetch_array($jm)){
if (strlen($jma['Nombre']) >13){$puntos='&hellip;';}else{$puntos='';}
$linkcap=$urlpath.'anime/'.$jma['Url'];
$categoriax = $jma['Categoria'];
$find = array('Pelicula', 'Ova', 'Anime');
$repl = array('Pelicula', 'Ova', 'Anime');
$categoria = str_replace ($find, $repl, $categoriax);
echo '<li><span style="display:none;">'.$contador.'</span><b>Relacionado</b>: <a href="'.$linkcap.'">'.$jma['Nombre'].'</a> ('.$categoria.')</li>';
}
?>
    </div>

	<div class="tit">Listado de episodios 
    <span class="fecha_pr">Fecha Próximo: 
    	<? if($crow['Estado']==1 ){?>
<?php	 	
            // Seteo fecha de comienzo 
            $sql=mysql_query("SELECT * FROM episodios_anime WHERE CodSerie = '".$crow['Codigo']."' ORDER BY CodEpisodio DESC LIMIT 1");
            while($res=mysql_fetch_assoc($sql)) {
            $fecha_inicial=$res['Fecha']; 
            }
            // Pongo los dias que quiero sumar 
            $dias_a_sumar=7; 
            // Paso la fecha de comienzo a timestamp 
            $tiempo=strtotime($fecha_inicial); 
            // Paso los dias a segundos 
            $sumar=$dias_a_sumar*86400; 
            // Formatear date a gusto, aca viene dd/mm/aaaa 
            echo date("j/n/Y", $tiempo+$sumar); 
            ?> 
    	<? } ?>
    </span>
    </div>
    
    <ul class="anime_episodios" id="listado_epis" style="position: relative; z-index: 60; height: 375px;">
<?
$queryepisodiosx = @mysql_query("SELECT Nombre,Fuente,NumEpisodio,CodEpisodio, IF(NumEpisodio REGEXP '^[[:alpha:]]',NumEpisodio,LPAD(FORMAT(NumEpisodio,4),10,'0')) AS scene_sort FROM $SQL_Base.episodios_anime Where CodSerie='".$crow['Codigo']."' ORDER BY scene_sort DESC;",$conwb)   or die(mysql_error());
while ($growsx = @mysql_fetch_array($queryepisodiosx)){	
?>
<?
if($extension == 'si'){$urlepi=$urlpath.'ver/'.$crow['Url'].'-'.urlencode($growsx['NumEpisodio']).'.html';}else{$urlepi=$urlpath.'ver/'.$crow['Url'].'-'.urlencode($growsx['NumEpisodio']).'';}
?>
<li><a href="<?=$urlepi?>">Cap&iacute;tulo <?=$growsx['NumEpisodio']?> <? if($growsx['Nombre']=='' && $growsx['Nombre']!==NULL){echo 'de '.ucwords($crow['Nombre']);}else{echo ': '.$growsx['Nombre'];}?></a></li>
<?
}       
if(@mysql_num_rows($queryepisodiosx)==0){
?>
<li>A&uacute;n no hay cap&iacute;tulos. Regresa m&aacute;s tarde.</li>
<?
}
?> 
    </ul>

	<div class="tit">Proximos Episodios</div>
    <ul class="anime_episodios">
    <?php if($crow['Estado']==1 ){?>
	<?php
	$lastepisode = @mysql_query("SELECT NumEpisodio, IF(NumEpisodio REGEXP '^[[:alpha:]]',NumEpisodio,LPAD(FORMAT(NumEpisodio,4),10,'0')) AS scene_sort FROM $SQL_Base.episodios_anime Where CodSerie='".$crow['Codigo']."' ORDER BY scene_sort DESC LIMIT 1;",$conwb)   or die(mysql_error());
	$lastepisode=@mysql_result($lastepisode,0,'NumEpisodio');
	for($i=$lastepisode+1;$i<$lastepisode+2;$i++){
	?>
        <li><a href="/">Capítulo <?=$i?>: </a></li>
	<?php }// fin del for()?>
    <?php } ?>
    </ul>
    
</div>
<!-- anime contenido -->

<div class="clear"></div>

</div>
	<link rel="stylesheet" type="text/css" href="<?=$urlpath?>css/jquery.mCustomScrollbar.css">
	<script type="text/javascript" src="<?=$urlpath?>js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript">
        (function($){
            $(window).load(function(){
                $("#listado_epis").mCustomScrollbar({
                    scrollButtons:{
                        enable: true
                    },
                    theme: 'dark-thick'
                });
            });
        })(jQuery);
    </script>
<!-- anime box -->

<!-- sub bloque -->
<div class="sub_bloque" style="margin-bottom: 0px">
	<div class="titulo"><img src="<?=$urlpath?>imagenes/img/i16/060.png">Comentarios </div>
    <div class="comentarios_warning">Los comentarios que contengan: spam, spoiler, o anuncien su número de comentario (primero, segundo, etc) serán eliminados.
    </div>
</div>
<!-- sub bloque -->

<?php
}
if(mysql_num_rows($serieinfo)==0){
header("Location: ".$urlpath."?ref=404");
}

include('incluir/pie.php');
?>