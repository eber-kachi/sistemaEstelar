<?php
include_once('../../Vista/IUVistaSuperior.php');

?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Actualizar</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="container-fluid">
    <form action="../../Controlador/Cliente/LogicaActualizarCliente.php" method="post" role="form ">
        <!-- mandamos el id del cliente para actualizar -->
        <input type="hidden" name="idClienteActual" value="<?php echo $datosCliente['idCliente']; ?>">
        <div class="row d-flex align-items-end ">
            <div class="col">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="hotel">Hotel</label>
                    </div>
                    <select class="custom-select" id="hotel" name="hotel" require>
                        <?php
                        foreach ($listaDehoteles as $datosHotel) {
                            if ($datosHotel->getIdHotel() == $HotelId) {
                                ?>
                                <option value="<?php echo $datosHotel->getIdHotel(); ?>" selected> <?php echo $datosHotel->getNombre(); ?></option>
                            <?php
                            } else {
                                ?>
                                <option value="<?php echo $datosHotel->getIdHotel(); ?>"> <?php echo $datosHotel->getNombre(); ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col ">
                <div class="form-group ">
                    <label class="control-label " for="ci">CI</label>
                    <input type="input" class="form-control " id="verificarCiInput" title="435781-CBBA" name="ci" required pattern="[0-9]+?-+?[a-zA-Z]+" value="<?php echo $datosCliente['ci']; ?>" placeholder="Ingresa ci ">
                    <strong id="mensajeCi"></strong>

                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="form-group ">
                    <label class="control-label " for="Primer Nombre">Primer Nombre</label>
                    <input type="input" class="form-control " name="primerNombre" required value="<?php echo $datosCliente['primerNombre']  ?>" placeholder="Ingresa primer nombre ">
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label class="control-label " for="Segundo Nombre">Segundo Nombre</label>
                    <input type="input" class="form-control " name="segundoNombre" value="<?php echo $datosCliente['segundoNombre']  ?>" placeholder="Ingresa segundo nombre ">
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label class="control-label " for="Apellido Paterno">Apellido Paterno </label>
                    <input type="input" class="form-control " name="apellidoPaterno" required value="<?php echo $datosCliente['apellidoPaterno']  ?>" placeholder="Ingresa apellido paterno ...">
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label class="control-label " for="Apellido Materno">Apellido Materno </label>
                    <input type="input" class="form-control " name="apellidoMaterno" value="<?php echo $datosCliente['apellidoMaterno']  ?>" placeholder="Ingresa apellido materno ...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group ">
                    <label class="control-label " for="Telefono">Telefono </label>
                    <input type="number" class="form-control " name="telefono" required value="<?php echo $datosCliente['telefono']  ?>" placeholder="Ingresa telefono ..." min="6">
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col">
                <div class="form-group ">
                    <label class="control-label " for="Fecha De Nacimiento">Fecha De Nacimiento
                        <i class="fas fa-calendar-week"></i>
                        <input type="date" class="form-control" name="fechaNacimiento" min="11-02-1940" required value="<?php echo $datosCliente['fechaNacimiento']  ?>" placeholder="Ingresa fecha de nacimiento ...">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label class="control-label " for="Genero">Genero</label>
                <?php if ($datosCliente['genero'] == 'M') { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="gridRadios1" value="M" checked>
                        <label class="form-check-label" for="gridRadios1">
                            M
                        </label> <br>
                        <input class="form-check-input" type="radio" name="genero" id="gridRadios1" value="F">
                        <label class="form-check-label" for="gridRadios1">
                            F
                        </label>
                    </div>

                <?php } else { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="gridRadios1" value="M">
                        <label class="form-check-label" for="gridRadios1">
                            M
                        </label><br>
                        <input class="form-check-input" type="radio" name="genero" id="gridRadios1" value="F" checked>
                        <label class="form-check-label" for="gridRadios1">
                            F
                        </label>
                    </div>
                <?php } ?>

            </div>
            <?php if ($datosCliente['usuario'] == '' && $datosCliente['contrasenia'] == '') { ?>
                <div class="col-md">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresar usuario" value="<?php echo $usuarioCreado; ?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="contrasenia">Contraseña</label>
                        <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="Ingrese contraseña" value="<?php echo $contraseniaCreado; ?>">
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresar usuario" value="<?php echo $datosCliente['usuario'] ?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="contrasenia">Contraseña</label>
                        <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="Ingrese contraseña" value="<?php echo $datosCliente['contrasenia'] ?>">
                    </div>
                </div>

            <?php } ?>
        </div>
        <div class=" row">
            <div class="col">
                <label class="control-label " for="Activo">Estado de Cliente</label>
                <?php if ($datosCliente['activo'] == '1') { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activo" value="1" checked>
                        <label class="form-check-label" for="gridRadios1">Activado </label>
                        <br>
                        <input class="form-check-input" type="radio" name="activo" value="0">
                        <label class="form-check-label" for="gridRadios1">Desactivar</label>
                    </div>
                <?php } else { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="activo" value="0" checked>
                        <label class="form-check-label" for="gridRadios1">Desactivado</label>
                        <br>
                        <input class="form-check-input" type="radio" name="activo" value="1">
                        <label class="form-check-label" for="gridRadios1">Activar </label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary btn-lg btn-block " id="Actualizar">Actualizar</button>

    </form>
</div>
<!-- fin de actualizar -->

<?php include_once('../../Vista/IUVistaInferior.php'); ?>