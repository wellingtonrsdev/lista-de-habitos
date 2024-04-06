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

//Obtém o id do registro que foi recebido via GET

$id = $_GET["id"];

$sql = "DELETE FROM habito WHERE id=" . $id;

//Executa o comando delete da variável $sql

if (!($conn->query($sql) === TRUE)) {
  die("Erro ao excluir: " . $conn->error);
}

//Fecha a conexão
$conn->close();

//Redireciona para a página inicial
header("Location: index.php");
