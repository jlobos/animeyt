<?php	 	
session_start();

if($_SERVER['HTTP_HOST']=='animedroide.com'){
$f_user='admin';
$f_clave='nociencia1';
}

//REQURL
if (isset($_SESSION['requrl'])) {
		$requrl = $_SESSION['requrl'];
} 
if (isset($_GET['requrl'])) {
		$requrl = $_GET['requrl'];
		$_SESSION['requrl'] = $_GET['requrl'];
}
include('../config/config.php');
include('func.php');
//if(mysql_connect($SQL_Host,$SQL_User,$SQL_Pass)){ 
if ((isset($_SESSION['IdHarry'])) && (isset($_SESSION['PassHarry']))){
echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=">';
}
if (clean_var($_POST['ID']) == NULL){
//echo $requrl;
echo "
<script language=javascript>
<!--
window.alert('Ingrese su Usuario')
history.back()
//-->
</script>
";
}else{
	if (clean_var($_POST['Passwd']) == NULL){
	echo "
	<script language=javascript>
	<!--
	window.alert('Ingrese su contraseña')
	history.back()
	//-->
	</script>
	";
	}else{
	$accountid = clean_var($_POST['ID']);
	$passwordid = clean_var($_POST['Passwd']);
	/*$coxwb = mysql_connect($SQL_Host,$SQL_User,$SQL_Pass);
	mysql_select_db($SQL_Base, $coxwb);
	if (! $conn)
	{
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=errordb.php">';
	die;
	}
	$logid = mysql_query("SELECT Id FROM user Where Id='$accountid' and Authority>='1'", $conn);
	$logid_result = mysql_num_rows($logid);*/
	if($accountid==$f_user && $passwordid==$f_clave){$logid_result='1';$loginpass_result='1';}else{$logid_result='0';$loginpass_result='0';}
		if ($logid_result == 0 && $loginpass_result == 0){
		echo "
		<script language=javascript>
		<!--
		window.alert('Error!')
		history.back()
		//-->
		</script>
		";
		}else{

				if ($loginpass_result == 1) {
				$_SESSION['IdHarry'] = $accountid;
				$_SESSION['PassHarry'] = $passwordid;
				/*$_SESSION['IdHarry'] = mysql_result($loginpass,0,Id);
				$_SESSION['PassHarry'] = mysql_result($loginpass,0,Password);*/
				//echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=">';
				if($requrl==''){$requrl='index.php';}
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=\''.$requrl.'\'">';
				}

		}
	}
}

/*}else{
echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=?f=3&category=user&act=errordb">';
die;}*/

?>



