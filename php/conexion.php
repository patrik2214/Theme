<?php
// PDO PHP Data Object
$driver = "pgsql";
$servidor = "localhost";
$basedatos = "mydb";
$usuario = "postgres";
$clave 	 = "USAT2019";
$puerto = "5432";
$cadena = "$driver:host=$servidor;port=$puerto;dbname=$basedatos";
$cnx = new PDO($cadena,$usuario,$clave);
?>