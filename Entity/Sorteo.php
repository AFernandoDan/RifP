<?php

namespace Entity;    


/**
* @Entity
*
**/

class Sorteo {

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
    private $cantidad_numeros;

    /**
     * @Column(type="boolean")
     */
    private $estado;

    /**
     * @OneToOne(targetEntity="Numero")
     **/
    private $ganador;

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
     * @return Sorteo
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
     * Set cantidadNumeros.
     *
     * @param int $cantidadNumeros
     *
     * @return Sorteo
     */
    public function setCantidadNumeros($cantidadNumeros)
    {
        $this->cantidad_numeros = $cantidadNumeros;

        return $this;
    }

    /**
     * Get cantidadNumeros.
     *
     * @return int
     */
    public function getCantidadNumeros()
    {
        return $this->cantidad_numeros;
    }

    /**
     * Set estado.
     *
     * @param bool $estado
     *
     * @return Sorteo
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
     * Set ganador.
     *
     * @param string $ganador
     *
     * @return Sorteo
     */
    public function setGanador($ganador)
    {
        $this->ganador = $ganador;

        return $this;
    }

    /**
     * Get ganador.
     *
     * @return string
     */
    public function getGanador()
    {
        return $this->ganador;
    }

    /**
     * Set idNumero.
     *
     * @param \Entity\Numero|null $idNumero
     *
     * @return Sorteo
     */
    public function setIdNumero(\Entity\Numero $idNumero = null)
    {
        $this->id_numero = $idNumero;

        return $this;
    }

    /**
     * Get idNumero.
     *
     * @return \Entity\Numero|null
     */
    public function getIdNumero()
    {
        return $this->id_numero;
    }
    
    public function estaSorteado()
    {
        return $this->estado == true;
    }
}
