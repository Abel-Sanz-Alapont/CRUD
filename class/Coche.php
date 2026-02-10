<?php

 class Coche extends Vehiculo{

    protected $bastidor;
    protected $precio;

    public function __construct($matricula, $bastidor, $precio)
    {
        parent::__construct($matricula);
        $this->bastidor=$bastidor;
        $this->precio=$precio;
    }

 

    /**
     * Set the value of precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;


    }



    /**
     * Set the value of bastidor
     */
    public function setBastidor($bastidor)
    {
        $this->bastidor = $bastidor;

    }

    /**
     * Get the value of bastidor
     */
    public function getBastidor()
    {
        return $this->bastidor;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }
}

?>