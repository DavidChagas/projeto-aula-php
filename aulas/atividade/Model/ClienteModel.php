<?php 

class UserModel {
	private $nome;
	private $dataNascimento;
	private $cpf;
	private $sexo;
	private $profissao;
	private $telefone;
	private $celular;
	private $email;
	private $cep;
	private $endereco;
	private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $estado;
	private $observacao;

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