<?php
include '../config/database.php';

$queryTriangulo = "SELECT * FROM triangulo";
$resultTriangulo = $conn->query($queryTriangulo);
$trianguloData = array();

if ($resultTriangulo->num_rows > 0) {
    while ($row = $resultTriangulo->fetch_assoc()) {
        $trianguloData[] = $row;
    }
}


$queryRetangulo = "SELECT * FROM retangulo";
$resultRetangulo = $conn->query($queryRetangulo);
$retanguloData = array();

if ($resultRetangulo->num_rows > 0) {
    while ($row = $resultRetangulo->fetch_assoc()) {
        $retanguloData[] = $row;
    }
}


$data = array("triangulo" => $trianguloData, "retangulo" => $retanguloData);


$jsonData = json_encode($data, JSON_PRETTY_PRINT);

file_put_contents('dados_poligonos.json', $jsonData);

$conn->close();

echo $jsonData;
?>
