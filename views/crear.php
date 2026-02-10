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
        <a href="index.php">Volver</a>