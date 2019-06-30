<?php include_once('../../Vista/IUVistaSuperior.php'); ?>

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
                <h4 class="modal-title ">Registrar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="../../Controlador/Cliente/LogicaRegistrarCliente.php" method="post" role="form ">
                <div class="modal-body ">
                    <div class="row d-flex align-items-end ">
                        <div class="col  ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="hotel">Hotel</label>
                                </div>
                                <select class="custom-select" id="hotel" name="hotel" require>
                                    <?php
                                    $estado = true;
                                    foreach ($listaHabitaciones as $objetoHotel) {
                                        if ($estado) {
                                            ?>
                                            <option value="<?php echo $objetoHotel->getIdHotel(); ?>" selected> <?php echo $objetoHotel->getNombre(); ?></option>
                                            <?php
                                            $estado = false;
                                        } else {
                                            ?>
                                            <option value="<?php echo $objetoHotel->getIdHotel(); ?>"> <?php echo $objetoHotel->getNombre(); ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col ">
                            <div class="form-group ">
                                <label class="control-label " for="hotel"><?php echo 'Nombre del Hotelllllll..' ?></label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col col-4">
                            <div class="form-group ">
                                <p> <strong>Cliente: </strong><?php echo $clienteResultado['primerNombre']; ?> </p>
                            </div>
                        </div>
                        <div class="col col-8"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="hotel">Tipo Habitacion</label>
                                </div>
                                <select class="custom-select" id="hotel" name="hotel" require>
                                    <?php
                                    $estado = true;
                                    foreach ($listaHabitaciones as $objetoHabitacion) {
                                        if ($estado) {
                                            ?>
                                            <option value="<?php echo $objetoHabitacion->getIdHabitacion(); ?>" selected> <?php echo $objetoHabitacion->getNombre(); ?></option>
                                            <?php
                                            $estado = false;
                                        } else {
                                            ?>
                                            <option value="<?php echo $objetoHabitacion->getIdHabitacion(); ?>"> <?php echo $objetoHabitacion->getNombre(); ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Apellido Paterno">Apellido Paterno </label>
                                <input type="input" class="form-control " name="apellidoPaterno" required placeholder="Ingresa apellido paterno ...">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="fecha Inicio">Fecha Inicio <i class="fas fa-calendar-week"></i> </label>
                                <input type="date" class="form-control " name="fechaInicio" min="11-02-1940" required>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Fecha De Nacimiento">Fecha Fin
                                    <i class="fas fa-calendar-week"></i>
                                    <input type="date" class="form-control" name="fechaFin" min="11-02-1940" required>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="control-label " for="Genero">Monto</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="gridRadios1" value="M" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    M
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" id="gridRadios2" value="F">
                                <label class="form-check-label" for="gridRadios1">
                                    F
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="control-label " for="Activo">Activo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="activo" value="1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block " id="registrar">Registrar</button>

                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal fin de registrar recervas  -->





<?php include_once('../../Vista/IUVistaInferior.php'); ?>