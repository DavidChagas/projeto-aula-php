<!doctype html>
<?php
    session_start();
    include "../../Persistence/Conexao.php";
    include "../../DAO/UsuarioDAO.php";
    include "../../DAO/DespesasDAO.php";
    include "../../DAO/ReceitasDAO.php";

    $usuario_id = $_SESSION['usuario_id'];

    $usuarioDao = new UsuarioDAO;
    $despesasDao = new DespesasDAO;
    $receitasDao = new ReceitasDAO;

    $saldoTotal = $usuarioDao->buscaSaldoTotal($usuario_id);
    $totalDespesas = $despesasDao->totalDespesas($usuario_id);
    $totalReceitas = $receitasDao->totalReceitas($usuario_id);
?>
<html lang="pt">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="../../../css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href=../../../node_modules/bootstrap/compiler/bootstrap.css>

        <title>Projeto Web</title>
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
        <div class="view-home">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="includeMenuLateral"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="saudacao">Olá <?php echo $_SESSION['usuario_nome']?></div>
                        <div class="titulo">Página Inicial</div>
                        <!-- 
                            BALANÇO MENSAL
                         -->
                         <div class="row">
                             <div class="col-md-4"><div class="subtitulo">Minhas contas</div></div>
                             <div class="col-md-4"><div class="subtitulo">Balanço mensal</div></div>
                         </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="informacao">
                                    <img src="../../../images/total.png">
                                    <div class="item">Saldo Total</div>
                                    <div class="valor">R$ <?php if(!$saldoTotal) echo 0; else echo $saldoTotal ?></div>    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="informacao">
                                    <img src="../../../images/receitas-g.png">
                                    <div class="item">Total de Receitas</div>
                                    <div class="valor">R$ <?php if(!$totalReceitas) echo 0; else echo $totalReceitas ?></div>  
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="informacao">
                                    <img src="../../../images/despesas-g.png">
                                    <div class="item">Total de despesas</div>
                                    <div class="valor">R$ <?php if(!$totalDespesas) echo 0; else echo $totalDespesas ?></div>    
                                </div>
                            </div>
                        </div>  
                        <!-- 
                            AÇÕES
                         -->
                        <div class="subtitulo">Ações</div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="campo receita">
                                    <a href="../Receitas/ReceitasViewCadastrar.php">
                                        <span><img class="img-responsive" src="../../../images/add-receitas.png"> Adicionar <br> nova receita</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="campo despesa">
                                    <a href="../Despesas/DespesasViewCadastrar.php">
                                        <span><img class="img-responsive" src="../../../images/add-despesas.png"> Adicionar <br> nova despesa</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="campo categorias">
                                    <a href="../../View/Categorias/CategoriasViewCadastrar.php?tipo=Receita">
                                        <span><img class="img-responsive" src="../../../images/add.png"> Adicionar nova <br> categoria receita</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="campo categorias">
                                    <a href="../../View/Categorias/CategoriasViewCadastrar.php?tipo=Despesa">
                                        <span><img class="img-responsive" src="../../../images/add.png"> Adicionar nova <br> categoria despesa</span>
                                    </a>
                                </div>
                            </div>
                        </div>  
                        
                        
                      <!--   <a href="../../Controller/CategoriasController.php?operacao=listar&tipo=Despesa">
                            <button class="btn btn-primary">Listar categorias Despesas</button>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="includeFooter"></div>
    </body>
</html>