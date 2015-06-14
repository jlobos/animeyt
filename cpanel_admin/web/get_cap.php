<?
@session_start();
@include('../../config/config.php');
@include('../../func.php');
if (  isset($_SESSION['IdHarry']) && isset($_SESSION['PassHarry']) ){
$conwb = @mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);

if ($_POST['quehacer']=='agregar'){
//die('lalala');
			
			
$epibackup=@mysql_query("Select CodEpisodio from $SQL_Base.episodios_anime WHERE Fuente='".$_POST['fuentexd']."' ",$conwb) or die(mysql_error());
if(mysql_num_rows($epibackup)>0){
	die('ya existe este episodio');	
}

$timeunix = time();
$time = date("Y-m-d H:i:s",$timeunix);
mysql_query("INSERT INTO $SQL_Base.episodios_anime SET 
CodSerie='".$_POST['codserie']."',
Visible='".$_POST['visible']."',
NumEpisodio='".$_POST['noepisodio']."',
Nombre='".$_POST['nombre']."',
Fuente='".$_POST['fuente']."',
Fecha='".$_POST['Fecha']."',
Mb='".$_POST['mb']."',
Videoweed='".($_POST['Videoweed'])."',
Nowvideo='".($_POST['Nowvideo'])."',
VK='".($_POST['vk'])."'
", $conwb) or die(mysql_error());
			if(@$_POST['feedfb']=='ok'){
				$animeinfo=@mysql_query("Select Estado,Nombre,Url,Imagen from $SQL_Base.series_anime WHERE Codigo='".$_POST['codserie']."';",$conwb) or die(mysql_error());
				
				//if(@mysql_result($animeinfo,0,'Estado')=='1'){
				$fjanime=@mysql_result($animeinfo,0,'Nombre');
				$fjepisodio=$_POST['noepisodio'];
				$fjanimeurl=@mysql_result($animeinfo,0,'Url');
				$fjanimeimg=@mysql_result($animeinfo,0,'Imagen');
				include('../../fjupdatestatus.php');

				//}
			}
			
		/*echo'
		<script language=javascript>
		<!--
		window.alert("Video agregado correctamente")
		location = \'index.php\';
		//-->
		</script>';*/
		echo '<script language=javascript>
<!--
window.alert("Video agregado correctamente")
location = \'index.php?op=episodios&id='.$_POST['codserie'].'\';
//-->
</script>';
		}else{

		
mysql_query("UPDATE $SQL_Base.episodios_anime SET 
CodSerie='".$_POST['codserie']."',
Visible='".$_POST['visible']."',
NumEpisodio='".$_POST['noepisodio']."',
Nombre='".$_POST['nombre']."',
Fuente='".$_POST['fuente']."',
Fecha='".$_POST['Fecha']."',
Mb='".$_POST['mb']."',
Videoweed='".($_POST['Videoweed'])."',
Nowvideo='".($_POST['Nowvideo'])."',
VK='".($_POST['vk'])."' WHERE Fuente='".$_POST['fuentexd']."' ", $conwb) or die(mysql_error());
		

			if($_POST['feedfb']=='ok'){
				$animeinfo=@mysql_query("Select Estado,Nombre,Url,Imagen from $SQL_Base.series_anime WHERE Codigo='".$_POST['codserie']."';",$conwb) or die(mysql_error());
				
				//if(@mysql_result($animeinfo,0,'Estado')=='1'){
				$fjanime=@mysql_result($animeinfo,0,'Nombre');
				$fjepisodio=$_POST['noepisodio'];
				$fjanimeurl=@mysql_result($animeinfo,0,'Url');
				$fjanimeimg=@mysql_result($animeinfo,0,'Imagen');
				include('../../fjupdatestatus.php');

				//}
			}
			
		/*echo'
		<script language=javascript>
		<!--
		window.alert("Haz editado correctamente a el video")
		location = \'index.php\';
		//-->
		</script>';*/
		echo '<script language=javascript>
<!--
window.alert("Video editado correctamente")
location = \'index.php?op=episodios&id='.$_POST['codserie'].'\';
//-->
</script>';
	}

?>

<?
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