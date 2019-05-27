<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link href="../../../css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../../node_modules/bootstrap/compiler/bootstrap.css">

        <title>Cadastrar-se</title>
        <link href="../../../images/logo-php.png" rel="icon" type="image/x-png" />
   </head>

    <body>
        <div id="view-cadastro-usuario">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div  class="painel">
                            <div class="titulo">Cadastre-se para ter acesso ao sistema e poder fazer o gerenciamento de suas finanças.</div>
                            <form action="../../Controller/UsuarioController.php?operacao=cadastrar" method="post" name="formLogin">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="nome" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="cpf" placeholder="CPF">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="senha" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="saldo_total" placeholder="Saldo inicial">
                                </div>
                                <a href="../../../index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="copyright">Análise e Desenvolvimento de Sistemas<br>Casca-2019</div>
            </div>
        </div>
    </body>
</html>

