<?
@include('../../config/config.php');
@include('../../func.php');
if (  isset($_SESSION['IdHarry']) && isset($_SESSION['PassHarry']) ){
$coxwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);

$videoinfo = @mysql_query("SELECT * FROM $SQL_Base.episodios_anime where Fuente='".$_GET['id']."'", $coxwb);
if (@mysql_num_rows($videoinfo) > 0){
echo '<title>Editar Capítulo</title>';
$quehacer='editar';
$noepisodio=mysql_result($videoinfo,0,'NumEpisodio');
$nombre=mysql_result($videoinfo,0,'Nombre');
$fuente=mysql_result($videoinfo,0,'Fuente');
$descarga2=mysql_result($videoinfo,0,'Descarga2');
$descarga2=mysql_result($videoinfo,0,'NumEpisodio');
$codserie=mysql_result($videoinfo,0,'CodSerie');
$servidor=mysql_result($videoinfo,0,'Servidor');
$Videoweed=mysql_result($videoinfo,0,'Videoweed');
$youtube=mysql_result($videoinfo,0,'Youtube');
$vk=mysql_result($videoinfo,0,'vk');
$Nowvideo=mysql_result($videoinfo,0,'Nowvideo');
$mb=mysql_result($videoinfo,0,'Mb');
$Fecha=mysql_result($videoinfo,0,'Fecha');
$visible=mysql_result($videoinfo,0,'Visible');
}else{
echo '<title>Agregar Capítulo</title>';
$quehacer='agregar';
$codserie=$_GET['id'];
$fj = @mysql_query("SELECT Url FROM $SQL_Base.series_anime WHERE Codigo='$codserie'", $coxwb);
$fj_lastepisode = @mysql_query("SELECT NumEpisodio FROM $SQL_Base.episodios_anime where CodSerie='$codserie' order By NumEpisodio+0 DESC LIMIT 1", $coxwb);
$noepisodio=(@mysql_result($fj_lastepisode,0,'NumEpisodio')+1);
$fuente=str_replace('-','',@mysql_result($fj,0,'Url'));
$fuente=$fuente.'-'.$noepisodio;
$visible='0';
}
?>
<div class="contenedor">
     <h2>Editar Capitulo</h2>
     
<?='<p>Que hacer= '.$quehacer.' |  Num episodio= '.$noepisodio.'</p>' ?>

<form action="?op=getcap" method="post">
<input name="quehacer" type="hidden" value="<?=$quehacer?>">
<input name="fuentexd" type="hidden" value="<?=$fuente?>">

<!-- tabla -->
<label>Número de Episodio</label>
<input name="noepisodio" type="text" id="noepisodio" value="<?=$noepisodio?>" size="20" /><hr/>
<label>Nombre del Anime</label>
<input name="nombre" type="text" id="nombre" value="<?=@$nombre?>" size="20" /><hr />
<label>URL del Anime <strong>(Importante)</strong></label>
<input name="fuente" type="text" id="fuente" value="<?=$fuente?>" size="20" /><hr />
<label>Código de Anime</label>
<input name="codserie" type="text" id="codserie" value="<?=$codserie?>" size="20" /><hr />
<label>Enlace VK</label>
<input name="vk" type="text" id="vk" value="<?=@$vk?>" size="20" /><hr />
<label>Enlace Videoweed</label>
<input name="Videoweed" type="text" id="Videoweed" value="<?=@$Videoweed?>" size="20" /><hr />
<label>Enlace Nowvideo</label>
<input name="Nowvideo" type="text" id="Nowvideo" value="<?=@$Nowvideo?>" size="20" /><hr />
<label>Enlace Youtube</label>
<input name="youtube" type="text" id="youtube" value="<?=@$youtube?>" size="50" /><hr />
<label>Fecha</label>
<input name="Fecha" type="text" id="Fecha" value="<?php	 	; if(@$Fecha==''){echo date("r", time());}else if(@$Fecha=='0000-00-00'){echo date("r", time());}else{echo @$Fecha;}?>" size="18" /><hr />
<label for="visible">Visible</label>
    <select name="visible" id="visible">
        <option value="0"<? if(@$visible=='0'){echo ' selected="selected"';}?>>No</option>
        <option value="1"<? if(@$visible=='1'){echo 'selected="selected"';}?>>Si</option>
     </select>
<hr />
<label>Mb (No relevante)</label>
<input name="mb" type="text" id="mb" value="<?=@$mb?>" size="10" /><hr />
<input type="submit" name="Submit" value="Enviar" />
<!--tabla -->

</form>
</div>
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