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

        .mensaje-success { background: #d4edda; padding: 10px; }
        .mensaje-error { background: #f8d7da; padding: 10px; }

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
</nav>

<?php
$conexion = new mysqli("localhost", "root", "", "bdproyect");
$conexion->set_charset("utf8");

$mensaje = "";

/* ===== INSERTAR ===== */
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

/* ===== ELIMINAR ACCIDENTE ===== */
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['accion'] == 'eliminar') {
    $id = (int)$_POST['id_eliminar'];

    $stmt = $conexion->prepare("DELETE FROM accidentes WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje = "<div class='mensaje-success'>🗑️ Accidente eliminado</div>";
    } else {
        $mensaje = "<div class='mensaje-error'>❌ ID no encontrado</div>";
    }
}
?>

<!-- FORM INSERTAR -->
<div class="insert-form-container">
<h2>Registrar Accidente</h2>
<?php echo $mensaje; ?>
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

<!-- FORM ELIMINAR -->
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
$resultado = $conexion->query("SELECT * FROM accidentes");
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
}
$conexion->close();
?>

</body>
</html>
