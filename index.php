<!doctype html>
<html lang="pt">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">

        <title>Projeto Web</title>
        <link href="images/logo-php.png" rel="icon" type="image/x-png" />
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="node_modules/jquery/dist/jquery.js"></script>
        <script src="node_modules/popper.js/dist/popper.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </head>

    <body>
        <div class="view-index">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div  class="painel">
                            <div class="titulo1">Bem Vindo!</div>
                            <div class="titulo2">Projeto Desenvolvimento Web</div>
                            <div class="titulo3">Gerenciador de Finanças Pessoais</div>
                            <form action="src/Controller/ValidaLogin.php" method="post" name="formLogin">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="login" placeholder="Usuário">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="senha" placeholder="Senha">
                                </div>
                                <div class="cadastrar-se">Não tem conta? 
                                    <a href="src/View/Usuario/CadastroUsuario.php">Criar conta</a>
                                </div>
                                <button class="btn btn-primary" type="submit">Acessar site</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="copyright">Análise e Desenvolvimento de Sistemas<br>Casca-2019</div>
            </div>
        </div>
    </body>
</html>
