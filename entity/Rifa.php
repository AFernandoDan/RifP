<?php

namespace Entity;    


/**
* @Entity
*
**/

class Rifa {

    /**
    * @var int
    *   
    * @Id
    * @Column(type="integer")
    * @GeneratedValue
    * */
    private $id;

    /**
    * @var string
    * @Column(length=150)
    */
    private $nombre;

    /**
    * @var int
    * @Column(type="integer")
    */
    private $cantidad_boletos;

    /**
     * @Column(type="boolean")
     */
    private $estado;
    
    function __construct($nombre, $cantidad_boletos) {
       $this->nombre = $nombre;
       $this->cantidad_boletos = $cantidad_boletos;
       $this->estado = false;
    }

    function sortear() {
    
        if (!$this->estaSorteada()) {

            $boletos_vendidos = $this->getBoletosVendidos();
    
            if (count($boletos_vendidos) >= 1) {

                $boleto_ganador = $boletos_vendidos[array_rand($boletos_vendidos)];

                $this->estado = true;

                $boleto_ganador->setEsGanador(true);

                $GLOBALS['entityManager']->flush();
            }
            else {
                // HACER -> error no hay numeros vendidos
            }

        }

    }

    function getBoletoGanador(){

        if ($this->estaSorteada()) {

            $boleto = boletosRepository()->findOneBy(["id_rifa"=>$this,"es_ganador"=>1]);
        
            return $boleto;

        }

    }
    
    public function estaSorteada() {
        return $this->estado;
    }

    function getBoletos() {
    
        $boletos = boletosRepository()->findBy(["id_rifa"=>$this]);
        
        return $boletos;
        
    }

    function getBoletosVendidos() {
        
        $boletos = boletosRepository()->findBy(["id_rifa"=>$this,"estado_dueno"=>1]);
        
        return $boletos;
        
    }
    
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Rifa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set cantidadBoletos.
     *
     * @param int $cantidadBoletos
     *
     * @return Rifa
     */
    public function setCantidadBoletos($cantidadBoletos)
    {
        $this->cantidad_boletos = $cantidadBoletos;

        return $this;
    }

    /**
     * Get cantidadBoletos.
     *
     * @return int
     */
    public function getCantidadBoletos()
    {
        return $this->cantidad_boletos;
    }

    /**
     * Set estado.
     *
     * @param bool $estado
     *
     * @return Rifa
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado.
     *
     * @return bool
     */
    public function getEstado()
    {
        if ($this->estado == 1) {
            return "La rifa ya fue sorteada";
            
        }else{
            return "La rifa aun no ha sido sorteada";
            
        }
    }

}
