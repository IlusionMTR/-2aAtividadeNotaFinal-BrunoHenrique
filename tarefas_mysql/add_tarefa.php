<?php
require "database.php";

if ($_POST) {
    $descricao = $_POST["descricao"];
    $data = $_POST["data_vencimento"];

    $sql = "INSERT INTO tarefas (descricao, data_vencimento) VALUES ('$descricao', '$data')";
    $con->query($sql);

    header("Location: index.php");
    exit;
}
?>
