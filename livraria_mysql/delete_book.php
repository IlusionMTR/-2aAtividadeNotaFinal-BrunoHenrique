<?php
require 'database.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conexao->query("DELETE FROM livros WHERE id = $id");
}

header("Location: index.php");
exit;
?>
