<?php
// PDO PHP Data Object
$driver = "pgsql";
$servidor = "localhost";
$basedatos = "mydb";
$usuario = "postgres";
$clave 	 = "123456789";
$puerto = "5432";
$cadena = "$driver:host=$servidor;port=$puerto;dbname=$basedatos";
$cnx = new PDO($cadena,$usuario,$clave);
?>