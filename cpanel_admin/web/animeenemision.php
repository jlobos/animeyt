<div class="contenedor">
<a href="?op=anime" class="botonx" style="float: right; margin-left: 5px; margin-bottom: 0px;"><span class="agregar">Agregar un Anime</span></a>
<div class="paginacion"><span class="pag"><span class="actual">1</span><a href="?op=animes&pg=2">2</a><a href="?op=animes&pg=3">3</a><a href="?op=animes&pg=4">4</a><a href="?op=animes&pg=5">5</a><a href="?op=animes&pg=6">6</a><a href="?op=animes&pg=7">7</a><a href="?op=animes&pg=8">8</a><a href="?op=animes&pg=9">9</a><a href="?op=animes&pg=10">10</a><a href="?op=animes&pg=11">11 - 21</a><a href="?op=animes&pg=2">Siguiente</a><a href="?op=animes&pg=31">Ultima</a>
        </span></div></div>

<div class="contenedor">
     <h2>Lista de Animes en Emisión</h2>

<div class="lista">
	<?
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
@mysql_query("SET NAMES 'utf8'");
$queryseriesLast = @mysql_query("SELECT Codigo,Nombre,Url,Categoria FROM $SQL_Base.series_anime WHERE Estado='1' ORDER BY Nombre ",$conwb)   or die(mysql_error());
while ($growsLast = @mysql_fetch_array($queryseriesLast)){
if (strlen($growsLast['Nombre']) >=45){$puntos='...';}else{$puntos='';}
$categoriax=str_replace(' ','',strtolower($growsLast['Categoria']));
if($categoriax=='ova'){$classx='ova2';}
if($categoriax=='anime'){$classx='anime1';}
?>
<div><span><?=substr($growsLast['Nombre'],0,45).$puntos?></span><span style="float: right;"><a href="?op=episodiox&id=<?=$growsLast['Codigo']?>"><img src="./images/agregar_capitulo.png"></a> <a href="?op=episodios&id=<?=$growsLast['Codigo']?>"><img src="./images/capitulos.png"></a> <a href="?op=anime&id=<?=$growsLast['Codigo']?>"><img src="./images/editar.png"></a> <a href="?op=borrarseriex&id=<?=$growsLast['Codigo']?>"><img src="./images/eliminar.png"></span></a></div> <? } ?>	</div>
</div>

<div class="contenedor"><div class="paginacion"><span class="pag"><span class="actual">1</span><a href="?op=animes&pg=2">2</a><a href="?op=animes&pg=3">3</a><a href="?op=animes&pg=4">4</a><a href="?op=animes&pg=5">5</a><a href="?op=animes&pg=6">6</a><a href="?op=animes&pg=7">7</a><a href="?op=animes&pg=8">8</a><a href="?op=animes&pg=9">9</a><a href="?op=animes&pg=10">10</a><a href="?op=animes&pg=11">11 - 21</a><a href="?op=animes&pg=2">Siguiente</a><a href="?op=animes&pg=31">Ultima</a>
        </span></div></div>