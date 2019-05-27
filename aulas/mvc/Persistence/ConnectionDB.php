<?php
 // class ConnectionDB extends PDO{
 //    private static $instance = null;

 //    public function ConnectionDB($dsn, $usuario, $senha){
 //        //Constructor da classe pai (parent) -> PDO
 //        parent::__construct($dsn, $usuario, $senha);
 //    }

 //    public static function getInstance(){
 //        if (!isset(self::$instance)){
 //            try {
 //                //Cria uma conexão e retorna a instancia dela
 //                self::$instance = new ConnectionDB("mysql:dbname=ecomm;host=localhost","root","");
 //                echo "Conectado ao banco de dados !";
 //            } catch (Exception $e) {
 //                echo "Ocorreram erros ao tentar conectar no banco de dados !!";
 //                echo "$e";
 //                exit();
 //            }
 //        }
 //        return self::$instance;
 //    }
 // }
?>