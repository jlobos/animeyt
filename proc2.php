<?php

include 'conexion.php';

$codigo=$_POST['vcod'];
$con=conexion();

$sql="select * from series_anime where Codigo='".$codigo."'";
$res=mysql_query($sql,$con);

if(mysql_num_rows($res)==0){

 echo '<b>No hay dato</b>';

}else{

 $fila=mysql_fetch_array($res);

 echo '<table border="1">';
 echo '<tr>';
 echo '<th>Codigo</th>';
 echo '<th>Nombre</th>';
 echo '</tr>';

 echo '<tr>';
 echo '<th>'.$fila['Codigo'].'</th>';
 echo '<th>'.$fila['Nombre'].'</th>';
 echo '</tr>';

 echo '</table>';

}

?>