<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Normativa y Reglamento Vial</title>
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .banner {
            position: relative;
            width: 100%;
            height: 350px;
        }

        .banner img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            display: block;
        }

        .banner-text {
            position: absolute;
            top: 20px;
            left: 20px;
            color: rgb(236, 228, 228);
            font-size: 40px;
            font-weight: bold;
            text-shadow: 2px 2px 8px black;
        }

        nav {
            background-color: #5b1a2e;
            display: flex;
            padding: 10px 30px;
            align-items: center;
            gap: 30px;
            font-weight: 600;
        }

        nav a {
            color: rgb(238, 232, 232);
            text-decoration: none;
            padding: 6px 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 4px;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #7d2b44;
            color: #fff9f9;
        }

        .contenido {
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }

        p.center {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
        }

        
        footer {
            background-color: #5b1a2e;
            color: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 30px 20px;
            flex-wrap: wrap;
            gap: 30px;
        }

        .footer-logo img {
            width: 120px;
            height: auto;
            object-fit: contain;
        }

        .footer-contact, .footer-links {
            max-width: 300px;
            font-size: 14px;
            line-height: 1.5;
        }

        .footer-contact i, .footer-links i {
            margin-right: 8px;
        }

        .footer-links strong {
            display: block;
            margin-bottom: 10px;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            font-size: 22px;
            vertical-align: middle;
        }

        .footer-links a:hover {
            color: #d6c9b8;
        }
    </style>
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-p1+YzZ8mQOzUp+ElWqXAHZrLhv05H2XhvEz8n+qz9KXLv9yEO4bw3xn+ICy3TlaIW4Z31NeTIB4YfYuCzo/ujg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>

    <div class="banner">
        <img src="img/ChatGPT Image Dec 5, 2025, 08_36_09 AM.png" alt="Banner del proyecto">
        <div class="banner-text">CBTis 217</div>
    </div>

    <nav>
        <a href="principal.html">Inicio</a>
        <a href="practicas.html">Prácticas Seguras de Conducción</a>
        <a href="Cascos.php">Tipos de Cascos</a>
        <a href="Normativa.html">Normativa y Reglamento Vial</a>
        <a href="Accidentes.php">Accidentes en Motocicleta</a>
        <a href="faq.html">Preguntas Frecuentes</a>
        <a href="contacto.html">Contacto</a>
        <a href="loginp.php">Login</a>
        <a href="registrousuarios.php">Registro de Usuarios</a>
    </nav>
<center>
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
</center>
</body>

</html>