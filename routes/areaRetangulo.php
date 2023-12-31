<?php
include '../config/database.php';


$sql = "SELECT base, altura FROM retangulo";
$result = $conn->query($sql);

$somaAreas = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
       
        $area = ($row['base'] * $row['altura']) / 2;
        $somaAreas += $area;
    }
    echo "A soma das áreas do retangulo é : " . $somaAreas;
} else {
    echo "Não há retângulos cadastrados.";
}
