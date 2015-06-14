<?php
error_reporting(0);

$fjsearchget = $_GET['buscar'];
$fjtypeget = $_GET['tipo'];
$fjordenget = $_GET['orden'];


$web_image=$urlpath.'img/imgfb.jpg';

// Si tipo buscador		anime_lg.php?tipo=buscador&buscar=$1
if($fjtypeget=='buscador'){
$titulo='Buscando '.ucwords(urldecode($fjsearchget)).' | Anime Online - '.$titulito;
$tit='Buscando '.ucwords(urldecode($fjsearchget)).' - '.$titulito;
$description='Buscando el Anime '.ucwords(urldecode($fjsearchget)).' Online.';
$keywords='Anime, Animes online, todos los animes, naruto shippuden, bleach, one piece, animeid, animeflv, todoanimes, veranimesonline, animechi, ao no exorcist';
$titulo_medio='<a href="'.$urlpath.'busqueda/'.urlencode($fjsearchget).'">Buscar Anime '.ucwords(urldecode($fjsearchget)).'</a> | <a href="'.$urlpath.'busqueda/'.urlencode($fjsearchget).'">Descargar Anime '.ucwords(urldecode($fjsearchget)).'</a> | <a href="'.$urlpath.'busqueda/'.urlencode($fjsearchget).'">'.ucwords(urldecode($fjsearchget)).'</a>';
}

// Si genero	anime_lg.php?tipo=genero&buscar=$1
if($fjtypeget=='genero'){
$titulo='Ver animes del genero '.ucwords($fjsearchget).' Sub Español Online | Descargar animes del genero '.ucwords($fjsearchget).' | Dorama Online - '.$titulito;
$tit='Ver animes del Género '.ucwords(urldecode($fjsearchget)).' - '.$titulito;
$description='Ver animes del Género '.ucwords(urldecode($fjsearchget)).' Online - Dorama de '.ucwords(urldecode($fjsearchget)).' - vee animes del Género '.ucwords(urldecode($fjsearchget)).' Sin restricción de Tiempo! - Dorama '.ucwords(urldecode($fjsearchget)).' - Dorama de '.ucwords(urldecode($fjsearchget)).' Online - Dorama '.ucwords(urldecode($fjsearchget)).' Gratis - animes  '.ucwords(urldecode($fjsearchget)).' Online.';
$keywords='Ver animes del Género '.ucwords(urldecode($fjsearchget)).' Online - Dorama de '.ucwords(urldecode($fjsearchget)).' - vee animes del Género '.ucwords(urldecode($fjsearchget)).' Sin restricción de Tiempo! - Dorama '.ucwords(urldecode($fjsearchget)).' - Dorama de '.ucwords(urldecode($fjsearchget)).' Online - Dorama '.ucwords(urldecode($fjsearchget)).' Gratis - animes  '.ucwords(urldecode($fjsearchget)).' Online.';
$titulo_medio='<a href="'.$urlpath.'genero/'.$fjsearchget.'">Ver animes del genero '.ucwords($fjsearchget).'</a> | <a href="'.$urlpath.'genero/'.$fjsearchget.'">animes del genero '.ucwords($fjsearchget).' Sub Español Online</a> | <a href="'.$urlpath.'genero/'.$fjsearchget.'">Descargar animes del genero '.ucwords($fjsearchget).'</a>';
}

