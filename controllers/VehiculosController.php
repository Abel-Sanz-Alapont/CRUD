<?php

class VehiculosController
{

    private $gestorVehiculos;

    public function __construct($gestorVehiculos)
    {
        $this->gestorVehiculos = $gestorVehiculos;
    }

    public function index()
    {
        $catalogo = $this->gestorVehiculos->listar();
        include "views/listar.php";
    }

    //metodos para crear editar y eliminar 

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matricula = $_POST['matricula'];
            if ($_POST['bastidor'] != null) {
                $bastidor = $_POST['bastidor'];
                $precio = $_POST['precio'];
                $vehiculo = new Coche($matricula, $bastidor, $precio);
            } else {
                $marca = $_POST['marca'];
                $cilindrada = $_POST['cilindrada'];
                $vehiculo = new Moto($matricula, $marca, $cilindrada);
            }
            $this->gestorVehiculos->anyadir($vehiculo);
            header("Location: index.php");
            exit();
        }

        include "views/crear.php";
    }
    public function editarCoche()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->gestorVehiculos->actualizarCoche($_POST['matricula'], $_POST['bastidor'], $_POST['precio']);

            header("Location: index.php");
            exit();
        }
    }
    public function editarMoto()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $this->gestorVehiculos->actualizarMoto($_POST['matricula'], $_POST['marca'], $_POST['cilindrada']);
            header("Location: index.php");
            exit();
        }
    }

    public function eliminar()
    {
        
            $this->gestorVehiculos->eliminar($_GET['matricula']);
            header("Location: index.php");
            exit();
        
    }
}
