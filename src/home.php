<?php

include 'main.php';

if (isset($_POST ["id_sorteo_eliminar"])) {
    
    $id_sorteo_eliminar = $_POST ["id_sorteo_eliminar"];
    eliminarSorteo($id_sorteo_eliminar);
}

$sorteos = getSorteos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RifP</title>
</head>

<body>
    <h2>Crear sorteo</h2>

    <form action="crear_sorteo.php" method="POST">
        <label for="fname">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="lname">Cantidad de numeros:</label>
        <input type="text" name="numeros" required>
        <input type="submit" value="Crear sorteo">
    </form>

    <?php
    //comprobando si se creo un sorteo
		if (isset ($_GET['exitoso'])) {
            $nombre_exitoso = $_GET['exitoso'];
            echo "Sorteo <strong>$nombre_exitoso</strong> creado exitosamente";
        }

    //comprobando si la creacion de un sorteo fallo
        if (isset ($_GET['fallido'])) {
            $nombre_fallido = $_GET['fallido'];
            echo "El sorteo <strong>$nombre_fallido</strong> ya existe";
        }
    ?>

    <h2>Sorteos</h2>
    
    <!-- listando todos los sorteos -->
    <table>
        <tr>
            <th>Nombre Sorteo</th> <th>Cantidad de numeros</th> <th>Estado</th> <th>Ganador</th>
        </tr>
            <?php
                foreach ($sorteos as $sorteo) {

                    $nombre = $sorteo -> getNombre();
                    $cantidad_numeros = $sorteo -> getCantidadNumeros();
                    $id = $sorteo -> getId();
                    $estado = $sorteo -> getEstado();
                    $ganador = "Sin ganador";
                    
                    if ($estado == true) {
                        $estado_sorteo = "Sorteado";
                        $ganador = $sorteo -> getGanador() -> getNumero();
                    }
                    else {
                        $estado_sorteo = "Sin sortear";
                    }
            ?>
                  
        <tr>
            <td><?php echo $nombre; ?></td> <td><?php echo $cantidad_numeros; ?></td> <td><?php echo $estado_sorteo; ?></td> <td><?php echo $ganador; ?></td>
            <?php if ($estado == false) { ?>
                    <td>
                        <form action="sortear.php" method="post">
                            <input type="hidden" name="id_sorteo" value="<?php echo $id;?>">
                            <button type="submit">Sortear</button>
                        </form>
                    </td>
            <?php } ?>
            <td>
                <form action="home.php" method="post">
                    <input type="hidden" name="id_sorteo_eliminar" value="<?php echo $id;?>">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            <td>
                <form action="ver_numeros.php" method="post">
                    <input type="hidden" name="id_sorteo" value="<?php echo $id;?>">
                    <button type="submit">Ver numeros</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    
    </table>
    <br>
</body>
</html>