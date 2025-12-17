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

    <section style="max-width: 900px; margin: auto; font-family: Arial, sans-serif; line-height: 1.6; background-color: beige;">

        <h2 style="text-align: center; font-size: 28px; margin-bottom: 10px;">Presentación</h2>
        <p style="font-size: 17px; text-align: justify;">
            Somos el equipo conformado por <strong>Diego Javier Fuentes Pérez</strong>, 
            <strong>José Miguel Camarena Ramírez</strong>, 
            <strong>Kevin Daniel Pérez Vázquez</strong>, 
            <strong>José Julián García Martínez</strong> y 
            <strong>Kevin Gael López Moreno</strong>. 
            Unimos esfuerzos, ideas y habilidades para desarrollar este proyecto con compromiso y creatividad.
        </p>

        <h2 style="text-align: center; font-size: 28px; margin-top: 25px;">Mensaje Principal</h2>
        <p style="font-size: 17px; text-align: justify;">
            Este proyecto está creado para promover la conducción segura, 
            el uso adecuado del equipo de protección y la normativa vial. 
            Nuestro objetivo es brindar información clara y útil que contribuya a una conducción responsable
            y a la prevención de accidentes.
        </p>

        <h2 style="text-align: center; font-size: 28px; margin-top: 25px;">Objetivo</h2>
        <p style="font-size: 17px; text-align: justify;">
            Fomentar el conocimiento y la conciencia vial mediante recursos informativos, 
            ejemplos prácticos y recomendaciones accesibles, 
            contribuyendo así a una mejor seguridad al conducir motocicleta.
        </p>

    </section>
 <footer>
        <div class="footer-logo">
            <img src="img/cb.jfif" alt="SEP Logo">
        </div>
        <div class="footer-contact">
            <p><i class="fas fa-home"></i> Av. Tecnológico s/n<br>Loma Linda, Uriangato, Gto</p>
            <p><i class="fas fa-phone"></i> +52-445-458-0516</p>
            <p><i class="fas fa-phone"></i> +52-445-458-4291</p>
        </div>
        <div class="footer-links">
            <strong>SÍGUENOS</strong>
            <a href="https://www.facebook.com/cbtis217Oficial/?locale=es_LA" target="_blank">
                <i class="fab fa-facebook-square"></i>
            </a>
        </div>
    </footer>
</body>
</html>
