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

//Atualiza o status A -ativo para V -vencido

$id = $_GET["id"];
$sql = "UPDATE habito " . "SET status='V' " . "WHERE  id=" . $id;

//Verifica se o comando foi executado com sucesso

if (!($conn->query($sql) === TRUE)) {
  $conn->close();
  die("Erro ao atualizar " . $conn->error);
}


//Fecha a conexão
$conn->close();

//Redireciona para o index
header("Location: index.php");
