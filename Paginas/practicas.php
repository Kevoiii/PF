<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prácticas Seguras de Conducción</title>

    <style>
        body {
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .page-wrapper {
            width: 100%;
            max-width: 1200px;
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
            justify-content: center;
            flex-wrap: wrap;
        }

        nav a {
            color: rgb(238, 232, 232);
            text-decoration: none;
            padding: 6px 8px;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav a:hover {
            background-color: #7d2b44;
            color: #fff9f9;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
        }

        ul {
            text-align: center;
            list-style-position: inside;
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

<div class="page-wrapper">

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

    <div class="container mt-4 bg-light p-4 rounded shadow text-center">

        <div class="mb-4">
            <img src="img/2.png"
                 alt="Prácticas Seguras de Conducción - Rinoceronte"
                 class="img-fluid rounded shadow">
        </div>

        <h2 class="text-primary">1. Usa casco certificado</h2>
        <p>Siempre utiliza cascos con certificación DOT, ECE o Snell.</p>

        <h2 class="text-primary">2. Mantén una velocidad segura</h2>
        <p>Evita excesos de velocidad y ajusta tu manejo a las condiciones del camino.</p>

        <h2 class="text-primary">3. Revisa tu motocicleta</h2>
        <p>Antes de salir, revisa frenos, llantas, luces y niveles de aceite.</p>

        <h2 class="text-primary">4. Lleva equipo de protección</h2>
        <ul>
            <li>Guantes</li>
            <li>Chaqueta con protecciones</li>
            <li>Rodilleras y coderas</li>
            <li>Botas altas</li>
        </ul>

    </div>

</div>

</body>
</html>
