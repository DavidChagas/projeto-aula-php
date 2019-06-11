<!doctype html>
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

            function excluir(conta_id){
                if(confirm("Deseja realmente apagar esta conta?")){
                    window.location.href="../../Controller/ContasController.php?operacao=excluir&id="+conta_id;
                }else{
                    return false;
                }
            }
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
                        <div class="painel">
                            <div class="titulo">Minhas Contas</div>
                            <div class="informacoes">
                               <?php
                                    session_start();
                                    include_once '../../Model/ContasModel.php';
                                    
                                    $contas = array();
                                    $contas = unserialize($_SESSION['contas']);

                                    foreach ($contas as $conta) {
                                        echo '<div class="conta">';
                                            echo '<div class="informacao-principal">'.$conta->tipo.'</div>';
                                            echo '<div class="informacao">Saldo total: R$ '.$conta->saldo.'</div>';
                                            echo '<div class="informacao">Limite de despesas: R$ '.$conta->limite_despesas.'</div>';
                                            echo '<a href="ContasViewCadastrar.php?contaId='.$conta->id.'"><button class="btn btn-primary">Editar</button></a>';
                                            echo '<a onclick="excluir('.$conta->id.')"><button class="btn btn-danger">Excluir</button></a>';
                                        echo '</div>';
                                    }
                                ?>
                                <div class="campo-adicionar">
                                    <a href="ContasViewCadastrar.php">
                                        <img class="img-responsive" src="../../../images/add.png">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="includeFooter"></div>
    </body>
</html>

