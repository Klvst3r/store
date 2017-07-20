use store;
CREATE procedure newVenta(_cliente varchar(30))
insert into ventas(cliente,fecha) values(_cliente,now());

call newVenta("Kozlov");

