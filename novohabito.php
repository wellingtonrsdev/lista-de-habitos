<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Lista de hábitos</title>
</head>

<body>
  <div class="center">
    <h1>Novo Hábito</h1>

    <!--Formualário para cadastro de pessoas-->
    <form id="formulario" action="inserthabito.php" method="post">
      <p><label> Nome: <input type="text" id="nome" name="nome" autofocus /></label></p>
      <p><input type="submit" value="Criar"></p>
    </form>
  </div>

  <script type="text/javascript">
    //Declara uma função para validar o formulário
    const validaForm = function() {
      let nomeHabito = document.getElementById("nome").value;
      if ("" === nomeHabito) {
        alert("É necessário informar o nome do hábito");
        return false;
      }
      return true;
    }

    //Aqui declaramos que está função ocorre sempre no submit do formulário
    document.getElementById("formulario").onsubmit = validaForm;
  </script>
</body>

</html>