// Si tipo letra	anime_lg.php?tipo=letra&buscar=$1
if($fjtypeget=='letra'){
	if($fjsearchget=='0-9'){
$titulo='Ver animes con la letra '.ucwords($fjsearchget).' Sub Español | Descargar animes con la letra '.ucwords($fjsearchget).' | Dorama Online - '.$titulito;
$tit='Ver animes con la Letra '.ucwords(urldecode($fjsearchget)).' - '.$titulito;
$description='Ver animes con letra '.ucwords(urldecode($fjsearchget)).' Online - Dorama con letra '.ucwords(urldecode($fjsearchget)).' - vee animes con letra '.ucwords(urldecode($fjsearchget)).' Sin restricción de Tiempo! - letra '.ucwords(urldecode($fjsearchget)).' - '.ucwords(urldecode($fjsearchget)).' Online - Dorama '.ucwords(urldecode($fjsearchget)).' Gratis - animes con letra  '.ucwords(urldecode($fjsearchget)).' Online.';
$keywords='Ver animes con letra '.ucwords(urldecode($fjsearchget)).' Online - Dorama con letra '.ucwords(urldecode($fjsearchget)).' - vee animes con letra '.ucwords(urldecode($fjsearchget)).' Sin restricción de Tiempo! - letra '.ucwords(urldecode($fjsearchget)).' - '.ucwords(urldecode($fjsearchget)).' Online - Dorama '.ucwords(urldecode($fjsearchget)).' Gratis - animes con letra  '.ucwords(urldecode($fjsearchget)).' Online.';
$titulo_medio='<a href="'.$urlpath.'letras/'.$fjsearchget.'">Ver animes con la letra '.ucwords($fjsearchget).'</a> | <a href="'.$urlpath.'letras/'.$fjsearchget.'">animes con la letra '.ucwords($fjsearchget).' Sub Español Online</a> | <a href="'.$urlpath.'letras/'.$fjsearchget.'">Descargar animes con la letra '.ucwords($fjsearchget).'</a>';
							}
		// Si no
		else{
$titulo='Ver animes con la letra '.ucwords($fjsearchget).' Sub Español | Descargar animes con la letra '.ucwords($fjsearchget).' | Dorama Online - '.$titulito;
$tit='Ver animes con la Letra '.ucwords(urldecode($fjsearchget)).' - '.$titulito;
$description='Ver animes con letra '.ucwords(urldecode($fjsearchget)).' Online - Dorama con letra '.ucwords(urldecode($fjsearchget)).' - vee animes con letra '.ucwords(urldecode($fjsearchget)).' Sin restricción de Tiempo! - letra '.ucwords(urldecode($fjsearchget)).' - '.ucwords(urldecode($fjsearchget)).' Online - Dorama '.ucwords(urldecode($fjsearchget)).' Gratis - animes con letra  '.ucwords(urldecode($fjsearchget)).' Online.';
$keywords='Ver animes con letra '.ucwords(urldecode($fjsearchget)).' Online - Dorama con letra '.ucwords(urldecode($fjsearchget)).' - vee animes con letra '.ucwords(urldecode($fjsearchget)).' Sin restricción de Tiempo! - letra '.ucwords(urldecode($fjsearchget)).' - '.ucwords(urldecode($fjsearchget)).' Online - Dorama '.ucwords(urldecode($fjsearchget)).' Gratis - animes con letra  '.ucwords(urldecode($fjsearchget)).' Online.';
$titulo_medio='<a href="'.$urlpath.'letras/'.$fjsearchget.'">Ver animes con la letra '.ucwords($fjsearchget).'</a> | <a href="'.$urlpath.'letras/'.$fjsearchget.'">animes con la letra '.ucwords($fjsearchget).' Sub Español Online</a> | <a href="'.$urlpath.'letras/'.$fjsearchget.'">Descargar animes con la letra '.ucwords($fjsearchget).'</a>';
		}
}

include('config/config.php');
include('incluir/cabecera.php');

?>


