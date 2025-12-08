<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
             <a class="navbar-brand" href="principal.html">Página principal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <h3 class="text-center mb-3">Iniciar sesión</h3>
            <form>
                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" placeholder="Ingresa tu correo">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingresa tu contraseña">
                </div>

                <button class="btn btn-primary w-100">Entrar</button><br><br>
                <button class="btn btn-primary w-100">Registro</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3">
        <p class="mb-0">© 2025 Mi Sitio Web - Todos los derechos reservados</p>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
