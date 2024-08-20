<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Doações</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select, input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h2>Gerenciar Doações</h2>

    <form method="POST" action="processa.php">
        <div class="form-group">
            <label for="doacao">Escolha a Doação:</label>
            <select id="doacao" name="doacao" onchange="updateTable()">
                <option value="">Selecione uma doação</option>
                <!-- PHP para preencher opções de doações -->
                <?php
                // Conectar ao banco de dados e buscar doações
                require_once('config.php');
                $sql = 'SELECT id, tipo_doacao, valor, quantidade FROM doacoes';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $doacoes = $stmt->fetchAll();
                foreach ($doacoes as $doacao) {
                    echo "<option value='{$doacao['id']}' data-valor='{$doacao['valor']}' data-quantidade='{$doacao['quantidade']}'>Doação ID {$doacao['id']} - {$doacao['tipo_doacao']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="donatario">Escolha o Donatário:</label>
            <select id="donatario" name="donatario">
                <option value="">Selecione um donatário</option>
                <!-- PHP para preencher opções de donatários -->
                <?php
                $sql = 'SELECT id, nome FROM donatarios';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $donatarios = $stmt->fetchAll();
                foreach ($donatarios as $donatario) {
                    echo "<option value='{$donatario['id']}'>{$donatario['nome']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade a ser doada:</label>
            <input type="number" id="quantidade" name="quantidade" min="1" />
        </div>

        <input type="submit" value="Registrar Doação" />
    </form>

    <!-- Tabela para mostrar detalhes da doação selecionada -->
    <div id="tabela-container" style="display: none;">
        <h3>Detalhes da Doação</h3>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Doação</th>
                    <th>Valor</th>
                    <th>Quantidade Disponível</th>
                </tr>
            </thead>
            <tbody id="tabela-detalhes">
                <!-- Detalhes da doação serão preenchidos aqui pelo JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        function updateTable() {
            var doacaoSelect = document.getElementById('doacao');
            var selectedOption = doacaoSelect.options[doacaoSelect.selectedIndex];

            var valor = selectedOption.getAttribute('data-valor');
            var quantidade = selectedOption.getAttribute('data-quantidade');
            var tipoDoacao = selectedOption.text;

            var tabelaContainer = document.getElementById('tabela-container');
            var tabelaDetalhes = document.getElementById('tabela-detalhes');

            if (selectedOption.value) {
                tabelaContainer.style.display = 'block';
                tabelaDetalhes.innerHTML = `
                    <tr>
                        <td>${tipoDoacao}</td>
                        <td>${valor ? 'R$ ' + valor : 'N/A'}</td>
                        <td>${quantidade ? quantidade : 'N/A'}</td>
                    </tr>
                `;
            } else {
                tabelaContainer.style.display = 'none';
            }
        }
    </script>
</body>
</html>
