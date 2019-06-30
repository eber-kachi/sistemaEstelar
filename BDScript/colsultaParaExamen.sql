-- listar los clientes  activos del hotel cbba1
delimiter $
create  or replace  procedure PA_listarClientesDelHotel(in nombreHotel varchar(20) , in estado bool)
    begin
    select concat_ws(' ', c.primerNombre, c.apellidoPaterno) as nombreCompleto,if(c.activo,'esta activo ','inactivo' ) as Estado
    from hotel h inner join cliente c on h.idHotel = c.idHotel
        and  h.nombre=nombreHotel and c.activo=estado ;
    end $

call PA_listarClientesDelHotel('Estelar La Paz 1',0);


-- por que no vemos la hora y fecha de la reserva de los clientes del hotel cochabamba uno de clientes con letra uno
-- con letra de la n
delimiter $
create  or replace  procedure  PA_ListarFechaHoraDeReserva(in nombreHotel varchar(25) )
    begin
  select concat_ws(' ', cl.primerNombre, cl.apellidoPaterno) as nombreCompleto , r.fechaInicio as 'fecha de la recerva', timestampdiff(day ,r.fechaInicio,r.fechaFin)as 'duracion de la recerva', if(r.reservaOnline,'Is online','Not online' ) as 'eatdo re recerva online'
  from hotel h inner join cliente cl on h.idHotel = cl.idHotel and h.nombre=nombreHotel
        and cl.primerNombre like '%n%'
        join clientereserva cr on cl.idCliente = cr.idCliente
        join reserva r on cr.idReserva =r.idReserva;
    end $

call PA_ListarFechaHoraDeReserva('Estelar Cochabamba 1');

-- listar los usuarios del hotel

select h.nombre , concat_ws(' ',u.primerNombre, u.apellidoPaterno)as 'nombre completo',r.nombre
from hotel h inner join usuario u on h.idHotel = u.idHotel join rol r on u.idRol = r.idRol;

 -- listar  las habitaciones del estelar Cbba1  que sean >= 500

select h.nombre, ht.nombre, t.nombre ,ht.precio
from hotel h inner  join habitacion ht on h.idHotel = ht.idHotel
and h.nombre='Estelar Cochabamba 1' inner join tipohabitacion t on
    ht.idTipoHabitacion = t.idTipoHabitacion
group by ht.nombre
having ht.precio>=500;





