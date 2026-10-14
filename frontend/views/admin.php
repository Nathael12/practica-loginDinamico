<?php
session_start();

// Control de acceso estricto a nivel de serividor
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'Administrador'){
    // Si no esta logeado o no pertenece aqui, es expulsado del login inmediantemanete
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="../../frontend/css/admin.css">
</head>
<body>
    <!-- htmlspecialchars previene ataques XSS a renderixado datos del usuario -->
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></h1>
    <h3>Rol actual: <?php echo $_SESSION['rol']; ?> (Acceso Total)</h3>
    <p>Área exclusiva de administracion</p>

    <a href="../../backend/api/logout.php">Cerrar Sesion de manera segura... </a>
</body>
</html>
