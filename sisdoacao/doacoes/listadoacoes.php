<?php
include_once('../estilo/header.php');

/*
 * Melhor prática usando Prepared Statements
 * 
 */

// Permite acesso às variáveis dentro do arquivo conexão
require_once('../config.php');

// Executa SQL no BD e seleciona todas as doações
$retorno = $conn->prepare('SELECT doacoes.id, doadores.nome AS nome_doador, doadores.telefone AS telefone_doador, 
        doacoes.tipo_doacao, doacoes.valor, doacoes.quantidade, doacoes.created_at
        FROM doacoes
        JOIN doadores ON doacoes.doador_id = doadores.id');
$retorno->execute();
$doacoes = $retorno->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doações</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .adddoacoes {
            background-color: blue;
            padding: 10px;
            border-radius: 30px;
            margin-left: 10px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }

        .adddoador {
            background-color: green;
            padding: 10px;
            border-radius: 30px;
            margin-left: 10px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }

        .voltar {
            background-color: red;
            padding: 10px;
            border-radius: 30px;
            margin-left: 10px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            margin-bottom: 30px;
            height: 100%;
        }

        .botoes {
            display: flex;
            width: 90%;
            margin-bottom: 15px;
            margin-top: 20px;
        }

        .nd {
            background-color: #94b9ff;
        }

        th,
        td {
            padding: 10px;
        }

        table {
            width: 90%;
            text-align: center;
            border-collapse: collapse;
        }

        tbody tr:not(.nd):hover {
            background-color: #d5e2fa;
        }

        .botaotabela {
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-right: 5px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin: 0;
            /* Remove a margem padrão dos botões */
        }

        .editar {
            background-color: #757575;
            /* cinza */
        }

        .excluir {
            background-color: #f44336;
            /* vermelho */
        }

        .detalhes {
            background-color: #2196F3;
            /* azul */
        }

        .botaotabela:hover {
            background-color: #aa69ff;
            /* cinza mais escuro */
        }

        .add:hover {
            background-color: #aa69ff;
            /* cinza mais escuro */
        }

        .voltar:hover {
            background-color: #aa69ff;
            /* cinza mais escuro */
        }

        i {
            margin-right: 5px;
        }

        .mensagem {
            font-size: 18px;
            color: red;
            margin-top: 20px;
        }

         /* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

    </style>
</head>

<body>

    <div class="container">
        <h2>Lista de Doações</h2>

        <div class="botoes">
            <a href="caddoacoes.php">
                <div class="adddoacoes">
                    <i class="fas fa-hand-holding-heart"></i> Cadastrar Doação
                </div>
            </a>
            <a href="../doadores/listadoadores.php">
                <div class="adddoador">
                    <i class="fas fa-user"></i> Ir para Lista de Doador
                </div>
            </a>
            <a href="../index.php">
                <div class="voltar">
                    <i class="fas fa-home"></i> Voltar para Tela Inicial
                </div>
            </a>
        </div>

        <table class="table">
            <thead class="nd">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doador</th>
                    <th scope="col">Telefone do Doador</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Valor/Quantidade</th>
                    <th scope="col">Data Criação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($doacoes as $value) { ?>
                <tr>
                    <td><?php echo ($value['id']); ?></td>
                    <td><?php echo ($value['nome_doador']); ?></td>
                    <td><?php echo ($value['telefone_doador']); ?></td>
                    <td><?php echo ($value['tipo_doacao']); ?></td>
                    <?php
                    if ($value['tipo_doacao'] === 'dinheiro') {
                        echo "<td> R$" . ($value['valor']) . "</td>"; // Mostra o valor para doações em dinheiro
                    } else {
                        echo "<td>" . ($value['quantidade']) . "</td>"; // Mostra a quantidade para outros tipos
                    }
                    ?>
                    <td><?php echo ($value['created_at']); ?></td>
                    <td>
                        <button type="button" class="botaotabela detalhes" onclick="openModal(<?php echo ($value['id']); ?>)">
                            <i class="fas fa-info-circle"></i> Detalhes
                        </button>

                        <form method="POST" action="altdoacoes.php" style="display:inline;">
                            <input name="id" type="hidden" value="<?php echo ($value['id']); ?>" />
                            <button type="submit" class="botaotabela editar" name="alterar">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                        </form>

                        <form method="GET" action="cruddoacoes.php" style="display:inline;">
                            <input name="id" type="hidden" value="<?php echo ($value['id']); ?>" />
                            <button type="submit" class="botaotabela excluir" name="excluir">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div id="detailsModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Detalhes das Doações</h2>
                <div id="modal-body">
                    <!-- Detalhes do doador serão carregados aqui via AJAX -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            var modal = document.getElementById('detailsModal');
            var modalBody = document.getElementById('modal-body');

            // Faz uma requisição AJAX para obter os detalhes do doador
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'detalhesdoacoes.php?id=' + id, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    modalBody.innerHTML = xhr.responseText;
                    modal.style.display = 'block';
                } else {
                    modalBody.innerHTML = 'Erro ao carregar os detalhes.';
                }
            };
            xhr.send();
        }

        function closeModal() {
            var modal = document.getElementById('detailsModal');
            modal.style.display = 'none';
        }

        // Fecha o modal se o usuário clicar fora do modal
        window.onclick = function(event) {
            var modal = document.getElementById('detailsModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>

</html>
<?php 
include_once('../estilo/footer.php');
?>
