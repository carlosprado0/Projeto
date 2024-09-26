<?php 
// Conexão
require_once 'conexao.php';

// Sessão
session_start();

//verificação para nao entrarem na pagina restrita
if(!isset($_SESSION['logado'])):
    header('Location: login.php');
endif;

// dados
$id = $_SESSION['id_cliente'];
$sql = "SELECT * FROM clientes WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAG DO ADM</title>

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

                <a class="nav-link" href="leads.php">Cadastros</a>
                <a class="nav-link" href="admpag.php">Voltar</a>
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

<div class="row">
<div class="row ml-5">
            <div class="col-12 mb-3"><hr></div>

                <div class="col-sm-4">
                    <h3>Rastreando Leads</h3>
                    <p>Nesse momento estou em um bate cabeça tremendo KKKKKK to colocando qualquer coisa aqui pra ebcher e ficar bonito na pag asdjfklasdjflksadjfkasdhfiodsfhoasidnfoaskdncokasdnohsosidfhj</p>
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="script.js"></script>

   
  </body>
</html>
</body>
</html>