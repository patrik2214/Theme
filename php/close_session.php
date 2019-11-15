<?php
session_start();
if(isset($_SESSION['idusuario'])){
    $_SESSION = array();
    session_destroy();
    header("location:../html/login.php");
}
?>