<?php

//EntityManager y conexion a base de datos *
require_once '../RifP/bootstrap.php';

require_once '../RifP/entity/Rifa.php';
require_once '../RifP/entity/Boleto.php';

Use Entity\Rifa;
Use Entity\Boleto;

require 'src/repositorios.php';

require 'src/crear_rifa.php';

require 'src/eliminar_rifa.php';

require 'src/getters.php';

require 'src/validaciones.php';

require 'public/gui/listar_rifas.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
    
    
    <title>RifP - Home</title>
</head>
<body>

    <!-- Barra superior con logo y nombre de la aplicación -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index">
          <img src="public/img/test.png" width="30" height="30" class="d-inline-block align-top" alt="Logo de RifP">
          RifP
        </a>
    </nav>

    <!-- Formulario para crear rifa -->
    <div style="padding-left: 12px;">
      <form action="funciones_rifas.php" method="post">
        <div class="form-row align-items-center">
          <div class="col-sm-3 my-1">
            <label>Nombre de la rifa</label>
            <input type="text" class="form-control" id="crearRifaNombre" name="crearRifaNombre" placeholder="Rifa 2020" required pattern="[A-Za-z0-9]{4,80}"
           title="Letras y números. Tamaño mínimo: 4. Tamaño máximo: 80">
          </div>
          <div class="col-sm-3 my-1">
            <label>Cantidad de boletos</label>
            <input type="number" min="1" max="299" class="form-control" id="crearRifaCantidadBoletos" name="crearRifaCantidadBoletos" placeholder="1" required>
          </div>
          <div class="col-auto my-1" style="padding-top: 31px;">
            <button type="submit" class="btn btn-success">Crear</button>
          </div>
        </div>
      </form>
    </div>

    <!-- Listado de rifas con nombre, cantidad de boletos y boleto ganador -->
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad de boletos</th>
            <th scope="col">Boleto ganador</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php listarRifas(); ?>
        </tbody>
      </table>
    
</body>
</html>