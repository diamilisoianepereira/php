<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conectar ao banco de dados
    require_once('../config.php');

    // Receber dados do formulário
    $doacao_id = $_POST['doacao'];
    $donatario_id = $_POST['donatario'];
    $quantidade_doadas = $_POST['quantidade'];

    // Obter detalhes da doação
    $sql = 'SELECT tipo_doacao, valor, quantidade FROM doacoes WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$doacao_id]);
    $doacao = $stmt->fetch();

    // Verificar a quantidade disponível
    if ($doacao['quantidade'] >= $quantidade_doadas) {
        // Inserir registro na tabela doacoes_donatarios
        $sql = 'INSERT INTO doacoes_donatarios (doacao_id, donatario_id, data) VALUES (?, ?, NOW())';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$doacao_id, $donatario_id]);

        // Atualizar quantidade na tabela doacoes
        $sql = 'UPDATE doacoes SET quantidade = quantidade - ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$quantidade_doadas, $doacao_id]);

        echo '<p>Doação registrada com sucesso!</p>';
    } else {
        echo '<p>Quantidade disponível insuficiente.</p>';
    }
}
?>
