<!DOCTYPE html>

<html>

<head>
    <title>CRUD PHP con POO ARRAYS</title>
</head>

<body>
    <h1>Gestor de Catalo de Vehiculos</h1>
    <hr>
    <a href="index.php?accion=crear">Añadir Vehiculo</a>
    <h3> COCHES

        <!--LISTADO DE COCHES-->

        <table border="1" cellpadding="10">
            <tr>
                <th>Matricula</th>
                <th>Bastidor</th>
                <th>Precio</th>
                <th>Acciones</th>

            </tr>
            <?php foreach ($cochesAcortadas as $coche): ?>
                <?php if (get_class($coche) == "Coche"): ?>

                    <tr>
                        <td><?= $coche->getMatricula() ?></td>
                        <td><?= $coche->getBastidor() ?></td>
                        <td><?= $coche->getPrecio() ?></td>
                        <td>
                            <!--Boton Editar-->
                            <form method="POST" action="index.php?accion=editarCoche" style="display:inline;">
                                <input type="hidden" name="matricula" value="<?= $coche->getMatricula() ?>">
                                Bastidor: <input type="text" name="bastidor" value="<?= $coche->getBastidor() ?>" required>
                                Precio: <input type="number" name="precio" value="<?= $coche->getPrecio() ?>" required>
                                <button type="submit">Guardar</button>
                                <!--Boton Eliminar-->
                                <a href="index.php?accion=eliminar&matricula=<?= $coche->getMatricula() ?>">Eliminar</a>

                            </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <!--Paginador de Coches-->
        <?php for ($i = 1; $i <= $totalCoches; $i++): ?>
            <a href="index.php?accion=index&pActualCoches=<?= $i?>"><?= $i ?></a>
        <?php endfor; ?>

        <!--LISTADO DE MOTOS-->
        <h3> MOTOS
            <table border="1" cellpadding="10">
                <tr>
                    <th>Matricula</th>
                    <th>Bastidor</th>
                    <th>Precio</th>
                    <th>Acciones</th>

                </tr>

                <?php foreach ($motosAcortadas as $moto): ?>
                    <?php if (get_class($moto) == "Moto"): ?>
                        <tr>
                            <td><?= $moto->getMatricula() ?></td>
                            <td><?= $moto->getMarca() ?></td>
                            <td><?= $moto->getCilindrada() ?></td>
                            <td>
                                <!--Boton Editar-->
                                <form method="POST" action="index.php?accion=editarMoto" style="display:inline;">
                                    <input type="hidden" name="matricula" value="<?= $moto->getMatricula() ?>">
                                    Marca: <input type="text" name="marca" value="<?= $moto->getMarca() ?>" required>
                                    Cilindrada: <input type="number" name="cilindrada" value="<?= $moto->getCilindrada() ?>" required>
                                    <button type="submit">Guardar</button>
                                    <!--Boton Eliminar-->
                                    <a href="index.php?accion=eliminar&matricula=<?= $moto->getMatricula() ?>">Eliminar</a>

                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>

            </table>
            <!--Paginador de Motos-->
            <?php for ($i = 1; $i <= $totalMotos; $i++): ?>
                <a href="index.php?accion=index&pActualMotos=<?= $i?>"><?= $i ?></a>
            <?php endfor; ?>

</body>

</html>