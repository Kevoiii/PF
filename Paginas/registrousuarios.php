<?php
$mensaje_resultado = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $conection = new mysqli("localhost", "root", "", "bdproyect");

    if ($conection->connect_error) {
        $mensaje_resultado = "<p class='error'>❌ Error de conexión</p>";
    } else {
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $check = $conection->prepare("SELECT username FROM login WHERE username=?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $mensaje_resultado = "<p class='error'>❌ El usuario ya existe</p>";
        } else {
            $insert = $conection->prepare("INSERT INTO login (username, pass) VALUES (?,?)");
            $insert->bind_param("ss", $username, $pass);
            $insert->execute();
            $mensaje_resultado = "<p class='success'>✅ Usuario registrado correctamente</p>";
        }
        $conection->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        /* ===== BANNER ===== */
        .banner {
            position: relative;
            width: 100%;
            height: 350px;
        }

        .banner img {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }

        .banner-text {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #ece4e4;
            font-size: 40px;
            font-weight: bold;
            text-shadow: 2px 2px 8px black;
        }

        /* ===== NAV ===== */
       nav {
            background-color: #5b1a2e;
            display: flex;
            padding: 10px 30px;
            align-items: center;
            gap: 30px;
            font-weight: 600;
        }

        nav a {
            color: #eee8e8;
            text-decoration: none;
            padding: 6px 8px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #7d2b44;
        }

        /* ===== FORMULARIO ===== */
        .registro-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #f8f8f8;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,.15);
        }

        .registro-container h2 {
            text-align: center;
            color: #5b1a2e;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #5b1a2e;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 5px;
            border: 2px solid #5b1a2e40;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #5b1a2e;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            margin-top: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #7d2b44;
        }

        /* ===== MENSAJES ===== */
        .resultado {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            background-color: #5b1a2e;
            color: white;
        }

        .error {
            background-color: #7d2b44;
            color: white;
        }

        /* ===== FOOTER ===== */
        footer {
            background-color: #5b1a2e;
            color: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 30px 20px;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 60px;
        }

        footer img {
            width: 120px;
        }

        footer a {
            color: white;
            font-size: 22px;
        }

        footer a:hover {
            color: #d6c9b8;
        }
    </style>
</head>

<body>

<!-- BANNER -->
<div class="banner">
    <img src="img/ChatGPT Image Dec 5, 2025, 08_36_09 AM.png">
    <div class="banner-text">CBTis 217</div>
</div>

<!-- NAV -->
<nav>
    <a href="principal.php">Inicio</a>
    <a href="practicas.php">Prácticas Seguras de Conducción</a>
    <a href="Cascos.php">Tipos de Cascos</a>
    <a href="Normativa.php">Normativa y Reglamento Vial</a>
    <a href="Accidentes.php">Accidentes en Motocicleta</a>
    <a href="faq.php">Preguntas Frecuentes</a>
    <a href="contacto.php">Contacto</a>
    <a href="loginp.php">Login</a>
    <a href="registrousuarios.php">Registro de Usuarios</a>
</nav>

<!-- FORM -->
<div class="registro-container">
    <h2>Registro de Usuario</h2>

    <?php if (!empty($mensaje_resultado)) echo "<div class='resultado'>$mensaje_resultado</div>"; ?>

    <form method="POST">
        <label>Usuario</label>
        <input type="text" name="username" required>

        <label>Contraseña</label>
        <input type="password" name="pass" required>

        <input type="submit" value="Registrar">
    </form>
</div>

<!-- FOOTER -->
<footer>
    <img src="img/cb.jfif">
    <div>
        <p><i class="fas fa-home"></i> Av. Tecnológico s/n</p>
        <p><i class="fas fa-phone"></i> +52-445-458-0516</p>
    </div>
    <div>
        <strong>SÍGUENOS</strong><br>
        <a href="https://www.facebook.com/cbtis217Oficial/" target="_blank">
            <i class="fab fa-facebook-square"></i>
        </a>
    </div>
</footer>

</body>
</html>
