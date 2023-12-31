<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lógica para cadastrar triângulo
    $base = isset($_POST['base']) ? mysqli_real_escape_string($conn, $_POST['base']) : null;
    $altura = isset($_POST['altura']) ? mysqli_real_escape_string($conn, $_POST['altura']) : null;
    $area = $base * $altura/2;

    if ($base !== null && $altura !== null && $area !== null ) {
        $insertSql = "INSERT INTO triangulo (base, altura, area) VALUES ('$base', '$altura', '$area')";
        $insertResult = $conn->query($insertSql);

        if ($insertResult) {
            echo "Triângulo cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar triângulo: " . $conn->error;
        }
    } else {
        echo "Dados de base e/ou altura ausentes ou inválidos.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lógica para obter triângulos
    // ...
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $trianguloId = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : null;

    if ($trianguloId !== null) {
        // Verifique se o ID existe no banco de dados antes de excluir
        $checkSql = "SELECT id FROM triangulo WHERE id = '$trianguloId'";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            $deleteSql = "DELETE FROM triangulo WHERE id = '$trianguloId'";
            $deleteResult = $conn->query($deleteSql);

            if ($deleteResult) {
                echo "Triângulo excluído com sucesso!";
            } else {
                echo "Erro ao excluir triângulo: " . $conn->error;
            }
        } else {
            echo "ID do triângulo não encontrado no banco de dados.";
        }
    } else {
        echo "ID do triângulo não fornecido ou inválido.";
    }
} else {
    echo "Método HTTP não suportado.";
}
