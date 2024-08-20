<?php
include_once('../estilo/header.php');

/*
 * Melhor prática usando Prepared Statements
 * 
 */

// Permite acesso às variáveis dentro do arquivo conexão
require_once('../config.php');

// Executa SQL no BD e seleciona todos os doadores com a contagem de doações
$retorno = $conn->prepare('
    SELECT d.id, d.nome, d.email, d.telefone, COUNT(do.id) AS num_doacoes
    FROM doadores d
    LEFT JOIN doacoes do ON d.id = do.doador_id
    GROUP BY d.id, d.nome, d.email, d.telefone
');
$retorno->execute();
$doadores = $retorno->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doadores</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .adddoacoes,
        .adddoador,
        .voltar {
            padding: 10px;
            border-radius: 30px;
            margin-left: 10px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }

        .adddoacoes {
            background-color: blue;
        }

        .adddoador {
            background-color: blue;
        }

        .voltar {
            background-color: red;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 30px 0;
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
        }

        .editar {
            background-color: #757575;
        }

        .excluir {
            background-color: #f44336;
        }

        .detalhes {
            background-color: #2196F3;
        }

        .botaotabela:hover {
            background-color: #aa69ff;
        }

        .adddoador:hover,
        .voltar:hover {
            background-color: #aa69ff;
        }

        i {
            margin-right: 5px;
        }

        .voltarlistadoacoes {
            background-color: green;
            padding: 10px;
            border-radius: 30px;
            margin-left: 10px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
        }

        .voltarlistadoacoes:hover {
            background-color: #aa69ff;
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
        <h2>Lista de Doadores</h2>

        <div class="botoes">
            <a href="caddoadores.php" class="adddoador">
                <i class="fas fa-user"></i> Cadastrar Doador
            </a>
            <a href="../doacoes/listadoacoes.php">
                <div class="voltarlistadoacoes"><i class="fas fa-hand-holding-heart"></i> Ir para a Lista de Doações
                </div>
            </a>
            <a href="../index.php" class="voltar">
                <i class="fas fa-home"></i> Voltar para Tela Inicial
            </a>
        </div>

        <table class="table">
            <thead class="nd">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email do Doador</th>
                    <th scope="col">Telefone do Doador</th>
                    <th scope="col">Número de doações</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($doadores as $value) { ?>
                <tr>
                    <td><?php echo ($value['id']); ?></td>
                    <td><?php echo ($value['nome']); ?></td>
                    <td><?php echo ($value['email']); ?></td>
                    <td><?php echo ($value['telefone']); ?></td>
                    <td><?php echo ($value['num_doacoes']); ?></td>
                    <td>
                        <button type="button" class="botaotabela detalhes"
                            onclick="openModal(<?php echo ($value['id']); ?>)">
                            <i class="fas fa-info-circle"></i> Detalhes
                        </button>
                        <form method="POST" action="altdoadores.php" style="display:inline;">
                            <input name="id" type="hidden" value="<?php echo ($value['id']); ?>" />
                            <button type="submit" class="botaotabela editar" name="alterar"><i class="fas fa-edit"></i>
                                Editar</button>
                        </form>
                        <form method="GET" action="cruddoadores.php" style="display:inline;">
                            <input name="id" type="hidden" value="<?php echo ($value['id']); ?>" />
                            <button type="submit" class="botaotabela excluir" name="excluir"><i
                                    class="fas fa-trash-alt"></i> Excluir</button>
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
                <h2>Detalhes do Doador</h2>
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
            xhr.open('GET', 'detalhesdoador.php?id=' + id, true);
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
