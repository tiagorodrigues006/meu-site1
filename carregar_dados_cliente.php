<?php
// Conexão com o banco de dados (se necessário)
// include 'conexao.php';

// Verifique se foi passado o parâmetro "cliente" via GET
if (isset($_GET['cliente'])) {
    // Aqui você precisa consultar o banco de dados para obter os dados do cliente com base no ID ou nome recebido
    $clienteSelecionado = $_GET['cliente'];
    // Faça a consulta no banco de dados e obtenha os dados do cliente
    // Substitua isso com a lógica real para obter os dados do cliente
    $dadosCliente = array(
        'nome' => 'Nome do Cliente',
        'email' => 'cliente@example.com',
        // Adicione outros dados do cliente conforme necessário
    );
    // Retorna os dados do cliente como JSON
    echo json_encode($dadosCliente);
} else {
    echo 'Cliente não especificado.';
}
?>
