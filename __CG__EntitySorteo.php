<?php

namespace DoctrineProxies\__CG__\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Sorteo extends \Entity\Sorteo implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'id', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'nombre', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'cantidad_numeros', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'estado', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'ganador'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'id', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'nombre', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'cantidad_numeros', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'estado', '' . "\0" . 'Entity\\Sorteo' . "\0" . 'ganador'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Sorteo $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre($nombre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', [$nombre]);

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', []);

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setCantidadNumeros($cantidadNumeros)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCantidadNumeros', [$cantidadNumeros]);

        return parent::setCantidadNumeros($cantidadNumeros);
    }

    /**
     * {@inheritDoc}
     */
    public function getCantidadNumeros()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCantidadNumeros', []);

        return parent::getCantidadNumeros();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstado($estado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstado', [$estado]);

        return parent::setEstado($estado);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstado', []);

        return parent::getEstado();
    }

    /**
     * {@inheritDoc}
     */
    public function setGanador($ganador)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGanador', [$ganador]);

        return parent::setGanador($ganador);
    }

    /**
     * {@inheritDoc}
     */
    public function getGanador()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGanador', []);

        return parent::getGanador();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdNumero(\Entity\Numero $idNumero = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdNumero', [$idNumero]);

        return parent::setIdNumero($idNumero);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdNumero()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdNumero', []);

        return parent::getIdNumero();
    }

    /**
     * {@inheritDoc}
     */
    public function estaSorteado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'estaSorteado', []);

        return parent::estaSorteado();
    }

}
