<!doctype html>
<?php
    session_start();

    if(isset($_GET['usuarioId'])){
        $acao = "editar";

        $usuario_id = $_GET['usuarioId'];

        include "../../Persistence/Conexao.php";
        include "../../DAO/UsuarioDAO.php";

        $usuarioDao = new UsuarioDAO();
        
        $usuario = $usuarioDao->buscaUsuario($usuario_id);
        $nome = $usuario['nome'];
        $cpf = $usuario['cpf'];
        $email = $usuario['email'];
        $senha = $usuario['senha'];
        $saldo_total = $usuario['saldo_total'];
    }else{
        $acao = "cadastrar";
        $usuario = "";
        $nome = "";
        $cpf = "";
        $email = "";
        $senha = "";
        $saldo_total = "";
    }
?>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link href="../../../css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../../node_modules/bootstrap/compiler/bootstrap.css">

        <title>Cadastrar</title>
        <link href="../../../images/logo-php.png" rel="icon" type="image/x-png" />
   </head>

    <body>
        <div id="usuario-view-cadastrar">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div  class="painel">
                            <div class="titulo">
                                <?php 
                                    if(isset($usuario_id)) echo 'Atualizar informações'; 
                                    else echo 'Cadastre-se para ter acesso ao sistema e poder fazer o gerenciamento de suas finanças.' 
                                ?>
                            </div>
                            <form action="../../Controller/UsuarioController.php?operacao=<?php echo $acao; if(isset($usuario_id)) echo '&usuario_id='.$usuario_id ?>" method="post" name="formLogin">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="cpf" value="<?php echo $cpf ?>" placeholder="CPF">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" value="<?php echo $email ?>" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="senha" value="<?php echo $senha ?>" placeholder="Senha">
                                </div>
                                <div class="form-group" <?php if(isset($usuario_id)) echo 'style="visibility: hidden;"' ?>>
                                    <input class="form-control" type="text" name="saldo_total" value="<?php echo $saldo_total ?>" placeholder="Saldo inicial">
                                </div>
                                <button class="btn btn-primary" type="submit"><?php if(isset($usuario_id)) echo 'Atualizar'; else echo 'Cadastrar' ?></button>
                                <a href="<?php if(isset($usuario_id)) echo 'UsuarioViewListar.php'; else echo '../../../index.php' ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="copyright">Análise e Desenvolvimento de Sistemas<br>Casca-2019</div>
            </div>
        </div>
    </body>
</html>

