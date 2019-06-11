<?php

class Conexao extends PDO{
    private static $instance = null;

    public function Conexao($dns, $usuario, $senha){
        //Constructor da classe pai (parent) -> PDO
        parent::__construct($dns, $usuario, $senha);
    }

    public static function getInstance(){
        if (!isset(self::$instance)){
            try {
                //Cria uma conexão e retorna a instancia dela
                self::$instance = new Conexao("mysql:dbname=gerenciador-financas;host=localhost","root","");
                // echo "Conectado ao banco de dados !";
            } catch (Exception $e) {
                echo "Ocorreram erros ao tentar conectar no banco de dados !!";
                echo "$e";
                exit();
            }
        }
        return self::$instance;
    }
}




// Conexão feita por video aula
// function getConexao(){
// 	$dns = 'mysql:host=localhost;dbname=gerenciador-financas;charset=utf8';
// 	$usuario = 'root';
// 	$senha = '';

// 	$pdo = new PDO($dns, $usuario, $senha);

// 	return $pdo;
// }