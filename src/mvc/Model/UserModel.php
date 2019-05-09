<?php 

class UserModel {
	private $user;
	private $nome;
	private $sobrenome;
	private $idade;
	private $password;
	private $email;

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