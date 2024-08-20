<?php
include_once('../estilo/header.php');
include_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    $sql = "INSERT INTO doadores (nome, telefone, email, rua, numero, complemento, bairro, cidade, estado, cep)
            VALUES ('$nome', '$telefone', '$email', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo doador cadastrado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styledoadores.css">
    <title>Doadores</title>
</head>
<body>
    <aside>
        <div class="voltar">
            <a href="listadoadores.php">
                <div class="voltarlistadoadores"><i class="fas fa-arrow-left"></i>Voltar para a Lista de Doadores</div>
            </a>
            
            <a href="../index.php">
                <div class="voltarinicial"><i class="fas fa-home"></i> Voltar para Tela Inicial</div>
            </a>
        </div>
        <h2 class="titulo">Formulário de Doadores</h2>
        
        <div class="container_formulario">
            <form action="cruddoadores.php" method="post">
                <h3>Informações Pessoais</h3>
                <div class="form-group">
                    <label for="nome">Nome Completo*:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email">
                </div>

                <h3>Endereço</h3>
                <div class="form-group">
                    <label for="rua">Rua:</label>
                    <input type="text" id="rua" name="rua" placeholder="Rua">
                </div>
                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero" placeholder="Número">
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento:</label>
                    <input type="text" id="complemento" name="complemento" placeholder="Complemento">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" placeholder="Bairro">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Cidade">
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado">
                        <option value="">Selecione</option>
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
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" placeholder="CEP">
                </div>
                <button type="submit" class="button" name="cadastrar" value="cadastrar">Concluído</button>
            </form>
        </div>
    </aside>
</body>
</html>
<?php 
include_once('../estilo/footer.php');
?>
