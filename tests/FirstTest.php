<?php

    Use PHPUnit\Framework\TestCase;
    
    Use Entity\Rifa;
    Use Entity\Boleto;

    require 'src/a.php';
    
    Class FirstTest extends TestCase
    {
        public function testSum()
        {
            $this->assertEquals(1,a());
        }
    }