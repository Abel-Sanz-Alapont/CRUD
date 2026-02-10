<?php
require_once "autoload.php";
session_start();

$gestor = new GestorVehiculos(); 

$catalogo = $gestor->listar();

$accion = $_GET['accion'] ?? null; //SI NO ESTA NADA ESCRITO EN EL CAMPO PONLO A NULL

//OPERACIONES DE CRUD
if ($accion == "crear") {
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
    $gestor->anyadir($vehiculo);
    header("Location: index.php");
    exit(); 
}

//ACCION PARA EDITAR LOS CAMPOS DE LOS COCHES
if ($accion=="editarCoche"){
        $gestor->actualizarCoche($_POST['matricula'],$_POST['bastidor'],$_POST['precio']);

        header("Location: index.php");
        exit(); 
}

//ACCION PARA EDITAR LOS CAMPOS DE LAS MOTOS
if ($accion=="editarMoto"){
        $gestor->actualizarMoto($_POST['matricula'],$_POST['marca'],$_POST['cilindrada']);
        header("Location: index.php");
        exit(); 
}

if ($accion=="eliminar") {
    $gestor->eliminar($_GET['matricula']);
    header("Location: index.php");
    exit(); 
}
?>

<!DOCTYPE html>

<html>

<head>
    <title>CRUD PHP con POO ARRAYS</title>
</head>

    <body>
        <h1>Gestor de Catalo de Vehiculos</h1>
        <hr>
        <!--Formulario Crear-->

        <form method="POST" action="index.php?accion=crear";>
            MATRICULA:
            <input type="number" name="matricula" required><br>

            BASTIDOR:
            <input type="text" name="bastidor">

            PRECIO:
            <input type="number" name="precio"><br>

            MARCA:
            <input type="text" name="marca">

            CILINDRADA:
            <input type="number" name="cilindrada"><br>

            <button type="submit">Agregar Vehiculo</button>

        </form>

        <h3> COCHES
        
        <!--LISTADO DE COCHES-->

        <table border="1" cellpadding="10">
            <tr>
                <th>Matricula</th>
                <th>Bastidor</th>
                <th>Precio</th>
                <th>Acciones</th>

            </tr>
            <?php foreach ($catalogo as $coche): ?>
                <?php if (get_class($coche)=="Coche"): ?>

            <tr>
                <td><?=$coche->getMatricula()?></td>
                <td><?=$coche->getBastidor()?></td>
                <td><?=$coche->getPrecio()?></td>
                <td>
                    <!--Boton Editar-->
                    <form method="POST" action="index.php?accion=editarCoche" style="display:inline;">
                        <input type="hidden" name="matricula" value="<?= $coche->getMatricula() ?>">
                        Bastidor: <input type="text" name="bastidor" value="<?= $coche->getBastidor() ?>"required>
                        Precio: <input type="number" name="precio" value="<?= $coche->getPrecio() ?>"required>
                        <button type="submit">Guardar</button>
                        <!--Boton Eliminar-->
                            <a href="index.php?accion=eliminar&matricula=<?=$coche->getMatricula()?>">Eliminar</a>

                    </form>
                </td>
            </tr>
            <?php endif;?>
            <?php endforeach;?>
        </table>
        <BR>
        <!--LISTADO DE MOTOS-->
         <h3> MOTOS
        <table border="1" cellpadding="10">
            <tr>
                <th>Matricula</th>
                <th>Bastidor</th>
                <th>Precio</th>
                <th>Acciones</th>

            </tr>

            <?php foreach ($catalogo as $moto): ?>
                <?php if(get_class($moto)=="Moto"):?>
            <tr>
                <td><?=$moto->getMatricula()?></td>
                <td><?=$moto->getMarca()?></td>
                <td><?=$moto->getCilindrada()?></td>
                <td>
                    <!--Boton Editar-->
                    <form method="POST" action="index.php?accion=editarMoto" style="display:inline;">
                        <input type="hidden" name="matricula" value="<?= $moto->getMatricula() ?>">
                        Marca: <input type="text" name="marca" value="<?= $moto->getMarca() ?>"required>
                        Cilindrada: <input type="number" name="cilindrada" value="<?= $moto->getCilindrada() ?>"required>
                        <button type="submit">Guardar</button>
                        <!--Boton Eliminar-->
                            <a href="index.php?accion=eliminar&matricula=<?=$moto->getMatricula()?>">Eliminar</a>

                    </form>
                </td>
            </tr>
            <?php endif;?>
            <?php endforeach;?>

        </table>

    </body>

</html>