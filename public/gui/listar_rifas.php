<?php

function comprobarSortear() {
  if (isset($_POST["sortearRifaId"])) {

      $id_rifa = $_POST["sortearRifaId"];
      getRifaPorId($id_rifa)->sortear();

  }
}

function comprobarEliminar() {
    if (isset($_POST["eliminarRifaId"])) {

        $id_rifa = $_POST["eliminarRifaId"];
        eliminarRifa($id_rifa);

    }
}

function comprobarCrear() {
  if (isset($_POST["crearRifaNombre"]) && isset($_POST["crearRifaCantidadBoletos"])) {

    $nombre = $_POST["crearRifaNombre"];
    $cantidad_boletos = $_POST["crearRifaCantidadBoletos"];

    crearRifa($nombre, $cantidad_boletos);

  }
}

function listarRifas() {
    $rifas = getRifas();

    foreach ($rifas as $rifa) {

        $id = $rifa->getId();
        $nombre = $rifa->getNombre();
        $cantidad_boletos = $rifa->getCantidadBoletos();
        $boleto_ganador = $rifa->getBoletoGanador();

        mostrarRifa($nombre, $cantidad_boletos, $boleto_ganador, $id);
    }
}

function mostrarRifa($nombre, $cantidad_boletos, $boleto_ganador, $id){ ?>
 <tr>
    <td><?php echo $nombre; ?></td> <!-- Nombre de la rifa -->
    <td><?php echo $cantidad_boletos; ?></td> <!-- Cantidad de boletos -->

    <!-- Ganador -->
    <td><?php 
        if ($boleto_ganador == null) {
            echo "Aun sin sortear";

        }
        else{
            $numero_ganador = $boleto_ganador->getNumero();
            $nombre_ganador = $boleto_ganador->getDueno();

            echo "Numero: ".$numero_ganador." Nombre: ".$nombre_ganador;
        }
        
    ?></td> 

    <td>

        <!-- Botones de eliminar, sortear y ver boletos -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar" >
            Eliminar
        </button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#sortear" >
            Sortear
        </button>
        <button type="submit" form="FormVerBoletos" class="btn btn-primary">
            Ver boletos
        </button>

        <form action="ver_boletos.php" id="FormVerBoletos" method="post">
          <input name="verBoletosRifaId" type="hidden" value="<?php echo $id; ?>">
        </form>

    </td>
 </tr>

       <!-- Modal Sortear -->
       <div class="modal fade" id="sortear" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Sortear</h5>
            </div>
            <div class="modal-body">
              ¿Esta seguro que quiere sortear la rifa?
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              
              <!-- Formulario con el id de la rifa a sortear -->
              <form action="" method="post">
              <input id="sortearRifaId" name="sortearRifaId" type="hidden" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-warning">Si</button>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- Modal Eliminar -->
      <div class="modal fade" id="eliminar" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Sortear</h5>
            </div>
            <div class="modal-body">
              ¿Esta seguro que quiere eliminar la rifa?
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              
              <!-- Formulario con el id de la rifa a eliminar -->
              <form action="" method="post">
                <input id="eliminarRifaId" name="eliminarRifaId" type="hidden" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-danger">Si</button>
              </form>

            </div>
          </div>
        </div>
      </div>

<?php } ?>
