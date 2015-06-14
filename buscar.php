<?php
$string=$_POST['q'];

include('config/config.php');
header("Location: ".$urlpath."buscar/".urlencode($string)."");
?>