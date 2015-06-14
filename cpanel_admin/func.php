<?
function clean_var($var=NULL) {
if(preg_match('/[A-Za-z0-9 ]/',$var)){
$newvar = preg_replace('/[(\)\[\]\/\"\·\$\%\&\=\?\¿\<\>\'\!\¡\*\+\{\}\#\,\:\;\s]/', '', $var);
return $newvar;}
}
function cut_str($str, $left, $right) {
	$str = substr ( stristr ( $str, $left ), strlen ( $left ) );
	$leftLen = strlen ( stristr ( $str, $right ) );
	$leftLen = $leftLen ? - ($leftLen) : strlen ( $str );
	$str = substr ( $str, 0, $leftLen );
	return $str;
}
?>