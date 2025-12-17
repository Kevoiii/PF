<?php
$host = "localhost";
$usuario_db = "root";
$clave = "";
$base = "bdproyect"; 

$mensaje_insercion = "";
$mensaje_eliminacion = "";
$mensaje_actualizacion = "";

$conexion = new mysqli($host, $usuario_db, $clave, $base);
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error); 
}
$conexion->set_charset("utf8");

/* ===== AGREGAR PREGUNTA (Ahora incluye Categoria y Orden) ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'insertar_faq') {

    $pregunta = $_POST['pregunta'];
    $respuesta = $_POST['respuesta'];
    $categoria = $_POST['categoria'];
    $orden = (int)$_POST['orden']; // Aseguramos que sea entero

    // La consulta ahora incluye todos los campos
    $sql_insert = "INSERT INTO preguntas_frecuentes (pregunta, respuesta, categoria, orden) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql_insert);
    // Vinculamos 4 parámetros: string, string, string, integer (sssi)
    $stmt->bind_param("sssi", $pregunta, $respuesta, $categoria, $orden);

    if ($stmt->execute()) {
        $mensaje_insercion = "<div class='mensaje-success'>✅ Pregunta agregada correctamente.</div>";
    } else {
        $mensaje_insercion = "<div class='mensaje-error'>❌ Error al agregar pregunta: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

/* ===== EDITAR/ACTUALIZAR PREGUNTA (Ahora incluye Categoria y Orden) ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'actualizar_faq') {
    
    $id = (int)$_POST['id_faq_edit'];
    $pregunta_nueva = $_POST['pregunta_edit'];
    $respuesta_nueva = $_POST['respuesta_edit'];
    $categoria_nueva = $_POST['categoria_edit'];
    $orden_nuevo = (int)$_POST['orden_edit'];
    
    // La consulta ahora actualiza todos los campos
    $sql_update = "UPDATE preguntas_frecuentes SET pregunta=?, respuesta=?, categoria=?, orden=? WHERE id = ?";
    $stmt = $conexion->prepare($sql_update);
    // Vinculamos 5 parámetros: string, string, string, integer, integer (sssi i)
    $stmt->bind_param("sssii", $pregunta_nueva, $respuesta_nueva, $categoria_nueva, $orden_nuevo, $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje_actualizacion = "<div class='mensaje-success'>✏️ Pregunta con ID **$id** actualizada correctamente.</div>";
    } else {
        $mensaje_actualizacion = "<div class='mensaje-error'>❌ Error al actualizar el ID **$id**. Verifica que el ID exista o no hubo cambios.</div>";
    }
    $stmt->close();
}

/* ===== ELIMINAR PREGUNTA (Sin cambios) ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'eliminar_faq') {

    $id = (int)$_POST['id_faq'];

    $sql_delete = "DELETE FROM preguntas_frecuentes WHERE id = ?";
    $stmt = $conexion->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje_eliminacion = "<div class='mensaje-success'>🗑️ Pregunta con ID **$id** eliminada correctamente.</div>";
    } else {
        $mensaje_eliminacion = "<div class='mensaje-error'>❌ No se encontró la pregunta con ID **$id**.</div>";
    }
    $stmt->close();
}

/* ===== CONSULTA DE PREGUNTAS FRECUENTES (FAQ) - Incluye todos los campos ===== */
$sql = "SELECT id, pregunta, respuesta, categoria, orden FROM preguntas_frecuentes ORDER BY id DESC"; 
$resultado = $conexion->query($sql);

