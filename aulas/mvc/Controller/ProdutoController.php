<?php 
	session_start();

	include '../Model/ProdutoModel.php';
	
	if( (!empty($_POST['descricao'])) && 
		(!empty($_POST['codigoReferencia'])) &&
		(!empty($_POST['marca'])) )
	{
		
		
			$produto = new ProdutoModel();

			$produto->descricao = $_POST['descricao'];
			$produto->codigoReferencia = $_POST['codigoReferencia'];
			$produto->marca = $_POST['marca'];
			
			$_SESSION['descricao'] = $produto->descricao;
			$_SESSION['codigoReferencia'] = $produto->codigoReferencia;
			$_SESSION['marca'] = $produto->marca;
			header("location:../View/Produtos/ProdutosViewResult.php");
	}else{
		echo "Informe todos os campos!";
	}

?>