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
    die("Error de conexión: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");

/* ===== INSERTAR USUARIO (login) ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'insertar_usuario') {

    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql_insert = "INSERT INTO login (username, pass) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql_insert);
    $stmt->bind_param("ss", $username, $pass);

    if ($stmt->execute()) {
        $mensaje_insercion = "<div class='mensaje-success'>✅ Usuario **$username** agregado correctamente.</div>";
    } else {
        $mensaje_insercion = "<div class='mensaje-error'>❌ Error al agregar usuario: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

/* ===== EDITAR/ACTUALIZAR USUARIO (login) ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'actualizar_usuario') {
    
    $id = (int)$_POST['id_usuario_edit'];
    $username_nuevo = $_POST['username_edit'];
    $pass_nuevo = $_POST['pass_edit'];
    
    $sql_update = "UPDATE login SET username=?, pass=? WHERE id = ?";
    $stmt = $conexion->prepare($sql_update);
    $stmt->bind_param("ssi", $username_nuevo, $pass_nuevo, $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje_actualizacion = "<div class='mensaje-success'>✏️ Usuario con ID **$id** actualizado correctamente.</div>";
    } else {
        $mensaje_actualizacion = "<div class='mensaje-error'>❌ Error al actualizar el usuario con ID **$id**. Verifica que el ID exista.</div>";
    }
    $stmt->close();
}

/* ===== ELIMINAR USUARIO (login) ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'eliminar_usuario') {

    $id = (int)$_POST['id_usuario'];

    $sql_delete = "DELETE FROM login WHERE id = ?";
    $stmt = $conexion->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje_eliminacion = "<div class='mensaje-success'>🗑️ Usuario con ID **$id** eliminado correctamente.</div>";
    } else {
        $mensaje_eliminacion = "<div class='mensaje-error'>❌ No se encontró el usuario con ID **$id**.</div>";
    }
    $stmt->close();
}

/* ===== CONSULTA DE USUARIOS ===== */
$sql = "SELECT id, username, pass FROM login ORDER BY id DESC"; 
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Administrar Usuarios</title>
<style>
/* --- DISEÑO APLICADO --- */
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
    background: white; /* Contenedor blanco */
    border-radius: 8px;
}
label { font-weight: bold; margin-top: 10px; display: block; }
input, textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc; /* Añadido borde para campos de texto */
    border-radius: 4px;
}
button {
    background: #5b1a2e; /* Botón principal */
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
th { background: #5b1a2e; color: white; } /* Cabecera de tabla */
</style>
</head>

<body>

<div class="banner">
    <img src="img/ChatGPT Image Dec 5, 2025, 08_36_09 AM.png"> 
    <div class="banner-text">Administración de Usuarios</div>
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
<h2>Agregar Nuevo Usuario</h2>
<form method="POST">
<input type="hidden" name="accion" value="insertar_usuario">
<label>Nombre de Usuario</label><input type="text" name="username" required>
<label>Contraseña</label><input type="password" name="pass" required>
<button type="submit">Crear Usuario</button>
</form>
</div>

<div class="insert-form-container">
<h2>Editar Usuario Existente</h2>
<p>Introduce el **ID** del usuario a editar y los **nuevos datos**:</p>
<form method="POST">
<input type="hidden" name="accion" value="actualizar_usuario">
<label>ID del Usuario a Editar</label>
<input type="number" name="id_usuario_edit" required>
<hr style="margin: 20px 0;">
<label>Nuevo Nombre de Usuario</label><input type="text" name="username_edit" required>
<label>Nueva Contraseña</label><input type="password" name="pass_edit" required>
<button type="submit">Actualizar Usuario</button>
</form>
</div>

<div class="insert-form-container">
<h2>Eliminar Usuario</h2>
<form method="POST">
<input type="hidden" name="accion" value="eliminar_usuario">
<label>ID del Usuario a Eliminar</label>
<input type="number" name="id_usuario" required>
<button type="submit" style="background:#7d2b44">Eliminar Usuario</button>
</form>
</div>

<?php
if ($resultado->num_rows > 0) {
echo "<table>";
echo "<tr><th>ID</th><th>Nombre de Usuario</th><th>Contraseña (Referencia)</th></tr>"; 
while ($fila = $resultado->fetch_assoc()) {
echo "<tr>
<td>{$fila['id']}</td>
<td>{$fila['username']}</td>
<td>********</td> 
</tr>";
}
echo "</table>";
} else {
echo "<div class='insert-form-container'><p style='text-align:center'>No hay usuarios registrados.</p></div>";
}
$conexion->close();
?>

</body>
</html>