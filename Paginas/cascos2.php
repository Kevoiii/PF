<?php
$host = "localhost";
$usuario_db = "root";
$clave = "";
$base = "bdproyect";

$mensaje_insercion = "";
$mensaje_eliminacion = "";

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
        $mensaje_insercion = "<div class='mensaje-form mensaje-success'>✅ Casco agregado correctamente.</div>";
    } else {
        $mensaje_insercion = "<div class='mensaje-form mensaje-error'>❌ Error al agregar casco.</div>";
    }
    $stmt->close();
}

/* ===== ELIMINAR CASCO ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'eliminar_casco') {

    $id = $_POST['id_casco'];

    $sql_delete = "DELETE FROM cascos WHERE id = ?";
    $stmt = $conexion->prepare($sql_delete);
    $stmt->bind_param("i", $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje_eliminacion = "<div class='mensaje-form mensaje-success'>🗑️ Casco eliminado correctamente.</div>";
    } else {
        $mensaje_eliminacion = "<div class='mensaje-form mensaje-error'>❌ No se encontró el ID.</div>";
    }
    $stmt->close();
}

/* ===== CONSULTA ===== */
$sql = "SELECT * FROM cascos";
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
body{margin:0;font-family:Arial;background:#fff}
.banner{position:relative;height:350px}
.banner img{width:100%;height:350px;object-fit:cover}
.banner-text{position:absolute;top:20px;left:20px;color:#ece4e4;font-size:40px;font-weight:bold;text-shadow:2px 2px 8px black}
nav{background:#5b1a2e;display:flex;gap:30px;padding:10px 30px;white-space:nowrap;overflow-x:auto}
nav a{color:#eee;text-decoration:none;padding:6px 8px;border-radius:4px}
nav a:hover{background:#7d2b44}

.insert-form-container{
max-width:600px;margin:30px auto;padding:20px;background:#f7f7f7;
border-radius:8px;box-shadow:0 2px 4px rgba(0,0,0,.1)
}
.insert-form-container h2{text-align:center;color:#5b1a2e}
label{font-weight:bold;margin-top:10px;display:block}
input,textarea{width:100%;padding:8px;margin-top:5px;border-radius:4px;border:1px solid #ccc}
button{background:#5b1a2e;color:white;border:none;padding:10px 15px;border-radius:4px;margin-top:15px;cursor:pointer}
button:hover{background:#7d2b44}

.mensaje-form{text-align:center;margin-top:15px;padding:10px;border-radius:4px;font-weight:bold}
.mensaje-success{background:#d4edda;color:#155724}
.mensaje-error{background:#f8d7da;color:#721c24}

table{border-collapse:collapse;width:90%;margin:30px auto;background:white}
th,td{border:1px solid #ddd;padding:10px}
th{background:#5b1a2e;color:white}
</style>
</head>

<body>

<div class="banner">
    <img src="img/ChatGPT Image Dec 5, 2025, 08_36_09 AM.png">
    <div class="banner-text">CBTis 217</div>
</div>

<nav>
    <a href="accidentes2.php">Agregar Accidentes</a>
    <a href="principal.php">Cerrar Sesión</a>
</nav>

<!-- AGREGAR -->
<div class="insert-form-container">
<h2>Agregar Casco</h2>
<?php echo $mensaje_insercion; ?>
<form method="POST">
<input type="hidden" name="accion" value="insertar_casco">
<label>Marca</label><input type="text" name="marca" required>
<label>Modelo</label><input type="text" name="modelo" required>
<label>Tipo</label><input type="text" name="tipo" required>
<label>Certificado</label><input type="text" name="certificado" required>
<label>Descripción</label><textarea name="descripcion" required></textarea>
<label>Precio Aproximado</label><input type="text" name="pecio_aprox" required>
<label>Imagen</label><input type="text" name="imagen" required>
<button type="submit">Guardar Casco</button>
</form>
</div>

<!-- ELIMINAR -->
<div class="insert-form-container">
<h2>Eliminar Casco</h2>
<?php echo $mensaje_eliminacion; ?>
<form method="POST">
<input type="hidden" name="accion" value="eliminar_casco">
<label>ID del Casco</label>
<input type="text" name="id_casco" required>
<button type="submit" style="background:#7d2b44">Eliminar Casco</button>
</form>
</div>

<!-- TABLA -->
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
echo "<p style='text-align:center'>No hay registros</p>";
}
$conexion->close();
?>

</body>
</html>
