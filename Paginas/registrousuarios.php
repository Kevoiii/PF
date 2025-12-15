 <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $lh='localhost';
        $user='root';
        $pass='';
        $bd='bdproyect';
        $p=3306;
        $conection= mysqli_connect($lh, $user, $pass, $bd, $p);    
        $name  = $_POST['username'];    
        $pass = $_POST['pass'];    
      
        $consulta = "insert into login values('$name', '$pass')";
        $resultado = mysqli_query($conection, $consulta);

    }
    ?>
    
<!DOCTYPE html>
<html>
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
<head>
    <title>Registro de Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .resultado { margin-top: 20px; padding: 10px; border: 1px solid #ccc; }
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
<center>

    <h2>Formulario de Registro</h2>
    
    <?php 
    if (!empty($mensaje_resultado)) {
        echo "<div class='resultado'>" . $mensaje_resultado . "</div>";
    }
    ?>
    
    <form action="" method="POST"> 
        <label for="username">Nombre de Usuario:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="pass">Contraseña:</label><br>
        <input type="password" id="pass" name="pass" required><br><br>
        
        <input type="submit" value="Registrar Usuario">
    </form>

</center>
</body>
</html>