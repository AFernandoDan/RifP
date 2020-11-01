<?php

namespace Entity; 

/**
* @Entity
*
**/

class Boleto {

    /**
    * @var int
    *   
    * @Id
    * @Column(type="integer")
    * @GeneratedValue
    * */
    private $id;

    /**
     * @ManyToOne (targetEntity="Rifa")
     * @JoinColumn (name="id_rifa",referencedColumnName="id")
     */
    private $id_rifa;

    /**
    * @var int
    * @Column(type="integer")
    */
    private $numero;

    /**
    * @var string
    * @Column(length=150, nullable=true)
    */
    private $dueno;

    /**
    * @var string
    * @Column(length=150, nullable=true)
    */
    private $responsable;

    /**
     * @Column(type="boolean")
     */
    private $estado_dueno;

    /**
     * @Column(type="boolean")
     */
    private $es_ganador;
    
    function __construct($id_rifa, $numero) {
       $this->id_rifa = $id_rifa;
       $this->numero = $numero;
       $this->estado_dueno = 0;
       $this->es_ganador = 0;
    }

    function asignarResponsable($nombre_responsable) {

        $validacion_nombre = validarNombre($nombre_responsable);

        if ($validacion_nombre != null) {
            return $validacion_nombre;
        }

        $this->setResponsable($nombre_responsable);
        $GLOBALS['entityManager']->flush();
    
    }

    function quitarResponsable() {

        $estado_dueno = $this->estado_dueno;

        $estado_responsable = $this->getEstadoResponsable();

        $this->setResponsable(null);

        if ($estado_dueno == true) {

            $this->setEstadoDueno(false);
            $this->setDueno(null);

            $GLOBALS['entityManager']->flush();

        }

        if ($estado_responsable == true) {

            $this->setResponsable(null);

            $GLOBALS['entityManager']->flush();

        }

    }


    function asignarDueno($nombre_dueno) {

        $validacion_nombre = validarNombre($nombre_dueno);

        if ($validacion_nombre != null) {
            return $validacion_nombre;
        }
    
        $estado_responsable = $this->getEstadoResponsable();

        $estado_dueno = $this->estado_dueno;
    
        if ($estado_responsable == true) {

            if ($estado_dueno == false) {
                $this->setEstadoDueno(true);
            }

            $this->setDueno($nombre_dueno);
            $GLOBALS['entityManager']->flush();

        }
    
    }

    function quitarDueno() {

        $estado_dueno = $this->estado_dueno;
    
        if ($estado_dueno == true) {

            $this->setEstadoDueno(false);
            $this->setDueno("");

        }

        $GLOBALS['entityManager']->flush();

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
     * Set numero.
     *
     * @param int $numero
     *
     * @return Boleto
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero.
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set dueno.
     *
     * @param string|null $dueno
     *
     * @return Boleto
     */
    public function setDueno($dueno = null)
    {
        $this->dueno = $dueno;

        return $this;
    }

    /**
     * Get dueno.
     *
     * @return string|null
     */
    public function getDueno()
    {
        return $this->dueno;
    }

    /**
     * Set responsable.
     *
     * @param string|null $responsable
     *
     * @return Boleto
     */
    public function setResponsable($responsable = null)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable.
     *
     * @return string|null
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set estadoDueno.
     *
     * @param bool $estadoDueno
     *
     * @return Boleto
     */
    public function setEstadoDueno($estadoDueno)
    {
        $this->estado_dueno = $estadoDueno;

        return $this;
    }

    /**
     * Get estadoDueno.
     *
     * @return bool
     */
    public function getEstadoDueno()
    {
        return $this->estado_dueno;
    }

    /**
     * Get estadoResponsable.
     *
     * @return bool
     */
    public function getEstadoResponsable()
    {
        if ($this->responsable == null) {
            return false;
        }

        return true;
    }

    /**
     * Set idRifa.
     *
     * @param \Entity\Rifa|null $idRifa
     *
     * @return Boleto
     */
    public function setIdRifa(\Entity\Rifa $idRifa = null)
    {
        $this->id_rifa = $idRifa;

        return $this;
    }

    /**
     * Get idRifa.
     *
     * @return \Entity\Rifa|null
     */
    public function getIdRifa()
    {
        return $this->id_rifa;
    }

    /**
     * Set esGanador.
     *
     * @param bool $esGanador
     *
     * @return Boleto
     */
    public function setEsGanador($esGanador)
    {
        $this->es_ganador = $esGanador;

        return $this;
    }

    /**
     * Get esGanador.
     *
     * @return bool
     */
    public function getEsGanador()
    {
        return $this->es_ganador;
    }
}