<!-- anime box -->
<div class="anime_box">
	
    <!-- anime info -->
    <div class="anime_info">
        <div class="menu">
        <a href="#" class="actual"><img src="<?=$urlpath?>imagenes/img/i16/045.png">Todos</a>
        <a href="#" id="mostrar_alfabeto"><img src="<?=$urlpath?>imagenes/img/i16/046.png">Alfabeto</a>
        <a href="#" id="mostrar_generos"><img src="<?=$urlpath?>imagenes/img/i16/047.png">Géneros</a>
        <!-- <a href="#"><img src="<?=$urlpath?>imagenes/img/i16/048.png">En Emisión</a>
        <a href="#"><img src="<?=$urlpath?>imagenes/img/i16/049.png">Próximamente</a>
        <a href="#" id="mostrar_generos"><img src="<?=$urlpath?>imagenes/img/i16/030.png">Buscador Avanzado</a>-->
        </div>
    </div>
    <!-- anime info -->
    
    <!-- anime contenido -->
    <div class="anime_cont">

    
        <!-- filtro anime -->
        <div class="filtro_anime">
            <div style="float: right;">
            <!--<a href="#" class="btn btn-small"><i class="filtro_anime_lista">&nbsp;</i></a>
            <a href="#" class="btn btn-small"><i class="filtro_anime_bloques">&nbsp;</i></a>-->
            </div>
        
            Ordenar Por:
            <div class="btn-group" style="margin-right: 10px;">
                <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">Fecha <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="?orden=Fecha">Fecha</a></li>
                    <li><a href="?orden=Nombre">Nombre</a></li>
                    <li><a href="?orden=views">Likes</a></li>
                </ul>
            </div>
            
           <!-- Mostrar:
            <div class="btn-group">
                <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">Todos <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="?mostrar=todos">Todos</a></li>
                    <li><a href="?mostrar=Anime">Series</a></li>
                    <li><a href="?mostrar=Ova">OVAS</a></li>
                    <li><a href="?mostrar=Pelicula">Películas</a></li>
                </ul>
            </div>-->
        </div>
        <!-- filtro anime -->
        
        <!-- generos box -->
        <div class="generos_box" style="display: none;">
            <a href="<?=$urlpath?>genero/accion">Acción</a>
            <a href="<?=$urlpath?>genero/aventura">Aventura</a>
            <a href="<?=$urlpath?>genero/carreras">Carreras</a>
            <a href="<?=$urlpath?>genero/comedia">Comedia</a>
            <a href="<?=$urlpath?>genero/cyberpunk">Cyberpunk</a>
            <a href="<?=$urlpath?>genero/deportes">Deportes</a>
            <a href="<?=$urlpath?>genero/drama">Drama</a>
            <a href="<?=$urlpath?>genero/ecchi">Ecchi</a>
            <a href="<?=$urlpath?>genero/escolares">Escolares</a>
            <a href="<?=$urlpath?>genero/fantasia">Fantasía</a>
            <a href="<?=$urlpath?>genero/ciencia-ficcion">Ciencia Ficción</a>
            <a href="<?=$urlpath?>genero/gore">Gore</a>
            <a href="<?=$urlpath?>genero/harem">Harem</a>
            <a href="<?=$urlpath?>genero/horror">Horror</a>
            <a href="<?=$urlpath?>genero/josei">Josei</a>
            <a href="<?=$urlpath?>genero/lucha">Lucha</a>
            <a href="<?=$urlpath?>genero/magia">Magia</a>
            <a href="<?=$urlpath?>genero/mecha">Mecha</a>
            <a href="<?=$urlpath?>genero/militar">Militar</a>
            <a href="<?=$urlpath?>genero/misterio">Misterio</a>
            <a href="<?=$urlpath?>genero/musica">Música</a>
            <a href="<?=$urlpath?>genero/parodias">Parodias</a>
            <a href="<?=$urlpath?>genero/psicologico">Psicológico</a>
            <a href="<?=$urlpath?>genero/recuentos-de-la-vida">Recuentos de la Vida</a>
            <a href="<?=$urlpath?>genero/romance">Romance</a>
            <a href="<?=$urlpath?>genero/seinen">Seinen</a>
            <a href="<?=$urlpath?>genero/shojo">Shojo</a>
            <a href="<?=$urlpath?>genero/shonen">Shonen</a>
            <a href="<?=$urlpath?>genero/vampiros">Vampiros</a>
            <a href="<?=$urlpath?>genero/yaoi">Yaoi</a>
            <a href="<?=$urlpath?>genero/yuri">Yuri</a>
            <a href="<?=$urlpath?>genero/sobrenatural">Sobrenatural</a>
        </div>
        <!-- generos box -->
        
        <!-- alfabeto box -->
        <div class="alfabeto_box" style="display: none;">
            <a href="<?=$urlpath?>letra/0-9">#</a>
            <a href="<?=$urlpath?>letra/a">A</a>
            <a href="<?=$urlpath?>letra/b">B</a>
            <a href="<?=$urlpath?>letra/c">C</a>
            <a href="<?=$urlpath?>letra/d">D</a>
            <a href="<?=$urlpath?>letra/e">E</a>
            <a href="<?=$urlpath?>letra/f">F</a>
            <a href="<?=$urlpath?>letra/g">G</a>
            <a href="<?=$urlpath?>letra/h">H</a>
            <a href="<?=$urlpath?>letra/i">I</a>
            <a href="<?=$urlpath?>letra/j">J</a>
            <a href="<?=$urlpath?>letra/k">K</a>
            <a href="<?=$urlpath?>letra/l">L</a>
            <a href="<?=$urlpath?>letra/m">M</a>
            <a href="<?=$urlpath?>letra/n">N</a>
            <a href="<?=$urlpath?>letra/o">O</a>
            <a href="<?=$urlpath?>letra/p">P</a>
            <a href="<?=$urlpath?>letra/q">Q</a>
            <a href="<?=$urlpath?>letra/r">R</a>
            <a href="<?=$urlpath?>letra/s">S</a>
            <a href="<?=$urlpath?>letra/t">T</a>
            <a href="<?=$urlpath?>letra/u">U</a>
            <a href="<?=$urlpath?>letra/v">V</a>
            <a href="<?=$urlpath?>letra/w">W</a>
            <a href="<?=$urlpath?>letra/x">X</a>
            <a href="<?=$urlpath?>letra/y">Y</a>
            <a href="<?=$urlpath?>letra/z">Z</a>
        </div>
        <!-- alfabeto box -->
        
        <!-- resultados anime -->
        <div style="margin-right: -20px;">
        
        
