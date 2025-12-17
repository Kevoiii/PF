<?php
$host = "localhost";
$usuario_db = "root";
$clave = "";
$base = "bdproyect";

$mensaje_insercion = "";
$mensaje_eliminacion = "";
$mensaje_actualizacion = ""; // Nuevo mensaje para la edición

$conexion = new mysqli($host, $usuario_db, $clave, $base);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");

/* ===== INSERTAR CASCO ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'insertar_casco') {

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $certificado = $_POST['certificado'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['pecio_aprox'];
    $imagen = $_POST['imagen'];

    $sql_insert = "INSERT INTO cascos (marca, modelo, tipo, certificado, descripcion, pecio_aprox, imagen)
                     VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql_insert);
    $stmt->bind_param("sssssss", $marca, $modelo, $tipo, $certificado, $descripcion, $precio, $imagen);

    if ($stmt->execute()) {
        $mensaje_insercion = "<div class='mensaje-success'>✅ Casco agregado correctamente.</div>";
    } else {
        $mensaje_insercion = "<div class='mensaje-error'>❌ Error al agregar casco.</div>";
    }
    $stmt->close();
}

/* ===== EDITAR/ACTUALIZAR CASCO ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'actualizar_casco') {
    
    $id = (int)$_POST['id_casco_edit'];
    $marca = $_POST['marca_edit'];
    $modelo = $_POST['modelo_edit'];
    $tipo = $_POST['tipo_edit'];
    $certificado = $_POST['certificado_edit'];
    $descripcion = $_POST['descripcion_edit'];
    $precio = $_POST['pecio_aprox_edit'];
    $imagen = $_POST['imagen_edit'];

    $sql_update = "UPDATE cascos SET 
                   marca=?, modelo=?, tipo=?, certificado=?, descripcion=?, pecio_aprox=?, imagen=?
                   WHERE id = ?";
    $stmt = $conexion->prepare($sql_update);
    // Siete 's' para los campos de texto/precio/imagen, y una 'i' para el ID.
    $stmt->bind_param("sssssssi", $marca, $modelo, $tipo, $certificado, $descripcion, $precio, $imagen, $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje_actualizacion = "<div class='mensaje-success'>✏️ Casco con ID **$id** actualizado correctamente.</div>";
    } else {
        $mensaje_actualizacion = "<div class='mensaje-error'>❌ Error al actualizar el casco con ID **$id**. Verifica que el ID exista.</div>";
    }
    $stmt->close();
}

/* ===== ELIMINAR CASCO ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'eliminar_casco') {

    $id = (int)$_POST['id_casco'];

    $sql_delete = "DELETE FROM cascos WHERE id = ?";
    $stmt = $conexion->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje_eliminacion = "<div class='mensaje-success'>🗑️ Casco con ID **$id** eliminado correctamente.</div>";
    } else {
        $mensaje_eliminacion = "<div class='mensaje-error'>❌ No se encontró el casco con ID **$id**.</div>";
    }
    $stmt->close();
}

/* ===== CONSULTA ===== */
$sql = "SELECT * FROM cascos ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Administrar Cascos</title>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* --- ESTILOS COMPARTIDOS --- */
body {
    background-color: #F8F8E3; /* Fondo */
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
    background: white; /* Contenedor blanco */
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,.1); /* Sombra ligera (mantenida del código de cascos original) */
}
label { font-weight: bold; margin-top: 10px; display: block; }
input, textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}
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

/* Mensajes de feedback (con el nuevo diseño) */
.mensaje-success { 
    background: #d4edda; 
    padding: 10px; 
    margin-bottom: 15px; 
    color: #155724; 
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    font-weight: bold; /* Añadido para consistencia */
}
.mensaje-error { 
    background: #f8d7da; 
    padding: 10px; 
    margin-bottom: 15px;
    color: #721c24; 
    border: 1px solid #f5c6cb;
    border-radius: 4px;
    font-weight: bold; /* Añadido para consistencia */
}


