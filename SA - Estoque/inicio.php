<?php 
// Inicialize a sessão
  session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Inicio </title>

        <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div class="container-fluid">

        <div class="row">
          <div class="col-sm-2 sidebar bg-dark">

            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link sidebar-nav-link" href="Cadastro_Prod/View.php" target="conteudo">Vendas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link sidebar-nav-link" href="Cadastro_Prod/Create.php" target="conteudo">Produtos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link sidebar-nav-link" href="#">Estatísticas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link sidebar-nav-link" href="Cadastro_Login/registerUser.php" target="conteudo">Usuários</a>
              </li>
            </ul>

          </div>

          <div class="col-sm-8 content">

            <iframe name="conteudo" width="100%" height="100%" frameborder="1" src=""></iframe>
          </div>

          <div class="col-sm-2">

            <div class="btn-group content2">
              <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <h1 class="display-6">Login</h1>
              </button>

              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gerenciar</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="Cadastro_Login/logout.php">Sair</a></li>
              </ul>
            </div>

            <br><br>

            <p class="my-5">Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bem vindo ao nosso site.</p>


          </div>

        </div>
    </div>

</body>
</html>