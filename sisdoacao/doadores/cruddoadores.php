<?php
require_once('../config.php');

$erros = [];

// Cadastrar
if (isset($_POST['cadastrar'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);

    if (empty($erros)) {
        $sql = "INSERT INTO doadores (nome, telefone, email, rua, numero, complemento, bairro, cidade, estado, cep) 
                VALUES (:nome, :telefone, :email, :rua, :numero, :complemento, :bairro, :cidade, :estado, :cep)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cep', $cep);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('{$nome} foi cadastrado com sucesso');
                    window.location='listadoadores.php';
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
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE doadores SET nome = :nome, telefone = :telefone, email = :email, 
            rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade,
            estado = :estado, cep = :cep WHERE id = :id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':rua', $rua);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':cep', $cep);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>
                alert('O doador {$nome} foi alterado com sucesso!');
                window.location='listadoadores.php';
              </script>";
    } else {
        $erros[] = "Erro ao atualizar.";
    }
}

// Excluir
if (isset($_GET['excluir'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Verificar se o doador tem doações relacionadas
    $checkSql = "SELECT COUNT(*) FROM doacoes WHERE doador_id = :id";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $checkStmt->execute();
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        echo "<script type='text/javascript'>
                alert('Não é possível excluir o doador pois ele possui doações relacionadas.');
                window.location='listadoadores.php';
              </script>";
    } else {
        $sql = "DELETE FROM doadores WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('O doador {$nome} foi excluído!');
                    window.location='listadoadores.php';
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
