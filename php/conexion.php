<?php
// PDO PHP Data Object
$driver = "pgsql";
$servidor = "localhost";
$basedatos = "mydb";
$usuario = "root";
$clave 	 = "";
$cadena = "$driver:host=$servidor;dbname=$basedatos";
$cnx = new PDO($cadena,$usuario,$clave);
?>