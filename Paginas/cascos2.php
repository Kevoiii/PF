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
            /* Ajuste para que la navegación intente quedarse en una línea */
            white-space: nowrap; 
            overflow-x: auto;
            justify-content: flex-start; /* Ajustado para alinear a la izquierda, que es mejor con pocos elementos */
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
        
        /* Estilos para el formulario de inserción */
        .insert-form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f7f7f7;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
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
            color: #333;
        }
        .insert-form-container input[type="text"], 
        .insert-form-container textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
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
        
        table {
            border-collapse: collapse;
            margin-top: 30px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
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
        <a href="accidentes2.php">Agregar Accidentes</a>
        <a href="principal.html">Cerrar Sesión</a>
    </nav>
    <?php
// --- BLOQUE PHP PARA MANEJAR LA INSERCIÓN DE DATOS ---

$host = "localhost";
$usuario_db = "root";
$clave = "";
$base = "bdproyect";
$mensaje_insercion = "";

// Intentar la conexión inicial (se usará para la inserción y la consulta de la tabla)
$conexion = new mysqli($host, $usuario_db, $clave, $base);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");


// 1. Manejar la inserción si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'insertar_casco') {
    
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $certificado = $_POST['certificado'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['pecio_aprox'];
    $imagen = $_POST['imagen']; // Aquí se espera la ruta de la imagen

    // Usando Sentencias Preparadas para prevenir Inyección SQL
    $sql_insert = "INSERT INTO cascos (marca, modelo, tipo, certificado, descripcion, pecio_aprox, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql_insert);
    // "sssssss" representa 7 strings
    $stmt->bind_param("sssssss", $marca, $modelo, $tipo, $certificado, $descripcion, $precio, $imagen); 
    
    if ($stmt->execute()) {
        $mensaje_insercion = "<div class='mensaje-form mensaje-success'>✅ Nuevo casco registrado exitosamente.</div>";
    } else {
        $mensaje_insercion = "<div class='mensaje-form mensaje-error'>❌ Error al registrar el casco: " . $stmt->error . "</div>";
    }
    
    $stmt->close();
}

// 2. Consulta de la tabla (para mostrarla después de la posible inserción)
$sql = "SELECT id, marca, modelo, tipo, certificado, descripcion, pecio_aprox, fecha_registro, imagen FROM cascos";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta SQL: " . $conexion->error);
}
?>

<div class="insert-form-container">
    <h2>Agregar Nuevo Casco</h2>
    <?php echo $mensaje_insercion; ?>
    <form action="" method="POST">
        <input type="hidden" name="accion" value="insertar_casco">

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required>
        
        <label for="certificado">Certificado:</label>
        <input type="text" id="certificado" name="certificado" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="3" required></textarea>
        
        <label for="pecio_aprox">Precio Aprox. (ej: 150.00):</label>
        <input type="text" id="pecio_aprox" name="pecio_aprox" required>
        
        <label for="imagen">Ruta de Imagen (ej: img/casco1.jpg):</label>
        <input type="text" id="imagen" name="imagen" required>

        <button type="submit">Guardar Casco</button>
    </form>
</div>

<h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif; color: #5b1a2e;">CASCOS CON NORMATIVA</h1>
<center>
<body style="background-color: beige;">
<?php
if ($resultado->num_rows > 0) {
    echo "<table border='1' style='margin: 0 auto; width: 90%; background-color: white;'>";
 
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>marca</th>";
    echo "<th>modelo</th>";
    echo "<th>tipo</th>";
    echo "<th>certificado</th>";
    echo "<th>descripcion</th>";
    echo "<th>pecio_aprox</th>";
    echo "<th>fecha_registro</th>";
    echo "<th>imagen</th>";
    echo "</tr>";
    
    // Volver a consultar la tabla después de la inserción para reflejar el nuevo dato
    // Es mejor que la consulta principal se ejecute después de la inserción, como está configurado arriba.
    
    // Reposiciona el puntero al inicio si la inserción fue exitosa y la consulta no se hizo de nuevo
    // Como la consulta se hizo después de la inserción, esto no es estrictamente necesario, pero lo dejo por si acaso.
    $resultado->data_seek(0); 

    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["marca"] . "</td>";
        echo "<td>" . $fila["modelo"] . "</td>";
        echo "<td>" . $fila["tipo"] . "</td>";
        echo "<td>" . $fila["certificado"] . "</td>";
        echo "<td>" . $fila["descripcion"] . "</td>";
        echo "<td>" . $fila["pecio_aprox"] . "</td>";
        echo "<td>" . $fila["fecha_registro"] . "</td>";
        echo "<td><img src='".$fila["imagen"] ."'width='100'></td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();
?>
</center>
</body>

</html>