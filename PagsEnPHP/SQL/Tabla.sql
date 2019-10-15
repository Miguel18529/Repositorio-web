create table contrato_empleados(
OID_CONE integer primary key not null,
fecha_inicio date not null,
fecha_fin date not null,
cargo varchar2(50)
check(cargo in ('comedor', 'limpieza', 'vigilancia', 'mantenimiento')) not null,
numero_cuenta varchar2(50) not null,
codPostal integer not null,
domicilio varchar2(50),
poblacion varchar2(50)
);

create table director_a(
DNID varchar2(50) primary key not null,
nombre varchar2(50) not null,
correo varchar2(50)
);

create table empleados(
DNIE varchar2(50) primary key not null,
nombre varchar2(50) not null,
OID_CONE integer not null,
DNID varchar2(500),
foreign key(OID_CONE) REFERENCES contrato_empleados ON DELETE CASCADE,
foreign key(DNID) REFERENCES director_a ON DELETE CASCADE
);

create table nominas(
OID_N integer primary key not null,
fecha_pago date not null,
cantidad integer not null,
OID_CONE integer not null,
foreign key(OID_CONE) REFERENCES contrato_empleados ON DELETE CASCADE
);

create table tarea(
OID_T integer primary key not null,
Tarea varchar2(90) not null
);

create table Es_Realizado_Por (
OID_REA integer primary key not null,
OID_T integer,
DNIE varchar(50),
foreign key (OID_T) REFERENCES tarea ON DELETE CASCADE,
foreign key(DNIE) REFERENCES empleados ON DELETE CASCADE
);

create table Es_empleado_de (
OID_ES integer primary key not null,
DNID varchar2(50),
DNIE varchar2(50),
foreign key (DNID) REFERENCES director_a ON DELETE CASCADE,
foreign key (DNIE) REFERENCES empleados ON DELETE CASCADE
);


create table residencia(
OID_R integer primary key not null,
Casas integer 
check(Casas in (24))not null,
HabitacionesLibres integer 
check(HabitacionesLibres <= 96)not null,
Residentes integer
check(Residentes<=120) not null,
CasasLibres integer
check(CasasLibres<=24) not null,
DNI_D VARCHAR(30),
FOREIGN KEY (DNI_D) REFERENCES DIRECTOR_A ON DELETE CASCADE
);

create table casas(
Numero_C integer primary key not null,
Miembros integer 
check (Miembros<=5)not null,
TipoHMF varchar2(8)
check(TipoHMF in ('chico', 'chica', 'familiar')) not null,
HabitacionesLibres integer 
check(HabitacionesLibres in (0, 1, 2, 3, 4)) not null, 
OID_R integer not null,
foreign key(OID_R) REFERENCES residencia ON DELETE CASCADE
);

create table residente(
DNI_R varchar2(50) primary key not null,
Nombre varchar2(50) not null,
Apellido1 varchar2(50) not null,
Apellido2 varchar2(50) not null,
Genero varchar2(13)
check(Genero in ('hombre', 'mujer')) not null,
PagoComedor integer
check(PagoComedor in(0,1)) not null,
Es_Mayor integer
check(Es_Mayor in (0,1)) not null
);

create table habitacion(
OID_H integer primary key not null,
Numero_H integer 
check (Numero_H in (1,2))not null,
NumeroRes integer 
check(NumeroRes in (0,1,2)) not null,
Tamano varchar2(8)
check(Tamano in ('grande', 'pequeno')) not null,
TipoH varchar2(8)
check(TipoH in ('atico', 'medio', 'bajo')) not null,
Numero_C integer not null,
foreign key(Numero_C) REFERENCES casas ON DELETE CASCADE
);

create table contrato_residente(
OID_CR integer primary key not null,
Correo_Hijo varchar2(50) not null,
Correo_padre varchar2(50),
Fecha_inicio date not null,
Fecha_fin date not null,
TipoPago varchar2(15)
check(TipoPago in ('mensual', 'anual', 'bimensual', 'cuatrimestral')) not null,
FormaPago varchar2(15)
check(FormaPago in ('efectivo', 'transferencia', 'TPV', 'recibo bancario')) not null,
Pais varchar2(50),
Poblacion varchar2(50),
Domicilio varchar2(50),
CodPostal integer not null,
Fianza1 integer 
check (fianza1>=50),
Fianza2 integer,
CuentaBanco varchar2(50),
PagoMen integer not null,
Aplica_SEPA integer
check(Aplica_SEPA in (0, 1)),
CONSTRAINT CHK_DIAS CHECK(Fecha_inicio < Fecha_fin)
);

create table Residente_Antiguo(
DNI_AN varchar2(50) primary key not null,
Nombre varchar2(50) ,
FechaSalida date ,
FechaEntrada date ,
FianzaDev1 integer check(FianzaDev1 in (0,1)),
FianzaDev2 integer check(FianzaDev2 in (0,1)) ,
OID_CR integer,
foreign key (OID_CR) references contrato_residente ON DELETE CASCADE
);

