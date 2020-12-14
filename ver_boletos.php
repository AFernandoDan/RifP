<?php

//EntityManager y conexion a base de datos
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

require 'public/gui/listar_boletos.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>
<body>

    <!-- Barra superior con logo y nombre de la aplicación -->
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="index">
        <img src="public/img/test.png" width="30" height="30" class="d-inline-block align-top" alt="Logo de RifP">
        RifP
      </a>
    </nav>

    <table class="table">
        <thead>
          <tr>
            <th scope="col"><b>#</b></th>
            <th scope="col">Dueño</th>
            <th scope="col">Responsable</th>
            <th scope="col"></th> <!-- Esta linea de aca es para crear una columna invisible -->
          </tr>
        </thead>
        <tbody>
          <?php listarBoletos(); ?>
        </tbody>
      </table>
    
</body>
</html>