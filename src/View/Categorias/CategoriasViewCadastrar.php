<!doctype html>
<?php
    session_start();
    include "../../Persistence/Conexao.php";
   
    if(isset($_GET['categoriaId'])){
        $categoria_id = $_GET['categoriaId'];

        include "../../DAO/CategoriasDAO.php";

        $categoriasDao = new CategoriasDAO();
        $categoria = $categoriasDao->buscarCategoria($categoria_id);

        $acao = "editar";

        $tipo = $categoria['tipo'];
        $nome = $categoria['nome'];
      
    }else{
        $acao = "cadastrar";

        $tipo = $_GET['tipo'];
        $nome = "";
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

        <title>Cadastrar Categoria</title>
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
        <div id="categorias-view-cadastrar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="includeMenuLateral"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="titulo">Adicionar nova categoria para <?php echo $tipo ?></div>
                        <form action=" ../../Controller/CategoriasController.php?operacao=<?php echo $acao; if(isset($categoria_id)) echo '&categoria_id='.$categoria_id; else echo '&tipo='.$tipo; ?>" method="post" name="formDespesa">
                            <div class="form-group" style="visibility: hidden;">
                                <input class="form-control" type="text" name="tipo" value="<?php echo $tipo ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>" placeholder="Nome da categoria">
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <?php if(isset($categoria_id)) echo 'Editar'; else echo 'Cadastrar' ?>
                            </button>
                            <a href="../../View/Categorias/CategoriasViewListar.php?tipo=<?php echo $tipo ?>">
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="includeFooter"></div>
    </body>
</html>

