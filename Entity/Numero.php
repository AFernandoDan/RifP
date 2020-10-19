<?php

namespace Entity;    


/**
* @Entity
*
**/

class Numero {

    /**
    * @var int
    *   
    * @Id
    * @Column(type="integer")
    * @GeneratedValue
    * */
    private $id;

    /**
     * @ManyToOne (targetEntity="Sorteo")
     * @JoinColumn (name="id_sorteo",referencedColumnName="id")
     */
    private $id_sorteo;

    /**
    * @var int
    * @Column(type="integer")
    */
    private $numero;

    /**
    * @var string
    * @Column(length=150)
    */
    private $dueño;

    /**
    * @var string
    * @Column(length=150)
    */
    private $responsable;

    /**
     * @Column(type="boolean")
     */
    private $estado_dueño;
    
    /**
     * @Column(type="boolean")
     */
    private $estado_responsable;
    
    public function __construct($id_sorteo,$numero) {
        $this->id_sorteo = $id_sorteo;
        $this->numero = $numero;
        $this->dueño = "Sin dueño";
        $this->responsable = "Sin responsable";
        $this->estado_dueño = 0;
        $this->estado_responsable = 0;
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
     * @return Numero
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
     * Set dueño.
     *
     * @param string $dueño
     *
     * @return Numero
     */
    public function setDueño($dueño)
    {
        $this->dueño = $dueño;

        return $this;
    }

    /**
     * Get dueño.
     *
     * @return string
     */
    public function getDueño()
    {
        return $this->dueño;
    }

    /**
     * Set estado.
     *
     * @param bool $estado
     *
     * @return Numero
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
        return $this->estado;
    }

    /**
     * Set idSorteo.
     *
     * @param \Entity\Sorteo|null $idSorteo
     *
     * @return Numero
     */
    public function setIdSorteo(\Entity\Sorteo $idSorteo = null)
    {
        $this->id_sorteo = $idSorteo;

        return $this;
    }

    /**
     * Get idSorteo.
     *
     * @return \Entity\Sorteo|null
     */
    public function getIdSorteo()
    {
        return $this->id_sorteo;
    }

    /**
     * Set responsable.
     *
     * @param string $responsable
     *
     * @return Numero
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable.
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set estadoDueño.
     *
     * @param bool $estadoDueño
     *
     * @return Numero
     */
    public function setEstadoDueño($estadoDueño)
    {
        $this->estado_dueño = $estadoDueño;

        return $this;
    }

    /**
     * Get estadoDueño.
     *
     * @return bool
     */
    public function getEstadoDueño()
    {
        return $this->estado_dueño;
    }

    /**
     * Set estadoResponsable.
     *
     * @param bool $estadoResponsable
     *
     * @return Numero
     */
    public function setEstadoResponsable($estadoResponsable)
    {
        $this->estado_responsable = $estadoResponsable;

        return $this;
    }

    /**
     * Get estadoResponsable.
     *
     * @return bool
     */
    public function getEstadoResponsable()
    {
        return $this->estado_responsable;
    }
    
    public function tieneResponsable()
    {
        return $this->estado_responsable == true;
    }
}
