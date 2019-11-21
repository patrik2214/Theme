<?php
// PDO PHP Data Object
$driver = "pgsql";
$servidor = "localhost";
$basedatos = "mydb";
$usuario = "postgres";
$clave 	 = "123456789";
$cadena = "$driver:host=$servidor;dbname=$basedatos";
$cnx = new PDO($cadena,$usuario,$clave);
?>