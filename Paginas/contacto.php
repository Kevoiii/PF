<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto y Compromiso de Conducción Segura</title>
    
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

        .container {
            max-width: 800px;
            margin: 20px auto; /* Reemplaza .mt-4 con margin: 20px auto; */
            padding: 0 15px; /* Añade un pequeño padding para móviles */
        }
        
        /* --- ESTILOS AGREGADOS PARA LAS CLASES TIPO BOOTSTRAP --- */
        header.bg-dark {
            background-color: #343a40 !important;
        }
        header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        header p {
            margin-top: 0;
            margin-bottom: 0;
        }
        
        .card {
            border: 1px solid rgba(0,0,0,.125);
            border-radius: 0.25rem;
            margin-bottom: 30px; /* Reemplaza .mb-5 */
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15) !important; /* Reemplaza .shadow */
        }
        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0,0,0,.03);
            border-bottom: 1px solid rgba(0,0,0,.125);
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }
        .card-body {
            padding: 1.25rem;
        }
        .bg-primary { background-color: #007bff !important; }
        .bg-success { background-color: #28a745 !important; }
        .text-white { color: #fff !important; }
        .text-center { text-align: center !important; }
        
        /* Formulario */
        .mb-3 { margin-bottom: 1rem !important; }
        .form-label { display: inline-block; margin-bottom: 0.5rem; font-weight: bold; }
        .form-control {
            display: block;
            width: 95%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btn-primary { color: #fff; background-color: #007bff; border-color: #007bff; }
        .btn-success { color: #fff; background-color: #28a745; border-color: #28a745; }
        .btn-primary:hover { background-color: #0056b3; border-color: #0056b3; }
        .btn-success:hover { background-color: #1e7e34; border-color: #1e7e34; }

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
            margin-top: 50px; /* Asegura separación del contenido */
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

    <hr>

    <header class="bg-dark text-white text-center p-4">
        <h1>Contacto y Compromiso de Conducción Segura</h1>
        <p>Firma tu promesa de conducir de forma responsable</p>
    </header>

    <div class="container">

        <div class="card mb-5 shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Formulario de Contacto</h3>
            </div>

            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Escribe tu nombre">
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" placeholder="ejemplo@gmail.com">
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" rows="4" placeholder="Escribe tu mensaje o duda"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                </form>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0">Compromiso de Conducción Segura</h3>
            </div>

            <div class="card-body">
                <p>
                    Al firmar este compromiso, aceptas ser un motociclista responsable,
                    respetar las normas viales y proteger tu vida y la de los demás.
                </p>

                <ul>
                    <li>Usaré casco certificado en cada viaje.</li>
                    <li>Respetaré las señales y límites de velocidad.</li>
                    <li>No conduciré bajo el efecto del alcohol o drogas.</li>
                    <li>Mantendré mi motocicleta en buen estado.</li>
                    <li>Seré un ejemplo de responsabilidad vial.</li>
                </ul>

                <form>
                    <div class="mb-3">
                        <label for="nombreCompromiso" class="form-label">Tu nombre</label>
                        <input type="text" class="form-control" id="nombreCompromiso" placeholder="Escribe tu nombre para firmar">
                    </div>

                    <button type="submit" class="btn btn-success">Firmar compromiso</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-logo">
            <img src="img/cb.jfif" alt="SEP Logo">
        </div>
        <div class="footer-contact">
            <p><i class="fas fa-home"></i>Av. Tecnológico s/n<br>L