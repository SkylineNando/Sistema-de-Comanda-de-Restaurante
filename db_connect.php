<?php
$host = "localhost";
$user = "seu_usuario";
$pass = "sua_senha";
$dbname = "restaurante";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
