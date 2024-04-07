<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Lista de hábitos</title>
</head>

<body>
  <div class="center">
    <h1>Lista de hábitos</h1>
    <p>Cadastre aqui os hábitos que você tem que vencer para melhorar a sua vida!</p>
    <?php
    //obtém a lista de hábitos do banco de dados

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bancoDeDados = "lista-de-habitos";

    //Cria uma conexão com o banco de dados

    $conexao = new mysqli($servidor, $usuario, $senha, $bancoDeDados);

    //Verifica a conexão
    if ($conexao->connect_error) {
      die("Falha na conexão: " . $conexao->connect_error);
    }

    //Executa a query da variável $sql

    $sql = "SELECT id, nome FROM habito WHERE status = 'A'";

    $resultado = $conexao->query($sql);

    //Verifica se a query retornou os registros

    if ($resultado->num_rows > 0) {

    ?>
      <br />
      <table class="center">
        <tbody>
          <?php
          //Looping pelos registros retornados
          while ($registro = $resultado->fetch_assoc()) {
          ?>

            <tr>
              <td><?php echo $registro["nome"]; ?></td>
              <td><a href="vencerhabito.php?id=<?php echo $registro["id"]; ?>">Vencer</a></td>
              <td><a href="desistirhabito.php?id=<?php echo $registro["id"]; ?>">Desistir</a></td>
            </tr>

          <?php
          }
          // fim do loop
          ?>

        </tbody>
      </table>
      <p>Continue mudando sua vida!</p>
      <p>Cadastre mais hábitos!</p>
    <?
    } else {
    ?>

      <p>Você não possui hábitos cadastrados!</p>
      <p>Comece já a mudar a sua vida !</p>

    <?php
    }
    //fim do if

    //Fecha a conexão com o mysql
    $conexao->close();

    ?>

    <a href="novohabito.php">Cadastrar Hábito</a>
  </div>
</body>

</html>
