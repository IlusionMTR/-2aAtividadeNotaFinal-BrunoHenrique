<?php require "database.php"; ?> <!-- puxa o sql do database antes de começar a aplicação na pagina -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Banco de Dados Livraria</title>
  </head>
<body>

<div class="container">
<h1>Livraria PHP e SQL</h1>

<h2>Adicionar Livro</h2> <br> 

<form action="add_book.php" method="post">
    <label>Título:</label>
    <input type="text" name="titulo" required> <br><br>

    <label>Autor:</label>
    <input type="text" name="autor" required> <br><br>

    <label>Ano:</label>
    <input type="date" name="ano" required> <br><br>

    <button type="submit">Adicionar</button>
</form>
<br>

<hr>

<br>

<h2>Livros cadastrados</h2> 

<?php
$resultado = $conexao->query("SELECT * FROM livros");

while ($linha = $resultado->fetch_assoc()) {
    echo "<p>
            <strong>ID:</strong> {$linha['id']} | 
            <strong>Título:</strong> {$linha['titulo']} | 
            <strong>Autor:</strong> {$linha['autor']} | 
            <strong>Ano:</strong> {$linha['ano']} 
         </p> <br>";
}
?>

<div>

<script>

document.getElementById("formLivro").addEventListener("submit", function(e) {
    const titulo = document.getElementById("titulo").value.trim();
    const autor = document.getElementById("autor").value.trim();
    const ano = document.getElementById("ano").value;

    if (titulo === "" || autor === "" || ano === "") {
        alert("Preencha este campo.");
        e.preventDefault();
    } else {
        alert("Livro adicionado com sucesso!");
    }
});

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

label {
  font-weight: bold;
  font-size: 14px;
}

input[type="text"],
input[type="date"],
input[type="submit"] {
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

</style>

</body>
</html>
