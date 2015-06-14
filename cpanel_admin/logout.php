<?PHP
session_start();
if ((isset($_SESSION['IdHarry'])) && (isset($_SESSION['PassHarry']))) {
$id = $_SESSION['IdHarry'];
$pwd = $_SESSION['PassHarry'];
unset($_SESSION['IdHarry']);
unset($_SESSION['PassHarry']);
session_destroy();
if ((eregi("[^a-zA-Z0-9_-]", $id)) || (eregi("[^a-zA-Z0-9_-]", $pwd)))
	{
	die("SQL injection detected");
	}
}
echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=../">';
?>