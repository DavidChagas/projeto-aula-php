<!doctype html>
<?php
    session_start();
    include_once '../../Model/CategoriasModel.php';
    $categorias = array();
    $categorias = unserialize($_SESSION['categorias']);
    $tipo = $_SESSION['tipo_categoria'];
?>
<html lang="pt">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="../../../css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href=../../../node_modules/bootstrap/compiler/bootstrap.css>

        <title>Categorias</title>
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
                $("#includeMenuLateral").load("../MenuLateral/MenuLateral.php");nome
            });

            function excluir(categoria_id){
                if(confirm("Deseja realmente excluir esta categoria?")){
                    window.location.href="../../Controller/CategoriasController.php?operacao=excluir&id="+categoria_id;
                }else{
                    return false;
                }
            }
        </script> 
   </head>

    <body>
        <div id="includeHeader"></div>
        <div id="categorias-view-listar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="includeMenuLateral"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="titulo">Categorias de <?php echo $tipo ?>s</div>
                        <!-- 
                            TABELA
                         -->
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nome da categoria</th>
                                            <th width="50"></th>
                                            <th width="50"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_SESSION['categorias'])){
                                                foreach ($categorias as $categoria) {
                                                    echo '<tr>';
                                                        echo '<td>'.$categoria->nome.'</td>';
                                                        echo '<td>
                                                                <a href="CategoriasViewCadastrar.php?categoriaId='.$categoria->id.'">
                                                                    <button class="btn btn-primary">
                                                                        <img src="../../../images/editar.png">
                                                                    </button>
                                                                </a>
                                                              </td>';
                                                        echo '<td>
                                                                <a onclick="excluir('.$categoria->id.')">
                                                                    <button class="btn btn-danger pull-right">
                                                                        <img src="../../../images/deletar.png">
                                                                    </button>
                                                                </a>
                                                              </td>';
                                                    echo '</tr>';
                                                }
                                            }else{
                                                echo 'Sem categorias cadastradas.';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                        <!-- 
                            ADICIONAR
                         -->   
                        <div class="row">
                            <div class="col-md-12">
                                <div class="botoes">
                                    <a href="CategoriasViewCadastrar.php?tipo=<?php echo $tipo ?>">
                                        <button class="btn btn-success">+ Adicionar nova categoria</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div id="includeFooter"></div>
    </body>
</html>

