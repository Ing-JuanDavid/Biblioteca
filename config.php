<?php
require_once "Biblioteca.php";
$Biblioteca = new Biblioteca();
$Biblioteca->loadData();

define('ARCHIVO_LIBROS', 'data/libros.txt');
define('ARCHIVO_USUARIOS', 'data/usuarios.txt');
define('ARCHIVO_PRESTAMOS', 'data/prestamos.txt');

// Asegurar que la carpeta 'data' exista
if (!file_exists('data')) {
    mkdir('data', 0777, true);
}
?>