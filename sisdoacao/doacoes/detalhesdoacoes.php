<?php
require_once('../config.php');

// Obtém o ID da doação da URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Preparar a consulta para buscar os detalhes da doação
    $stmt = $conn->prepare('
        SELECT 
            doacoes.id,
            doadores.nome AS nome_doador,
            doacoes.tipo_doacao,
            doacoes.valor,
            doacoes.forma_recebimento,
            doacoes.especifique_recebimento,
            doacoes.tipo_roupa,
            doacoes.tamanho,
            doacoes.estilo,
            doacoes.tipo_higiene,
            doacoes.tipo_limpeza,
            doacoes.tipo_escolar,
            doacoes.detalhes_escolar,
            doacoes.tipo_alimento,
            doacoes.tipo_brinquedo,
            doacoes.outro_tipo,
            doacoes.quantidade,
            doacoes.detalhes,
            doacoes.created_at
        FROM doacoes
        JOIN doadores ON doacoes.doador_id = doadores.id
        WHERE doacoes.id = :id
    ');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $doacao = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($doacao) {
        // Exibe os detalhes da doação em uma tabela
        ?>
        <table>
            <tbody>
                <tr>
                    <td>ID</td>
                    <td><?php echo ($doacao['id']); ?></td>
                </tr>
                <tr>
                    <td>Doador</td>
                    <td><?php echo ($doacao['nome_doador']); ?></td>
                </tr>
                <tr>
                    <td>Tipo de Doação</td>
                    <td><?php echo ($doacao['tipo_doacao']); ?></td>
                </tr>
                <?php if ($doacao['tipo_doacao'] === 'dinheiro') { ?>
                    <tr>
                        <td>Valor</td>
                        <td>R$ <?php echo ($doacao['valor']); ?></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td>Quantidade</td>
                        <td><?php echo ($doacao['quantidade']); ?></td>
                    </tr>
                <?php } ?>
                <?php if ($doacao['tipo_doacao'] === 'dinheiro') { ?>
                    <tr>
                        <td>Forma de Recebimento</td>
                        <td><?php echo ($doacao['forma_recebimento']); ?></td>
                    </tr>
                <?php } ?>
                <?php if ($doacao['forma_recebimento'] === 'outro') { ?>
                    <tr>
                        <td>Especifique Recebimento</td>
                        <td><?php echo ($doacao['especifique_recebimento']); ?></td>
                    </tr>
                <?php } ?>
                <?php if ($doacao['tipo_doacao'] === 'roupa') { ?>
                    <tr>
                        <td>Tipo de Roupa</td>
                        <td><?php echo ($doacao['tipo_roupa']); ?></td>
                    </tr>
                    <tr>
                        <td>Tamanho</td>
                        <td><?php echo ($doacao['tamanho']); ?></td>
                    </tr>
                    <tr>
                        <td>Estilo</td>
                        <td><?php echo ($doacao['estilo']); ?></td>
                    </tr>
                <?php } elseif ($doacao['tipo_doacao'] === 'higiene') { ?>
                    <tr>
                        <td>Tipo de Item de Higiene</td>
                        <td><?php echo ($doacao['tipo_higiene']); ?></td>
                    </tr>
                <?php } elseif ($doacao['tipo_doacao'] === 'limpeza') { ?>
                    <tr>
                        <td>Tipo de Item de Limpeza</td>
                        <td><?php echo ($doacao['tipo_limpeza']); ?></td>
                    </tr>
                <?php } elseif ($doacao['tipo_doacao'] === 'escolar') { ?>
                    <tr>
                        <td>Tipo de Material Escolar</td>
                        <td><?php echo ($doacao['tipo_escolar']); ?></td>
                    </tr>
                    <tr>
                        <td>Detalhes Escolares</td>
                        <td><?php echo ($doacao['detalhes_escolar']); ?></td>
                    </tr>
                <?php } elseif ($doacao['tipo_doacao'] === 'alimento') { ?>
                    <tr>
                        <td>Tipo de Alimento</td>
                        <td><?php echo ($doacao['tipo_alimento']); ?></td>
                    </tr>
                <?php } elseif ($doacao['tipo_doacao'] === 'brinquedo') { ?>
                    <tr>
                        <td>Tipo de Brinquedo</td>
                        <td><?php echo ($doacao['tipo_brinquedo']); ?></td>
                    </tr>
                <?php } elseif ($doacao['tipo_doacao'] === 'outro') { ?>
                    <tr>
                        <td>Outro Tipo</td>
                        <td><?php echo ($doacao['outro_tipo']); ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>Detalhes</td>
                    <td><?php echo ($doacao['detalhes']); ?></td>
                </tr>
                <tr>
                    <td>Data de Criação</td>
                    <td><?php echo ($doacao['created_at']); ?></td>
                </tr>
            </tbody>
        </table>
        <?php
    } else {
        echo '<p>Doação não encontrada.</p>';
    }
} else {
    echo '<p>ID de doação inválido.</p>';
}
?>
