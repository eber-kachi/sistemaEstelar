<?php include_once '../../Vista/IUVistaSuperior.php'; ?>

<div class="container-fluid">
    <h2 style="text-align: center;">Mas detalles de : <?php echo $datosCliente['ci']  ?> </h2>
    <br>
    <div class="" style="background: #CCCCCC; padding: 2rem;">
        <div class="form-group">
            <label for=""><?php echo "Cliente:    " . $datosCliente['apellidoPaterno'] . ' ' .  $datosCliente['apellidoMaterno'] . ' ' .  $datosCliente['primerNombre'] . ' ' . $datosCliente['segundoNombre'];  ?></label>
        </div>
        <div class="form-group">
            <label for=""><?php echo "Carnet de identidad:    " . $datosCliente['ci']  ?></label>
        </div>
        <div class="form-group">
            <label for=""><?php echo "Nombre Hote:l   " . $datosHotel['nombre']  ?></label>
        </div>
        <div class="form-group">
            <label for=""><?php echo "Telefono:    " . $datosCliente['telefono']  ?></label>
        </div>
        <div class="form-group">
            <label for=""><?php echo "Genero:    " . $datosCliente['genero']  ?></label>
        </div>
        <div class="form-group">
            <label for=""><?php echo "Fecha de nacimiento:    " . $datosCliente['fechaNacimiento']  ?></label>
        </div>
        <div class="form-group">
            <label for=""><?php echo "Estado: ";  ?></label>
            <?php if ($datosCliente['activo'] == 1) {
                echo "Activo";
            } else {
                echo "Inactivo";
            } ?>

        </div>
    </div>
</div>






<?php include_once('../../Vista/IUVistaInferior.php'); ?>