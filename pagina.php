<html>
<head>
<link rel="stylesheet" type="text/css" href="http://animedroide.com/css/estilo.css" /> 
</head>
<body>
	<form action="pagina.php" method="get">
    <label>Buscar por letra</label>
        <select name="tipo">
          <option value="buscador">Buscador</option>
          <option value="genero">Genero</option>
          <option value="letra">Letra</option>
		</select>
        <input type="text" name="buscar" />
    <input type="submit"  value="Buscar"/>
    </form>
</body>
</html>

<?php

if(empty($_GET['buscar']))
{echo "<p>Realizar busqueda</p>";}
else {
	
$fjsearchget = $_GET['buscar'];
$fjtypeget=$_GET['tipo'];

//Conexión a la base de datos 
// $con = @mysql_connect("localhost","root","") or die (mysql_error()); 
$con = @mysql_connect("localhost","animeyt","ZnYqGAerHrT8L3qW") or die (mysql_error()); 
@mysql_select_db("animeyt",$con) or die (mysql_error()); 


// Si tipo buscador
if($fjtypeget=='buscador'){
	echo 'Buscar: '.ucwords($fjsearchget).'<br/>';
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Nombre Like '%".$fjsearchget."%' or Sipnosis Like '%".$fjsearchget."%' ORDER BY Nombre ";
}

// Si tipo genero
if($fjtypeget=='genero'){
//	echo '<a href="'.$urlpath.'genero/'.strtolower($fjsearchget).'">Ver animes del g&eacute;nero '.ucwords($fjsearchget).'</a>';
	echo 'Genero: '.ucwords($fjsearchget).'<br/>';
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Generos Like '%$fjsearchget%' ORDER BY Nombre ";
}

// Si tipo letra
if($fjtypeget=='letra'){
	if($fjsearchget=='0-9'){
	echo 'Ver animes con t&iacute;tulo num&eacute;rico';
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Nombre REGEXP '^[0-9+\.]' ORDER BY Nombre+0 ";
	}
	// Si no
	else{
	echo 'Letra: '.strtoupper($fjsearchget).'<br/>';
	$_pagi_sql = "SELECT Nombre,Url,Categoria,Imagen,Imagen2,Sipnosis FROM series_anime WHERE Nombre Like '$fjsearchget%' ORDER BY Nombre ";
		}
}

//Sentencia sql (sin limit) 
//$_pagi_sql = "SELECT * FROM series_anime WHERE Categoria='Anime' ORDER BY Codigo"; 

//cantidad de resultados por página (opcional, por defecto 20) 
$_pagi_cuantos = 10; 

//Separado resultados
$_pagi_separador = "";

$_pagi_nav_estilo = "";

$_pagi_nav_estilo_actual = "actual";

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente 
include("paginator.inc.php"); 



//Leemos y escribimos los registros de la página actual 
while($fja = mysql_fetch_array($_pagi_result)){ 
?>

<!-- portada item -->
<div class="aboxy_cont">
<div class="aboxy">
<a href="" title="<?=$fja['Nombre']?>">
<img class="lazy" src="" data-original="" alt="<?=$fja['Nombre']?>" style="display: inline;">
</a>
<div>
</div>
<span><h1><a href="" title="<?=$fja['Nombre']?>"><?=$fja['Nombre']?></a></h1></span>
</div>
</div>
<!-- fin portada item -->

<?php
} 

//Incluimos la barra de navegación 
echo '
<div style="text-align: center">
<div class="pagin">
<span>
'.$_pagi_navegacion.'
</span>
</div>
</div>
';
}
?>