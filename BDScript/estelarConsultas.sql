
select Count(C.idCliente)as'cantidad de clintes'
,CONCAT(primerNombre,' ',apellidoPaterno)AS'nombre completo'
from cliente c,hotel h
where h.nombre='Estelar Cochabamba 1'
and c.primerNombre LIKE '%a%'
and year(c.fechaNacimiento)BETWEEN'1970'and'1985'
AND h.idHotel=c.idHotel;







select th.nombre, h.nombre,h.precio
from habitacion h,tipoHabitacion th,hotel ho
where ho.nombre='Estelar Cochabamba 1'
and ho.idHotel=h.idHotel
and h.idTipoHabitacion=th.idTipoHabitacion;






select concat_ws(' ',c.apellidoPaterno,c.apellidoMaterno,c.primerNombre,c.segundoNombre) as Cliente,ht.nombre, thab.nombre as 'tipo habitacion',r.reservaPersonal as 'tipo de reseva', r.fechaInicio as 'fechaInicio', r.fechaFin as 'fechaFin',r.montoTotal as 'montoTotal',concat_ws(' ',usr.apellidoPaterno,usr.primerNombre) as Usuario,concat_ws(' ',ag.apellidoPaterno,ag.primerNombre) as 'Agente Turistico',a.nombre as Agencia
from cliente c, clientereserva cr, reserva r , hotel  hot, habitacion ht, tipohabitacion thab, agencia a, agenteturistico ag, usuario usr
where hot.nombre='Estelar Cochabamba 1'
and hot.idHotel=ht.idHotel
and ht.idTipoHabitacion=thab.idTipoHabitacion
and ht.idHabitacion=r.idHabitacion
and r.idUsuario=usr.idUsuario
and r.reservaPersonal=0
and r.idAgenteTuristico=ag.idAgenteTuristico
and ag.idAgencia= a.idAgencia
and r.idReserva=cr.idReserva
and cr.idCliente=c.idCliente
and c.idHotel=ht.idHotel
order by r.fechaInicio;







select ca.nombre as CategoriaHotel, cr.idReserva as NroReserva, ha.nombre as Habitacion, r.fechaInicio, r.fechaFin,
 th.nombre as TipoHabitacion, ha.precio, r.montoTotal, CONCAT(C.primerNombre,' ',c.segundoNombre,' ',c.apellidoPaterno,' ',c.apellidoMaterno) as clinte,
  cr.esTitular as Titular, CONCAT(u.primerNombre,'',u.apellidoPaterno) as Usuario, ro.nombre as Rol, if(r.reservaPersonal = 1,'Personal','Online')

from categoria ca, historialhotel hh, hotel h, habitacion ha, reserva r, cliente c, clientereserva cr, tipohabitacion th, usuario u, rol ro

where ca.idCategoria=hh.idCategoria
and   hh.idHotel=h.idHotel
and   h.nombre='Estelar Cochabamba 1'
and   h.idHotel=ha.idHotel
and   ha.idTipoHabitacion=th.idTipoHabitacion
and   ha.idHabitacion=r.idHabitacion
and   r.reservaPersonal= 1
and   r.idReserva=cr.idReserva
and   cr.idCliente=c.idCliente
and   r.idUsuario=u.idUsuario
and   u.idRol=ro.idRol
order by c.primerNombre
;




-- listar aquel hotel donde tenga mas de 5 clientes de sexo femenino
create  procedure Show_Hoteles(in majorHotel int, generos char )

SELECT h.nombre AS NombreHotel,COUNT(c.genero) AS TOTALDE
FROM hotel h INNER JOIN cliente c on h.idHotel = c.idHotel
AND c.genero=generos
GROUP BY H.nombre
HAVING COUNT(c.genero)>majorHotel;


call Show_Hoteles(5,'F');



-- /////////////////////////////////////////////////////////////////////////////////
-- consultas proyecto

SELECT idArticulo,nombre,precio,cantidadDisponible,descripcion,activo
FROM cliente
WHERE activo = 1;





















