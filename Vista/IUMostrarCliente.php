<?php
require_once("../Controlador/Cliente/LogicaBuscadorCliente.php");
$objetoLogicaBuscadorCliente = new LogicaBuscadorCliente();
// estamos aqio -----------------------------------------------------
//lo que del AJAX nos manda es: 'nombreArticulo'.
//Si no esta vacio, quiere decir que el usuario ingreso un criterio de busqueda, para este caso nombre
//del articulo.
if (isset($_REQUEST['nombreCliente'])) {
    //echo $_POST['nombreCliente'];
    $tabla = '';
    $listaDeClientes = $objetoLogicaBuscadorCliente->listaDeClientesPorCriterioNombreCliente($_REQUEST['nombreCliente']);
    $numeros = 1;
    if (count($listaDeClientes) > 0) {
        $tabla .= '
                    <table Class="table table-hover" name="mostrarArticulos" id="mostrarArticulos">
                        <thead>
                            <tr>
                                 <th>#</th>
                                 <th>Cliente</th>
                                 <th>Carnet de identidad</th>
                                 <th>Genero</th>
                                 <th>Fecha nacimiento</th>                             
                                 <th>Usuario</th>
                                 <th>Mas</th>
                                 <th>Actualizar</th>
                                 <th>De vaja</th>
                            </tr>
                        </thead>';
        foreach ($listaDeClientes as $objetoCliente) {
            // esto es una condicional
            $activo = $objetoCliente->getActivo() ? 'Si' : 'No';
            if ($activo == 'Si') {
                $clienteEstado = '<a href="../../Controlador/Cliente/LogicaDarDeBajaCliente.php?idCliente=' . $objetoCliente->getIdCliente() . '& estado=' . $objetoCliente->getActivo() . '"><i class="fas fa-user-alt-slash"></i></a>';
            } else {
                $clienteEstado = '<a href="../../Controlador/Cliente/LogicaDarDeBajaCliente.php?idCliente=' . $objetoCliente->getIdCliente() . '& estado=' . $objetoCliente->getActivo() . '"?><i class="fas fa-user-alt"></i></a>';
            }
            $tabla .= '
                <tbody>
                    <tr>
                        <th scope="row">' . $numeros . '</th>
                        <td>' . $objetoCliente->getApellidoPaterno() . ' ' . $objetoCliente->getApellidoMaterno() . ' ' . $objetoCliente->getPrimerNombre() . ' ' . $objetoCliente->getSegundoNombre() . '</td>
                        <td>' . $objetoCliente->getCi() . '</td> 
                        <td>' . $objetoCliente->getGenero() . '</td>
                        <td>' . $objetoCliente->getFechaNacimiento() . '</td>  
                        <td>' . $objetoCliente->getUsuario() . '</td>                            
                                
                        <td><a href="../../Controlador/Cliente/LogicaMasCliente.php?idCliente=' . $objetoCliente->getIdCliente() . ' & idHotel=' . $objetoCliente->getIdHotel() . '"><i class="fas fa-plus-circle"></i></a></td>

                        <td><a href="../../Vista/IUActualizarCliente.php?idCliente=' . $objetoCliente->getIdCliente() . '"><i class="fas fa-edit"></i> </a></td>
                        <td>' . $clienteEstado . '</td>
                                    
                    </tr>
                </tbody>';
            $numeros++;
        } //end foreach
        $tabla .= '</table>';
        echo $tabla;
    } else {
        //echo "No hay resultados con su criterio de busqueda";
        echo "vacio";
    }
} else {
    //Por esta opcion, es que el usuario, no ingreso nada en el buscar y por defecto
    //lista aquellos articulos activos 
    $tabla = '';
    $listaDeClientes = $objetoLogicaBuscadorCliente->listaDeClientes();
    $numeros = 1;
    //verificando, si hay articulos almacenado en la BD.
    if (count($listaDeClientes) > 0) {
        $tabla .= '
            <table Class="table table-hover" name="mostrarArticulos" id="mostrarArticulos">
                <thead>
                    <tr>
                         <th>#</th>
                         <th>Cliente</th>
                         <th>Carnet de identidad</th>
                         <th>Genero</th>
                         <th>Fecha nacimiento</th>                             
                         <th>Usuario</th>
                         <th>Mas</th>
                         <th>Actualizar</th>
                         <th>De vaja</th>
                    </tr>
                </thead>';
        foreach ($listaDeClientes as $objetoCliente) {
            $clienteEstado;
            $activo = $objetoCliente->getActivo() ? 'Si' : 'No';
            if ($activo == 'Si') {
                $clienteEstado = '<a href="../../Controlador/Cliente/LogicaDarDeBajaCliente.php?idCliente=' . $objetoCliente->getIdCliente() . '& estado=' . $objetoCliente->getActivo() . '"><i class="fas fa-user-alt-slash"></i></a>';
            } else {
                $clienteEstado = '<a href="../../Controlador/Cliente/LogicaDarDeBajaCliente.php?idCliente=' . $objetoCliente->getIdCliente() . '& estado=' . $objetoCliente->getActivo() . '"?><i class="fas fa-user-alt"></i></a>';
            }
            $tabla .= '
                <tbody>
                    <tr>
                        <th scope="row">' . $numeros . '</th>
                        <td>' . $objetoCliente->getApellidoPaterno() . ' ' . $objetoCliente->getApellidoMaterno() . ' ' . $objetoCliente->getPrimerNombre() . ' ' . $objetoCliente->getSegundoNombre() . '</td>
                        <td>' . $objetoCliente->getCi() . '</td> 
                        <td>' . $objetoCliente->getGenero() . '</td>
                        <td>' . $objetoCliente->getFechaNacimiento() . '</td>  
                        <td>' . $objetoCliente->getUsuario() . '</td>                            
                                
                        <td><a href="../../Controlador/Cliente/LogicaMasCliente.php?idCliente=' . $objetoCliente->getIdCliente() . ' & idHotel=' . $objetoCliente->getIdHotel() . '"><i class="fas fa-plus-circle"></i></a></td>

                        <td><a href="../../Controlador/Cliente/LogicaActualizarCliente.php?idCliente=' . $objetoCliente->getIdCliente() . ' & idHotel=' . $objetoCliente->getIdHotel() . '"><i class="fas fa-edit"></i> </a></td>
                        <td> ' . $clienteEstado . '</td>
                                    
                    </tr>
                </tbody>';
            $numeros++;
        } //end foreach
        $tabla .= '</table>';

        echo $tabla;
    }
}//end else
