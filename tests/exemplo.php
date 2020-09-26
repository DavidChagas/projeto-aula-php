<?php

use PHPUnit\Framework\TestCase;

class EmemploTest extends TestCase{
    public function testExemplo(){
        $teste = "ss";

        $this->assertEquals("ss", $teste);
    }
}