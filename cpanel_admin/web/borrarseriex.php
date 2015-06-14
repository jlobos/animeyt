<?
@session_start();
@include('../../config/config.php');
@include('../../func.php');
if (  isset($_SESSION['IdHarry']) && isset($_SESSION['PassHarry']) ){
$coxwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
?>
<div class="contenedor">
     <h2>Borrar Aporte</h2>
<?
if(isset($_POST['id'])){
	
	$host=$_SERVER['HTTP_HOST'];
	if($host!=='animedroide.com'){
		$puntos='../';
	}
	// Info para la funcion
	$codigo=$_POST['id'];
	$url_sql = @mysql_query("SELECT Nombre,Codigo,Imagen,Url FROM $SQL_Base.series_anime WHERE Codigo='$codigo'", $coxwb);
	if(@mysql_num_rows($url_sql)==0){
		echo 'no existe la serie';
	}else{
		@mysql_query("DELETE FROM $SQL_Base.series_anime WHERE Codigo='".$codigo."' ", $coxwb);
		@mysql_query("DELETE FROM $SQL_Base.episodios_anime WHERE CodSerie='".$codigo."' ", $coxwb);
		echo 'Haz borrado el Anime: '.mysql_result($url_sql,0,'Nombre').'<br>';
		echo '
		<script language=javascript>
		window.alert("Borrado correctamente")
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
<table width="800" border="0">
  <tr>
    <td nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td colspan="2" nowrap="nowrap" class="clms" scope="row">Borra  un aporte</td>
  </tr>
  <tr>
    <td nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="row"><label for="id">Codigo de la serie:</label></td>
    <td class="tipsy-inner"><span class="clms">
      <input name="id" type="text" id="id" value="<?=$codigo?>" />
      </span></td>
  </tr>
  <tr>
    <td nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="row"><input type="submit" name="button" id="button" value="Enviar" /></td>
    <td class="tipsy-inner">&nbsp;</td>
  </tr>
  <tr>
    <td width="19" nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td width="124" nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td width="643" class="tipsy-inner">&nbsp;</td>
  </tr>
</table>
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
