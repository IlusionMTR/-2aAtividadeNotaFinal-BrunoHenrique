<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $ano = $_POST["ano"];

    $sql = "INSERT INTO livros (titulo, autor, ano)
            VALUES ('$titulo', '$autor', $ano)";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro: " . $conexao->error;
    }
}
?>
