<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancoDeDados = "lista-de-habitos";

//Abre uma conexão com o banco de dados

$conexao = new mysqli($servidor, $usuario, $senha, $bancoDeDados);

//Verifica se conexão falhou
if ($conexao->connect_error) {
  die("Falha na conexão: " . $conexao->connect_error);
}

//Busca nome que foi recebido via get através do formulário de cadastro

$nome = $_POST["nome"];

//insere o habito na tabela do banco de dados

$sql = "INSERT INTO habito (nome, status) VALUES ('" .$nome. "', 'A')";

//verifica se ocorreu tudo bem, caso houve erro fecha a conexão e aborta o programa

if (!($conexao->query($sql) === TRUE)) {
  $conexao->close();
  die("ERRO: " . $sql . "<br>" . $conexao->error);
}

//fecha a conexão BD
$conexao->close();

//Envia para a página index onde aparece a lista de hábitos já com o novo hábito cadastrado
header("Location: index.php");
exit();
