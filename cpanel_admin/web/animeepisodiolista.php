<?
@include('../../config/config.php');
@include('../../func.php');
if (  isset($_SESSION['IdHarry']) && isset($_SESSION['PassHarry']) ){
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
@mysql_query("SET NAMES 'utf8'");
$serieinfo = mysql_query("SELECT Nombre,Codigo,Categoria FROM $SQL_Base.series_anime Where Codigo='".$_GET['id']."' limit 1", $conwb) or die(mysql_error());
$codseriexd = mysql_result($serieinfo,0,'Codigo');
if($codseriexd==''){die('no se encontro el anime');}
$queryseriesLast = @mysql_query("SELECT *, IF(NumEpisodio REGEXP '^[[:alpha:]]',NumEpisodio,LPAD(FORMAT(NumEpisodio,4),10,'0')) AS scene_sort FROM $SQL_Base.episodios_anime Where CodSerie='$codseriexd' ORDER BY scene_sort DESC;",$conwb)   or die(mysql_error());
@$titulo='Lista de Episodios de '.mysql_result($serieinfo,0,'Nombre').' | '.$titulo;
?>
<div class="contenedor">
<h2><?=mysql_result($serieinfo,0,'Categoria')?>: <font color="black"><?=mysql_result($serieinfo,0,'Nombre')?></font> | Listado de Episodios | <a href="?op=episodiox&id=<?=mysql_result($serieinfo,0,'Codigo')?>" style="color:#FFFFFF">Agregar Episodio +</a></h2>
         
<div class="lista">
<?
while ($growsLast = @mysql_fetch_array($queryseriesLast)){
?>
<div>
    <span><?=mysql_result($serieinfo,0,'Nombre')?> <?=$growsLast['NumEpisodio']?></span>
    <span style="float: right;">
    <a href="?op=episodiox&id=<?=$growsLast['Fuente']?>"><img src="./images/editar.png"></a>
    <a href="?op=videoborrar&id=<?=$growsLast['CodEpisodio']?>"><img src="./images/eliminar.png"></a>
    </span>
</div>
<? } ?>
</div>

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