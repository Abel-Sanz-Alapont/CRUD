<?php
require_once "autoload.php";
session_start();


$gestor = new GestorVehiculos();

$controller = new VehiculosController($gestor);

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {
    case 'crear':
        $controller->crear();
        break;
    case 'editarCoche':
        $controller->editarCoche();
        break;
    case 'editarMoto':
        $controller->editarMoto();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;

    default:
        $controller->index();
}
