<?php
include 'main.php';

//obteniendo el id del sorteo que se quiere eliminar
$id_sorteo = $_POST ["id_sorteo"];

//buscando el sorteo que se va a eliminar
$sorteo = getSorteoPorId($id_sorteo);

//obteniendo todos los numeros del sorteo a eliminar
$numeros = getNumerosPorSorteo($sorteo);

$sorteo_nombre = $sorteo -> getNombre();
  
function mostrar_numeros($numeros){ 
    foreach ($numeros as $numero){
        $num = $numero -> getNumero();
        $dueño = $numero -> getDueño();
        $responsable = $numero -> getResponsable();
        $id = $numero -> getId();?>

        <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $dueño; ?></td>
            <td><?php echo $responsable; ?></td>
            <td>
                <form action="asignar_dueño.php" method="post">
                    <input type="input" name="nuevo_dueño" required>
                    <input type="hidden" name="id_numero" value="<?php echo $id;?>">
                    <button type="submit">Asignar dueño</button>
                </form>
            </td>
            <td>
                <form action="quitar_dueño.php" method="post">
                    <input type="hidden" name="id_numero" value="<?php echo $id;?>">
                    <button type="submit">Quitar dueño</button>
                </form>
            </td>
                        <td>
                <form action="asignar_responsable.php" method="post">
                    <input type="input" name="nuevo_responsable" required>
                    <input type="hidden" name="id_numero" value="<?php echo $id;?>">
                    <button type="submit">Asignar responsable</button>
                </form>
            </td>
            <td>
                <form action="quitar_responsable.php" method="post">
                    <input type="hidden" name="id_numero" value="<?php echo $id;?>">
                    <button type="submit">Quitar responsable</button>
                </form>
            </td>
        </tr>
    <?php } 
}?>
<html>
    <head>
        <title>Ver numeros</title>
    </head>
    <body>
        <!--//boton de regresar al home-->
        <form action="home.php">
                    <button type="submit">Volver al home</button>
        </form>
        
        <h2>Numeros del sorteo: <?php echo $sorteo_nombre; ?></h2>
        
        <table>
            <tr>
                <th>Numero</th> <th>Dueño</th> <th>Responsable</th>
            </tr>
            <?php mostrar_numeros($numeros); ?>
        </table>
    </body>
</html>


