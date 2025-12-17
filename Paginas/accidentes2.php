<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Accidentes en Motocicleta</title>
    <style>
        body {
            background-color: #F8F8E3;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .banner { position: relative; height: 350px; }
        .banner img { width: 100%; height: 350px; object-fit: cover; }
        .banner-text {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            color: #ece4e4;
            font-size: 40px;
            font-weight: bold;
            text-shadow: 2px 2px 8px black;
        }
        nav {
            background-color: #5b1a2e;
            display: flex;
            padding: 10px 15px;
            gap: 30px;
            white-space: nowrap;
        }
        nav a {
            color: #eee;
            text-decoration: none;
            padding: 6px 8px;
            font-weight: 600;
        }
        nav a:hover { background-color: #7d2b44; }

        .insert-form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
        }
        label { font-weight: bold; margin-top: 10px; display: block; }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            background: #5b1a2e;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            cursor: pointer;
            width: 100%;
        }
        button:hover { background: #7d2b44; }

        .mensaje-success { 
            background: #d4edda; 
            padding: 10px; 
            margin-bottom: 15px; 
            color: #155724; 
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }
        .mensaje-error { 
            background: #f8d7da; 
            padding: 10px; 
            margin-bottom: 15px;
            color: #721c24; 
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 30px auto;
            background: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th { background: #5b1a2e; color: white; }
    </style>
</head>

<body>

<div class="banner">
    <img src="img/ChatGPT Image Dec 5, 2025, 08_36_09 AM.png">
    <div class="banner-text">CBTis 217</div>
</div>

<nav>
    <a href="principal.php">Cerrar Sesión</a>
    <a href="Cascos2.php">Agregar Cascos</a>
     <a href="users.php">Gestionar usuarios</a>
        <a href="faq2.php">Gestionar Preguntas</a>
</nav>

<?php
$conexion = new mysqli("localhost", "root", "", "bdproyect");
$conexion->set_charset("utf8");

$mensaje = "";

/* ===== INSERTAR ACCIDENTE ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['accion'] == 'insertar') {
    $stmt = $conexion->prepare(
        "INSERT INTO accidentes 
        (fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad, imagen)
        VALUES (?,?,?,?,?,?,?,?)"
    );
   
    $stmt->bind_param(
        "ssssisss",
        $_POST['fecha'],
        $_POST['lugar'],
        $_POST['descripcion'],
        $_POST['causa'],
        $_POST['lesionados'],
        $_POST['uso_casco'],
        $_POST['nivel_gravedad'],
        $_POST['imagen']
    );
    $stmt->execute();
    $mensaje = "<div class='mensaje-success'>✅ Accidente registrado</div>";
}

/* ===== EDITAR/ACTUALIZAR ACCIDENTE ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['accion'] == 'actualizar') {
    $id = (int)$_POST['id_actualizar'];
    
    $stmt = $conexion->prepare(
        "UPDATE accidentes SET 
        fecha=?, lugar=?, descripcion=?, causa=?, lesionados=?, uso_casco=?, nivel_gravedad=?, imagen=?
        WHERE id = ?"
    );
    
    // El orden de los parámetros debe ser: 8 strings/ints (los campos) + 1 int (el ID)
    $stmt->bind_param(
        "ssssisssi",
        $_POST['fecha_edit'],
        $_POST['lugar_edit'],
        $_POST['descripcion_edit'],
        $_POST['causa_edit'],
        $_POST['lesionados_edit'],
        $_POST['uso_casco_edit'],
        $_POST['nivel_gravedad_edit'],
        $_POST['imagen_edit'],
        $id
    );

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje = "<div class='mensaje-success'> Accidente con ID **$id** actualizado correctamente.</div>";
    } else {
        $mensaje = "<div class='mensaje-error'> Error al actualizar el accidente con ID **$id**. Verifica que el ID exista.</div>";
    }
}

/* ===== ELIMINAR ACCIDENTE ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['accion'] == 'eliminar') {
    $id = (int)$_POST['id_eliminar'];

    $stmt = $conexion->prepare("DELETE FROM accidentes WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje = "<div class='mensaje-success'>🗑️ Accidente con ID **$id** eliminado.</div>";
    } else {
        $mensaje = "<div class='mensaje-error'>❌ No se pudo eliminar el ID **$id**. Verifica que exista.</div>";
    }
}
?>

<?php if (!empty($mensaje)): ?>
<div class="insert-form-container">
    <?php echo $mensaje; ?>
</div>
<?php endif; ?>

<div class="insert-form-container">
    <h2>Registrar Nuevo Accidente</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="insertar">
        <label>Fecha</label><input type="date" name="fecha" required>
        <label>Lugar</label><input type="text" name="lugar" required>
        <label>Descripción</label><textarea name="descripcion" required></textarea>
        <label>Causa</label><input type="text" name="causa" required>
        <label>Lesionados</label><input type="number" name="lesionados" min="0" required>
        <label>Uso casco (1/0)</label><input type="number" name="uso_casco" min="0" max="1" required>
        <label>Nivel gravedad</label><input type="text" name="nivel_gravedad" required>
        <label>Imagen</label><input type="text" name="imagen" required>
        <button>Guardar</button>
    </form>
</div>

<div class="insert-form-container">
    <h2>Editar Accidente</h2>
    <p>Introduce el **ID** a editar y luego los **nuevos datos**:</p>
    <form method="POST">
        <input type="hidden" name="accion" value="actualizar">
        <label>ID del accidente a editar</label>
        <input type="number" name="id_actualizar" required>
        <hr style="margin: 20px 0;">
        <label>Nueva Fecha</label><input type="date" name="fecha_edit" required>
        <label>Nuevo Lugar</label><input type="text" name="lugar_edit" required>
        <label>Nueva Descripción</label><textarea name="descripcion_edit" required></textarea>
        <label>Nueva Causa</label><input type="text" name="causa_edit" required>
        <label>Nuevos Lesionados</label><input type="number" name="lesionados_edit" min="0" required>
        <label>Nuevo Uso casco (1/0)</label><input type="number" name="uso_casco_edit" min="0" max="1" required>
        <label>Nuevo Nivel gravedad</label><input type="text" name="nivel_gravedad_edit" required>
        <label>Nueva Imagen</label><input type="text" name="imagen_edit" required>
        <button>Actualizar</button>
    </form>
</div>

<div class="insert-form-container">
    <h2>Eliminar Accidente</h2>
    <form method="POST">
        <input type="hidden" name="accion" value="eliminar">
        <label>ID del accidente a eliminar</label>
        <input type="number" name="id_eliminar" required>
        <button>Eliminar</button>
    </form>
</div>

<?php
$resultado = $conexion->query("SELECT * FROM accidentes ORDER BY id DESC");
if ($resultado->num_rows > 0) {
echo "<table><tr>
<th>ID</th><th>Fecha</th><th>Lugar</th><th>Descripción</th>
<th>Causa</th><th>Lesionados</th><th>Casco</th><th>Gravedad</th><th>Imagen</th>
</tr>";
while ($f = $resultado->fetch_assoc()) {
echo "<tr>
<td>{$f['id']}</td>
<td>{$f['fecha']}</td>
<td>{$f['lugar']}</td>
<td>{$f['descripcion']}</td>
<td>{$f['causa']}</td>
<td>{$f['lesionados']}</td>
<td>{$f['uso_casco']}</td>
<td>{$f['nivel_gravedad']}</td>
<td><img src='{$f['imagen']}' width='80'></td>
</tr>";
}
echo "</table>";
} else {
    echo "<div class='insert-form-container'><p>No hay accidentes registrados en la base de datos.</p></div>";
}
$conexion->close();
?>

</body>

</html>