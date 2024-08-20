<?php
include_once('../estilo/header.php');

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
    }

    .editar {
        background-color: #757575;
        /* laranja */
    }

    .excluir {
        background-color: #f44336;
        /* vermelho */
    }

    .detalhes {
        background-color: #2196F3;
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
        margin: 0; /* Remove a margem padrão dos botões */
    }

   
    </style>
</head>

<body>

    <div class="container">
        <h2>Lista de Execuções de Doação</h2>

        <div class="botoes">
            <a href="cadexecutar.php">
                <div class="adddoador">
                    <i class="fas fa-user"></i> Gerenciar Doações
                </div>
            </a>

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
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone do Doador</th>
                    <th scope="col">Quantidade de doações</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tq">
                    <th scope="row">1</th>
                    <td>Joaquina</td>
                    <td>30</td>
                    <td>30</td>
                    <td>
                        <button type="button" class="botaotabela detalhes"><i class="fas fa-info-circle"></i>
                            Detalhes</button>
                        <button type="button" class="botaotabela editar"><i class="fas fa-edit"></i> Editar</button>
                        <button type="button" class="botaotabela excluir"><i class="fas fa-trash-alt"></i>
                            Excluir</button>
                    </td>
                </tr>
                <tr class="tq">
                    <th scope="row">2</th>
                    <td>Marcelo</td>
                    <td>(22) 9876-5432</td>
                    <td>30</td>
                    <td>
                        <button type="button" class="botaotabela detalhes"><i class="fas fa-info-circle"></i>
                            Detalhes</button>
                        <button type="button" class="botaotabela editar"><i class="fas fa-edit"></i> Editar</button>
                        <button type="button" class="botaotabela excluir"><i class="fas fa-trash-alt"></i>
                            Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
<?php 
include_once('../estilo/footer.php');
?>