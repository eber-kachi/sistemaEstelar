-- DROP PROCEDURE IF EXISTS listaDeClientesActivos;

DELIMITER
//
CREATE or replace  PROCEDURE listaDeClientesActivos
()
BEGIN
  SELECT idCliente, idHotel, ci, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, telefono, genero, fechaNacimiento, usuario, activo
  FROM cliente
  WHERE activo = 1;

END
//
delimiter ;

DELIMITER //
CREATE or replace PROCEDURE listaDeClientes
()
BEGIN
  SELECT idCliente, idHotel, ci, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, telefono, genero, fechaNacimiento, usuario, activo
  FROM cliente
  order by apellidoPaterno;
END
//


DELIMITER //
CREATE or replace PROCEDURE listaDeClientesPorNombre
(in nombreCliente VARCHAR
(40))
BEGIN
  SELECT idCliente, idHotel, ci, primerNombre, 
  if(segundoNombre is null,'dato no existe',segundoNombre)as segundoNombre ,apellidoPaterno,apellidoMaterno,telefono, genero,fechaNacimiento,usuario,activo

FROM cliente
WHERE primerNombre LIKE CONCAT
  ('%',nombreCliente,'%')
or segundoNombre LIKE CONCAT
  ('%',nombreCliente,'%')
or apellidoPaterno LIKE CONCAT
  ('%',nombreCliente,'%')
or apellidoMaterno LIKE CONCAT
  ('%',nombreCliente,'%')
or ci LIKE CONCAT
  ('%',nombreCliente,'%')
or genero LIKE CONCAT
  (nombreCliente)
or activo LIKE nombreCliente
  order by apellidoPaterno;
END
//

-- call listaDeClientesPorNombre('a');




DELIMITER //
Create or replace procedure datosClientePorId (in idCliente_ int )
begin
  select idCliente, idHotel, ci, primerNombre,
  if(segundoNombre is null,'dato no existe',segundoNombre)as segundoNombre ,
  if(apellidoPaterno is null,'dato no existe',apellidoPaterno)as apellidoPaterno ,apellidoMaterno,telefono, genero,fechaNacimiento,usuario,contrasenia,activo
    from cliente
    where idCliente=idCliente_;
end
//


-- CALL  datosClientePorId(3);

DELIMITER //
create or replace procedure verificaExisteCi
(in CI VARCHAR
(25))
begin
  select ci, primerNombre
  from cliente
  where ci=CI;

end
//

-- call verificaExisteCi('1001');


SELECT idHotel, idDepartamento, nombre, telefono, direccion
FROM hotel;

delimiter //
create or replace  procedure listaDeHotelId(in idHotel_ int )
begin
  select idHotel, idDepartamento, nombre, telefono, direccion
  from hotel
  where idHotel=idHotel_;
end
//

-- call listaDeHotelId (1);

delimiter //
create or replace procedure actualizarCliente(in idCliente_ int,in idHotel_ int ,in ci_  VARCHAR(30),in primerNombre_ VARCHAR(30),in segundoNombre_ VARCHAR(30),in apellidoPaterno_ VARCHAR(30),in apellidoMaterno_ VARCHAR(30),
                                   in telefono_ int ,in genero_ enum('M','F') ,in fechaNacimiento_ date,in usuario_ varchar(15),in contrasenia_ varchar(15),in activo_ int)
  begin
  update cliente  set idHotel=idHotel_,ci=ci_,primerNombre=primerNombre_,segundoNombre=segundoNombre_,apellidoPaterno=apellidoPaterno_,apellidoMaterno=apellidoMaterno_,
                      telefono=telefono_,genero=genero_,fechaNacimiento=fechaNacimiento_,usuario=usuario_,contrasenia=contrasenia_,activo=activo_
        where idCliente=idCliente_;
  end//
delimiter //
create or replace procedure verificaUsuarioContraseniaCliente(in usuario_ varchar(15),in contrasenia_ varchar(15))
begin
  select  idCliente,usuario, contrasenia,activo
  from cliente
  where usuario=usuario_ and contrasenia=contrasenia_;
end //

select  idCliente,usuario, contrasenia
  from cliente
  where usuario='2001' and contrasenia='321';
create or replace  procedure verificaUsuarioContraseniaUsuario(in usuario_ varchar(15),in contrasenia_ varchar(15))
  begin
    select u.idUsuario,r.idRol,u.ciUsuario,u.usuario,u.contrasenia,u.activo,r.nombre
    from usuario u inner join rol r on u.idRol = r.idRol
    where u.usuario=usuario_ and u.contrasenia=contrasenia_;
  end //
call estelar.verificaUsuarioContraseniaUsuario('asoliz','asoliz');


select *
from hotel h inner join cliente c on h.idHotel = c.idHotel
where c.idCliente=3;


delimiter //
create or replace  procedure listarHabitacionesSinReservaSegunIdHotel(in idHotel_ int )
  begin

  select h.idHotel, ht.idHabitacion,t.idTipoHabitacion, ht.nombre,ht.descripcion
  from hotel h inner join habitacion ht on h.idHotel = ht.idHotel
      and h.idHotel=idHotel_
      join reserva r on ht.idHabitacion = r.idHabitacion join tipohabitacion t on ht.idTipoHabitacion = t.idTipoHabitacion
      where r.activo=0 ;
  end //
delimiter //
select *
  from hotel h inner join habitacion ht on h.idHotel = ht.idHotel
      and h.idHotel=1
      join reserva r on ht.idHabitacion = r.idHabitacion join tipohabitacion t on ht.idTipoHabitacion = t.idTipoHabitacion
      where r.activo=0 and  t.idTipoHabitacion=1 ;
create or replace  procedure listarHabitacionesConReservaSegunIdHotel(in idHotel_ int )
  begin
  select *
  from hotel h inner join habitacion ht on h.idHotel = ht.idHotel
      and h.idHotel=idHotel_
      join reserva r on ht.idHabitacion = r.idHabitacion
      where r.activo=1;
  end //

call listarHabitacionesSinReservaSegunIdHotel(1);
call listarHabitacionesConReservaSegunIdHotel(1);

delimiter //
create or replace procedure listarTipoHabitaciones()
  begin
    select idTipoHabitacion, nombre
    from tipohabitacion;
  end //

  call listarTipoHabitaciones();

delimiter  //
create or replace procedure  listarTipoHabitacionesLibresSegunIdHotelIdTipoHabitacion(in idHotel_ int ,in idTipoHabitacion_ int )
  begin
    select h.idHabitacion,h.nombre
    from tipohabitacion t inner join habitacion h on t.idTipoHabitacion = h.idTipoHabitacion
    and t.idTipoHabitacion=idTipoHabitacion_ join hotel hl on h.idHotel = hl.idHotel
    and hl.idHotel=idHotel_ join reserva r on h.idHabitacion = r.idHabitacion
    and r.activo=0
    order by h.nombre;
  end //
 call listarTipoHabitacionesLibresSegunIdHotelIdTipoHabitacion(1,1);