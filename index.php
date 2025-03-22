<?php
require_once "config.php";
require_once "Libro.php";
require_once "Biblioteca.php";

// Instanciar la biblioteca y cargar los datos
$biblioteca = new Biblioteca();
$biblioteca->loadData();

// Agregar nuevo libro si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $materia = $_POST['materia'];

    // Crear ID automáticamente
    $nuevoID = count($biblioteca->libros) + 1;

    $nuevoLibro = new Libro($nuevoID, $titulo, $autor, $materia);
    $biblioteca->addBook($nuevoLibro);
    $biblioteca->saveData();

    // Redirigir para evitar reenvío del formulario
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Biblioteca</title>
</head>
<body>
    <h1>Listado de Libros</h1>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Materia</th>
        </tr>
        <?php foreach ($biblioteca->libros as $libro): ?>
        <tr>
            <td><?= $libro->id ?></td>
            <td><?= $libro->titulo ?></td>
            <td><?= $libro->autor ?></td>
            <td><?= $libro->materia ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Agregar Nuevo Libro</h2>
    <form method="post">
        <label>Título:</label><br>
        <input type="text" name="titulo" required><br>

        <label>Autor:</label><br>
        <input type="text" name="autor" required><br>

        <label>Materia:</label><br>
        <input type="text" name="materia" required><br><br>

        <input type="submit" value="Agregar Libro">
    </form>

    <br><a href="busqueda.php">Ir a Búsqueda de Libros</a>
</body>
</html>