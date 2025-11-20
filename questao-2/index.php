<?php require "database.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Gerenciador de Tarefas</h1>

    <div class="card">
        <h2>Adicione a Tarefa</h2>

        <form action="add_tarefa.php" method="post">
            <label>Descrição:</label>
            <input type="text" name="descricao" required>

            <label>Data de Vencimento:</label>
            <input type="date" name="data_vencimento" required>

            <button type="submit">Adicionar</button> 
        </form>
    </div>

    <hr>
    <br>

    <h2>Tarefas Pendentes</h2>

    <ul>
    <?php
    $pendentes = $con->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY data_vencimento ASC");
    if ($pendentes->num_rows > 0) {
        while ($t = $pendentes->fetch_assoc()) {
            echo "
            <li>
                <strong>{$t['descricao']}</strong> - {$t['data_vencimento']}

                <a class='btn done' href='update_tarefa.php?id={$t['id']}'>Concluir</a>
                <a class='btn delete' href='delete_tarefa.php?id={$t['id']}'>Excluir</a>
            </li>";
        }
    } else {
        echo "<p>Nenhuma tarefa pendente.</p>";
    }
    ?>
    </ul>

    <h2>Tarefas Concluídas</h2>

    <ul>
    <?php
    $concluidas = $con->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY data_vencimento ASC");
    
    if ($concluidas->num_rows > 0) {
        while ($t = $concluidas->fetch_assoc()) {
            echo "
            <li class='concluida'>
                <strong>{$t['descricao']}</strong> - {$t['data_vencimento']}
                <a class='btn delete' href='delete_tarefa.php?id={$t['id']}'>Excluir</a>
            </li>";
        }
    } else {
        echo "<p>Nenhuma tarefa concluída.</p>";
    }
    ?>
    </ul>

</div>

<script>

window.onload = function () {
    const itens = document.querySelectorAll(".item");
    itens.forEach((item, index) => {
        setTimeout((0.5) => {
            item.style.opacity = "1";
            item.style.transform = "translateY(0)";
        }, index * 120);
    });
};

</script>

<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  background: #f2f2f2;
  padding: 40px 0;
}

.container {
  width: 500px;
  margin: auto;
  background: white;
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 5px 18px rgba(0,0,0,0.15);
  text-align: center;
}

h1 {
  margin-bottom: 20px;
  color: #222;
}

.card {
  background: #fafafa;
  padding: 20px;
  border-radius: 10px;
  text-align: left;
  margin-bottom: 20px;
}

.card h2 {
  margin-bottom: 15px;
}

label {
  font-weight: bold;
  font-size: 14px;
}

input[type="text"],
input[type="date"] {
  width: 100%;
  padding: 10px;
  margin: 5px 0 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

button {
  width: 100%;
  padding: 12px;
  background: #007bff;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background: #005fcc;
}

ul {
  list-style: none;
  margin: 15px 0;
}

li {
  background: #f7f7f7;
  padding: 12px;
  margin-bottom: 10px;
  border-radius: 8px;
}

.concluida {
  background: #d4f7d4;
}

.btn {
  padding: 5px 10px;
  font-size: 13px;
  margin-left: 10px;
  border-radius: 5px;
  text-decoration: none;
  color: white;
}

.done {
  background: #28a745;
}

.delete {
  background: #dc3545;
}

</style>

</body>
</html>
