<?php
require '../../Controlador/Hotel/LogicaBuscadorHotel.php';
$objetoLogicaBuscadorHotel = new LogicaBuscadorHotel();
$listaDehoteles = $objetoLogicaBuscadorHotel->listaDeHoteles();
?>

<?php include_once('../../Vista/IUVistaSuperior.php'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lista de Clientes</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<br><br>
<div class="row d-flex justify-content-between">
    <div class="col-1"></div>
    <div class="p-2">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <label style="margin">Buscar: </label>
                <input type="text" style="margin-left: 5px;" class="form-control bg-light border-0 small" name="buscarCliente" id="buscarCliente" placeholder='Buscar Cliente ...'>
                <i class="fas fa-spinner " style="align-self: center;"></i>
                <span id=" mensaje"></span>
            </div>
        </form>
    </div>
    <div class="p-2">
        <section>
            <button type="button" class="btn btn-primary btn-sm btn-lg" data-toggle="modal" data-target="#modal-RegistrarCliente">Registrar Cliente</button>
        </section>
    </div>
    <div class="col-1"></div>
</div>


<div class="container-fluid">
    <section id="tablaClientes">
    </section>
</div>

<!-- Modal Registrar Cliente -->
<div class="modal fade " id="modal-RegistrarCliente">
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
                                    foreach ($listaDehoteles as $objetoHotel) {
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
                                <label class="control-label " for="ci">Carnet de identidad *(CI,NIT)</label>
                                <input type="input" class="form-control " id="verificarCiInput" title="435781-CBBA" name="ci" required pattern="[0-9]+?-+?[a-zA-Z]+" placeholder="ingresa Ci Cliente">
                                <strong id="mensajeCi"></strong>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Primer Nombre">Primer Nombre</label>
                                <input type="input" class="form-control " name="primerNombre" required placeholder="Ingresa primer nombre ">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Segundo Nombre">Segundo Nombre</label>
                                <input type="input" class="form-control " name="segundoNombre" placeholder="Ingresa segundo nombre ">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Apellido Paterno">Apellido Paterno </label>
                                <input type="input" class="form-control " name="apellidoPaterno" required placeholder="Ingresa apellido paterno ...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Apellido Materno">Apellido Materno </label>
                                <input type="input" class="form-control " name="apellidoMaterno" placeholder="Ingresa apellido materno ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Telefono">Telefono </label>
                                <input type="number" class="form-control " name="telefono" required placeholder="Ingresa telefono ..." min="6">
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col">
                            <div class="form-group ">
                                <label class="control-label " for="Fecha De Nacimiento">Fecha De Nacimiento
                                    <i class="fas fa-calendar-week"></i>
                                    <input type="date" class="form-control" name="fechaNacimiento" min="11-02-1940" required placeholder="Ingresa fecha de nacimiento ...">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="control-label " for="Genero">Genero</label>
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

<!-- Fin Registrar Cliente -->

<?php include_once('../../Vista/IUVistaInferior.php'); ?>