<?php

namespace app\controllers;

include 'C:\xampp\htdocs\simple-routes\app\config\database.php';

class SomaController {
    public function index(){
        $conn = new \PDO("mysql:host=localhost;dbname=geometria", "root", "");

        // Consulta SQL para calcular a soma da coluna 'area' da tabela 'retangulos'
        $sql_rectangle = "SELECT SUM(area) as Rectangle_Total_Area  FROM rectangles";
        $result_rectangle = $conn->query($sql_rectangle);

        $sql_triangle = "SELECT SUM(area) as Triangle_Total_Area  FROM triangulos";
        $result_triangle = $conn->query($sql_triangle);

        // Verifica se a consulta foi bem-sucedida
        if ($result_rectangle &&  $result_triangle ) {
            // Obtém o resultado da soma
            $soma_rectangle = $result_rectangle->fetchAll(\PDO::FETCH_ASSOC);
            $soma_triangle = $result_triangle->fetchAll(\PDO::FETCH_ASSOC);
           

            // Exibe o resultado em formato JSON
            header('Content-Type: application/json');
            echo json_encode([
                'Rectangle' => $soma_rectangle,
                'Triangle' => $soma_triangle,]);
        } else {
            // Se a consulta falhar, exibe uma mensagem de erro
            echo "Erro na consulta: " . $conn->errorInfo()[2];
        }
    }
}