<!-- h1 -->
<h1 class="title q">
<?php 
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
@mysql_query("SET NAMES 'utf8'");


// Si tipo buscador
if($fjtypeget=='buscador'){
	echo 'Buscar: '.ucwords($fjsearchget).'';
	$fj = @mysql_query("SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis from $SQL_Base.series_anime WHERE Nombre Like '%".$fjsearchget."%' or Sipnosis Like '%".$fjsearchget."%' order by Nombre ",$conwb)   or die(mysql_error());
}

// Si tipo genero
if($fjtypeget=='genero'){
//	echo '<a href="'.$urlpath.'genero/'.strtolower($fjsearchget).'">Ver animes del g&eacute;nero '.ucwords($fjsearchget).'</a>';
	echo 'Genero: '.ucwords($fjsearchget).'';
	$fj = @mysql_query("SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis from $SQL_Base.series_anime WHERE Generos Like '%$fjsearchget%' order by Nombre ",$conwb)   or die(mysql_error());
}

// Si tipo letra
if($fjtypeget=='letra'){
	if($fjsearchget=='0-9'){
	echo 'Ver animes con t&iacute;tulo num&eacute;rico';
	$fj = @mysql_query("SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis from $SQL_Base.series_anime WHERE Nombre REGEXP '^[0-9+\.]' order by Nombre+0 ",$conwb)   or die(mysql_error());
	}
	// Si no
	else{
	echo 'Letra: '.strtoupper($fjsearchget).'';
	$fj = @mysql_query("SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis from $SQL_Base.series_anime WHERE Nombre Like '$fjsearchget%' order by Nombre ",$conwb)   or die(mysql_error());
		}
}
?>
</h1>
<!-- fin h1-->

<!-- portadas con paginacion -->
 <?php


// orden

if(empty($fjordenget)){        
            $orden ="Codigo";
			}
			else{
				$orden = $fjordenget;
				}
 
// orden


//Conexión a la base de datos 
// $con = @mysql_connect("localhost","root","") or die (mysql_error()); 
$con = @mysql_connect("localhost","animeyt","ZnYqGAerHrT8L3qW") or die (mysql_error()); 
@mysql_select_db("animeyt",$con) or die (mysql_error()); 

