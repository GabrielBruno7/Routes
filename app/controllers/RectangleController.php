<?php

namespace app\controllers;

include 'C:\xampp\htdocs\simple-routes\app\config\database.php';

class RectangleController
{


    public function index()
    {
        $conn = new \PDO("mysql:host=localhost;dbname=geometria", "root", "");

        $sql = 'SELECT * FROM rectangles';
        $result = $conn->query($sql);

        if ($result) {
            // Fetch all rows from the result set
            $rectangles = $result->fetchAll(\PDO::FETCH_ASSOC);

            // Encode the result as JSON and output it
            header('Content-Type: application/json');
            echo json_encode($rectangles, JSON_PRETTY_PRINT);
        } else {
            echo "Error executing the query: " . $conn->errorInfo()[2];
        }
    }

    public function store()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do corpo da requisição POST
            $width = $_POST['width'] ?? null;
            $length = $_POST['length'] ?? null;

            // Calcula a área
            $area = ($width * $length);

            // Verifica se todos os parâmetros foram fornecidos
            if ($width !== null && $length !== null) {
                $conn = new \PDO("mysql:host=localhost;dbname=geometria", "root", "");

                $insertSql = "INSERT INTO rectangles (width, length, area) VALUES ('$width', '$length', '$area')";
                $insertResult = $conn->exec($insertSql);

                if ($insertResult !== false) {
                    echo "Dados inseridos com sucesso!";
                } else {
                    echo "Erro ao inserir dados: " . $conn->errorInfo()[2];
                }
            } else {
                echo "Parâmetros incompletos na requisição POST. Forneça 'width' e 'length'.";
            }
        } else {
            echo "Método de requisição inválido. Use POST.";
        }
    }

    public function destroy()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            parse_str(file_get_contents("php://input"), $deleteParams);

            $id = $deleteParams['id'] ?? null;

            if ($id !== null) {
                $conn = new \PDO("mysql:host=localhost;dbname=geometria", "root", "");

                $deleteSql = "DELETE FROM rectangles WHERE id = '$id'";
                $deleteResult = $conn->exec($deleteSql);

                if ($deleteResult !== false) {
                    echo "O retângulo com ID:$id foi  excluído com sucesso!";
                } else {
                    echo "Erro ao excluir dados: " . $conn->errorInfo()[2];
                }
            } else {
                echo "Parâmetro 'id' não fornecido para a exclusão.";
            }
        } else {
            echo "Método de requisição inválido. Use DELETE.";
        }
    }
}
