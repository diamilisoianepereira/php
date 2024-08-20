<?php
include_once('../estilo/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylevoluntario.css">
    <title>Voluntário</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    .button:hover {
        background-color: #45a049;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
    }

    .checkbox-label input[type="checkbox"] {
        margin-right: 10px;
    }

    .checkbox-label span {
        white-space: nowrap;
    }

    .checkbox-cell {
        display: flex;
        align-items: right;
    }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="dias[]"]');
        checkboxes.forEach(checkbox => {
            const row = checkbox.closest('tr');
            const timeInputs = row.querySelectorAll('input[type="time"]');
            timeInputs.forEach(input => input.disabled = !checkbox.checked);

            checkbox.addEventListener('change', function() {
                timeInputs.forEach(input => input.disabled = !checkbox.checked);
            });
        });
    });
    </script>
</head>

<body>
    <aside>
        <div class="voltar">
            <a href="listavoluntarios.php">
                <div class="voltarlista"><i class="fas fa-arrow-left"></i>Voltar para a Lista</div>
            </a>
            <a href="../index.php">
                <div class="voltarinicial"><i class="fas fa-home"></i> Voltar para Tela Inicial</div>
            </a>
        </div>
        <h2 class="titulo">Formulário de Voluntariado</h2>

        <div class="container_formulario">
        <form action="crudvoluntarios.php" method="post">


                <h3>Informações Pessoais</h3>
                <div class="form-group">
                    <label for="nome">Nome Completo*:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento">
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
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
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
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" placeholder="CEP">
                </div>
                
                <h3>Disponibilidade</h3>

                <div class="form-group">
                    <table>
                        <thead>
                            <tr>
                                <th>Dia da Semana</th>
                                <th>Início</th>
                                <th>Término</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="checkbox-cell"><label class="checkbox-label"><input type="checkbox"
                                            name="dias[]" value="segunda"><span>Segunda-feira</span></label></td>
                                <td><input type="time" name="inicio_segunda" disabled></td>
                                <td><input type="time" name="fim_segunda" disabled></td>
                            </tr>
                            <tr>
                                <td class="checkbox-cell"><label class="checkbox-label"><input type="checkbox"
                                            name="dias[]" value="terca"><span>Terça-feira</span></label></td>
                                <td><input type="time" name="inicio_terca" disabled></td>
                                <td><input type="time" name="fim_terca" disabled></td>
                            </tr>
                            <tr>
                                <td class="checkbox-cell"><label class="checkbox-label"><input type="checkbox"
                                            name="dias[]" value="quarta"><span>Quarta-feira</span></label></td>
                                <td><input type="time" name="inicio_quarta" disabled></td>
                                <td><input type="time" name="fim_quarta" disabled></td>
                            </tr>
                            <tr>
                                <td class="checkbox-cell"><label class="checkbox-label"><input type="checkbox"
                                            name="dias[]" value="quinta"><span>Quinta-feira</span></label></td>
                                <td><input type="time" name="inicio_quinta" disabled></td>
                                <td><input type="time" name="fim_quinta" disabled></td>
                            </tr>
                            <tr>
                                <td class="checkbox-cell"><label class="checkbox-label"><input type="checkbox"
                                            name="dias[]" value="sexta"><span>Sexta-feira</span></label></td>
                                <td><input type="time" name="inicio_sexta" disabled></td>
                                <td><input type="time" name="fim_sexta" disabled></td>
                            </tr>
                            <tr>
                                <td class="checkbox-cell"><label class="checkbox-label"><input type="checkbox"
                                            name="dias[]" value="sabado"><span>Sábado</span></label></td>
                                <td><input type="time" name="inicio_sabado" disabled></td>
                                <td><input type="time" name="fim_sabado" disabled></td>
                            </tr>
                            <tr>
                                <td class="checkbox-cell"><label class="checkbox-label"><input type="checkbox"
                                            name="dias[]" value="domingo"><span>Domingo</span></label></td>
                                <td><input type="time" name="inicio_domingo" disabled></td>
                                <td><input type="time" name="fim_domingo" disabled></td>
                            </tr>
                        </tbody>
                    </table>
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