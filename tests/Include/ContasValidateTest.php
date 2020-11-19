<?php
use PHPUnit\Framework\TestCase;
require 'src/Include/ContasValidate.php';

class ContasValidateTest extends TestCase{

    public function testSaldoPositivo(){
        $retorno1 = ContasValidate::validaSaldoPositivo(10);
        $retorno2 = ContasValidate::validaSaldoPositivo(0);
        $retorno3 = ContasValidate::validaSaldoPositivo(-10);

        $this->assertTrue($retorno1);
        $this->assertTrue($retorno2);
        $this->assertFalse($retorno3);
    }

    public function testArray(){
    	$valores = [1, 2, 3, 4, 5];

    	// não deve estar vazio
    	$this->assertNotEmpty($valores);
    	
    	// deve conter a quantidade especificada de posições
    	$quantidadeEsperada = 5;
    	$this->assertCount($quantidadeEsperada, $valores);
    	
    	// deve conter o valor esperado
    	$valorEsperado = 2;
    	$this->assertContains($valorEsperado, $valores);

    	// deve ser o valor esperado
    	$valorEsperado = 1;
    	$this->assertEquals($valorEsperado, $valores[0]);

    }
}