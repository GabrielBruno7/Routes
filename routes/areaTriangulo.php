<?php
include '../config/database.php';


$sql = "SELECT base, altura FROM triangulo";
$result = $conn->query($sql);

$somaAreas = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
     
        $area = ($row['base'] * $row['altura']) / 2;
        $somaAreas += $area;
    }
    echo "A soma das áreas do triangulo é : " . $somaAreas;
} else {
    echo "Não há triângulos cadastrados.";
}
