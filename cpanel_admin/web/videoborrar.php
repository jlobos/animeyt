<?
@session_start();
@include('../../config/config.php');
@include('../../func.php');
if (  isset($_SESSION['IdHarry']) && isset($_SESSION['PassHarry']) ){
$coxwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
?>
<div class="contenedor">
     <h2>Borrar capitulo (Anime)</h2>
<?
if(isset($_POST['id'])){
	// Info para la funcion
	$codigo=$_POST['id'];
	$url_sql = @mysql_query("SELECT CodEpisodio FROM $SQL_Base.episodios_anime WHERE CodEpisodio='$codigo'", $coxwb);
	if(@mysql_num_rows($url_sql)==0){
		echo '<script language=javascript>
window.alert("No existe el Episodio del anime ")
location = "'.$urlpath.'cpanel_admin/?op=animes";
</script>';
	}else{
		mysql_query("DELETE FROM $SQL_Base.episodios_anime WHERE CodEpisodio='".$codigo."' ", $coxwb);
		echo '<script language=javascript>
window.alert("Episodio Anime Borrado")
location = "'.$urlpath.'cpanel_admin/?op=animes";
</script>';
	}

}else{
	$codigo=$_GET['id'];
?>
<style type="text/css">
<!--
.Estilo1 {color: #CCCCCC}
-->
</style>
<form id="form1" name="form1" method="post" action="">

<label style="float:left; line-height:30px;" for="id">Codigo del Episodio: </label>
<input style="float:left;" name="id" type="text" id="id" value="<?=$codigo?>" /><hr />
<div style="clear:both;"></div>

<input type="submit" name="button" id="button" value="Enviar" />
</form>
</div>
<?
}

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
