<?php
require_once('../config.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare('
        SELECT d.*, COUNT(do.id) AS num_doacoes
        FROM doadores d
        LEFT JOIN doacoes do ON d.id = do.doador_id
        WHERE d.id = :id
        GROUP BY d.id
    ');
    $stmt->execute(['id' => $id]);
    $doador = $stmt->fetch();

    if ($doador) {
        echo '<table class="table">';
        echo '<tr><th>ID</th><td>' . ($doador['id']) . '</td></tr>';
        echo '<tr><th>Nome</th><td>' . ($doador['nome']) . '</td></tr>';
        echo '<tr><th>Email</th><td>' . ($doador['email']) . '</td></tr>';
        echo '<tr><th>Telefone</th><td>' . ($doador['telefone']) . '</td></tr>';
        echo '<tr><th>Endereço</th><td>' . ($doador['rua']) . ', ' . ($doador['numero']) . ', ' . ($doador['complemento']) . ', ' . ($doador['bairro']) . ', ' . ($doador['cidade']) . ', ' . ($doador['estado']) . ', ' . ($doador['cep']) . '</td></tr>';
        echo '<tr><th>Número de Doações</th><td>' . ($doador['num_doacoes']) . '</td></tr>';
        echo '</table>';
    } else {
        echo 'Doador não encontrado.';
    }
} else {
    echo 'ID inválido.';
}
