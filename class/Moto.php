<?php

class Moto extends Vehiculo{

    protected $marca;
    protected $cilindrada;

    public function __construct($matricula, $marca, $cilindrada)
    {
        parent::__construct($matricula);
        $this->marca=$marca;
        $this->cilindrada=$cilindrada;
    }



    /**
     * Set the value of cilindrada
     */
    public function setCilindrada($cilindrada)
    {
        $this->cilindrada = $cilindrada;

    }

    /**
     * Set the value of marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

    }
}





?>