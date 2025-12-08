<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Accidentes en Motocicletas</title>
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
$sql = "SELECT id, fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad FROM accidentes";
$resultado = $conexion->query($sql);
if (!$resultado) {
die("Error en la consulta SQL: " . $conexion->error);
}
?>
<h1>Accidentes en Motocicletas</h1>
<?php
if ($resultado->num_rows > 0) {
echo "<table>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>fecha</th>";
echo "<th>lugar</th>";
echo "<th>descripcion</th>";
echo "<th>causa</th>";
echo "<th>lesionados</th>";
echo "<th>uso_casco</th>";
echo "<th>nivel_gravedad</th>";
echo "</tr>";
while($fila = $resultado->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $fila["id"] . "</td>";
echo "<td>" . $fila["fecha"] . "</td>";
echo "<td>" . $fila["lugar"] . "</td>";
echo "<td>" . $fila["descripcion"] . "</td>";
echo "<td>" . $fila["causa"] . "</td>";
echo "<td>" . $fila["lesionados"] . "</td>";
echo "<td>" . $fila["uso_casco"] . "</td>";
echo "<td>" . $fila["nivel_gravedad"] . "</td>";
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