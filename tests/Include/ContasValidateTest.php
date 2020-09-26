<?php
use PHPUnit\Framework\TestCase;
require 'src/Include/ContasValidate.php';

class ContasValidateTest extends TestCase{
    public function testSaldoPositivo(){
        $retorno1 = ContasValidate::validaSaldoPositivo(10);
        $retorno2 = ContasValidate::validaSaldoPositivo(0);
        $retorno3 = ContasValidate::validaSaldoPositivo(-10);
        $this->assertEquals(true, $retorno1);
        $this->assertEquals(true, $retorno2);
        $this->assertEquals(false, $retorno3);
    }
    
}