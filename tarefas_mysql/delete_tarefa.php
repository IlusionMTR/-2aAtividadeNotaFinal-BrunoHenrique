<?php
require "database.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM tarefas WHERE id = $id";
    $con->query($sql);
}

header("Location: index.php");
exit;
?>
