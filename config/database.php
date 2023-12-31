<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "poligonos";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
