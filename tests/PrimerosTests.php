<?php

    Use PHPUnit\Framework\TestCase;
    
    Use Entity\Rifa;
    Use Entity\Boleto;

    require 'src/repositorios.php';

    require 'src/crear_rifa.php';
    
    require 'src/eliminar_rifa.php';
    
    require 'src/getters.php';
    
    require 'src/validaciones.php';
    
    Class PrimerosTests extends TestCase
    {
        public function testCrearRifa()
        {
            $rifa = crearRifa("rifatest",1);
            $this->assertInstanceOf(Rifa::class,$rifa);

        }

        public function testObteniendoRifaPorNombre(){
            $rifa_buscada = getRifaPorNombre("rifatest");
            $this->assertInstanceOf(Rifa::class,$rifa_buscada);

            $this->assertEquals("rifatest",$rifa_buscada->getNombre());
        }

        public function testObtenerBoletosDeUnaRifaRecienCreada(){
            $rifa_buscada = getRifaPorNombre("rifatest");
            $boletos = $rifa_buscada->getBoletos();

            $this->assertIsArray($boletos);

            foreach ($boletos as $boleto) {
                $this->assertInstanceOf(Boleto::class,$boleto);
            }
        }
        
        public function testEliminarRifa()
        {
            $rifa_buscada = getRifaPorNombre("rifatest");
            eliminarRifa($rifa_buscada->getId());

            $rifa_eliminada = getRifaPorNombre("rifatest");
            $this->assertEquals(null,$rifa_eliminada);
        }

        public function testEliminarTodasLasRifa()
        {
            //obteniendo todas las rifas
            $rifas = getRifas();
            
            //eliminando todas las rifas
            if ($rifas != null) {
                foreach ($rifas as $rifa) {
                    eliminarRifa($rifa->getId());
                }
            }

            $rifas_eliminadas = getRifas();

            //comprobando que todas las rifas hayan sido eliminadas
            $this->assertEquals($rifas_eliminadas, []);

        }
    }