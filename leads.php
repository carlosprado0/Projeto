<?php
// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "oficial";

$conexao = mysqli_connect($servername, $username, $password, $db_name);

// Sessão
session_start();

// Verificação para não entrarem na página restrita
if (!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

// Dados do usuário logado
$id = $_SESSION['id_cliente'];
$sql = "SELECT * FROM clientes WHERE id = '$id'";
$resultado_cliente = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($resultado_cliente); // Obter dados do cliente logado

// Consulta para pegar os dados dos usuários cadastrados no popup
$sql_cadastros = "SELECT nome, telefone, email FROM cadastro";
$resultado_cadastros = mysqli_query($conexao, $sql_cadastros);

// Importar a classe AwsSes (assumindo que o arquivo AwsSes está corretamente configurado)
require 'vendor/autoload.php';
require './AwsSes.php';

// Verificar se o formulário foi enviado
if (isset($_POST['enviar_email'])) {
    // Pegar os valores do formulário
    $emails = $_POST['emails']; // Pode ser um ou mais e-mails
    $subject = $_POST['email_subject']; // Assunto do e-mail
    $body = $_POST['email_body']; // Corpo do e-mail

    // Verificar se os campos estão preenchidos
    if (!empty($emails) && !empty($subject) && !empty($body)) {
        // Certifique-se de que $emails é um array (caso seja múltiplo)
        if (!is_array($emails)) {
            $emails = [$emails]; // Converter em array se for apenas um e-mail
        }

        // Instanciar a classe AwsSes e enviar o e-mail
        $serviceEmail = new AwsSes();
        $serviceEmail->senEmail($emails, $subject, $body);
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Administrador</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="estilo/css/estilo.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand h1 mb-0" href="admpag.php">Topo</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Depoimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contatos</a>
                    </li>


                </ul>

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                            Social
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Facebook</a>
                            <a class="dropdown-item" href="#">Instagram</a>
                            <a class="dropdown-item" href="#">X</a>

                        </div>
                    </li>
                </ul>

                <form class="form-inline">
                    <input class="form-control ml-3 mr-2" type="search" placeholder="Buscar...">
                    <button class="btn btn-dark" type="submit">OK</button>
                </form>
            </div>

            <ul class="navbar-nav ml-3 mr-2">

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">
                        <?php echo $dados['login']; ?>
                    </a>

                    <div class="dropdown-menu">

                        <a class="dropdown-item" href="gerenciador.php" rel="nofollow" title="gerenciar">Gerenciar</a>
                        <a class="dropdown-item" href="admpag.php" rel="nofollow" title="gerenciar">Voltar</a>
                        <a class="dropdown-item" href="index.html" rel="nofollow" title="sair">Sair</a>

                    </div>
                </li>
            </ul>
        </div>

    </nav>

    <!-- Seção de cadastros -->
    <div class="row mb-1">

        <div class="col-2">

            <nav id="navbarVertical" class="navbar navbar-light bg-light">
                <nav class="nav nav-pills flex-column">

                    <a class="nav-link" href="#">Agenda</a>
                    <a class="nav-link my-1" href="#">Serviços</a>

                    <nav class="nav nav-pills flex-column">

                        <a class="nav-link" href="#">Cadastros</a>
                        <a class="nav-link" href="gerenciador.php">Voltar</a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>
                        <a class="nav-link" href="#"></a>

                    </nav>
                </nav>
            </nav>
        </div>

        <div class="col-10 d-flex justify-content-center">
            <div class="container mt-3">
                <h2 class="text-center">Clientes Cadastrados</h2>

                <!-- Tabela para exibir os dados dos clientes cadastrados no popup -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($resultado_cadastros) > 0) {
                            // Loop para exibir cada cliente cadastrado
                            while ($clientes = mysqli_fetch_assoc($resultado_cadastros)) {
                                echo "<tr>";
                                echo "<td>" . $clientes['nome'] . "</td>";
                                echo "<td>" . $clientes['telefone'] . "</td>";
                                echo "<td>" . $clientes['email'] . "</td>";
                                echo "</tr>";

                                // Enviar e-mail para o cliente cadastrado
                                $toEmail = $clientes['email'];
                                $fromEmail = "ibroonkzz@gmail.com"; // E-mail remetente verificado
                                $subject = "Teste 1";
                                $body = "<h1>Olá, " . $clientes['nome'] . "</h1><p>Este é um e-mail de teste.</p>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Nenhum cliente cadastrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Enviador de Email -->
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="emails">Destinatário(os):</label>
                            <input type="text" class="form-control" id="emails" name="emails" placeholder="exemplo@dominio.com, outro@dominio.com">
                        </div>
                        <div class="form-group">
                            <label for="emailSubject">Assunto do Email:</label>
                            <input type="text" class="form-control" id="emailSubject" name="email_subject" value="">
                        </div>
                        <div class="form-group">
                            <label for="emailBody">Corpo do Email:</label>
                            <textarea class="form-control" id="emailBody" name="email_body" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" name="enviar_email" class="btn btn-primary">Enviar Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row-mr">
        <div class="row ml-5">
            <div class="col-12 mb-3">

                <br>
                <br>
               
            </div>

            <div class="col-sm-4">
                <h3>Rastreando Leads</h3>
                <p>Transformers One é um futuro filme americano de animação digital do gênero ação e ficção científica, baseado na linha de brinquedos Transformers. É o oitavo filme da série Transformers, bem como o primeiro longa-metragem de animação baseado na franquia desde The Transformers: The Movie.</p>
            </div>

            <div class="col-sm-3">
                <h3>Menu</h3>
                <div class="list-group text-center">
                    <a href="#" class="list-group-item list-group-item-action active">Perfil</a>
                    <a href="#" class="list-group-item list-group-item-action active">Serviços</a>
                    <a href="#" class="list-group-item list-group-item-action active">Depoimentos</a>
                    <a href="#" class="list-group-item list-group-item-action active">Contatos</a>

                </div>
            </div>


            <div class="col-sm-4">

                <h3>Social</h3>

                <div class="btn-group-vertical btn-block btn-button-lg" role="group">
                    <a class="btn btn-primary" href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</a>
                    <a class="btn btn-danger" href="#"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a>
                    <a class="btn btn-dark" href="#"><i class="fa fa-twitter" aria-hidden="true"></i>X</a>

                </div>

            </div>

        </div>


        <!-- Optional JavaScript -->
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="script.js"></script>
</body>

</html>
<?php
// Fechar a conexão
mysqli_close($conexao);
?>