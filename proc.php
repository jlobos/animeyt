<?php	
include 'conexion.php';
include 'config/config.php';
$q=$_POST['q'];
$con=conexion();
$sql="select * from series_anime where nombre LIKE '".$q."%' LIMIT 0 , 5";
$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

 echo '<li class="itemBox odd" role="menuitem"><a class="ui-all ui-state-hover"><div class="th"><img src="'.$urlpath.'imagenes/search.png"></div><div class="ch" id="x0000" title="No hay resultados">No hay resultados</div></a></li>';

}else{


 while($fila=mysql_fetch_array($res)){

  echo '
<li class="itemBox odd" role="menuitem">
<a href="../anime/'.$fila['Url'].'" class="ui-all">
<div class="th">
<img src="'.$urlpaththumb.$fila['thumb'].'.jpg">
</div>
<div class="ch" id="xb6c927" title="'.$fila['Nombre'].'">'.$fila['Nombre'].'</div>
<div class="date" title='.$fila['Nombre_Alternativo'].'">'.$fila['Nombre_Alternativo'].'
</div>
</a>
</li>';
 }

}

?>

