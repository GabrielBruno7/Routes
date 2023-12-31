<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $base = isset($_POST['base']) ? mysqli_real_escape_string($conn, $_POST['base']) : null;
    $altura = isset($_POST['altura']) ? mysqli_real_escape_string($conn, $_POST['altura']) : null;
    $area = $base * $altura;

    if ($base !== null && $altura !== null && $area !== null ) {
        $insertSql = "INSERT INTO retangulo (base, altura, area) VALUES ('$base', '$altura', '$area')";
        $insertResult = $conn->query($insertSql);

        if ($insertResult) {
            echo "Retângulo cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar retângulo: " . $conn->error;
        }
    } else {
        echo "Dados de base e/ou altura ausentes ou inválidos.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
 
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $retanguloId = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : null;

    if ($retanguloId !== null) {
      
        $checkSql = "SELECT id FROM retangulo WHERE id = '$retanguloId'";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            $deleteSql = "DELETE FROM retangulo WHERE id = '$retanguloId'";
            $deleteResult = $conn->query($deleteSql);

            if ($deleteResult) {
                echo "Retângulo excluído com sucesso!";
            } else {
                echo "Erro ao excluir retângulo: " . $conn->error;
            }
        } else {
            echo "ID do retângulo não encontrado no banco de dados.";
        }
    } else {
        echo "ID do retângulo não fornecido ou inválido.";
    }
} else {
    echo "Método HTTP não suportado.";
}
