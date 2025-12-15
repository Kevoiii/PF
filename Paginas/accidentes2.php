<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Accidentes en Motocicleta</title>
    <style>
        body {
            background-color: #F8F8E3; /* Cambiado a Beige para consistencia */
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
            padding: 10px 15px;
            align-items: center;
            gap: 30px; /* Restaurado el gap a 30px para que se vea bien con solo 2 elementos */
            font-weight: 600;
            white-space: nowrap; 
            overflow-x: auto;
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
        
        /* --- ESTILOS AGREGADOS PARA EL FORMULARIO DE INSERCIÓN --- */
        .insert-form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        .insert-form-container h2 {
            color: #5b1a2e;
            text-align: center;
            margin-bottom: 20px;
        }
        .insert-form-container label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #5b1a2e;
        }
        .insert-form-container input[type="text"], 
        .insert-form-container input[type="date"], 
        .insert-form-container textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 2px solid #5b1a2e40;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .insert-form-container button {
            background-color: #5b1a2e;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .insert-form-container button:hover {
            background-color: #7d2b44;
        }
        .mensaje-form {
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
        }
        .mensaje-success {
            background-color: #d4edda;
            color: #155724;
        }
        .mensaje-error {
            background-color: #f8d7da;
            color: #721c24;
        }
        /* --- FIN ESTILOS FORMULARIO --- */


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
        
        /* Estilos de tabla para que sea consistente */
        table {
            border-collapse: collapse;
            margin-top: 30px;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #5b1a2e;
            color: white;
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
        <a href="principal.php">Cerrar Sesión</a>
        <a href="Cascos2.php">Agregar Cascos</a>
    </nav>
<center>
<?php
// --- BLOQUE PHP PARA MANEJAR LA INSERCIÓN Y LA CONSULTA DE DATOS ---
$host = "localhost";
$usuario_db = "root";
$clave = "";
$base = "bdproyect";
$mensaje_insercion = "";

$conexion = new mysqli($host, $usuario_db, $clave, $base);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");

// 1. Manejar la inserción si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'insertar_accidente') {
    
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];
    $causa = $_POST['causa'];
    $lesionados = (int)$_POST['lesionados'];
    $uso_casco = (int)$_POST['uso_casco'];
    $nivel_gravedad = $_POST['nivel_gravedad'];
    $imagen = $_POST['imagen']; 

    // INSERT INTO accidentes (fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    $sql_insert = "INSERT INTO accidentes (fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql_insert);
    // "ssssisss" representa: 4 strings, 1 integer, 2 strings, 1 string
    $stmt->bind_param("ssssisss", $fecha, $lugar, $descripcion, $causa, $lesionados, $uso_casco, $nivel_gravedad, $imagen); 
    
    if ($stmt->execute()) {
        $mensaje_insercion = "<div class='mensaje-form mensaje-success'>✅ Nuevo accidente registrado exitosamente.</div>";
    } else {
        $mensaje_insercion = "<div class='mensaje-form mensaje-error'>❌ Error al registrar el accidente: " . $stmt->error . "</div>";
    }
    
    $stmt->close();
}

// 2. Consulta de la tabla (se hace después de la posible inserción para mostrar el dato nuevo)
$sql = "SELECT id, fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad, imagen FROM accidentes";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta SQL: " . $conexion->error);
}
?>

<div class="insert-form-container">
    <h2>Registrar Nuevo Accidente</h2>
    <?php echo $mensaje_insercion; ?>
    <form action="" method="POST">
        <input type="hidden" name="accion" value="insertar_accidente">

        <label for="fecha">Fecha del Accidente:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="lugar">Lugar/Dirección:</label>
        <input type="text" id="lugar" name="lugar" required>

        <label for="descripcion">Descripción detallada:</label>
        <textarea id="descripcion" name="descripcion" rows="3" required></textarea>
        
        <label for="causa">Causa principal:</label>
        <input type="text" id="causa" name="causa" required>
        
        <label for="lesionados">Número de Lesionados (0 o más):</label>
        <input type="text" id="lesionados" name="lesionados" pattern="[0-9]*" title="Solo números" required> 
        
        <label for="uso_casco">Uso de Casco (1=Sí / 0=No):</label>
        <input type="text" id="uso_casco" name="uso_casco" pattern="[0-1]" title="Solo 1 (Sí) o 0 (No)" required>
        
        <label for="nivel_gravedad">Nivel de Gravedad:</label>
        <input type="text" id="nivel_gravedad" name="nivel_gravedad" required>
        
        <label for="imagen">Ruta de Imagen (ej: img/accidente_n.jpg):</label>
        <input type="text" id="imagen" name="imagen" required>

        <button type="submit">Guardar Accidente</button>
    </form>
</div>
<h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif; color: #5b1a2e;">ACCIDENTES REGISTRADOS</h1>
<body style="background-color: beige;"></body> 
<?php
if ($resultado->num_rows > 0) {
echo "<table border='1' style='margin: 0 auto; width: 90%; background-color: white;'>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>fecha</th>";
echo "<th>lugar</th>";
echo "<th>descripcion</th>";
echo "<th>causa</th>";
echo "<th>lesionados</th>";
echo "<th>uso_casco</th>";
echo "<th>nivel_gravedad</th>";
echo "<th>imagen</th>";
echo "</tr>";
while($fila = $resultado->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $fila["id"] . "</td>";
echo "<td>" . $fila["fecha"] . "</td>";
echo "<td>" . $fila["lugar"] . "</td>";
echo "<td>" . $fila["descripcion"] . "</td>";
echo "<td>" . $fila["causa"] . "</td>";
echo "<td>" . $fila["lesionados"] . "</td>";
echo "<td>" . $fila["uso_casco"] . "</td>";
echo "<td>" . $fila["nivel_gravedad"] . "</td>";
echo "<td><img src='".$fila["imagen"] ."'width='100'></td>";
echo "</tr>";
}
echo "</table>";
} else {
echo "No se encontraron resultados.";
}

$conexion->close();

?>
</body>
</center>
</html>