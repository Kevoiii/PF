<?php
$host = "localhost";
$usuario_db = "root";
$clave = "";
$base = "bdproyect"; 

$conexion = new mysqli($host, $usuario_db, $clave, $base);
if ($conexion->connect_error) {
    // Manejo de error de conexión (línea 180 corregida)
    die("Error de conexión a la base de datos: " . $conexion->connect_error); 
}
$conexion->set_charset("utf8");

/* ===== CONSULTA DE PREGUNTAS FRECUENTES (FAQ) ===== */
$sql = "SELECT pregunta, respuesta FROM preguntas_frecuentes ORDER BY id ASC"; 
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preguntas Frecuentes - CBTis 217</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-p1+YzZ8mQOzUp+ElWqXAHZrLhv05H2XhvEz8n+qz9KXLv9yEO4bw3xn+ICy3TlaIW4Z31NeTIB4YfYuCzo/ujg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
        body {
            background-color: #f8f9fa; /* Fondo general más claro */
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* BANNER */
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

        /* NAV - ESTILO RESTAURADO (Bloques multi-línea) */
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
        
        /* CONTENIDO PRINCIPAL Y FAQ STYLING (Se mantiene el estilo que agregué) */
        .contenido {
            max-width: 850px; 
            margin: 30px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .contenido h1 {
            text-align: center;
            color: #5b1a2e; 
            margin-bottom: 30px;
            font-size: 2.2em;
            border-bottom: 3px solid #7d2b44;
            padding-bottom: 10px;
        }

        .faq-item {
            margin-bottom: 25px;
            padding: 15px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .faq-item h2 {
            font-size: 1.2em;
            color: #7d2b44; 
            margin-top: 0;
            margin-bottom: 10px;
            cursor: pointer; 
            padding-left: 5px;
        }

        .faq-item p {
            font-size: 1em;
            color: #333;
            margin-bottom: 0;
            padding: 5px 0 0 5px;
            border-top: 1px dashed #eee; 
            padding-top: 10px;
        }
        
        /* FOOTER */
        footer {
            background-color: #5b1a2e;
            color: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 30px 20px;
            flex-wrap: wrap;
            gap: 30px;
            width: 100%; 
            margin-top: 50px;
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
</head>
<body>

    <div class="banner">
        <img src="img/ChatGPT Image Dec 5, 2025, 08_36_09 AM.png" alt="Banner del proyecto">
        <div class="banner-text">CBTis 217</div>
    </div>

    <nav>
        <a href="principal.php">Inicio</a>
        <a href="practicas.php">Prácticas Seguras <br> de Conducción</a>
        <a href="Cascos.php">Tipos de <br> Cascos</a>
        <a href="Normativa.php">Normativa y <br> Reglamento Vial</a>
        <a href="Accidentes.php">Accidentes en <br> Motocicleta</a>
        <a href="faq.php">Preguntas <br> Frecuentes</a>
        <a href="contacto.php">Contacto</a>
        <a href="loginp.php">Login</a>
        <a href="registrousuarios.php">Registro de <br> Usuarios</a>
    </nav>


    <div class="contenido">
        <h1>Preguntas Frecuentes (FAQ)</h1>
        
        <?php
        if ($resultado->num_rows > 0) {
            $contador = 1;
            while ($fila = $resultado->fetch_assoc()) {
                // Generación dinámica de los ítems del FAQ desde la BD
                echo "<div class='faq-item'>";
                echo "<h2>{$contador}. " . htmlspecialchars($fila['pregunta']) . "</h2>";
                echo "<p>" . nl2br(htmlspecialchars($fila['respuesta'])) . "</p>";
                echo "</div>";
                $contador++;
            }
        } else {
            echo "<p>No hay preguntas frecuentes registradas en la base de datos.</p>";
        }
        $conexion->close();
        ?>

    </div>

    <footer>
        <div class="footer-logo">
            <img src="img/cb.jfif" alt="SEP Logo">
        </div>
        <div class="footer-contact">
            <p><i class="fas fa-home"></i>Av. Tecnológico s/n<br>Loma Linda, Uriangato, Gto</p>
            <p><i class="fas fa-phone"></i>+52-445-458-0516</p>
            <p><i class="fas fa-phone"></i>+52-445-458-4291</p>
        </div>
        <div class="footer-links">
            <p>Enlaces que pueden interesarte:</p>
            <strong>SÍGUENOS</strong>    
            <a href="https://www.facebook.com/cbtis217Oficial/?locale=es_LA" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
        </div>
    </footer>


</body>
</html>