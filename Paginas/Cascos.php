<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Cascos para Motocicletas</title>
</head>
<body>
<div style="white-space: nowrap; overflow-x;">
        <nav style="display: inline-block;">
            <a href="principal.html">Inicio</a> |
            <a href="Vista_2.html">Prácticas Seguras de Conducción</a> |
            <a href="Cascos.php">Tipos de Cascos</a> |
            <a href="Normativa.html">Normativa y Reglamento Vial</a> |
            <a href="Accidentes.php">Accidentes en Motocicleta</a> |
            <a href="--">Preguntas Frecuentes</a> |
            <a href="">Contacto</a> |
            <a href="loginp.php">Login</a> |
            <a href="">Registro de Usuarios</a>
        </nav>
    </div>
<?php
$host = "localhost";
$usuario_db = "root";
$clave = "";
$base = "BDPROYECT";
$conexion = new mysqli($host, $usuario_db, $clave, $base);
if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
$sql = "SELECT id, marca, modelo, tipo, certificado, descripcion, pecio_aprox, fecha_registro FROM cascos";
$resultado = $conexion->query($sql);
if (!$resultado) {
die("Error en la consulta SQL: " . $conexion->error);
}
?>
<h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">CASCOS CON NORMATIVA</h1>
<body style="background-color: beige;">
<?php
if ($resultado->num_rows > 0) {
echo "<table>";
echo "<table border='1'>";
echo "<th>id</th>";
echo "<th>marca</th>";
echo "<th>modelo</th>";
echo "<th>tipo</th>";
echo "<th>certificado</th>";
echo "<th>descripcion</th>";
echo "<th>pecio_aprox</th>";
echo "<th>fecha_registro</th>";
echo "</tr>";
while($fila = $resultado->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $fila["id"] . "</td>";
echo "<td>" . $fila["marca"] . "</td>";
echo "<td>" . $fila["modelo"] . "</td>";
echo "<td>" . $fila["tipo"] . "</td>";
echo "<td>" . $fila["certificado"] . "</td>";
echo "<td>" . $fila["descripcion"] . "</td>";
echo "<td>" . $fila["pecio_aprox"] . "</td>";
echo "<td>" . $fila["fecha_registro"] . "</td>";
echo "</tr>";
}
echo "</table>";
} else {
echo "No se encontraron resultados.";
}
$conexion->close();
?>
</body>
</html>