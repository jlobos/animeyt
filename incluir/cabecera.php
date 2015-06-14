<?
include('config/config.php');
include('config/funciones.php');
?>
<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="es" xml:lang="es">
<head>
<?php 
if(!$titulo){echo '<title>Anime YT</title><meta name="robots" content="noindex">';} else {echo '<title>'.$titulo.'</title>';}
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<link rel="icon" type="image/x-icon" href="<?=$urlpath?>favicon.ico" /> 
<meta name="title" content="<?=$titulito?>" /> 
<meta name="description" content="<?=$description?>" />
<meta property="og:site_name" content="Animedroide">
<?php 
if(!$img){
} else {echo '<meta property="og:image" content="'.$img.'"/>';}
?>
<meta property="og:type" content="tv_show"/>
<link rel="stylesheet" type="text/css" href="<?=$urlpath?>css/style.css" /> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="<?=$urlpath?>js/jquery.lazyload.min.js"></script>
<script src="<?=$urlpath?>js/animedroide.js"></script>
<script src="<?=$urlpath?>js/script.js" charset="utf-8"></script>
<script src="<?=$urlpath?>ajax.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" src="<?=$urlpath?>js/jwplayer.js"></script>

<script type="text/javascript">
function myFunction(){
	var n=document.getElementById('navsearch').value;
	if(n==''){document.getElementById("jSearch").innerHTML=""; document.getElementById("jSearch").style.border="0px"; document.getElementById("pers").innerHTML=""; return;
			 }

loadDoc("q="+n,"<?=$urlpath?>proc.php",function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
  		{document.getElementById("jSearch").innerHTML=xmlhttp.responseText; document.getElementById("jSearch").style.border="1px solid #A5ACB2";
		}
			else{ document.getElementById("jSearch").innerHTML='<img src="<?=$urlpath?>load-fig.gif" width="50" height="50" />'; }
  });
}
var iscap = false;
</script>


<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?=$urlpath?>css/reset.css">
<link rel="stylesheet" type="text/css" href="<?=$urlpath?>css/estilo.css">
<link rel="stylesheet" type="text/css" href="<?=$urlpath?>css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=$urlpath?>css/color_naranja.css">
<link rel="stylesheet" type="text/css" href="<?=$urlpath?>css/colorbox.css">

</head>

<body>
<div id="fb-root"></div>

<!-- contenedor -->
<div id="contenedor">


<!-- Header -->
<div id="header">
    <div class="centrar_bloque">
    <a href="<?=$urlpath?>"><img src="http://animeflv.net/temas/v1/css/img/logo_naranja.png" alt="Anime Online"></a>
    </div>
</div>
<!-- Header -->

<!-- Navegacion -->
<div id="navbar">
    <div id="centrar_bloque">
        <!-- Enlaces -->
        <ul id="menu">
        <li class="activo"><a href="<?=$urlpath?>">Inicio</a></li>
        <li><a href="<?=$urlpath?>animes/">Anime</a></li>
        <li><a href="#">Manga (Muy pronto!)</a></li>
        <li><a href="#">Musica</a></li>
        </ul>
        <!-- Enlaces -->
        
        <!-- Buscador -->
        <div class="buscador">
        <form>
        <input type="submit" class="buscar_icono" value="  ">
        <input type="text" id="navsearch" onkeyup="myFunction()" placeholder="Buscar..." name="q">
        </form>
        </div>
        <!-- Buscador -->    
    </div>
</div>
<!-- Navegacion -->

<!-- Contenido -->
<div id="contenido">