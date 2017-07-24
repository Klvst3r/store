use store;

-- Crear un procedimiento que nos permita hacer el login
CREATE PROCEDURE `login`(_email varchar(50), _pass varchar(60))
select * from users where email = _email and pass = _pass;

call login('klvst3r@gmail.com','123');