 <?php
        $servername = "localhost";
        $username_db = "root";  
        $password_db = "";        
        $dbname = "bdproyect";      
        $pagina_destino = "cascos2.php";
        $mensaje_resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_ingresado = $_POST['username'];
    $clave_ingresada = $_POST['pass'];
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);
    if ($conn->connect_error) {
        $mensaje_resultado = "Error de conexión a la DB: " . $conn->connect_error;
    } else {
        $sql = "SELECT pass FROM login WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario_ingresado);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $clave_db = $row['pass'];
            if ($clave_ingresada == $clave_db) {
                ob_clean();
                header("Location: $pagina_destino");
                exit();
            } else {
                $mensaje_resultado = "<p style='color: red;'>❌ Contraseña incorrecta.</p>";
            }
        } else {
            $mensaje_resultado = "<p style='color: red;'>❌ Usuario NO encontrado.</p>";
        }
        $stmt->close();
        $conn->close();
    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CBTis 217</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-p1+YzZ8mQOzUp+ElWqXAHZrLhv05H2XhvEz8n+qz9KXLv9yEO4bw3xn+ICy3TlaIW4Z31NeTIB4YfYuCzo/ujg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* Estilos del Banner */
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

        /* Estilos de la Barra de Navegación */
        nav {
            background-color: #5b1a2e; /* Color de fondo vino/borgoña */
            display: flex;             /* Usa Flexbox para alinear elementos horizontalmente */
            padding: 10px 30px;        /* Espaciado interno superior/inferior y a los lados */
            align-items: center;       /* Centra verticalmente los elementos */
            gap: 30px;                 /* Espacio entre los enlaces */
            font-weight: 600;          /* Grosor de la fuente */
        }

        nav a {
            color: rgb(238, 232, 232); /* Color del texto (casi blanco) */
            text-decoration: none;     /* Quita el subrayado de los enlaces */
            padding: 6px 8px;          /* Espaciado interno para hacer clic más fácil */
            transition: background-color 0.3s ease, color 0.3s ease; /* Transición suave para el hover */
            border-radius: 4px;        /* Esquinas ligeramente redondeadas */
            font-size: 16px;
        }

        nav a:hover {
            background-color: #7d2b44; /* Fondo más oscuro al pasar el ratón */
            color: #fff9f9;            /* Texto más blanco/claro */
        }
        
        /* Estilos del Contenido Principal (donde irá el formulario de Login) */
        .contenido {
            max-width: 400px; /* Reducido para un formulario */
            margin: 50px auto; /* Centrado y con margen superior */
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Estilos específicos para el formulario de Login */
        .contenido h2 {
            color: #5b1a2e;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Asegura que padding no afecte el ancho total */
        }

        .btn-login {
            background-color: #5b1a2e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #7d2b44;
        }

        /* Estilos del Footer */
        footer {
            background-color: #5b1a2e;
            color: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 30px 20px;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 50px; /* Separación del contenido principal */
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
    <hr>
    
    <div class="contenido">
        <h2>Iniciar Sesión</h2>
        
       

        <form action="loginp.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="pass" required>
            </div>
            
            <button type="submit" class="btn-login">Acceder</button>
            
            <p style="margin-top: 15px; font-size: 14px;">
                ¿No tienes cuenta? <a href="registrousuarios.php" style="color: #5b1a2e; text-decoration: none; font-weight: bold;">Regístrate aquí</a>.
            </p>
        </form>
    </div>
    
    <footer>
        <div class="footer-logo">
            <img src="img/logo-ejemplo.png" alt="Logo">
        </div>

        <div class="footer-contact">
            <strong>Contacto</strong>
            <p><i class="fas fa-map-marker-alt"></i> Dirección de ejemplo, Ciudad, País</p>
            <p><i class="fas fa-phone"></i> +52 123 456 7890</p>
            <p><i class="fas fa-envelope"></i> info@cbtis217.edu.mx</p>
        </div>

        <div class="footer-links">
            <strong>Síguenos</strong>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

</body>
</html>