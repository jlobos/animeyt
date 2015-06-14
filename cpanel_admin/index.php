<?
session_start();
include('../config/config.php');
include('func.php');
if (  isset($_SESSION['IdHarry']) && isset($_SESSION['PassHarry']) ){
$coxwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

<title>Zona de Administración - Cdanime</title>
<link href="http://animeflv.net/temas/admin/css/bootstrap.css" rel="stylesheet">
<link href="http://animeflv.net/temas/admin/css/admin.css" rel="stylesheet">
<script type="text/javascript" src="./index.php_files/bootstrap.js"></script>
<script src="./index.php_files/jquery.min.js"></script>
<script src="./index.php_files/jquery-ui.min.js"></script>
<script type="text/javascript" src="./index.php_files/admin.js"></script>
<link rel="stylesheet" type="text/css" href="./index.php_files/jquery-ui.css">
<meta name="pinterest" content="nopin">

<style>

.botonx {
background: #fafaf2;
display: block;
color: #555;
border: 1px solid #d3d7ba;
font-weight: 700;
height: 30px;
line-height: 29px;
margin-bottom: 14px;
text-decoration: none;
width: 160px;
}
.agregar {
background: url(images/agregar.gif) no-repeat 10px 8px;
text-indent: 30px;
display: block;
}
.contenedor{
  border:1px solid #c4c4c4;
  background:#FFFFFF;
  padding:4px;
  margin-bottom:10px;
  font-size: 0.9em;
}
 
.contenedor h2{
  background: #2f8ae0;
  text-transform:uppercase;
  font-size:12px;
  line-height:20px;
  height:20px;
  font-family:"Trebuchet MS",Arial,Helvetica,sans-serif;
  font-weight:bold;
  color:#FFF;
  border: 0px;
  -moz-border-radius-topleft:4px;
  -moz-border-radius-topright:4px;
  border-top-left-radius:4px;
  border-top-right-radius:4px;
  margin:-5px;
  margin-bottom:4px;
  padding:4px;
}



.lista
{
  background:#fafaf2;
  display:block;
  color:#555;
  border:1px solid #d3d7ba;
  font-weight:700;
  text-decoration:none;
}
 
.lista div
{
  border-bottom:1px dotted #edefe0;
  padding:5px;
}
 
.lista div:hover
{
  background:#efefe2;
  color:#06C;
}



/* PAGINACION */
div.paginacion, div.abcdario
{
  text-align:center;
}
 
div.paginacion div.datos, div.abcdario div.datos
{
  display:block;
  padding:5px 0;
}
 
div.paginacion span.pag, div.abcdario span.pag{
  display:block;
  padding:8px 0;
}
 
div.paginacion span.disabled{display:none}
 
span.pag a:link,span.pag a:visited,span.pag span.antsig,span.pag span.actual{
  display:inline;
  text-decoration:none;
  width:20px;
  color:#717171;
  background:#fff url('images/pagb.png');
  border:1px solid #b6b6b6;
  padding:4px 8px 5px;
  margin:0 -1px 0px 0;
  white-space:nowrap;
 
}

span.pag a:hover,span.pag a:active,.abcdario span.pag a:hover,.abcdario span.pag a:active{
  border-color:#515151;
}
 
span.pag span.actual, .abcdario span.pag span.actual{
  background:#626262 url('images/pagb2.png');
  color:#FFF;
  font-weight:bold;
  border-color: #202020;
}
</style>
</head>
<body>
<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<ul class="nav">
<li><a href="index.php">Inicio</a></li>
<li><a href="?op=animes">Animes</a></li>
<li><a href="?op=anime"><img src="./index.php_files/agregar.gif"> Agregar Anime</a></li>
<li><a href="?op=borrarserie"><img src="./index.php_files/eliminar.png"> Borrar Anime</a></li>
</ul>

<form class="buscador" method="get" action="?op=animes" id="cse-search-box" style="    float: left;    position: relative;    margin-top: 5px;    margin-bottom: -5px;">
<input type="hidden" name="op" value="animes">
<input type="text" name="q" size="24" class="buzq-text" id="search-query" placeholder="Buscar"><input class="buzq-bot" type="submit" name="sa" value="Buscar" style="margin-top: -11px; "></form>

<div style="float: right; margin-top: 10px;">
Bienvenido: <b><?=$_SESSION['IdHarry']?></b> 
| <a href="logout.php">Salir</a>
</div>

</div>
</div>
</div>
<div class="container" style="margin-top: 60px;">
<?php	 	; 
$op = @$_GET["op"];
switch ($op) {

case 'anime':
include("web/editanime.php");
break;

case 'animes':
include("web/shows.php");
break;

case 'borrarserie':
include("web/borrarserie.php");
break;

case 'borrarseriex':
include("web/borrarseriex.php");
break;

case 'supremo':
include("web/supremo.php");
break;

case 'descargas':
include("web/descargas.php");
break;

case 'videoaddfolder':
include("web/videoaddfolder.php");
break;

case 'videosmasivos':
include("web/videosmasivos.php");
break;

case 'episodiox':
include("web/editar_cap.php");
break;

case 'episodios':
include("web/animeepisodiolista.php");
break;

case 'videoborrar':
include("web/videoborrar.php");
break;

case 'emision':
include("web/animeenemision.php");
break;

case 'get':
include("web/get.php");
break;

case 'getcap':
include("web/get_cap.php");
break;

case 'videobam':
include("web/videobam.php");
break;

case 'nowvideo':
include("web/nowvideo.php");
break;

case 'novamov':
include("web/novamov.php");
break;

case 'mediafire':
include("web/mediafire.php");
break;

case 'videoweed':
include("web/videoweed.php");
break;

case 'zippy':
include("web/zippyshare.php");
break;

case '180upload':
include("web/180upload.php");
break;

case 'putlocker':
include("web/putlocker.php");
break;

case 'vk':
include("web/vk.php");
break;

case 'rutube':
include("web/rutube.php");
break;

case 'videoweed':
include("web/weed.php");
break;

case 'ultimos':
include("web/ultimos.php");
break;

case 'bbcode':
include("web/bbcode.php");
break;

default:
include("web/inicio.php");
break;

}
?>
</div>
</body></html>
<?
/*}else{
	echo'
	<script language=javascript>
	<!--
	window.alert("Error en la validacion de su sesion")
	location = \'login.php\';
	//-->
	</script>';
	}*/
}else{
echo'
<script language=javascript>
<!--
window.alert("Session Caducada Logeese de Nuevo")
location = \'login.php\';
//-->
</script>';
}
?>