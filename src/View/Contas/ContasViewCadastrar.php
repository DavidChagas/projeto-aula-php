<!doctype html>
<?php
    if(isset($_GET['id'])){
        session_start();

        require __DIR__ . '/../../Persistence/Conexao.php';
        include "../../DAO/ContasDAO.php";
        $contasDao = new ContasDAO();

        $usuario_id = $_SESSION['usuario_id'];
        $contas = $contasDao->buscarContas($usuario_id);
        
        $nome = $contas['nome'];

        $acao = "editar";
        $tipo = "";
    }else{
        $acao = "cadastrar";
    }
?>
<html lang="pt">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="../../../css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href=../../../node_modules/bootstrap/compiler/bootstrap.css>

        <title>Minha Informações</title>
        <link href="../../../images/logo-php.png" rel="icon" type="image/x-png" />
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../../../node_modules/jquery/dist/jquery.js"></script>
        <script src="../../../node_modules/popper.js/dist/popper.js"></script>
        <script src="../../../node_modules/bootstrap/dist/js/bootstrap.js"></script>

        <script> 
            $(function(){
                $("#includeHeader").load("../header/header.html");
                $("#includeFooter").load("../footer/footer.html");
                $("#includeMenuLateral").load("../MenuLateral/MenuLateral.php");
            });
        </script> 
   </head>

    <body>
        <div id="includeHeader"></div>
        <div id="contas-view-listar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="includeMenuLateral"></div>
                    </div>
                    <div class="col-md-9">
                        <div  class="painel">
                            <div class="titulo">Adicionar nova Conta</div>
                            <form action=" ../../Controller/ContasController.php?operacao=<?php echo $acao ?>" method="post" name="formConta">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="tipo" value="" placeholder="Tipo da conta. Ex: Poupança.">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="saldo" placeholder="Saldo inicial da conta.">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="limite_despesas" placeholder="Limite de despesas.">
                                </div>
                                <a href="../../View/Contas/ContasViewListar.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="includeFooter"></div>
    </body>
</html>

