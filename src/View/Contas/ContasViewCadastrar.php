<!doctype html>
<?php
    $conta_id = $_GET['contaId'];
    if(isset($conta_id)){
        session_start();

        include "../../Persistence/Conexao.php";
        include "../../DAO/ContasDAO.php";

        $contasDao = new ContasDAO();
        
        $conta = $contasDao->buscarConta($conta_id);
        $tipo = $conta['tipo'];
        $saldo = $conta['saldo'];
        $limite = $conta['limite_despesas'];
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
                                    <input class="form-control" type="text" name="tipo" value="<?php echo $tipo ?>" placeholder="Tipo da conta. Ex: Poupança.">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="saldo" value="<?php echo $saldo ?>" placeholder="Saldo inicial da conta.">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="limite_despesas" value="<?php echo $limite ?>" placeholder="Limite de despesas.">
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

