create table canciones_tb  (
id_Cancion int primary key not null auto_increment,
nombreCancion varchar(30) not null,
albumCancion varchar(30) not null,
autorCancion varchar(30) not null,
publicacionCancion varchar(30) not null,
generoCancion varchar(30) not null,
paisCancion varchar(30) not null,
urlImageCancion varchar(100) not null,
urlCancion varchar(100) not null
);
