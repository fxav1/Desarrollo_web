<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location: index.php");
    exit();
}

// Si el usuario está autenticado, mostrar la página de dashboard
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Dashboard</h1>
        <p>Hola, <?php echo $_SESSION['username']; ?>. Estás autenticado.</p>
        
        <!-- Aquí puedes mostrar contenido específico para el usuario autenticado -->
        <div class="content">
            <h2>Contenido exclusivo para usuarios autenticados</h2>
            <p>Accede a las funcionalidades que están disponibles solo para usuarios que han iniciado sesión.</p>
        </div>

        <!-- Enlace para cerrar sesión -->
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
