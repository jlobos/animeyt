<?php

function conexion(){

 $con = @mysql_connect("localhost","animeyt","ZnYqGAerHrT8L3qW");
@mysql_select_db("animeyt", $con);

 if (!$con){

  die('Could not connect: ' . mysql_error());
 }

 @mysql_select_db("animeyt", $con);

 return($con);

}

?>