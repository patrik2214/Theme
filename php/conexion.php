<?php
// PDO PHP Data Object
$driver = "mysql";
$servidor = "localhost";
$basedatos = "db_shart";
$usuario = "root";
$clave 	 = "";
$cadena = "$driver:host=$servidor;dbname=$basedatos";
$cnx = new PDO($cadena,$usuario,$clave);
?>