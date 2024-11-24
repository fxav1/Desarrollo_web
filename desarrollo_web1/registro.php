<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';

    // Recibir datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validar campos vacíos
    if (!empty($username) && !empty($password)) {
        // Encriptar contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar usuario en la base de datos
        $query = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            echo "<p class='success'>Registro exitoso. <a href='index.php'>Inicia sesión aquí</a></p>";
        } else {
            echo "<p class='error'>Error en el registro: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='error'>Por favor, complete todos los campos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>
        <form action="registro.php" method="POST">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrar</button>
        </form>
        <p class="message">¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
