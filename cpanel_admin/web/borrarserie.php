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
		$imagen=$puntos.'animes_image/'.mysql_result($url_sql,0,'Url').'.jpg';
		$imagen2=$puntos.'animes_image3/'.mysql_result($url_sql,0,'Url').'.jpg';
		$imagen3=$puntos.'sin_logo/'.mysql_result($url_sql,0,'url').'.jpg';
		@mysql_query("DELETE FROM $SQL_Base.series_anime WHERE Codigo='".$codigo."' ", $coxwb);
		@mysql_query("DELETE FROM $SQL_Base.episodios_anime WHERE CodSerie='".$codigo."' ", $coxwb);
		
		if(unlink($imagen)){echo 'Haz borrado La Imagen 1<br>';}
		if(unlink($imagen2)){echo 'Haz borrado La Imagen 2<br>';}
		if(unlink($imagen3)){echo 'Haz borrado La Imagen 3<br>';}
		echo 'Haz borrado el Anime: '.mysql_result($url_sql,0,'Nombre').'<br>';
		echo '<script language=javascript>
<!--
window.alert("Borrado correctamente")
location = \'http://animeymas.com/cpanel_admin/?op=animes\';
//-->
</script>';
	}

}else{
	$codigo=@$_GET['id'];
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
    <td colspan="2" nowrap="nowrap" class="clms" scope="row">Borra  una serie.</td>
  </tr>
  <tr>
    <td nowrap="nowrap" class="clms" scope="row">&nbsp;</td>
    <td nowrap="nowrap" class="clms" scope="row"><label for="id">Elige la serie:</label></td>
    <td class="tipsy-inner"><label for="id2"></label>
      <select name="id" id="id">
<?php	 	;
$qserie = @mysql_query("SELECT Codigo,Nombre,Categoria FROM $SQL_Base.series_anime ORDER BY Nombre ",$coxwb);
while ($aserie = @mysql_fetch_array($qserie)){
?>
        <option value="<?=$aserie['Codigo']?>"><?=$aserie['Codigo'].' | '.$aserie['Nombre'].' | '.$aserie['Categoria']?></option>
<?php	 	; } ?>
      </select></td>
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
