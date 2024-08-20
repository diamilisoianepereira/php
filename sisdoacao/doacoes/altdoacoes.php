<?php 
require_once('../config.php');

// Executa SQL no BD e seleciona todos os doadores
$retorno = $conn->prepare('SELECT id, nome FROM doadores');
$retorno->execute();
$doadorList = $retorno->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styledoacoes.css">
    <title>Formulário de Doações</title>
</head>


    <?php
  //incluir arquivo de conexao com o BD
    require_once('../config.php');
 
    //armazena id 
   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM doacoes where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conn->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();

   $tipo_doacao = $array_retorno['tipo_doacao'];
   $valor = $array_retorno['valor'];
   $forma_recebimento = $array_retorno['forma_recebimento'];
   $especifique_recebimento = $array_retorno['especifique_recebimento'];
   $tipo_roupa = $array_retorno['tipo_roupa'];
   $tamanho = $array_retorno['tamanho'];
   $estilo = $array_retorno['estilo'];
   $tipo_higiene = $array_retorno['tipo_higiene'];
   $tipo_limpeza = $array_retorno['tipo_limpeza'];
   $tipo_escolar = $array_retorno['tipo_escolar'];
   $detalhes_escolar = $array_retorno['detalhes_escolar'];
   $tipo_alimento = $array_retorno['tipo_alimento'];
   $tipo_brinquedo = $array_retorno['tipo_brinquedo'];
   $outro_tipo = $array_retorno['outro_tipo'];
   $quantidade = $array_retorno['quantidade'];
   $detalhes = $array_retorno['detalhes'];

 
   
?>
    <!-- formulario para cadastrar aluno metodo post, enviar dados para form crudaluno.php -->
    <form method="POST" action="cruddoadores.php">
        
    <?php
include_once('../estilo/header.php');

/*
 * Melhor prática usando Prepared Statements
 * 
 */

// Permite acesso às variáveis dentro do arquivo conexão
require_once('../config.php');

// Executa SQL no BD e seleciona todos os doadores
$retorno = $conn->prepare('SELECT id, nome FROM doadores');
$retorno->execute();
$doadorList = $retorno->fetchAll();
?>


