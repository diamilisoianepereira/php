<?php
include_once('../estilo/header.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel="stylesheet" href="styledonatario.css">
    <title>Donatários</title>
    
    </script>
</head>

<body>
    <aside>
        <div class="voltar">
            <a href="listadonatario.php">
                <div class="voltarlistadoadores"><i class="fas fa-arrow-left"></i>Voltar para a Lista de Donatários
                </div>
            </a>
            <a href="../index.php">
                <div class="voltarinicial"><i class="fas fa-home"></i> Voltar para Tela Inicial</div>
            </a>
        </div>
        <h2 class="titulo">Formulário de Donatários</h2>

        <div class="container_formulario">
        <form action="cruddonatario.php" method="POST">
                <h3>Informações Pessoais</h3>
                <div class="form-group">
                    <label for="nome">Nome Completo*:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="genero">Gênero:</label>
                    <select id="genero" name="genero">
                        <option value="">Selecione</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone*:</label>
                    <input type="tel" id="telefone" name="telefone" required>
                </div>
               
                <h3>
                    Endereço
                </h3>
                <div class="form-group">
                    <label for="rua">Rua*:</label>
                    <input type="text" id="rua" name="rua" placeholder="Rua" required>
                </div>
                <div class="form-group">
                    <label for="numero">Número*:</label>
                    <input type="text" id="numero" name="numero" placeholder="Número" required>
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento*:</label>
                    <input type="text" id="complemento" name="complemento" placeholder="Complemento">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro*:</label>
                    <input type="text" id="bairro" name="bairro" placeholder="Bairro" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade*:</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado*:</label>
                    <select id="estado" name="estado" required>
                        <option value="">Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cep">CEP*:</label>
                    <input type="text" id="cep" name="cep" placeholder="CEP" required>
                </div>

                <h3>Informações Adicionais</h3>
                
                <div class="form-group">
                    <label for="tamanho_familia">Tamanho da Família:</label>
                    <input type="number" id="tamanho_familia" name="tamanho_familia" min="0" max="20" required><br>
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