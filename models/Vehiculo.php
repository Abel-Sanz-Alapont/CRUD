<?php

 class Vehiculo{
    protected $matricula;

    public function __construct($matricula)
    {
        $this->matricula=$matricula;
    }


    public function getMatricula()
    {
        return $this->matricula;
    }
}





?>