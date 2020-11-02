<?php

    Use PHPUnit\Framework\TestCase;
    
    Use Entity\Rifa;
    Use Entity\Boleto;

    require 'src/repositorios.php';

    require 'src/crear_rifa.php';
    
    require 'src/eliminar_rifa.php';
    
    require 'src/getters.php';
    
    require 'src/validaciones.php';
    
    
    Class FirstTest extends TestCase
    {
        public function testSum()
        {
            $rifa = getRifaPorNombre("asdasaaadasd");
            $this->assertInstanceOf(Rifa::class,$rifa);

            $boleto = $rifa->getBoletos()[0];
            $this->assertInstanceOf(Boleto::class,$boleto);

            //$rifa = getRifaPorNombre("bien");
            //$this->assertInstanceOf(Entity\Rifa::class,$rifa);
        }
    }