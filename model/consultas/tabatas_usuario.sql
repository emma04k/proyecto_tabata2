select
t.id as tabataID,
t.nombre as tabataNombre
from usuario
inner join tabata t on usuario.id = t.idUsuario
where usuario.id = 1