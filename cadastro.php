<?php 
// Conectando com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "oficial";

$conexao = mysqli_connect($servername, $username, $password, $db_name);



// Configura o retorno como JSON
header('Content-Type: application/json');

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erros = array();
    
    // Pegando os valores do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    
    // Função para validar o email (usando filter_var)
    function validarEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    // Validação do nome
    if (empty($nome)) {
        $erros[] = "Nome inválido.";
    }

    // Validação do telefone
    if (empty($telefone)) {
        $erros[] = "Telefone inválido.";
    }

    // Validação do email
    if (empty($email) || !validarEmail($email)) {
        $erros[] = "Email inválido.";
    }

    // Se houver erros, retorna os erros
    if (!empty($erros)) {
        echo json_encode([
            'success' => false,
            'errors' => $erros
        ]);
        exit; // Saia para garantir que nada mais será processado
    }

    // Se não houver erros, salva no banco de dados
    $sql = "INSERT INTO cadastro (nome, telefone, email) VALUES ('$nome', '$telefone', '$email')";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        // Retorna mensagem de sucesso
        echo json_encode([
            'success' => true,
            'message' => "Usuário cadastrado com sucesso!"
        ]);
    } else {
        // Retorna mensagem de erro no banco de dados
        echo json_encode([
            'success' => false,
            'errors' => ["Erro ao cadastrar usuário: " . mysqli_error($conexao)]
        ]);
    }
} else {
    // Caso não seja uma requisição POST, exibe um erro
    echo json_encode([
        'success' => false,
        'errors' => ["Método de requisição inválida."]
    ]);
}
?>