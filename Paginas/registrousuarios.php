<?php
$mensaje_resultado = "";

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $lh='localhost';
    $user='root';
    $pass='';
    $bd='bdproyect';
    
    $conection = new mysqli($lh, $user, $pass, $bd);

    if ($conection->connect_error) {
        $mensaje_resultado = "<p style='color: #FFDDDD;'>❌ Error de conexión a la DB: " . $conection->connect_error . "</p>";
    } else {
        
        $username_ingresado = $_POST['username'];    
        $clave_ingresada = $_POST['pass'];
        
        $sql_check = "SELECT username FROM login WHERE username = ?";
        $stmt_check = $conection->prepare($sql_check);
        $stmt_check->bind_param("s", $username_ingresado);
        $stmt_check->execute();
        $stmt_check->store_result();
        
        if ($stmt_check->num_rows > 0) {
            $mensaje_resultado = "<p style='color: #FFDDDD;'>❌ El usuario **$username_ingresado** ya existe.</p>";
            $stmt_check->close();
        } else {
            
            $consulta = "INSERT INTO login (username, pass) VALUES (?, ?)";
            
            $stmt_insert = $conection->prepare($consulta);
            
            $stmt_insert->bind_param("ss", $username_ingresado, $clave_ingresada);
            
            $resultado = $stmt_insert->execute();

            if($resultado){
                $mensaje_resultado = "<p style='color: white;'>✅ Datos ingresados correctamente. Usuario: $username_ingresado</p>";
            } else {
                $mensaje_resultado = "<p style='color: #FFDDDD;'>❌ Los datos no se ingresaron. Error: " . $stmt_insert->error . "</p>";
            }
            
            $stmt_insert->close();
        }

        $conection->close();
    }
}
?>
    
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro de Usuario</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-p1+YzZ8mQOzUp+ElWqXAHZrLhv05H2XhvEz8n+qz9KXLv9yEO4bw3xn+ICy3TlaIW4Z31NeTIB4YfYuCzo/ujg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
        body {
            background-color: #F8F8E3;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
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
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: rgb(236, 228, 228);
            font-size: 40px;
            font-weight: bold;
            text-shadow: 2px 2px 8px black;
        }
        nav {
            background-color: #5b1a2e;
            display: flex;
            justify-content: center; 
            padding: 10px 15px;
            font-weight: 600;
            width: 100%;
            box-sizing: border-box;
            white-space: nowrap;
            overflow-x: auto; 
        }
        nav a {
            color: rgb(238, 232, 232);
            text-decoration: none;
            padding: 6px 8px;
            transition: background-color 0.3s ease;
            border-radius: 4px;
            font-size: 16px;
            margin: 0 5px; 
        }
        nav a:hover {
            background-color: #7d2b44;
            color: #fff9f9;
        }
        
        .registro-container {
            background-color: #FFFFFF; 
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 350px;
            width: 90%;
            margin: 50px auto; 
            text-align: center;
        }
        
        h2 {
            color: #5b1a2e; 
            margin-bottom: 30px;
        }

        .resultado {
            margin-top: 20px;
            padding: 12px;
            border-radius: 6px;
            background-color: #5b1a2e; 
            color: white;
            font-weight: bold;
            text-align: center;
        }
        
        .resultado p {
            margin: 0;
            padding: 0;
            color: #FFDDDD; 
        }

        label {
            display: block;
            text-align: left;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #5b1a2e;
        }
        
        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #5b1a2e40; 
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #5b1a2e; 
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #7d2b44;
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
        <a href="practicas.php">Prácticas Seguras de Conducción</a>
        <a href="Cascos.php">Tipos de Cascos</a>
        <a href="Normativa.php">Normativa y Reglamento Vial</a>
        <a href="Accidentes.php">Accidentes en Motocicleta</a>
        <a href="faq.php">Preguntas Frecuentes</a>
        <a href="contacto.php">Contacto</a>
        <a href="loginp.php">Login</a>
        <a href="registrousuarios.php">Registro de Usuarios</a>
    </nav>

    <div class="registro-container">

        <h2>Formulario de Registro</h2>
        
        <?php 
        if (!empty($mensaje_resultado)) {
            echo "<div class='resultado'>" . $mensaje_resultado . "</div>";
        }
        ?>
        
        <form action="" method="POST"> 
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="pass">Contraseña:</label>
            <input type="password" id="pass" name="pass" required>
            
            <input type="submit" value="Registrar Usuario">
        </form>

    </div>
</body>
</html>