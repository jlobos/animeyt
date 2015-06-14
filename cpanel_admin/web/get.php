<div class="contenedor">
     <h2>Agregando...</h2>
<?
@session_start();
@include('../../config/config.php');
@include('../../func.php');

$host=$_SERVER['HTTP_HOST'];
if($host!=='animedroide.com'){
	$puntos='../';
}
if (  isset($_SESSION['IdHarry']) && isset($_SESSION['PassHarry']) ){
$coxwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);

if(!isset($_POST['Url'])){
	die('error');
}


/*
function upload_url($image_url, $image_destination){
if ($l = fopen($image_destination, 'w')){
	if (fwrite($l, file_get_contents($image_url)))
        return true;
        else
        return false;
	}else return false;
}
*/
if(!isset($_POST['Imagen']) or trim($_POST['Imagen'])==''){
	$img2='NULL';
}else{
	$img2="'".$_POST['Imagen']."'";
}
		if(isset($_POST['codseriexd'])){
			$f = clean_var($_POST['codseriexd']);
		}else{	
			$f = '';
		}

		if ($f==''){
			
echo 'agregando...<br>';
$urltoadd=$_POST['Url'];

if ($_POST['Imagen']){
	echo "<br>Datos ingresados correctamente<br>";
	
		mysql_query("INSERT INTO $SQL_Base.series_anime (Nombre,Nombre_Alternativo,Url,Imagen,Fecha,Mini,thumb,Slider,Sipnosis,Categoria,Generos,Estado) VALUES ('".addslashes($_POST['Nombre'])."','".addslashes($_POST['Nombre_Alternativo'])."',
'".$_POST['Url']."',
".$img2.",
'".$_POST['Fecha']."',
'".$_POST['Mini']."',
'".$_POST['thumb']."',
'".$_POST['Slider']."',
'".addslashes($_POST['Sipnosis'])."',
'".$_POST['Categoria']."',
'".$_POST['Generos']."',
'".$_POST['Estado']."' ) ", $coxwb) or die('Error al Agregar: '.mysql_error());

@mysql_query("UPDATE $SQL_Base.series_anime SET ImagenMini='".$_POST['ImagenMini']."' WHERE Codigo='".$_POST['codseriexd']."' ", $coxwb) or die(mysql_error());

echo '<script language=javascript>
<!--
window.alert("Regresar a lista de anime")
location = \'?op=animes\';
//-->
</script>';				
}else{
	echo '"Huvo un error al obtener la imagen"';
}


}else{

mysql_query("UPDATE $SQL_Base.series_anime SET 
Nombre='".addslashes($_POST['Nombre'])."',
Nombre_Alternativo='".addslashes($_POST['Nombre_Alternativo'])."',
Url='".$_POST['Url']."',
Imagen=".$img2.",
Fecha='".$_POST['Fecha']."',
Mini='".$_POST['Mini']."',
Mini='".$_POST['thumb']."',
Slider='".$_POST['Slider']."',
Sipnosis='".addslashes($_POST['Sipnosis'])."',
Categoria='".$_POST['Categoria']."',
Generos='".$_POST['Generos']."',
Estado='".$_POST['Estado']."' WHERE Codigo='".$_POST['codseriexd']."' ", $coxwb) or die(mysql_error());
		
echo '<br>Editado Correctamente';	
echo '
<script language=javascript>
	window.alert("Regresar a lista de anime")
	location = \'?op=animes\';
</script>';	
	}

?>
</div>
<?
}else{
echo'
<script language=javascript>
<!--
window.alert("Session Caducada Inicia sesscion de Nuevo")
location = \'login.php\';
//-->
</script>';
}
?>