<?php
header('Content-Type: text/html; charset=UTF-8');
define('BASE_DIR','C:/AppServ/www/po/');

/* buscar msgid  */
$array = file("original_en_EN.po");
foreach ($array as $mystring){
	$buscar = 'msgid "';
	$pos = strpos($mystring, $buscar);
	if ($pos!==FAlSE) {
		$remplazado = str_replace("msgid ", "", $mystring);
		$resultadoId .= $remplazado;
	 }
}
echo '<pre>';
// print_r($resultadoId);



/* array traduciones */
$traduccions = file("traducido.txt");
/* remplazar traduciones */
$array = file("traducido_es_ES.po");
$i = 0;
$p= 0;
foreach ($array as $mystring){
	$replaceOriginal = array("msgstr[0]", "msgstr[1]");
	$replaceFinal = array ("msgstr", "");
	$mystring = str_replace($replaceOriginal, $replaceFinal, $mystring);

	$buscar = 'msgstr "';
	$plural = 'msgid_';
	$pos = strpos($mystring, $buscar);
	$plural = strpos($mystring, $plural);
	if ($plural!==FAlSE) {
		$mystring = '';
	}
	if ($pos!==FAlSE) {
		$traduccio = $traduccions[$i];
		$mystring = 'msgstr '.$traduccio.'';
		$i++;
	}
	 print_r($mystring);
}
