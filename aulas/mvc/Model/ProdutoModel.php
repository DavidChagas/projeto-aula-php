<?php 

class ProdutoModel {
	private $descricao;
	private $codigoReferencia;
	private $marca;
	

	//Métodos para atribuir/buscar valora nas propriedades
	public function __construct(){}

	public function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

	public function __get($propriedade){
		return $this->$propriedade;
	}
}

?>