<body>
    <aside>
        <div class="voltar">
            <a href="listadoacoes.php">
                <div class="voltarlista"><i class="fas fa-arrow-left"></i>Voltar para a Lista de Doações</div>
            </a>
            <a href="../index.php">
                <div class="voltarinicial"><i class="fas fa-home"></i> Voltar para Tela Inicial</div>
            </a>
        </div>
        <h2 class="titulo">Formulário de Doações</h2>

        <div class="container_formulario">
            <form action="cruddoadores.php" method="post">
                                
                <h3>Informações da Doação</h3>
                <div class="form-group">
                    <label for="tipo-doacao">Tipo de Doação:</label>
                    <select id="tipo-doacao" name="tipo-doacao" onchange="mostrarCamposEspecificos(this.value)"
                        required>
                        <option value="<?php echo $tipo_doacao?>">"<?php echo $tipo_doacao?>"</option>
                        <option value="dinheiro">Dinheiro</option>
                        <option value="roupa">Roupa</option>
                        <option value="higiene">Itens de Higiene</option>
                        <option value="limpeza">Itens de Limpeza</option>
                        <option value="escolar">Material Escolar</option>
                        <option value="alimento">Alimentos não perecíveis</option>
                        <option value="brinquedo">Brinquedos</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>

                <div id="campos-dinheiro" style="display: none;">
                    <div class="form-group">
                        <label for="valor">Valor da Doação:</label>
                        <input type="number" id="valor" name="valor" min="0" step="0.01" placeholder="0.00" value="<?php echo $valor ?>">
                    </div>

                    <div id="campos-receba" style="display: none;">
                        <div class="form-group">
                            <label for="forma-recebimento">Forma de Recebimento:</label>
                            <select id="forma-recebimento" name="forma-recebimento"
                                onchange="mostrarEspecifiqueRecebimento(this.value)">
                                <option value="<?php echo $forma_recebimento ?>"><?php echo $forma_recebimento ?></option>
                                <option value="transferencia">Transferência</option>
                                <option value="pix">PIX</option>
                                <option value="deposito">Depósito</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>

                        <div id="especifique-recebimento" style="display: none;">
                            <div class="form-group">
                                <label for="especifique">Especifique:</label>
                                <input type="text" id="especifique" name="especifique" value="<?php echo $especifique_recebimento ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="campos-roupa" style="display: none;">
                    <div class="form-group">
                        <label for="tipo-roupa">Tipo de Roupa:</label>
                        <select id="tipo-roupa" name="tipo-roupa" onchange="mostrarEspecifiqueRoupa(this.value)">
                            <option value="<?php echo $tipo_roupa  ?>"><?php echo $tipo_roupa  ?></option>
                            <option value="calca">Calça</option>
                            <option value="blusa">Blusa</option>
                            <option value="calcado">Calçados</option>
                            <option value="roupa-intima">Roupa Íntima</option>
                            <option value="short">Short</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="tamanho">Tamanho:</label>
                        <select id="tamanho" name="tamanho">
                            <option value="<?php echo $tamanho ?>">"<?php echo $tamanho ?>"</option>
                            <option value="pp">PP</option>
                            <option value="p">P</option>
                            <option value="m">M</option>
                            <option value="g">G</option>
                            <option value="gg">GG</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="estilo">Estilo:</label>
                        <select id="estilo" name="estilo">
                            <option value="<?php echo $estilo ?>"><?php echo $estilo ?></option>
                            <option value="infantil">Infantil</option>
                            <option value="adulto">Adulto</option>
                        </select>
                    </div>
                </div>

                <div id="campos-higiene" style="display: none;">
                    <div class="form-group">
                        <label for="tipo-higiene">Tipo de Item de Higiene:</label>
                        <select id="tipo-higiene" name="tipo-higiene">
                            <option value="<?php echo $tipo_higiene ?>"><?php echo $tipo_higiene ?></option>
                            <option value="sabao">Sabonete</option>
                            <option value="shampoo">Shampoo</option>
                            <option value="condicionador">Condicionador</option>
                            <option value="absorvente">Absorvente</option>
                            <option value="desodorante">Desodorante</option>
                            <option value="pasta-dente">Pasta de Dente</option>
                            <option value="escova-dente">Escova de Dente</option>
                            <option value="pente">Pente</option>
                            <option value="escova-cabelo">Escova de Cabelo</option>
                            <option value="fralda">Fralda Descartável de Bebê</option>
                        </select>
                    </div>
                </div>

                <div id="campos-limpeza" style="display: none;">
                    <div class="form-group">
                        <label for="tipo-limpeza">Tipo de Item de Limpeza:</label>
                        <select id="tipo-limpeza" name="tipo-limpeza">
                            <option value="<?php echo $tipo_limpeza ?>"><?php echo $tipo_limpeza ?></option>
                            <option value="sabonete-powder">Sabão em Pó</option>
                            <option value="sabonete-bar">Sabão em Barra</option>
                            <option value="desinfetante">Desinfetante</option>
                            <option value="detergente">Detergente</option>
                            <option value="esponja">Esponja de Lavar Louça</option>
                            <option value="papel-higienico">Papel Higiênico</option>
                            <option value="agua-sanitária">Água Sanitária</option>
                        </select>
                    </div>
                </div>

                <div id="campos-escolar" style="display: none;">
                    <div class="form-group">
                        <label for="tipo-escolar">Tipo de Material Escolar:</label>
                        <select id="tipo-escolar" name="tipo-escolar" onchange="mostrarDetalhesEscolar(this.value)">
                            <option value="<?php echo  $tipo_escolar  ?>"><?php echo  $tipo_escolar  ?></option>
                            <option value="caderno">Cadernos</option>
                            <option value="lapis">Conjunto de Lápis</option>
                            <option value="apontador">Apontadores</option>
                            <option value="giz">Giz de Cera</option>
                            <option value="caneta">Canetas</option>
                            <option value="estojo">Estojo</option>
                            <option value="lapiseira">Lapiseiras</option>
                            <option value="calculadora">Calculadoras</option>
                            <option value="regua">Réguas</option>
                            <option value="squeeze">Squeezes</option>
                        </select>
                    </div>
                    <div id="detalhes-escolar" style="display: none;">
                        <div class="form-group">
                            <label for="detalhes">Especifique:</label>
                            <input type="text" id="detalhes-escolar" name="detalhes-escolar" value="<?php echo  $detalhes_escolar ?>">
                        </div>
                    </div>
                </div>

                <div id="campos-alimento" style="display: none;">
                    <div class="form-group">
                        <label for="tipo-alimento">Tipo de Alimento:</label>
                        <select id="tipo-alimento" name="tipo-alimento">
                            <option value="<?php echo $tipo_alimento ?>"><?php echo $tipo_alimento ?></option>
                            <option value="arroz">Arroz</option>
                            <option value="feijao">Feijão</option>
                            <option value="macarrao">Macarrão</option>
                            <option value="molho-tomate">Molho de Tomate</option>
                            <option value="seleta-legumes">Seleta de Legumes</option>
                            <option value="oleo">Óleo</option>
                            <option value="acucar">Açúcar</option>
                            <option value="po-cafe">Pó de Café</option>
                            <option value="sal">Sal</option>
                            <option value="agua">Água</option>
                            <option value="leite">Leite</option>
                        </select>
                    </div>
                </div>

                <div id="campos-brinquedo" style="display: none;">
                    <div class="form-group">
                        <label for="tipo-brinquedo">Tipo de Brinquedo:</label>
                        <select id="tipo-brinquedo" name="tipo-brinquedo">
                            <option value="<?php echo $tipo_brinquedo ?>"><?php echo $tipo_brinquedo ?></option>
                            <option value="quebra-cabeca">Quebra-cabeças</option>
                            <option value="jogos-tabuleiro">Jogos de Tabuleiro</option>
                            <option value="livros-infantis">Livros Infantis</option>
                            <option value="bonecas-bonecos">Bonecas e Bonecos</option>
                            <option value="carrinhos">Carrinhos</option>
                            <option value="bicicletas">Bicicletas</option>
                            <option value="patinetes">Patinetes</option>
                            <option value="bolas">Bolas</option>
                            <option value="ursinhos-pelucia">Ursinhos de Pelúcia</option>
                            <option value="massinhas-modelar">Massinhas de Modelar</option>
                        </select>
                    </div>
                </div>

                <div id="outro-tipo-doacao" style="display: none;">
                    <div class="form-group">
                        <label for="outro-tipo">Especifique:</label>
                        <input type="text" id="outro-tipo" name="outro-tipo" value="<?php echo $outro_tipo ?>">
                    </div>
                </div>

                <div id="quantidade-campo" style="display: none;">
                    <div class="form-group">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" id="quantidade" name="quantidade" min="1" placeholder="Quantidade" value="<?php echo $quantidade ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="detalhes">Detalhes da Doação:</label>
                    <textarea id="detalhes" name="detalhes" rows="4" value="<?php echo $detalhes ?>" required></textarea>
                </div>




                <button type="submit" class="button">Concluído</button>
            </form>
        </div>
    </aside>

    <script>
    function mostrarCamposEspecificos(tipoDoacao) {
        var camposDinheiro = document.getElementById('campos-dinheiro');
        var camposReceba = document.getElementById('campos-receba');
        var outroTipoDoacao = document.getElementById('outro-tipo-doacao');
        var camposRoupa = document.getElementById('campos-roupa');
        var camposHigiene = document.getElementById('campos-higiene');
        var camposLimpeza = document.getElementById('campos-limpeza');
        var camposEscolar = document.getElementById('campos-escolar');
        var camposAlimento = document.getElementById('campos-alimento');
        var camposBrinquedo = document.getElementById('campos-brinquedo');
        var quantidadeCampo = document.getElementById('quantidade-campo');

        // Oculta todos os campos específicos inicialmente
        camposDinheiro.style.display = 'none';
        camposReceba.style.display = 'none';
        outroTipoDoacao.style.display = 'none';
        camposRoupa.style.display = 'none';
        camposHigiene.style.display = 'none';
        camposLimpeza.style.display = 'none';
        camposEscolar.style.display = 'none';
        camposAlimento.style.display = 'none';
        camposBrinquedo.style.display = 'none';
        quantidadeCampo.style.display = 'none';

        // Mostra os campos específicos dependendo do tipo de doação selecionado
        if (tipoDoacao === 'dinheiro') {
            camposDinheiro.style.display = 'block';
            camposReceba.style.display = 'block';
            mostrarEspecifiqueRecebimento(document.getElementById('forma-recebimento').value);
        } else if (tipoDoacao === 'roupa') {
            camposRoupa.style.display = 'block';
            quantidadeCampo.style.display = 'block';
            mostrarEspecifiqueRoupa(document.getElementById('tipo-roupa').value);
        } else if (tipoDoacao === 'higiene') {
            camposHigiene.style.display = 'block';
            quantidadeCampo.style.display = 'block';
        } else if (tipoDoacao === 'limpeza') {
            camposLimpeza.style.display = 'block';
            quantidadeCampo.style.display = 'block';
        } else if (tipoDoacao === 'escolar') {
            camposEscolar.style.display = 'block';
            quantidadeCampo.style.display = 'block';
            mostrarDetalhesEscolar(document.getElementById('tipo-escolar').value);
        } else if (tipoDoacao === 'alimento') {
            camposAlimento.style.display = 'block';
            quantidadeCampo.style.display = 'block';
        } else if (tipoDoacao === 'brinquedo') {
            camposBrinquedo.style.display = 'block';
            quantidadeCampo.style.display = 'block';
        } else if (tipoDoacao === 'outro') {
            outroTipoDoacao.style.display = 'block';
            quantidadeCampo.style.display = 'block';
        }
    }

    function mostrarEspecifiqueRecebimento(valor) {
        var especifiqueRecebimento = document.getElementById('especifique-recebimento');

        if (valor === 'outro') {
            especifiqueRecebimento.style.display = 'block';
        } else {
            especifiqueRecebimento.style.display = 'none';
            document.getElementById('especifique').value = '';
        }
    }

    function mostrarEspecifiqueRoupa(tipoRoupa) {
        var especifiqueRoupa = document.getElementById('especifique-roupa');

        if (tipoRoupa === 'outro') {
            especifiqueRoupa.style.display = 'block';
        } else {
            especifiqueRoupa.style.display = 'none';
            document.getElementById('especifique-roupa').value = '';
        }
    }

    function mostrarDetalhesEscolar(tipoEscolar) {
        var detalhesEscolar = document.getElementById('detalhes-escolar');
        if (tipoEscolar === 'outro') {
            detalhesEscolar.style.display = 'block';
        } else {
            detalhesEscolar.style.display = 'none';
        }
    }

    function atualizarInformacoesDoador(idDoador) {
        if (idDoador) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_doador_info.php?id=' + idDoador, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var doador = JSON.parse(xhr.responseText);
                    document.getElementById('nome-doador').value = doador.nome;
                    document.getElementById('telefone-doador').value = doador.telefone;
                }
            };
            xhr.send();
        } else {
            document.getElementById('nome-doador').value = '';
            document.getElementById('telefone-doador').value = '';
        }
    }
    </script>
</body>

</html>
<?php 
include_once('../estilo/footer.php');
?>