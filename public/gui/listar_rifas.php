<?php

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
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $id; ?>" >
            Eliminar
        </button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#sortear<?php echo $id; ?>" >
            Sortear
        </button>
        <button type="submit" form="FormVerBoletos<?php echo $id; ?>" class="btn btn-primary">
            Ver boletos
        </button>

        <form action="ver_boletos" id="FormVerBoletos<?php echo $id; ?>" method="post">
          <input name="verBoletosRifaId" type="hidden" value="<?php echo $id; ?>">
        </form>

    </td>
 </tr>

       <!-- Modal Sortear -->
       <div class="modal fade" id="sortear<?php echo $id; ?>" tabindex="-1">
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
              <form action="funciones_rifas.php" method="post">
              <input id="sortearRifaId" name="sortearRifaId" type="hidden" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-warning">Si</button>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- Modal Eliminar -->
      <div class="modal fade" id="eliminar<?php echo $id; ?>" tabindex="-1">
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
              <form action="funciones_rifas.php" method="post">
                <input id="eliminarRifaId" name="eliminarRifaId" type="hidden" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-danger">Si</button>
              </form>

            </div>
          </div>
        </div>
      </div>

<?php } ?>
