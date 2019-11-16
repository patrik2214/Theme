<?php
$driver = "mysql";
$servidor = "localhost";
$base = "mydb";
$usuario = "root";
$clave = "";

$cadena = "$driver:host=$servidor;dbname=$base";
$cnx = new pdo($cadena,$usuario,$clave);
?>