<?php
header('Content-Type: text/html; charset=UTF-8');

// Buscar msgid  y los muestra en pantalla
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
// Muestra los resultados por pantalla
print_r($resultadoId);

// Copiar archivos y traducirlos mediante ->https://translate.google.com/toolkit/list?hl=es -> guardar resultado en traduciones.txt


$traduccions = file("traducido.txt");
// Renombrar archivo.po y reemplaza las traduciones
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
	// Muestra los resultados por pantalla
	 print_r($mystring);
}
