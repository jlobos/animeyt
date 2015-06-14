	<?

	$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
	@mysql_query("SET NAMES 'iso-8859-1'");
	$query = mysql_query("SELECT COUNT(*) as num FROM $SQL_Base.series_anime ORDER BY Nombre",$conwb)   or die(mysql_error());
	$adjacents = 3;
	$total_pages = mysql_fetch_array($query);
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "/cpanel_admin/index.php?op=animes"; 	//your file name  (the name of this file)
	$limit = 25; 								//how many items to show per page
	$page = @$_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
	$sql = mysql_query("SELECT Codigo,Nombre,Url,Categoria FROM $SQL_Base.series_anime ORDER BY Nombre ASC LIMIT $start, $limit",$conwb)   or die(mysql_error());
	$result = @mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "<div style=\"clear: both;\"></div>";
	
		$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"paginacion\"><span class=\"pag\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage&page=$prev\">Anterior</a>";
		else
			$pagination.= "<span class=\"disabled\">Anterior</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"actual\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"actual\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"actual\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"actual\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">Siguiente</a>";
		else
			$pagination.= "<span class=\"disabled\">Siguiente</span>";
		$pagination.= "</div></span>\n";		
	}

?>
<?php	 	;

$Nombre = @$_GET['q'];

if(@$_GET['sa'] == 'Buscar')
{
?>
<div class="contenedor">
     <h2>Resultados para: <?=$Nombre?></h2>
	 
	<div class="lista">
	<?
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
@mysql_query("SET NAMES 'iso-8859-1'");
$queryseriesLast = @mysql_query("SELECT Codigo,Nombre,Url,Categoria FROM $SQL_Base.series_anime WHERE Nombre LIKE '%$Nombre%' ORDER BY Nombre ",$conwb)   or die(mysql_error());
while ($growsLast = @mysql_fetch_array($queryseriesLast)){
if (strlen($growsLast['Nombre']) >=45){$puntos='...';}else{$puntos='';}
$categoriax=str_replace(' ','',strtolower($growsLast['Categoria']));
if($categoriax=='ova'){$classx='ova2';}
if($categoriax=='anime'){$classx='anime1';}
?>
<div><span><?=substr($growsLast['Nombre'],0,45).$puntos?></span><span style="float: right;"><a href="?op=episodiox&id=<?=$growsLast['Codigo']?>"><img src="./images/agregar_capitulo.png"></a> <a href="?op=episodios&id=<?=$growsLast['Codigo']?>"><img src="./images/capitulos.png"></a> <a href="?op=anime&id=<?=$growsLast['Codigo']?>"><img src="./images/editar.png"></a> <a href="?op=borrarseriex&id=<?=$growsLast['Codigo']?>"><img src="./images/eliminar.png"></span></a></div> <? } ?>	</div>
</div>
<?php	 	; }else{ ?>

<div class="contenedor">
<?=$pagination?>
</div>

<div class="contenedor">
     <h2>Listado de animes</h2>
	 
	<div class="lista">

	<?php	 	;
		while($growsLast = mysql_fetch_array($sql))
		{
		if (strlen($growsLast['Nombre']) >=45){$puntos='...';}else{$puntos='';}
		$categoriax=str_replace(' ','',strtolower($growsLast['Categoria']));
		if($categoriax=='ova'){$classx='ova2';}
		if($categoriax=='anime'){$classx='anime1';}
	?>
<div>
<span><?=substr($growsLast['Nombre'],0,45).$puntos?></span>
    <span style="float: right;">
        <a href="?op=episodiox&id=<?=$growsLast['Codigo']?>">Add<img src="./images/agregar_capitulo.png"></a>
        <a href="?op=episodios&id=<?=$growsLast['Codigo']?>">List<img src="./images/capitulos.png"></a>
        <a href="?op=anime&id=<?=$growsLast['Codigo']?>">Edit<img src="./images/editar.png"></a>
        <a href="?op=borrarseriex&id=<?=$growsLast['Codigo']?>">Del<img src="./images/eliminar.png"></a>
    </span>
</div>
	<?php	 	;
		}
	?>
</div>
</div>
<div class="contenedor">
<?=$pagination?>
</div>
<?php	 	; } ?>




