<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancoDeDados = "lista-de-habitos";

//Abre uma conexão com o banco de dados

$conn = new mysqli($servidor, $usuario, $senha, $bancoDeDados);

//Verifica se conexão falhou
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Obtém o id do registro que foi recebido via GET
if (isset($_GET["id"]) && !empty($_GET["id"])) {
  $id = $_GET["id"];
}
var_dump($id);
$sql = "DELETE FROM habito WHERE id=".$id;

//Executa o comando DELETE da variável $sql
if ($conn->query($sql) === TRUE) {
  //Fecha a conexão
  $conn->close();
  //Redireciona para a página inicial
  header("Location: index.php");
  exit(); // Adicionado para garantir que o script pare de ser executado após o redirecionamento
} else {
  //Caso haja erro ao executar o comando SQL, exibe a mensagem de erro
  die("Erro ao excluir: " . $conn->error);
}
