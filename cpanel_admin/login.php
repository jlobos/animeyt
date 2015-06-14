<?
include('../config/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>Panel de Administracion</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="styles/style.css" type="text/css" />
</head>
<body>
<div id="container">
	<div id="content">
		<p>&nbsp;</p>
		<form action="loging.php" method="post" style="margin-top:100px;">
		  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
		  	<tr>
		      <td width="112"></td>
		      <td width="188"><span></span></td>
		    </tr>
			<tr>
			<td><b>Usuario de Administración</b></td>
		      <td><input name="ID" type="text" class="textfield" id="password" /></td>
			  </tr>
		    <tr>
		      <td><b>Contraseña de Administración</b></td>
		      <td><input name="Passwd" type="password" class="textfield" id="password" /></td>
		    </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td><input class="button blue1" type="submit" name="submit" value="Ingresar" style="margin-left:0px;width:80px;height:25px;padding: 3px 0 5px;" /></td>
		    </tr>
		  </table>
		</form>
	</div>
</div><!-- container End -->
</body>
</html>