table {
    border-collapse: collapse;
    width: 90%;
    margin: 30px auto;
    background: white;
}
th,td {
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
    <div class="banner-text">Administrar Cascos</div>
</div>

<nav>
    <a href="accidentes2.php">Gestionar Accidentes</a>
    <a href="principal.php">Cerrar Sesión</a>
    <a href="users.php">Gestionar usuarios</a>
     <a href="faq2.php">Gestionar Preguntas</a>
</nav>

<?php 
if (!empty($mensaje_insercion) || !empty($mensaje_actualizacion) || !empty($mensaje_eliminacion)): ?>
<div class="insert-form-container">
    <?php echo $mensaje_insercion; ?>
    <?php echo $mensaje_actualizacion; ?>
    <?php echo $mensaje_eliminacion; ?>
</div>
<?php endif; ?>

<div class="insert-form-container">
<h2>Agregar Nuevo Casco</h2>
<form method="POST">
<input type="hidden" name="accion" value="insertar_casco">
<label>Marca</label><input type="text" name="marca" required>
<label>Modelo</label><input type="text" name="modelo" required>
<label>Tipo</label><input type="text" name="tipo" required>
<label>Certificado</label><input type="text" name="certificado" required>
<label>Descripción</label><textarea name="descripcion" required></textarea>
<label>Precio Aproximado</label><input type="text" name="pecio_aprox" required>
<label>Imagen (Ruta/URL)</label><input type="text" name="imagen" required>
<button type="submit">Guardar Casco</button>
</form>
</div>

<div class="insert-form-container">
<h2>Editar Casco Existente</h2>
<p>Introduce el **ID** del casco a editar y luego los **nuevos datos completos**:</p>
<form method="POST">
<input type="hidden" name="accion" value="actualizar_casco">
<label>ID del Casco a Editar</label>
<input type="number" name="id_casco_edit" required>
<hr style="margin: 20px 0;">
<label>Nueva Marca</label><input type="text" name="marca_edit" required>
<label>Nuevo Modelo</label><input type="text" name="modelo_edit" required>
<label>Nuevo Tipo</label><input type="text" name="tipo_edit" required>
<label>Nuevo Certificado</label><input type="text" name="certificado_edit" required>
<label>Nueva Descripción</label><textarea name="descripcion_edit" required></textarea>
<label>Nuevo Precio Aproximado</label><input type="text" name="pecio_aprox_edit" required>
<label>Nueva Imagen (Ruta/URL)</label><input type="text" name="imagen_edit" required>
<button type="submit">Actualizar Casco</button>
</form>
</div>

<div class="insert-form-container">
<h2>Eliminar Casco</h2>
<form method="POST">
<input type="hidden" name="accion" value="eliminar_casco">
<label>ID del Casco a Eliminar</label>
<input type="number" name="id_casco" required>
<button type="submit" style="background:#7d2b44">Eliminar Casco</button>
</form>
</div>

<?php
if ($resultado->num_rows > 0) {
echo "<table>";
echo "<tr><th>ID</th><th>Marca</th><th>Modelo</th><th>Tipo</th><th>Certificado</th><th>Descripción</th><th>Precio</th><th>Imagen</th></tr>";
while ($fila = $resultado->fetch_assoc()) {
echo "<tr>
<td>{$fila['id']}</td>
<td>{$fila['marca']}</td>
<td>{$fila['modelo']}</td>
<td>{$fila['tipo']}</td>
<td>{$fila['certificado']}</td>
<td>{$fila['descripcion']}</td>
<td>{$fila['pecio_aprox']}</td>
<td><img src='{$fila['imagen']}' width='80'></td>
</tr>";
}
echo "</table>";
} else {
echo "<div class='insert-form-container'><p style='text-align:center'>No hay registros de cascos.</p></div>";
}
$conexion->close();
?>

</body>

</html>