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
        public function testCrearRifaConValoresInvalidos()
        {
            // creando rifa con nombre vacio
            $rifa = crearRifa("",1);
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con nombre de tipo no string
            $rifa = crearRifa(1,1);
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con unicamente espacios en el nombre
            $rifa = crearRifa("                  ",1);
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con caracteres no alfanumericos en el nombre *Espacios permitidos*
            $rifa = crearRifa("//rifatest",1);
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con un nombre con mas de 70 caracteres
            $rifa = crearRifa("Rifa con un nombre exageradamente grande como para crear una rifa con ese nombre",1);
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con un nombre con menos de cuatro caracteres
            $rifa = crearRifa("Tre",1);
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con un numero de boletos no entero
            $rifa = crearRifa("Rifa de prueba","esto no tiene que funcionar");
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con un numero de boletos mayor a 299
            $rifa = crearRifa("Rifa de prueba",300);
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con un numero de boletos menor a 1
            $rifa = crearRifa("Rifa de prueba",0);
            $this->assertNotInstanceOf(Rifa::class,$rifa);
            
        }

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

            // obteniendo los boletos de la rifa creada "rifatest"
            $rifa_creada = getRifaPorNombre("rifatest");
            $boletos = $rifa_creada->getBoletos();

            $this->assertIsArray($boletos);

            // comprobando que todos los boletos del arreglo $boletos sean instancias de la clase Boleto
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