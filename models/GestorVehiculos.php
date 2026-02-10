<?php

class GestorVehiculos
{

    public function __construct()
    {
        if (!isset($_SESSION['catalogo'])) {
            $_SESSION['catalogo'] = [];
        }
    }

    public function anyadir($exposicion)
    {
        $_SESSION['catalogo'][] = $exposicion;
    }
    //Añadimos la Funcion de listar Coches
    public function listarCoches()
    {
        $coches=[];
        for ($i=0; $i <count($_SESSION['catalogo']) ; $i++) { 
            if(get_class($_SESSION['catalogo'][$i])=="Coche"){
                $coches[]=$_SESSION['catalogo'][$i];
            }
        }
        return $coches;
    }
    //Añadimos la Funcion de listar Motos
    public function listarMotos()
    {
        $motos=[];
        for ($i=0; $i <count($_SESSION['catalogo']) ; $i++) { 
            if(get_class($_SESSION['catalogo'][$i])=="Moto"){
                $motos[]=$_SESSION['catalogo'][$i];
            }
        }
        return $motos;
    }
    public function listar()
    {
        return $_SESSION['catalogo'];
    }

    public function buscar($matricula)
    {
        foreach ($_SESSION['catalogo'] as $exposicion) {
            if ($exposicion->getMatricula() == $matricula) {
                return $exposicion;
            }
        }
    }

    public function actualizarCoche($matricula, $bastidor, $precio)
    {

        foreach ($_SESSION['catalogo'] as $i => $exposicion) {
            if ($exposicion->getMatricula() == $matricula) {
                $_SESSION['catalogo'][$i]->setBastidor($bastidor);
                $_SESSION['catalogo'][$i]->setPrecio($precio);
            }
        }
    }
    public function actualizarMoto($matricula, $marca, $cilindrada)
    {

        foreach ($_SESSION['catalogo'] as $i => $exposicion) {
            if ($exposicion->getMatricula() == $matricula) {
                $_SESSION['catalogo'][$i]->setMarca($marca);
                $_SESSION['catalogo'][$i]->setCilindrada($cilindrada);
            }
        }
    }

    public function eliminar($matricula)
    {
        foreach ($_SESSION['catalogo'] as  $i => $exposicion) {
            if ($exposicion->getMatricula() == $matricula) {
                unset($_SESSION['catalogo'][$i]);
                $_SESSION['catalogo'] = array_values($_SESSION['catalogo']);
            }
        }
    }
}
