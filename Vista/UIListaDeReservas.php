<?php include_once('../../Vista/IUVistaSuperiorCliente.php'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lista de Reservas</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="p-2">
    <section>
        <button type="button" class="btn btn-primary btn-sm btn-lg" data-toggle="modal" data-target="#modal-RegistrarReserva">Registrar Recerva</button>
    </section>
</div>

<!--Modal  registrar reserva -->
<div class="modal fade " id="modal-RegistrarReserva">
    <div class=" modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content ">
            <div class="modal-header ">
                <h4 class="modal-title ">Registrar Reserva</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="../../Controlador/ReservaHabitacion/LogicaRegistrarReservaHabitacion.php" method="post" role="form ">

                <input type="hidden" id="idHotel" name="idHotel" value="<?php echo $clienteResultado['idHotel'];  ?>">
                <input type="hidden" name="reservaPersonal" value="1">
                <input type="hidden" id="TotalDiasActual" name="TotalDiasActual" value="">
                <input type="hidden" name="activo" value="1">
                <input type="hidden" name="reservaOnline" value="0">
                <input type="hidden" name="idCliente" value="<?php echo $clienteResultado['idCliente'];  ?>">
                <div class="modal-body ">
                    <div class="row d-flex align-items-end ">
                        <div class="col  ">
                        </div>
                        <div class="col-1"></div>
                        <div class="col ">
                            <div class="form-group ">
                                <label class="control-label " for="hotel"><?php echo $Hotel['nombre']; ?></label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col col-5">
                            <div class="form-group ">
                                <p> <strong>Cliente: </strong><?php echo $clienteResultado['apellidoPaterno'] . " " . $clienteResultado['apellidoMaterno'] . " " . $clienteResultado['segundoNombre'] . " " . $clienteResultado['primerNombre'];  ?> </p>
                            </div>
                        </div>
                        <div class="col col-7"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="tipo habitacion">Tipo Habitacion</label>
                                </div>
                                <select class="custom-select" id="tipoHabitacion" name="tipoHabitacion" require>
                                    <?php
                                    $estado = true;

                                    foreach ($listaTipoHabitaciones as $tipoHabitacion) {
                                        if ($estado) {
                                            ?>
                                            <option value="<?php echo $tipoHabitacion['idTipoHabitacion']; ?>" selected> <?php echo  $tipoHabitacion['nombre']; ?></option>
                                            <?php
                                            $estado = false;
                                        } else {
                                            ?>

                                            <option value="<?php echo $tipoHabitacion['idTipoHabitacion'];  ?>"> <?php echo  $tipoHabitacion['nombre']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="habitaciones">Habitacion</label>
                                </div>
                                <!-- ajax nos responde con  la ista de las habitaciones  -->
                                <select class="custom-select" id="habitacion" name="habitacion" require>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="fecha Inicio">Fecha Inicio <i class="fas fa-calendar-week"></i> </label>
                                <input type="date" class="form-control input-sm" id="fechaInicio" name="fechaInicio" min="11-02-1940" required>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Fecha De Nacimiento">Fecha Fin
                                    <i class="fas fa-calendar-week"></i>
                                    <input type="date" class="form-control" id="fechaFin" name="fechaFin" min="11-02-1940" required>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="control-label" for="totalDias">Total De Dias:</label>
                            <p id="TotalDias"></p>
                        </div>
                        <div class="col">
                            <label class="control-label" for="precio Total">Precio Total: </label>
                            <p id="precioTotal"></p>
                        </div>
                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                    </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal fin de registrar recervas  -->


<?php include_once('../../Vista/IUVistaInferiorCliente.php'); ?>