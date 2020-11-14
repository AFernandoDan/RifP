<?php

function listarBoletos() {

    if (isset($_POST["verBoletosRifaId"])) {

        $id_rifa = $_POST["verBoletosRifaId"];

        $rifa = getRifaPorId($id_rifa);

        if ($rifa == null) {
            echo "No existe ninguna rifa con la ID: ".$id_rifa;
            return null;
        }

        $boletos = $rifa->getBoletos();

        foreach ($boletos as $boleto) {
    
            $id = $boleto->getId();
            $numero = $boleto->getNumero();
            $dueno = $boleto->getDueno();
            $responsable = $boleto->getResponsable();
            $id_rifa = $boleto->getIdRifa()->getId();
            
            mostrarBoleto($id, $numero, $dueno, $responsable, $id_rifa);
        }
    }else {
        echo "No hay ninguna ID no definida";
        return null;
    }

}

function mostrarBoleto($id, $numero, $dueno, $responsable, $id_rifa) { ?>

<tr>
    <!-- Numero de boleto, dueño y responsable -->
    
    <!-- Numero -->
    <td> <?php echo $numero ?> </td>

    
    <?php
        // Dueño
        if ($dueno == null) {
            echo "<td>Sin dueño</td>";
        }else{
            echo "<td>".$dueno."</td>";
        }

        // Responsable
        if ($responsable == null) {
            echo "<td>Sin responsable</td>";
        }else{
            echo "<td>".$responsable."</td>";
        }
    ?>
    
    <td>
        <!-- Botones: Quitar dueño, Asignar dueño, Quitar Responsable, Asignar responsable -->

        <!-- Quitar dueño -->
        <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#quitarDueno">
          Quitar Dueño
        </button>

        <!-- Asignar dueño -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#asignarDue">
            Asignar dueño
        </button>
              
        <!-- Quitar responsable -->
        <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#quitarResponsable">
          Quitar Responsable
        </button>

        <!-- Asignar responsable -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#asignarRes">
            Asignar responsable
        </button>

    </td>

    <!-- Modal Quitar dueño -->
    <div class="modal fade" id="quitarDueno" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Quitar dueño</h5>
            </div>
            <div class="modal-body">
              ¿Esta seguro que quiere quitar el dueño del boleto numero <?php echo $numero; ?>?
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              
              <!-- Formulario con el id de la rifa a quitar dueño -->
              <form action="funciones_boletos.php" method="post">
                <input name="quitarDuenoBoletoId" type="hidden" value="<?php echo $id; ?>">
                <input name="verBoletosRifaId" type="hidden" value="<?php echo $id_rifa; ?>">
                <button type="submit" class="btn btn-danger">Si</button>
              </form>

            </div>
          </div>
        </div>
      </div>

    <!-- Modal Asignar dueño -->
    <div class="modal fade" id="asignarDue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asginar dueño</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="asignarDueno" action="funciones_boletos.php" method="post">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre del dueño:</label>
                    <input type="text" class="form-control" name="asignarDuenoNombre" placeholder="Martin" required>
                    <input name="asignarDuenoBoletoId" type="hidden" value="<?php echo $id; ?>">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submmit" class="btn btn-primary" form="asignarDueno">Asignar</button>
            </div>
            </div>
        </div>
        </div>

    <!-- Modal Quitar responsable -->
    <div class="modal fade" id="quitarResponsable" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Quitar responsable</h5>
            </div>
            <div class="modal-body">
              ¿Esta seguro que quiere quitar el responsable del boleto numero <?php echo $numero; ?>?
            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              
              <!-- Formulario con el id de la rifa a quitar responsable -->
              <form action="funciones_boletos.php" method="post">
                <input name="quitarResponsableBoletoId" type="hidden" value="<?php echo $id; ?>">
                <input name="verBoletosRifaId" type="hidden" value="<?php echo $id_rifa; ?>">
                <button type="submit" class="btn btn-danger">Si</button>
              </form>

            </div>
          </div>
        </div>
      </div>
        
      <!-- Modal Asignar responsable -->
      <div class="modal fade" id="asignarRes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Asginar responsable</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form id="asignarResponsable" action="funciones_boletos.php" method="post">
              <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre del responsable:</label>
                  <input type="text" class="form-control" name="asignarResponsableNombre" placeholder="Mariana" required>
                  <input name="asignarResponsableBoletoId" type="hidden" value="<?php echo $id; ?>">
              </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submmit" class="btn btn-primary" form="asignarResponsable">Asignar</button>
          </div>
          </div>
      </div>
      </div>
</tr>

<?php } ?>