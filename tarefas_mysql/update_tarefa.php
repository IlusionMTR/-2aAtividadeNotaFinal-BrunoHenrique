<?php
require "database.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "UPDATE tarefas SET concluida = 1 WHERE id = $id";
    $con->query($sql);
}

header("Location: index.php");
exit;
?>
