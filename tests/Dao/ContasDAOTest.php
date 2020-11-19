<?php
use PHPUnit\Framework\TestCase;
require 'src/Dao/ContasDAO.php';
include 'src/Persistence/Conexao.php';

class ContasDAOTest extends TestCase{
	//ContasDAO::class
	//$contasDao = $this->crateMock(new ContasDAO());
	//protected static $contasDao;

    // public static function setUpBeforeClass(){
    	
    // }


    // public static function tearDownAfterClass(){
    // }

    public static function testeTest(){
    	$teste = true;
    	self::assertTrue($teste);
    }

    // public static function inserirConta(){
    // 	$contasDao = $this->createMock(ContasDAO::class);
    // 	$contasDao->method('inserirConta')->willReturn(true);
    // 	self::assertTrue($contasDao->inserirConta());
    // }
}