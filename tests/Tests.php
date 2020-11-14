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
            $rifa = crearRifa("Rifa de prueba","esto no tiene que funcionar","hola");
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con un numero de boletos mayor a 299
            $rifa = crearRifa("Rifa de prueba",300);
            $this->assertNotInstanceOf(Rifa::class,$rifa);

            // creando rifa con un numero de boletos menor a 1
            $rifa = crearRifa("Rifa de prueba",0);
            $this->assertNotInstanceOf(Rifa::class,$rifa);
            
        }

        public function testCrearRifaConValoresValidos()
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

        public function testAsignandoResponsableYDuenoALosBoletosDeUnaRifa()
        {
            $rifa = getRifaPorNombre("rifatest");
            
            $boletos = $rifa->getBoletos();

            foreach ($boletos as $boleto) {
                // asignando nombre al responsable del boleto
                $boleto->asignarResponsable("nombre responsable");

                // comprobando que el nombre se haya asignado correctamente al responsable
                $this->assertEquals("nombre responsable",$boleto->getResponsable());

                $boleto->asignarDueno("nombre dueno");

                // comprobando que el nombre se haya asignado correctamente al dueno
                $this->assertEquals("nombre dueno",$boleto->getDueno());

            }

        }

        public function testQuitandoResponsableYDuenoALosBoletosDeUnaRifa()
        {
            $rifa = getRifaPorNombre("rifatest");
            
            $boletos = $rifa->getBoletos();

            foreach ($boletos as $boleto) {

                // quitando nombre al dueno del boleto
                $boleto->quitarDueno();

                // comprobando que el nombre se haya quitado correctamente al dueno
                $this->assertEquals(null,$boleto->getDueno());

                // quitando nombre al responsable del boleto
                $boleto->quitarResponsable();

                // comprobando que el nombre se haya quitado correctamente al responsable
                $this->assertEquals(null,$boleto->getResponsable());

            }

        }

        public function testIntentandoObtenerUnaRifaPorNombreDeUnaRifaQueNoExiste(){
            $rifa_inexistente = getRifaPorNombre("soy una rifa que no existe");
            $this->assertNotInstanceOf(Rifa::class,$rifa_inexistente);

        }

        public function testIntentandoSortearUnaRifaSinBoletosVendidos(){

            // obteniendo la rifa con el nombre "rifatest"
            $rifa = getRifaPorNombre("rifatest");

            $rifa->sortear();
            
            // comprobando que la rifa no se haya sorteado
            $this->assertEquals(false,$rifa->estaSorteada());

        }

        public function testIntentandoSortearUnaRifaSinBoletosVendidosPeroConResponsablesAsignados(){

            // obteniendo la rifa con el nombre "rifatest"
            $rifa = getRifaPorNombre("rifatest");

            $boletos = $rifa->getBoletos();

            foreach ($boletos as $boleto) {
                // asignando nombre al responsable del boleto
                $boleto->asignarResponsable("nombre responsable");

                // comprobando que el nombre se haya asignado correctamente
                $this->assertEquals("nombre responsable",$boleto->getResponsable());
            }

            $rifa->sortear();
            
            // comprobando que la rifa no se haya sorteado
            $this->assertEquals(false,$rifa->estaSorteada());
            
        }

        public function testIntentandoObtenerElBoletoGanadorDeUnaRifaSinSortear()
        {
            $rifa = getRifaPorNombre("rifatest");

            $boleto_ganador = $rifa->getBoletoGanador();

            $this->assertEquals(null, $boleto_ganador);
        }

        public function testAsignandoDuenosALosBoletosDeUnaRifaYSorteandola(){

            // obteniendo la rifa con el nombre "rifatest"
            $rifa = getRifaPorNombre("rifatest");

            $boletos = $rifa->getBoletos();

            foreach ($boletos as $boleto) {
                // asignando nombre al responsable del boleto
                $boleto->asignarDueno("nombre dueno");

                // comprobando que el nombre se haya asignado correctamente
                $this->assertEquals("nombre dueno",$boleto->getDueno());
            }

            $rifa->sortear();
            
            // comprobando que la rifa no se haya sorteado
            $this->assertEquals(true,$rifa->estaSorteada());
            
        }

        public function testObteniendoElBoletoGanadorDeUnaRifaSorteada()
        {
            $rifa = getRifaPorNombre("rifatest");

            $boleto_ganador = $rifa->getBoletoGanador();

            $this->assertInstanceOf(Boleto::class,$boleto_ganador);
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