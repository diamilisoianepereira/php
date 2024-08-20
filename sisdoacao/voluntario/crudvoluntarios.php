<?php
require_once('../config.php');

$erros = [];

// Cadastrar
if (isset($_POST['cadastrar'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);

    // Coleta os dias e horários
    $dias = isset($_POST['dias']) ? implode(', ', $_POST['dias']) : '';
    $dias_semana = ['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'];
    
    $disponibilidade = '';
    foreach ($dias_semana as $dia) {
        $inicio = filter_input(INPUT_POST, 'inicio_' . $dia, FILTER_SANITIZE_STRING);
        $fim = filter_input(INPUT_POST, 'fim_' . $dia, FILTER_SANITIZE_STRING);
        if (!empty($inicio) && !empty($fim)) {
            $disponibilidade .= ucfirst($dia) . ": " . $inicio . " - " . $fim . "\n";
        }
    }

    if (empty($erros)) {
        $sql = "INSERT INTO voluntarios (nome, data_nascimento, genero, telefone, email, rua, numero, complemento, bairro, cidade, estado, cep, disponibilidade) 
                VALUES (:nome, :data_nascimento, :genero, :telefone, :email, :rua, :numero, :complemento, :bairro, :cidade, :estado, :cep, :disponibilidade)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':disponibilidade', $disponibilidade);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('{$nome} foi cadastrado com sucesso');
                    window.location='listavoluntarios.php';
                  </script>";
        } else {
            $erros[] = "Erro ao cadastrar.";
        }
    }

    if ($erros) {
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
    }
}


// Atualizar
if (isset($_POST['update'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);

    $dias_semana = ['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'];
    
    $disponibilidade = '';
    foreach ($dias_semana as $dia) {
        $inicio = filter_input(INPUT_POST, 'inicio_' . $dia, FILTER_SANITIZE_STRING);
        $fim = filter_input(INPUT_POST, 'fim_' . $dia, FILTER_SANITIZE_STRING);
        if (!empty($inicio) && !empty($fim)) {
            $disponibilidade .= ucfirst($dia) . ": " . $inicio . " - " . $fim . "\n";
        }
    }

    $sql = "UPDATE voluntarios SET nome = :nome, data_nascimento = :data_nascimento, genero = :genero, 
            telefone = :telefone, email = :email, rua = :rua, numero = :numero, complemento = :complemento,
            bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, disponibilidade = :disponibilidade
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':disponibilidade', $disponibilidade);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
                alert('O voluntário {$nome} foi alterado com sucesso!');
                window.location='listavoluntarios.php';
              </script>";
    } else {
        $erros[] = "Erro ao atualizar.";
    }

    if ($erros) {
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
    }
}


// Excluir
if (isset($_GET['excluir'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Verificar se o voluntário existe
    $checkSql = "SELECT COUNT(*) FROM voluntarios WHERE id = :id";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $checkStmt->execute();
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        $sql = "DELETE FROM voluntarios WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('O voluntário foi excluído!');
                    window.location='listavoluntarios.php';
                  </script>";
        } else {
            $erros[] = "Erro ao excluir.";
        }
    } else {
        $erros[] = "Voluntário não encontrado.";
    }

    if ($erros) {
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
    }
}
?>