if(empty($fjsearchget)){
	$fjsearchget = "accion";
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Generos Like '%$fjsearchget%' ORDER BY $orden DESC ";
	}

// Si tipo buscador
if($fjtypeget=='buscador'){
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Nombre Like '%".$fjsearchget."%' or Sipnosis Like '%".$fjsearchget."%' ORDER BY Nombre ";

}

// Si tipo genero
if($fjtypeget=='genero'){
//	echo '<a href="'.$urlpath.'genero/'.strtolower($fjsearchget).'">Ver animes del g&eacute;nero '.ucwords($fjsearchget).'</a>';
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Generos Like '%$fjsearchget%' ORDER BY Nombre ";
}

// Si tipo letra
if($fjtypeget=='letra'){
	if($fjsearchget=='0-9'){
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Nombre REGEXP '^[0-9+\.]' ORDER BY Nombre+0 ";
	}
	// Si no
	else{
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Nombre Like '$fjsearchget%' ORDER BY $orden DESC ";
		}
}


//Sentencia sql (sin limit) 
//$_pagi_sql = "SELECT * FROM series_anime WHERE Categoria='Anime' ORDER BY Codigo"; 

//cantidad de resultados por página (opcional, por defecto 20) 
$_pagi_cuantos = 20; 

//Separado resultados
$_pagi_separador = "";

$_pagi_nav_estilo = "";

$_pagi_nav_estilo_actual = "actual";

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente 
include("paginator.inc.php"); 



//Leemos y escribimos los registros de la página actual 
while($fja = mysql_fetch_array($_pagi_result)){ 
if($imgremota=='si' && $fja['Imagen2']!==NULL){
	$portada = $urlpathportadas.$fja['Imagen'].'.jpg';
	}
	else{
		$portada=$urlpathportadas.$fja['Imagen'].'.jpg';
		}
	if($extension == 'si'){
		$urlserie=$urlpath.$fja['Url'].'.html';
		}else
		{
		$urlserie=$urlpath.'anime/'.$fja['Url'].'';
		}
?>

<!-- portada item -->
<div class="aboxy_cont">
<div class="aboxy">
<a href="<?=$urlserie?>" title="<?=$fja['Nombre']?>">
<img class="lazy" src="<?=$portada?>" data-original="<?=$portada?>" alt="<?=$fja['Nombre']?>" style="display: inline;">
</a>
<div>
</div>
<h1><a href="<?=$urlserie?>" title="<?=$fja['Nombre']?>"><?=$fja['Nombre']?></a></h1>
</div>
</div>
<!-- fin portada item -->

<?php
} 

//Incluimos la barra de navegación 
echo '
<div class="clear"></div>
<div style="text-align: center">
<div class="pagin">
<span>
'.$_pagi_navegacion.'
</span>
</div>
</div>
';
?>

<!-- portadas con paginacion -->

        </div>
        <!-- resultados anime -->
        
        <div class="clear"></div>
        
        <!-- paginacion 
        <div style="text-align: center">
            <div class="pagin">
                <span class="actual">1</span>
                <a href="<?=$urlpath?>?p=2">2</a>
                <a href="<?=$urlpath?>?p=3">3</a>
                <a href="<?=$urlpath?>?p=4">4</a>
                <a href="<?=$urlpath?>?p=5">5</a>
                <a href="<?=$urlpath?>?p=2">»</a>
            </div>
        </div>
           paginacion -->
    </div>
    <!-- anime contenido -->

	<div class="clear" style="clear:both;"></div>
</div>
<!-- anime box -->

<!-- sub bloque 
<div class="sub_bloque" style="margin-bottom: 0px">
	<div class="titulo"><img src="<?=$urlpath?>imagenes/img/i16/060.png">Comentarios </div>
    <div class="comentarios_warning">Los comentarios que contengan: spam, spoiler, o anuncien su número de comentario (primero, segundo, etc) serán eliminados.
    </div>
</div>
- sub bloque -->

<?
include('incluir/pie.php');
?>