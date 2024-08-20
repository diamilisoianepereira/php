<?php
require_once('../config.php');

$erros = [];

// Cadastrar
if (isset($_POST['cadastrar'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $tamanho_familia = filter_input(INPUT_POST, 'tamanho_familia', FILTER_SANITIZE_NUMBER_INT);

    if (empty($nome) || empty($telefone) || empty($rua) || empty($numero) || empty($bairro) || empty($cidade) || empty($estado) || empty($cep)) {
        $erros[] = "Todos os campos obrigatórios devem ser preenchidos.";
    }

    if (empty($erros)) {
        $sql = "INSERT INTO donatarios (nome, genero, telefone, rua, numero, complemento, bairro, cidade, estado, cep, tamanho_familia) 
                VALUES (:nome, :genero, :telefone, :rua, :numero, :complemento, :bairro, :cidade, :estado, :cep, :tamanho_familia)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':tamanho_familia', $tamanho_familia);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('Donatário {$nome} foi cadastrado com sucesso');
                    window.location='listadonatario.php';
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
if (isset($_POST['atualizar'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $tamanho_familia = filter_input(INPUT_POST, 'tamanho_familia', FILTER_SANITIZE_NUMBER_INT);

    if (empty($id) || empty($nome) || empty($telefone) || empty($rua) || empty($numero) || empty($bairro) || empty($cidade) || empty($estado) || empty($cep)) {
        $erros[] = "Todos os campos obrigatórios devem ser preenchidos.";
    }

    if (empty($erros)) {
        $sql = "UPDATE donatarios SET nome = :nome, genero = :genero, telefone = :telefone, 
                rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro,
                cidade = :cidade, estado = :estado, cep = :cep, tamanho_familia = :tamanho_familia 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':tamanho_familia', $tamanho_familia);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('Donatário {$nome} foi atualizado com sucesso!');
                    window.location='listadonatario.php';
                  </script>";
        } else {
            $erros[] = "Erro ao atualizar.";
        }
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

    $checkSql = "SELECT COUNT(*) FROM doacoes_donatarios WHERE donatario_id = :id";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $checkStmt->execute();
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        echo "<script type='text/javascript'>
                alert('Não é possível excluir o donatário pois ele possui doações relacionadas.');
                window.location='listadonatario.php';
              </script>";
    } else {
        $sql = "DELETE FROM donatarios WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('O donatário foi excluído com sucesso!');
                    window.location='listadonatario.php';
                  </script>";
        } else {
            $erros[] = "Erro ao excluir.";
        }
    }

    if ($erros) {
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
    }
}
?>