create table PagoInicial(
OID_PIN integer  primary key not null,
PagoIn integer not null,
fechaPago date not null,
DNI_R VARCHAR(30) not null,
FOREIGN KEY (DNI_R) REFERENCES RESIDENTE ON DELETE CASCADE
);


create table PagoMensual(
OID_PMEN integer primary key not null,
PagadoPMR integer check(PagadoPMR in (0,1)) not null,
FechaUltPago date,
OID_CR integer not null,
FOREIGN KEY (OID_CR) REFERENCES contrato_residente ON DELETE CASCADE
);

create table descuento(
OID_DES INTEGER PRIMARY KEY not null,
descuentoDM integer
check(descuentoDM in(0,1)) not null,
descuentoR integer
check(descuentoR in(0,1)) not null,
OID_CR INTEGER not null,
FOREIGN KEY (OID_CR) REFERENCES contrato_residente ON DELETE CASCADE
);

create table Es_pagado_por (
OID_EPP integer primary key not null,
OID_PMEN integer,
DNI_R varchar(50),
foreign key (OID_PMEN) REFERENCES PagoMensual ON DELETE CASCADE,
foreign key (DNI_R) REFERENCES residente ON DELETE CASCADE
);

create table Pertenece_A (
OID_AP integer primary key not null,
DNI_R varchar2(50),
OID_CR integer,
foreign key (OID_CR) REFERENCES contrato_residente ON DELETE CASCADE,
foreign key (DNI_R) REFERENCES residente ON DELETE CASCADE
);


create table sala(
OID_SALA integer primary key not null,
numero integer,
horaComienzo timestamp not null,
horaFin timestamp not null,
estaOcupado integer
check(estaOcupado in(0,1)) not null
);

create table usuarios(
DNI_U varchar2(9) primary key not null,
casa integer,
habitacion integer,
nombre varchar2(50) not null,
OID_SALA integer,
foreign key(OID_SALA) REFERENCES sala ON DELETE CASCADE
);

create table reservado_por (
OID_RP integer,
DNI_U varchar2(9),
OID_SALA integer,
foreign key (DNI_U) REFERENCES usuarios ON DELETE CASCADE,
foreign key (OID_SALA) REFERENCES sala ON DELETE CASCADE
);


create table subcontrata (
CIF_S varchar2(50) primary key not null,
RS varchar2(50) not null,
Cargo varchar2(15)
check(cargo in ('comedor', 'limpieza', 'vigilancia', 'mantenimiento')) not null,
PagoMensual integer not null,
Fecha_inicial date not null,
Fecha_fin date not null,
DNID varchar2(50) not null,
foreign key (DNID) REFERENCES director_a ON DELETE CASCADE,
CONSTRAINT CHK_DIAS2 CHECK(Fecha_fin > Fecha_inicial)
);

create table comedor (
OID_CO integer primary key not null,
Habilitado integer
check(habilitado in(0,1)) not null,
CIF_S varchar2(9) not null,
foreign key (CIF_S) REFERENCES subcontrata ON DELETE CASCADE
);

create table pagoMensualSub (
OID_PMSUB integer primary key not null,
Pagado integer
check(Pagado in (0,1)) not null,
FechaUltPago date not null,
CIF_S varchar2(50) not null,
foreign key (CIF_S) REFERENCES subcontrata ON DELETE CASCADE
);

create table tareaSub (
OID_TS integer primary key not null,
TareaSub varchar2(1000),
CIF_S varchar(50) not null,
foreign key (CIF_S) REFERENCES subcontrata ON DELETE CASCADE
);

create table Es_realizado_por_sub (
OID_REASUB integer primary key, 
OID_TS integer,
CIF_S varchar(50) not null,
foreign key (OID_TS) REFERENCES tareaSub ON DELETE CASCADE,
foreign key (CIF_S) REFERENCES subcontrata ON DELETE CASCADE
);

create table Es_contratada_por (
OID_ECP integer primary key not null,
DNID varchar2(50),
CIF_S varchar2(50),
foreign key (DNID) REFERENCES director_a ON DELETE CASCADE,
foreign key (CIF_S) REFERENCES subcontrata ON DELETE CASCADE
);

create table habita_en (
OID_HAB INTEGER PRIMARY KEY,
DNI_R varchar2(50),
FOREIGN KEY(DNI_R) REFERENCES RESIDENTE ON DELETE CASCADE,
OID_H INTEGER,
FOREIGN KEY (OID_H) REFERENCES HABITACION ON DELETE CASCADE
);


create table usuario_registrado(
OID_UR integer primary key,
correo varchar2(100) not null,
contraseña varchar2(100) not null,
DNI_R varchar2(9) ,
DNID varchar2(50) ,
Foreign key (DNI_R) References residente on delete cascade,
Foreign key (DNID) References residente on delete cascade
);

create table consulta(
OID_Consulta integer primary key,
Nombre varchar2(50),
PrimerApellido varchar2(50),
SegundoApellido varchar2(50),
CorreoElectronico varchar2(50),
Asunto varchar2(25),
Mensaje varchar2(500)
);














