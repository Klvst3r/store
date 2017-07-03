create database store;
use store;

-- Creación de Tablas

create table productos(
	id int auto_increment,
    nombre varchar(100) not null,
    precio double not null,
    primary key(id)
);

create table ventas(
	id int auto_increment,
    cliente varchar(100) not null,
    fecha date not null,
    primary key(id)
);

create table ventaDetalle(
	id int auto_increment,
    producto_id int references productos(id),
    venta_id int references ventas(id),
    cantidad int not null,
    descuento int not null,
    primary key(id)
);