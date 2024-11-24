<?php
$conn = new mysqli('localhost', 'root', 'root', 'sistema_login');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
