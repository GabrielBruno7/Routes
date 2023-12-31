<?php
include '../config/database.php';

// Consulta ao banco para obter todas as áreas
$sql = "SELECT base, altura FROM triangulo";
$result = $conn->query($sql);

$somaAreas = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Lógica para calcular a área e adicionar à soma
        $area = ($row['base'] * $row['altura']) / 2;
        $somaAreas += $area;
    }
    echo "A soma das áreas é: " . $somaAreas;
} else {
    echo "Não há triângulos cadastrados.";
}
