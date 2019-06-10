<!doctype html>
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
                        <div class="informacoes">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/nao-pago-g.png">
                                        <div class="item">Despesas pendentes</div>
                                        <div class="valor">valor</div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/pago-g.png">
                                        <div class="item">Despesas pagas</div>
                                        <div class="valor">valor</div>    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="informacao">
                                        <img src="../../../images/total-despesas.png">
                                        <div class="item">Total de despesas</div>
                                        <div class="valor">valor</div>    
                                    </div>
                                </div>
                            </div>
                        </div>    
                        
                        <div class="filtros">
                            <form action=" ../../Controller/DespesasController.php?operacao=listar" method="post" name="formDespesas">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select id="mes" class="form-control">
                                                <option selected>Filtre por mês</option>
                                                <option>Janeiro</option>
                                                <option>Fevereiro</option>
                                                <option>Março</option>
                                                <option>Abril</option>
                                                <option>Maio</option>
                                                <option>Junho</option>
                                                <option>Julho</option>
                                                <option>Agosto</option>
                                                <option>Setembro</option>
                                                <option>Outubro</option>
                                                <option>Novembro</option>
                                                <option>Dezembro</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="ano" placeholder="Filtre por ano">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="submit" style="width: 100%;">Filtrar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Pago</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Conta</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="includeFooter"></div>
    </body>
</html>

