<html lang="es">
<head>
<meta charset="UTF-8">

<title>Lista de Cascos para Motocicletas</title>

</head>
<body>
<body style="background-color: #800020;"> 
    <center>
    <header>
        <h1 style="font-size: 45px; margin-bottom: 0; color: white;">RINOS EN MOVIMIENTOS</h1> 
        <h2 style="font-size: 28px; margin-top: 5px; color: white;">Responsabilidad Sobre Ruedas</h2>
    </header>
    </center>
    <img src="img/ChatGPT Image Dec 5, 2025, 08_36_09 AM.png" alt="Banner del proyecto" width="100%" height="350">
    <hr style="border-color:white;">
    <div style="white-space: nowrap; overflow-x: auto; border: 2px solid white; padding: 10px; background-color: black;">
        <nav style="display: inline-block; color: aliceblue;">
            <a style="color: white;" href="principal.html">Inicio</a> |
            <a style="color: white;" href="practicas.html">Prácticas Seguras de Conducción</a> |
            <a style="color: white;" href="Cascos.php">Tipos de Cascos</a> |
            <a style="color: white;" href="Normativa.html">Normativa y Reglamento Vial</a> |
            <a style="color: white;" href="Accidentes.php">Accidentes en Motocicleta</a> |
            <a style="color: white;" href="faq.html">Preguntas Frecuentes</a> |
            <a style="color: white;" href="contacto.html">Contacto</a> |
            <a style="color: white;" href="loginp.php">Login</a> |
            <a style="color: white;" href="registrousuarios.html">Registro de Usuarios</a>
        </nav>
    </div>
<?php
$host = "localhost";
$usuario_db = "root";
$clave = "";
$base = "bdproyect";
$conexion = new mysqli($host, $usuario_db, $clave, $base);
if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");
$sql = "SELECT id, marca, modelo, tipo, certificado, descripcion, pecio_aprox, fecha_registro, imagen FROM cascos";
$resultado = $conexion->query($sql);
if (!$resultado) {
die("Error en la consulta SQL: " . $conexion->error);
}
?>

<center> 
</center>

<h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">CASCOS CON NORMATIVA</h1>
<body style="background-color: beige;">
<?php
if ($resultado->num_rows > 0) {
    echo "<table border='1' style='margin: 0 auto; width: 80%; background-color: white;'>";
  
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>marca</th>";
    echo "<th>modelo</th>";
    echo "<th>tipo</th>";
    echo "<th>certificado</th>";
    echo "<th>descripcion</th>";
    echo "<th>pecio_aprox</th>";
    echo "<th>fecha_registro</th>";
    echo "<th>imagen</th>";
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
        echo "<td><img src='".$fila["imagen"] ."'width='100'></td>";
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