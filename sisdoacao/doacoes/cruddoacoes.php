<?php
require_once('../config.php');

$erros = [];

// Cadastrar
if (isset($_POST['cadastrar'])) {
    $doador_id = filter_input(INPUT_POST, 'doador_id', FILTER_SANITIZE_NUMBER_INT);
    $tipo_doacao = filter_input(INPUT_POST, 'tipo_doacao', FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $forma_recebimento = filter_input(INPUT_POST, 'forma_recebimento', FILTER_SANITIZE_SPECIAL_CHARS);
    $especifique_recebimento = filter_input(INPUT_POST, 'especifique', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_roupa = filter_input(INPUT_POST, 'tipo_roupa', FILTER_SANITIZE_SPECIAL_CHARS);
    $tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_SANITIZE_SPECIAL_CHARS);
    $estilo = filter_input(INPUT_POST, 'estilo', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_higiene = filter_input(INPUT_POST, 'tipo_higiene', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_limpeza = filter_input(INPUT_POST, 'tipo_limpeza', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_escolar = filter_input(INPUT_POST, 'tipo_escolar', FILTER_SANITIZE_SPECIAL_CHARS);
    $detalhes_escolar = filter_input(INPUT_POST, 'detalhes_escolar', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_alimento = filter_input(INPUT_POST, 'tipo_alimento', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_brinquedo = filter_input(INPUT_POST, 'tipo_brinquedo', FILTER_SANITIZE_SPECIAL_CHARS);
    $outro_tipo = filter_input(INPUT_POST, 'outro_tipo', FILTER_SANITIZE_SPECIAL_CHARS);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $detalhes = filter_input(INPUT_POST, 'detalhes', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($doador_id)) {
        $erros[] = "O campo 'doador_id' é obrigatório.";
    }
    if (empty($tipo_doacao)) {
        $erros[] = "O campo 'tipo_doacao' é obrigatório.";
    }
    

    if (empty($erros)) {
        $sql = "INSERT INTO doacoes (doador_id, tipo_doacao, valor, forma_recebimento, especifique_recebimento, tipo_roupa,
        tamanho, estilo, tipo_higiene, tipo_limpeza, tipo_escolar, detalhes_escolar, tipo_alimento, tipo_brinquedo,
        outro_tipo, quantidade, detalhes) VALUES (:doador_id, :tipo_doacao, :valor, :forma_recebimento, :especifique_recebimento,
        :tipo_roupa, :tamanho, :estilo, :tipo_higiene, :tipo_limpeza, :tipo_escolar, :detalhes_escolar, :tipo_alimento, 
        :tipo_brinquedo, :outro_tipo, :quantidade, :detalhes)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':doador_id', $doador_id);
        $stmt->bindParam(':tipo_doacao', $tipo_doacao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':forma_recebimento', $forma_recebimento);
        $stmt->bindParam(':especifique_recebimento', $especifique_recebimento);
        $stmt->bindParam(':tipo_roupa', $tipo_roupa);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':estilo', $estilo);
        $stmt->bindParam(':tipo_higiene', $tipo_higiene);
        $stmt->bindParam(':tipo_limpeza', $tipo_limpeza);
        $stmt->bindParam(':tipo_escolar', $tipo_escolar);
        $stmt->bindParam(':detalhes_escolar', $detalhes_escolar);
        $stmt->bindParam(':tipo_alimento', $tipo_alimento);
        $stmt->bindParam(':tipo_brinquedo', $tipo_brinquedo);
        $stmt->bindParam(':outro_tipo', $outro_tipo);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':detalhes', $detalhes);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('A doação foi cadastrada com sucesso');
                    window.location='listadoacoes.php';
                  </script>";
        } else {
            $erroInfo = $stmt->errorInfo();
            $erros[] = "Erro ao cadastrar: ";
        }
    }
}

// Atualizar
if (isset($_POST['update'])) {
    $doador_id = filter_input(INPUT_POST, 'doador_id', FILTER_SANITIZE_NUMBER_INT);
    $tipo_doacao = filter_input(INPUT_POST, 'tipo_doacao', FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $forma_recebimento = filter_input(INPUT_POST, 'forma_recebimento', FILTER_SANITIZE_SPECIAL_CHARS);
    $especifique_recebimento = filter_input(INPUT_POST, 'especifique_recebimento', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_roupa = filter_input(INPUT_POST, 'tipo_roupa', FILTER_SANITIZE_SPECIAL_CHARS);
    $tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_SANITIZE_SPECIAL_CHARS);
    $estilo = filter_input(INPUT_POST, 'estilo', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_higiene = filter_input(INPUT_POST, 'tipo_higiene', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_limpeza = filter_input(INPUT_POST, 'tipo_limpeza', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_escolar = filter_input(INPUT_POST, 'tipo_escolar', FILTER_SANITIZE_SPECIAL_CHARS);
    $detalhes_escolar = filter_input(INPUT_POST, 'detalhes_escolar', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_alimento = filter_input(INPUT_POST, 'tipo_alimento', FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo_brinquedo = filter_input(INPUT_POST, 'tipo_brinquedo', FILTER_SANITIZE_SPECIAL_CHARS);
    $outro_tipo = filter_input(INPUT_POST, 'outro_tipo', FILTER_SANITIZE_SPECIAL_CHARS);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $detalhes = filter_input(INPUT_POST, 'detalhes', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($doador_id)) {
        $erros[] = "O campo 'doador_id' é obrigatório.";
    }

    if (empty($erros)) {
        $sql = "UPDATE doacoes SET 

            tipo_doacao = :tipo_doacao, 
            valor = :valor, 
            forma_recebimento = :forma_recebimento, 
            especifique_recebimento = :especifique_recebimento, 
            tipo_roupa = :tipo_roupa, 
            tamanho = :tamanho, 
            estilo = :estilo, 
            tipo_higiene = :tipo_higiene, 
            tipo_limpeza = :tipo_limpeza, 
            tipo_escolar = :tipo_escolar, 
            detalhes_escolar = :detalhes_escolar, 
            tipo_alimento = :tipo_alimento, 
            tipo_brinquedo = :tipo_brinquedo, 
            outro_tipo = :outro_tipo, 
            quantidade = :quantidade, 
            detalhes = :detalhes 
        WHERE doador_id = :doador_id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':doador_id', $doador_id, PDO::PARAM_INT);
        $stmt->bindParam(':tipo_doacao', $tipo_doacao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':forma_recebimento', $forma_recebimento);
        $stmt->bindParam(':especifique_recebimento', $especifique_recebimento);
        $stmt->bindParam(':tipo_roupa', $tipo_roupa);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':estilo', $estilo);
        $stmt->bindParam(':tipo_higiene', $tipo_higiene);
        $stmt->bindParam(':tipo_limpeza', $tipo_limpeza);
        $stmt->bindParam(':tipo_escolar', $tipo_escolar);
        $stmt->bindParam(':detalhes_escolar', $detalhes_escolar);
        $stmt->bindParam(':tipo_alimento', $tipo_alimento);
        $stmt->bindParam(':tipo_brinquedo', $tipo_brinquedo);
        $stmt->bindParam(':outro_tipo', $outro_tipo);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':detalhes', $detalhes);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('A doação foi alterada com sucesso!');
                    window.location='listadoacoes.php';
                  </script>";
        } else {
            $erroInfo = $stmt->errorInfo();
            $erros[] = "Erro ao atualizar: " . $erroInfo[2];
        }
    }
}

// Excluir
if (isset($_GET['excluir'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if (empty($id)) {
        $erros[] = "O campo 'id' é obrigatório para exclusão.";
    }

    if (empty($erros)) {
        $sql = "DELETE FROM doacoes WHERE doador_id = :id";  // Alterado para corresponder ao campo usado
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
                    alert('A doação foi excluída com sucesso!');
                    window.location='listadoacoes.php';
                  </script>";
        } else {
            $erroInfo = $stmt->errorInfo();
            $erros[] = "Erro ao excluir: " . $erroInfo[2];
        }
    }
}

// Exibição de erros
if ($erros) {
    echo "<ul>";
    foreach ($erros as $erro) {
        echo "<li>$erro</li>";
    }
    echo "</ul>";
}
?>
