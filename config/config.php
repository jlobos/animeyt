<?php	
// Detalles base de datos
$userbd = 'animeyt';
$passbd = 'ZnYqGAerHrT8L3qW';
$sqlbd = 'animeyt';
$hostbd = 'localhost';
// fint detalles de base de datos

// configuracion
$pagina = 'http://localhost/animeyt/';
// $pagina = 'http://escueladigital.pe/animeyt/';
$anime_titulo = 'Anime YT';
$facebook = 'https://www.facebook.com/AnimeYT';
$twitter = 'http://www.twitter.com';
$fj_repro_width='773px';
$fj_repro_heigh='463px';
// configuracion


 	
$extension='no';
$imgremota='si';



if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='escueladigital.pe'){
$SQL_Host= $hostbd;
$SQL_Base= $sqlbd;
$SQL_User= $userbd;
$SQL_Pass= $passbd;
}else{
$SQL_Host= $hostbd;
$SQL_Base= $sqlbd;
$SQL_User= $userbd;
$SQL_Pass= $passbd;
}


if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='escueladigital.pe'){
$fj_face_url = $facebook;
$fj_twitter_url= $twitter;
$titulito = $anime_titulo; // Titulo
$urlpath = $pagina;
$urlpathportadas='http://cdn.animeflv.net/img/portada/'; //Path de imagenes portada estatico
$urlpathmini='http://cdn.animeflv.net/img/mini/'; //Path de imagenes portada estatico
$urlpaththumb='http://cdn.animeflv.net/img/portada/thumb/'; //Path de imagenes portada estatico
$imgremota='no';
$logopath='logo';
$videolinkfj = $titulito;
}else{
$fj_face_url='https://www.facebook.com/animedroide';
$fj_twitter_url='http://www.twitter.com/animedroide';
$titulito = $anime_titulo; // Titulo
$urlpath = $pagina;
$urlpathportadas='http://animedroide.com/cdn/';
$logopath='logo';
}

?>