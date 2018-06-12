<?php
header('Content-Type: text/html; charset=UTF-8');
define('BASE_DIR','C:/AppServ/www/po/');

/* buscar msgid  y los muestra en pantalla */
$array = file("en_EN.po");
foreach ($array as $mystring){
	$buscar = 'msgid "';
	$pos = strpos($mystring, $buscar);
	if ($pos!==FAlSE) {
		$remplazado = str_replace("msgid ", "", $mystring);
		$resultadoId .= $remplazado;
	 }
}
echo '<pre>';
print_r($resultadoId);

/* copiar archivos y traducirlos mediante ->https://translate.google.com/toolkit/list?hl=es -> guardar resultado en traduciones.txt*/


/* Ficheri traducciones */
$traduccions = file("traducido.txt");
/* Renombrar archivo.po y reemplaza las traduciuones traduciones */
$array = file("ca_CA.po");
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
	 // print_r($mystring);
}
