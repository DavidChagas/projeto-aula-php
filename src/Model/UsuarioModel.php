<?php 

class UsuarioModel {
	private $nome;
	private $cpf;
	private $email;
	private $senha;
	
	public function __construct(){}

	public function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

	public function __get($propriedade){
		return $this->$propriedade;
	}
}