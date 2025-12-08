<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Cascos para Motocicletas</title>
</head>
<body>
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
<h1>CASCOS CON NORMATIVAS</h1>
<?php
if ($resultado->num_rows > 0) {
echo "<table>";
echo "<tr>";
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