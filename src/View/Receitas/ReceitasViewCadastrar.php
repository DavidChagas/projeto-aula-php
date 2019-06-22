<!doctype html>
<?php
    session_start();
    include "../../Persistence/Conexao.php";
    include "../../DAO/ContasDAO.php";
    include "../../DAO/CategoriasDAO.php";

    $usuario_id = $_SESSION['usuario_id'];

    $contasDao = new ContasDAO();
    $categoriasDAO = new CategoriasDAO();

    $contas = array();
    $categorias = array();
    $contas = $contasDao->buscarContas($usuario_id);
    $categorias = $categoriasDAO->buscarCategorias($usuario_id, 'Receita');

    if(isset($_GET['receitaId'])){
        $receita_id = $_GET['receitaId'];

        include "../../DAO/ReceitasDAO.php";

        $receitasDao = new ReceitasDAO();
        $receita = $receitasDao->buscarReceita($receita_id);

        $acao = "editar";

        $descricao = $receita['descricao'];
        $valor = $receita['valor'];
        $data = $receita['data'];
        $conta_id = $receita['conta_id'];
        $categoria_receita_id = $receita['categoria_receita_id'];
        $recebido = $receita['recebido'];
    }else{
        $acao = "cadastrar";

        $descricao = "";
        $valor = "";
        $data = "";
        $conta_id = "";
        $categoria_receita_id = "";
        $recebido = "";
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

        <title>Cadastrar Receita</title>
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
        <div id="receitas-view-cadastrar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="includeMenuLateral"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="titulo">Adicionar nova Receita</div>
                        <form action=" ../../Controller/ReceitasController.php?operacao=<?php echo $acao; if(isset($receita_id)) echo '&receita_id='.$receita_id ?>" method="post" name="formReceita">
                            <div class="form-group">
                                <input class="form-control" type="text" name="descricao" value="<?php echo $descricao ?>" placeholder="Descrição">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="valor" value="<?php echo $valor ?>" placeholder="Valor">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="date" name="data" value="<?php echo $data ?>" placeholder="Data: ">
                            </div>
                            <div class="form-group" style="display: flex;">
                                <select class="form-control" name="conta_id" style="width: 80%">
                                    <option selected value="<?php echo $conta_id ?>">Selecione uma conta</option>
                                    <?php
                                        foreach ($contas as $conta) {
                                            echo '<option value="'.$conta->id.'">'.$conta->tipo.'</option>';
                                        }
                                    ?>
                                </select>
                                <a href="../Contas/ContasViewCadastrar.php" style="width: 20%; margin-left: 10px;">
                                    <button class="btn btn-success" type="button" style="width: 100%;">+ Nova Conta</button>
                                </a>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <select class="form-control" name="categoria_receita_id" style="width: 80%">
                                    <option value="<?php echo $categoria_receita_id ?>">Selecione uma categoria</option>
                                    <?php
                                        foreach ($categorias as $categoria) {
                                            echo '<option value="'.$categoria->id.'">'.$categoria->nome.'</option>';
                                        }
                                    ?>
                                </select>
                                <a href="../../View/Categorias/CategoriasViewCadastrar.php?tipo=Receita" style="width: 20%; margin-left: 10px;">
                                    <button class="btn btn-success" type="button" style="width: 100%;">+ Nova Categoria</button>
                                </a>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="recebido">
                                    <option value="<?php echo $recebido ?>">Recebido?</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <?php if(isset($receita_id)) echo 'Editar'; else echo 'Cadastrar' ?>
                            </button>
                            <a href="../../View/Receitas/ReceitasViewListar.php">
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

