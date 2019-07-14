<!doctype html>
<?php
    session_start();
    include_once '../../Model/DespesasModel.php';
    $despesas = array();
    $despesas = unserialize($_SESSION['despesas']);

    $totalDespesas = 0;
    $totalDespesasPagas = 0;
    $totalDespesasNaoPagas = 0;

    foreach ($despesas as $despesa) {
        $totalDespesas = $totalDespesas + $despesa->valor; 

        if ($despesa->pago == 'Sim') {
            $totalDespesasPagas = $totalDespesasPagas + $despesa->valor;
        } else {
            $totalDespesasNaoPagas = $totalDespesasNaoPagas + $despesa->valor;
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
                $("#includeMenuLateral").load("../MenuLateral/MenuLateral.php");nome
            });

            function excluir(despesa_id){
                if(confirm("Deseja realmente apagar esta despesa?")){
                    window.location.href="../../Controller/DespesasController.php?operacao=excluir&id="+despesa_id;
                }else{
                    return false;
                }
            }
        </script> 
   </head>

    <body>
        <div id="includeHeader"></div>
        <div id="despesas-view-listar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="includeMenuLateral"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="titulo">Minhas Despesas</div>
                        <!-- 
                            INFORMAÇÕES
                         -->
                        <div class="informacoes">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/nao-pago-g.png">
                                        <div class="item">Total pendente</div>
                                        <div class="valor">R$ <?php echo $totalDespesasNaoPagas ?></div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/pago-g.png">
                                        <div class="item">Total pago</div>
                                        <div class="valor">R$ <?php echo $totalDespesasPagas ?></div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/total-despesas.png">
                                        <div class="item">Total de despesas</div>
                                        <div class="valor">R$ <?php echo $totalDespesas ?></div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 
                            FILTROS
                         -->
                        <div class="filtros">
                            <form action="../../Controller/DespesasController.php?operacao=filtrar" method="post" name="formFiltro">
                                
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
                                            <input class="form-control" type="text" name="filtroAno" placeholder="Filtre por ano">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="submit" style="width: 100%">Filtrar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="btn-limpar-filtro">
                                <a href="../../Controller/DespesasController.php?operacao=listar">Limpar filtro</a>
                            </div>
                            <div class="filtradoPor">
                                <?php 
                                    if( isset($_SESSION['filtro_ano_despesas']) && isset($_SESSION['filtro_mes_despesas']) ){
                                        switch ($_SESSION['filtro_mes_despesas']) {
                                            case '01':
                                                echo 'Janeiro de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '02':
                                                echo 'Fevereiro de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '03':
                                                echo 'Março de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '04':
                                                echo 'Abril de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '05':
                                                echo 'Maio de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '06':
                                                echo 'Junho de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '07':
                                                echo 'Julho de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '08':
                                                echo 'Agosto de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '09':
                                                echo 'Setembro de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '10':
                                                echo 'Outubro de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '11':
                                                echo 'Novembro de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                            case '12':
                                                echo 'Dezembro de '.$_SESSION['filtro_ano_despesas'];
                                                break;
                                         }
                                    }
                                ?>
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
                                            <th>Pago</th>
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
                                            if(isset($_SESSION['despesas'])){
                                                foreach ($despesas as $despesa) {
                                                    echo '<tr>';
                                                        echo '<td>';
                                                            if($despesa->pago == 'Sim'){
                                                                echo '<img src="../../../images/pago-p.png" style="width:18px">';
                                                            } else {
                                                                echo '<img src="../../../images/nao-pago-p.png" style="width:15px">';
                                                            }
                                                        echo '</td>';
                                                        echo '<td>'.$despesa->descricao.'</td>';
                                                        echo '<td>'.$despesa->conta.'</td>';
                                                        echo '<td>'.$despesa->categoria.'</td>';
                                                        echo '<td> R$ '.$despesa->valor.'</td>';
                                                        echo '<td>'.$newDate = date("d-m-Y", strtotime($despesa->data)).'</td>';
                                                        echo '<td>
                                                                <a href="DespesasViewCadastrar.php?despesaId='.$despesa->id.'">
                                                                    <button class="btn btn-primary">
                                                                        <img src="../../../images/editar.png">
                                                                    </button>
                                                                </a>
                                                              </td>';
                                                        echo '<td>
                                                                <a onclick="excluir('.$despesa->id.')">
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
                                    <a href="DespesasViewCadastrar.php">
                                        <button class="btn btn-success">+ Adicionar nova despesa</button>
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

