<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
  //incluir arquivo de conexao com o BD
    require_once('../config.php');
 
    //armazena id 
   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM doadores where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conn->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $telefone = $array_retorno['telefone'];
   $email = $array_retorno['email'];
   $rua = $array_retorno['rua'];
   $numero = $array_retorno['numero'];
   $complemento = $array_retorno['complemento'];
   $bairro = $array_retorno['bairro'];
   $cidade = $array_retorno['cidade'];
   $estado = $array_retorno['estado'];
   $cep = $array_retorno['cep'];
 
   
?>
    <!-- formulario para cadastrar aluno metodo post, enviar dados para form crudaluno.php -->
    <form method="POST" action="cruddoadores.php">
        <input type="hidden" name="id" value="<?php echo ($id); ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" value="<?php echo $telefone; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

        <label for="rua">Rua:</label>
        <input type="text" id="rua" name="rua" value="<?php echo $rua; ?>" required>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" value="<?php echo $numero; ?>" required>

        <label for="complemento">Complemento:</label>
        <input type="text" id="complemento" name="complemento" value="<?php echo $complemento; ?>">

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" value="<?php echo $bairro; ?>" required>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="<?php echo $cidade; ?>" required>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="<?php echo $estado; ?>"> <?php echo $estado;?></option>
            <option value="Acre">Acre</option>
            <option value="Alagoas">Alagoas</option>
            <option value="Amapá">Amapá</option>
            <option value="Amazonas">Amazonas</option>
            <option value="Bahia">Bahia</option>
            <option value="Ceará">Ceará</option>
            <option value="Distrito Federal">Distrito Federal</option>
            <option value="Espírito Santo">Espírito Santo</option>
            <option value="Goiás">Goiás</option>
            <option value="Maranhão">Maranhão</option>
            <option value="Mato Grosso">Mato Grosso</option>
            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
            <option value="Minas Gerais">Minas Gerais</option>
            <option value="Pará">Pará</option>
            <option value="Paraíba">Paraíba</option>
            <option value="Paraná">Paraná</option>
            <option value="Pernambuco">Pernambuco</option>
            <option value="Piauí">Piauí</option>
            <option value="Rio de Janeiro">Rio de Janeiro</option>
            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
            <option value="Rondônia">Rondônia</option>
            <option value="Roraima">Roraima</option>
            <option value="Santa Catarina">Santa Catarina</option>
            <option value="São Paulo">São Paulo</option>
            <option value="Sergipe">Sergipe</option>
            <option value="Tocantins">Tocantins</option>
        </select>
        </div>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" value="<?php echo $cep; ?>" required>

        <input type="submit" name="update" value="Alterar">
    </form>
</body>

</html>