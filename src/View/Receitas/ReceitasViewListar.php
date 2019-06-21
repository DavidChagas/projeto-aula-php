<!doctype html>
<?php
    session_start();
    include_once '../../Model/ReceitasModel.php';
    $receitas = array();
    $receitas = unserialize($_SESSION['receitas']);

    $totalReceitas = 0;
    $totalRecebido = 0;
    $totalPendente = 0;

    foreach ($receitas as $receita) {
        $totalReceitas = $totalReceitas + $receita->valor; 

        if ($receita->recebido == 'Sim') {
            $totalRecebido = $totalRecebido + $receita->valor;
        } else {
            $totalPendente = $totalPendente + $receita->valor;
        }
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

        <title>Despesas</title>
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

            function excluir(receita_id){
                if(confirm("Deseja realmente apagar esta receita?")){
                    window.location.href="../../Controller/ReceitasController.php?operacao=excluir&id="+receita_id;
                }else{
                    return false;
                }
            }
        </script> 
   </head>

    <body>
        <div id="includeHeader"></div>
        <div id="receitas-view-listar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="includeMenuLateral"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="titulo">Minhas Receitas</div>
                        <!-- 
                            INFORMAÇÕES
                         -->
                        <div class="informacoes">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/nao-pago-g.png">
                                        <div class="item">Total pendente</div>
                                        <div class="valor"><?php echo $totalPendente ?></div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/pago-g.png">
                                        <div class="item">Total recebido</div>
                                        <div class="valor"><?php echo $totalRecebido ?></div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/total-despesas.png">
                                        <div class="item">Total de receitas</div>
                                        <div class="valor"><?php echo $totalReceitas ?></div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 
                            FILTROS
                         -->
                        <div class="filtros">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <select id="mes" class="form-control" name="filtroMes" value="">
                                            <option selected>Filtre por mês</option>
                                            <option value="01">Janeiro</option>
                                            <option value="02">Fevereiro</option>
                                            <option value="03">Março</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Maio</option>
                                            <option value="06">Junho</option>
                                            <option value="07">Julho</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Setembro</option>
                                            <option value="10">Outubro</option>
                                            <option value="11">Novembro</option>
                                            <option value="12">Dezembro</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ano" placeholder="Filtre por ano">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <a onclick="<?php $funcao; ?>">
                                        <button class="btn btn-primary" style="width: 100%">Filtrar</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- 
                            TABELA
                         -->
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Recebido</th>
                                            <th>Descrição</th>
                                            <th>Conta</th>
                                            <th>Categoria</th>
                                            <th>Valor</th>
                                            <th>Data</th>
                                            <th width="50"></th>
                                            <th width="50"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($_SESSION['receitas'])){
                                                foreach ($receitas as $receita) {
                                                    echo '<tr>';
                                                        echo '<td>'.$receita->recebido.'</td>';
                                                        echo '<td>'.$receita->descricao.'</td>';
                                                        echo '<td>'.$receita->conta.'</td>';
                                                        echo '<td>'.$receita->categoria.'</td>';
                                                        echo '<td>'.$receita->valor.'</td>';
                                                        echo '<td>'.$receita->data.'</td>';
                                                        echo '<td>
                                                                <a href="ReceitasViewCadastrar.php?receitaId='.$receita->id.'">
                                                                    <button class="btn btn-primary">
                                                                        <img src="../../../images/editar.png">
                                                                    </button>
                                                                </a>
                                                              </td>';
                                                        echo '<td>
                                                                <a onclick="excluir('.$receita->id.')">
                                                                    <button class="btn btn-danger pull-right">
                                                                        <img src="../../../images/deletar.png">
                                                                    </button>
                                                                </a>
                                                              </td>';
                                                    echo '</tr>';
                                                }
                                            }else{
                                                echo 'Sem despesas cadastradas.';
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
                                    <a href="ReceitasViewCadastrar.php">
                                        <button class="btn btn-success">+ Adicionar nova receita</button>
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