if ($resultado === FALSE) {
    $error_bd = "⚠️ Error al ejecutar la consulta SQL: " . $conexion->error . 
                ". ¿La tabla 'preguntas_frecuentes' y las columnas 'pregunta', 'respuesta', 'categoria', 'orden' existen?";
} else {
    $error_bd = ""; 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Preguntas Frecuentes</title>

    <style>
        /* [Los estilos CSS se mantienen igual que en tu código anterior] */
        /* --- DISEÑO ESTANDARIZADO --- */
        body {
            background-color: #F8F8E3; /* Fondo */
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

        /* --- BARRA DE NAVEGACIÓN --- */
        nav {
            background-color: #5b1a2e;
            display: flex;
            gap: 30px; 
            padding: 10px 30px; 
            white-space: nowrap;
            overflow-x: auto;
        }

        nav a {
            color: #eee;
            text-decoration: none;
            padding: 6px 8px;
            border-radius: 4px;
            font-weight: 600;
        }

        nav a:hover {
            background-color: #7d2b44;
            color: #fff9f9;
        }
        
        /* --- ESTILOS DE FORMULARIOS Y MENSAJES --- */
        .insert-form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: white; 
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
        }
        label { font-weight: bold; margin-top: 10px; display: block; }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        textarea { height: 100px; }

        button {
            background: #5b1a2e;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }
        button:hover { background: #7d2b44; }

        /* Mensajes de feedback */
        .mensaje-success { 
            background: #d4edda; 
            padding: 10px; 
            margin-bottom: 15px; 
            color: #155724; 
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            font-weight: bold;
        }
        .mensaje-error { 
            background: #f8d7da; 
            padding: 10px; 
            margin-bottom: 15px;
            color: #721c24; 
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            font-weight: bold;
        }
        
        /* Estilos de la tabla de datos (para mostrar las preguntas) */
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 30px auto;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        th { background: #5b1a2e; color: white; }
        
        /* Asegura que los formularios se vean bien en pantallas pequeñas */
        @media (max-width: 768px) {
            .insert-form-container {
                max-width: 95%;
                margin: 20px auto;
            }
            table {
                width: 100%;
                font-size: 12px;
                display: block;
                overflow-x: auto;
            }
        }
    </style>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>

<body>

    <div class="banner">
        <img src="img/ChatGPT Image Dec 5, 2025, 08_36_09 AM.png" alt="Banner">
        <div class="banner-text">Administrar Preguntas Frecuentes</div>
    </div>

    <nav>
       <a href="accidentes2.php">Gestionar Accidentes</a>
    <a href="principal.php">Cerrar Sesión</a>
    <a href="users.php">Gestionar usuarios</a>
      <a href="faq2.php">Gestionar Preguntas</a>
    </nav>
    <hr>

    <?php 
    if (!empty($mensaje_insercion) || !empty($mensaje_actualizacion) || !empty($mensaje_eliminacion)): ?>
    <div class="insert-form-container">
        <?php echo $mensaje_insercion; ?>
        <?php echo $mensaje_actualizacion; ?>
        <?php echo $mensaje_eliminacion; ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($error_bd)): ?>
        <div class="insert-form-container">
            <div class="mensaje-error">
                <?php echo $error_bd; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="insert-form-container">
        <h2>Agregar Nueva Pregunta</h2>
        <form method="POST">
            <input type="hidden" name="accion" value="insertar_faq">
            <label>Pregunta</label><input type="text" name="pregunta" required>
            <label>Respuesta</label><textarea name="respuesta" required></textarea>
            
            <label>Categoría</label><input type="text" name="categoria">
            <label>Orden</label><input type="number" name="orden" value="0">
            
            <button type="submit">Guardar Pregunta</button>
        </form>
    </div>

    <div class="insert-form-container">
        <h2>Editar Pregunta Existente</h2>
        <p>Introduce el **ID** de la pregunta y la **nueva información**:</p>
        <form method="POST">
            <input type="hidden" name="accion" value="actualizar_faq">
            <label>ID de la Pregunta a Editar</label>
            <input type="number" name="id_faq_edit" required>
            <hr style="margin: 20px 0;">
            <label>Nueva Pregunta</label><input type="text" name="pregunta_edit" required>
            <label>Nueva Respuesta</label><textarea name="respuesta_edit" required></textarea>
            
            <label>Nueva Categoría</label><input type="text" name="categoria_edit">
            <label>Nuevo Orden</label><input type="number" name="orden_edit">
            
            <button type="submit">Actualizar Pregunta</button>
        </form>
    </div>

    <div class="insert-form-container">
        <h2>Eliminar Pregunta</h2>
        <form method="POST">
            <input type="hidden" name="accion" value="eliminar_faq">
            <label>ID de la Pregunta a Eliminar</label>
            <input type="number" name="id_faq" required>
            <button type="submit" style="background:#7d2b44">Eliminar Pregunta</button>
        </form>
    </div>
    
    <?php if ($resultado && $resultado->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Pregunta</th>
            <th>Respuesta</th>
            <th>Categoría</th>
            <th>Orden</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo htmlspecialchars($fila['pregunta']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($fila['respuesta'])); ?></td>
            <td><?php echo htmlspecialchars($fila['categoria'] ?? 'N/A'); ?></td>
            <td><?php echo htmlspecialchars($fila['orden'] ?? 'N/A'); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php elseif (empty($error_bd)): ?>
        <div class="insert-form-container"><p style="text-align:center">No hay preguntas registradas.</p></div>
    <?php endif; ?>

    <?php $conexion->close(); ?>


</body>
</html>