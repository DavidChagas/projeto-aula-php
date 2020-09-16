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

            function excluir(){
                if(confirm("Deseja realmente apagar a sua conta?")){
                    window.location.href="../../Controller/UsuarioController.php?operacao=excluir";
                }else{
                    return false;
                }
            }
        </script> 
   </head>

    <body>
        <div id="includeHeader"></div>
        <div id="usuario-view-listar">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="includeMenuLateral"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="painel">
                            <div class="titulo">Minhas Informações</div>
                            <div class="informacoes">
                                <?php
                                    session_start();
                                    
                                    $usuario = unserialize($_SESSION['usuario']);

                                    echo '<div class="informacao">' . 'Nome: ' . $usuario['nome'] . '</div>';

                                    echo '<div class="informacao">' . 'CPF: ' . $usuario['cpf'] . '</div>';

                                    echo '<div class="informacao">' . 'E-mail: ' . $usuario['email'] . '</div>';
                                ?>
                                <a href="UsuarioViewCadastrar.php?usuarioId=<?php echo $usuario['id']?>">
                                    <button class="btn btn-primary">Atualizar dados</button>
                                </a>
                                <a onclick="excluir()">
                                    <button class="btn btn-outline-danger">Remover minha conta</button>
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

