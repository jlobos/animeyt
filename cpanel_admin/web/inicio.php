<div class="contenedor">

     <h2>Ultimos Episodios Agregados</h2>
	 
	<div class="lista">
<?
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
@mysql_query("SET NAMES 'iso-8859-1'");
$queryseriesLast = @mysql_query("SELECT 
series_anime.Nombre,
series_anime.Codigo,
series_anime.Categoria,
episodios_anime.CodSerie,
episodios_anime.NumEpisodio,
episodios_anime.CodEpisodio,
episodios_anime.Fuente,
UNIX_TIMESTAMP(episodios_anime.Fecha) as Fecha
FROM $SQL_Base.series_anime INNER JOIN $SQL_Base.episodios_anime ON $SQL_Base.series_anime.Codigo=$SQL_Base.episodios_anime.CodSerie AND $SQL_Base.episodios_anime.Visible='1' ORDER BY CodEpisodio DESC LIMIT 20 ",$conwb)   or die(mysql_error());
while ($growsLast = @mysql_fetch_array($queryseriesLast)){
if (strlen($growsLast['Nombre']) >=45){$puntos='...';}else{$puntos='';}
$categoriax=str_replace(' ','',strtolower($growsLast['Categoria']));
if($categoriax=='ova'){$classx='ova2';}
if($categoriax=='anime'){$classx='anime1';}
?>
<div><span><?=substr($growsLast['Nombre'],0,45).$puntos?> <?=substr($growsLast['NumEpisodio'],0,45).$puntos?></span><span style="float: right;"><a href="?op=episodiox&id=<?=$growsLast['Fuente']?>"><img src="./images/editar.png"></a> <a href="?op=videoborrar&id=<?=$growsLast['CodEpisodio']?>"><img src="./images/eliminar.png"></a></span></div> <? } ?>
</div>
</div>

<center><a href="?op=animes" class="btn btn-large btn-primary">Ir a la lista completa de animes</a><br><br></center>

<div class="contenedor">
     <h2>Animes en Emisión</h2>
	 
	<div class="lista">
	<?
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
@mysql_query("SET NAMES 'iso-8859-1'");
$queryseriesLast = @mysql_query("SELECT Codigo,Nombre,Url,Categoria FROM $SQL_Base.series_anime WHERE estado = 1 ORDER BY Nombre ",$conwb)   or die(mysql_error());
while ($growsLast = @mysql_fetch_array($queryseriesLast)){
if (strlen($growsLast['Nombre']) >=45){$puntos='...';}else{$puntos='';}
$categoriax=str_replace(' ','',strtolower($growsLast['Categoria']));
if($categoriax=='ova'){$classx='ova2';}
if($categoriax=='anime'){$classx='anime1';}
?>
<div><span><?=substr($growsLast['Nombre'],0,45).$puntos?></span><span style="float: right;"><a href="?op=episodiox&id=<?=$growsLast['Codigo']?>"><img src="./images/agregar_capitulo.png"></a> <a href="?op=episodios&id=<?=$growsLast['Codigo']?>"><img src="./images/capitulos.png"></a> <a href="?op=anime&id=<?=$growsLast['Codigo']?>"><img src="./images/editar.png"></a> <a href="?op=borrarseriex&id=<?=$growsLast['Codigo']?>"><img src="./images/eliminar.png"></span></a></div> <? } ?>	</div>
</div>

<center><a href="?op=animes" class="btn btn-large btn-primary">Ir a la lista completa de animes</a><br><br></center>