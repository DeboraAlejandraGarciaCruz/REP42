<?php
session_start();
session_destroy();

header('location:consultar_libros.php');
?>