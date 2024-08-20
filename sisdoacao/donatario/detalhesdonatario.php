<?php

require_once('../config.php');

// Verifica se o ID do voluntário foi passado via GET e é um número
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID do donatario não fornecido ou inválido.');
}

$id = intval($_GET['id']);

// Prepara a consulta SQL para buscar os detalhes do voluntário
$stmt = $conn->prepare('
    SELECT * FROM donatarios WHERE id = :id
');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$voluntario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($voluntario) {
    // Use  para evitar XSS
    echo '<table class="table">';
    echo '<tr><th>ID</th><td>' . ($voluntario['id']) . '</td></tr>';
    echo '<tr><th>Nome</th><td>' . ($voluntario['nome']) . '</td></tr>';
    echo '<tr><th>Telefone</th><td>' . ($voluntario['telefone']) . '</td></tr>';
    echo '<tr><th>Gênero</th><td>' . ($voluntario['genero']) . '</td></tr>';
    echo '<tr><th>Endereço</th><td>' . ($voluntario['rua']) . ', ' . ($voluntario['numero']) . ', ' . ($voluntario['complemento']) . ', ' . ($voluntario['bairro']) . ', ' . ($voluntario['cidade']) . ', ' . ($voluntario['estado']) . ', ' . ($voluntario['cep']) . '</td></tr>';
    echo '</table>';
} else {
    echo 'Voluntário não encontrado.';
}
