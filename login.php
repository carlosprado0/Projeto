<?php
// Conexão
require_once 'conexao.php';

// Sessão
session_start();

// Botão para enviar
if(isset ($_POST['btn-entrar'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    // Verificação de campos vazios
    if (empty($login) or empty($senha)):
        $erros[] = "<li>Todos os campos (login e senha) precisam ser preenchidos</li>";
    else:

        // Verifica se o login existe no banco de dados
        $sql = "SELECT login FROM clientes WHERE login = '$login'";
        $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0):
       $sql = "SELECT * FROM clientes WHERE login = '$login' AND senha = '$senha'";
       $resultado = mysqli_query($connect, $sql);
    
    if(mysqli_num_rows($resultado) == 1):
        $dados = mysqli_fetch_array($resultado);

         // Senha e login corretos, loga o usuário em outra pagina
         $_SESSION['logado'] = true;
         $_SESSION['id_cliente'] = $dados['id'];
         header('Location: admpag.php');
         
    else:
        $erros[] = "<li> Usuário e senha não conferem </li>";
endif;
    else:
        $erros[] = "<li> Usuário não encontrado </li>";
endif;
endif;
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/css/style.css">
</head>
<body>

    <header>

        <h1>Entrar</h1>

        <?php                             //para identificar os erros quando vazio
    if(!empty($erros)):
        foreach($erros as $erro):
            echo $erro;
        endforeach;
    endif;
    ?>

<section>
            <h2>Preencha os campos para entrar</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                Login: <input type="text" name="login">
                Senha: <input type="password" name="senha">
                
                <!-- Botão para enviar os dados de login -->
                <button type="submit" name="btn-entrar">Acessar</button>
                
                <!-- Botão para voltar à página anterior -->
                <button type="button" onclick="window.history.back();">Sair</button>
            </form>
        </section>
    </header>

</body>
</html>