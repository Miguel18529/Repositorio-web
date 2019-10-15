--DROPS--
DROP TABLE casas CASCADE CONSTRAINTS;
DROP TABLE comedor CASCADE CONSTRAINTS;
DROP TABLE consulta CASCADE CONSTRAINTS;
DROP TABLE contrato_empleados CASCADE CONSTRAINTS;
DROP TABLE contrato_residente CASCADE CONSTRAINTS;
DROP TABLE descuento CASCADE CONSTRAINTS;
DROP TABLE director_a CASCADE CONSTRAINTS;
DROP TABLE empleados CASCADE CONSTRAINTS;
DROP TABLE Es_contratada_por CASCADE CONSTRAINTS;
DROP TABLE Es_empleado_de CASCADE CONSTRAINTS;
DROP TABLE Es_pagado_por CASCADE CONSTRAINTS;
DROP TABLE Es_Realizado_Por CASCADE CONSTRAINTS;
DROP TABLE Es_realizado_por_sub CASCADE CONSTRAINTS;
DROP TABLE habita_en CASCADE CONSTRAINTS;
DROP TABLE habitacion CASCADE CONSTRAINTS;
DROP TABLE nominas CASCADE CONSTRAINTS;
DROP TABLE PagoInicial CASCADE CONSTRAINTS;
DROP TABLE PagoMensual CASCADE CONSTRAINTS;
DROP TABLE pagoMensualSub CASCADE CONSTRAINTS;
DROP TABLE Pertenece_A CASCADE CONSTRAINTS;
DROP TABLE reservado_por CASCADE CONSTRAINTS;
DROP TABLE residencia CASCADE CONSTRAINTS;
DROP TABLE residente CASCADE CONSTRAINTS;
DROP TABLE Residente_Antiguo CASCADE CONSTRAINTS;
DROP TABLE sala CASCADE CONSTRAINTS;
DROP TABLE subcontrata CASCADE CONSTRAINTS;
DROP TABLE tarea CASCADE CONSTRAINTS;
DROP TABLE tareaSub CASCADE CONSTRAINTS;
DROP TABLE usuario_registrado CASCADE CONSTRAINTS;
DROP TABLE usuarios CASCADE CONSTRAINTS;


DROP SEQUENCE sec_comedor;
DROP SEQUENCE sec_consulta;
DROP SEQUENCE sec_contrato_empleados;
DROP SEQUENCE sec_contrato_residente;
DROP SEQUENCE sec_descuento;
DROP SEQUENCE sec_Es_contratada_por;
DROP SEQUENCE sec_Es_empleado_de;
DROP SEQUENCE sec_Es_pagado_por;
DROP SEQUENCE sec_Es_Realizado_Por;
DROP SEQUENCE sec_Es_Realizado_Por_sub;
DROP SEQUENCE sec_habita_en;
DROP SEQUENCE sec_habitacion;
DROP SEQUENCE sec_nominas;
DROP SEQUENCE sec_PagoInicial;
DROP SEQUENCE sec_PagoMensual;
DROP SEQUENCE sec_pagoMensualSub;
DROP SEQUENCE sec_Pertenece_A;
DROP SEQUENCE sec_reservado_por;
DROP SEQUENCE sec_residencia;
DROP SEQUENCE sec_sala;
DROP SEQUENCE sec_tarea;
DROP SEQUENCE sec_tareasub;
DROP SEQUENCE sec_usuario_registrado;





create table director_a(
DNID varchar2(50) primary key not null,
nombre varchar2(50) not null
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
Apellido1 varchar2(50),
Apellido2 varchar2(50),
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
PagoMen integer,
Aplica_SEPA integer
check(Aplica_SEPA in (0, 1)),
DNI_R varchar2(50),
FOREIGN KEY (DNI_R) REFERENCES RESIDENTE ON DELETE CASCADE,
CONSTRAINT CHK_DIAS CHECK(Fecha_inicio < Fecha_fin)
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

create table comedor (
OID_CO integer primary key not null,
Habilitado integer
check(habilitado in(0,1)) not null,
CIF_S varchar2(9) not null,
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
correo varchar2(100) not null unique,
contrasena varchar2(100) not null unique,
DNI_R varchar2(9) ,
DNID varchar2(50) ,
Foreign key (DNI_R) References residente on delete cascade,
Foreign key (DNID) References director_a on delete cascade
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


CREATE SEQUENCE sec_contrato_residente;
CREATE OR REPLACE TRIGGER crea_OID_CR
BEFORE INSERT ON contrato_residente
FOR EACH ROW
BEGIN
    SELECT sec_contrato_residente.NEXTVAL INTO :NEW.OID_CR FROM DUAL;
END;
/

CREATE SEQUENCE sec_usuario_registrado  ;
CREATE OR REPLACE TRIGGER crea_OID_UR
BEFORE INSERT ON usuario_registrado
FOR EACH ROW
BEGIN
    SELECT sec_usuario_registrado .NEXTVAL INTO :NEW.OID_UR FROM DUAL;
END;
/

CREATE SEQUENCE sec_residencia;
CREATE OR REPLACE TRIGGER crea_OID_R
BEFORE INSERT ON residencia
FOR EACH ROW
BEGIN
    SELECT sec_residencia.NEXTVAL INTO :NEW.OID_R FROM DUAL;
END;
/

CREATE SEQUENCE sec_habitacion;
CREATE OR REPLACE TRIGGER crea_OID_H
BEFORE INSERT ON habitacion
FOR EACH ROW
BEGIN
    SELECT sec_habitacion.NEXTVAL INTO :NEW.OID_H FROM DUAL;
END;
/

CREATE SEQUENCE sec_PagoInicial;
CREATE OR REPLACE TRIGGER crea_OID_PIN
BEFORE INSERT ON PagoInicial
FOR EACH ROW
BEGIN
    SELECT sec_PagoInicial.NEXTVAL INTO :NEW.OID_PIN FROM DUAL;
END;
/

CREATE SEQUENCE sec_PagoMensual;
CREATE OR REPLACE TRIGGER crea_OID_PMEN
BEFORE INSERT ON PagoMensual
FOR EACH ROW
BEGIN
    SELECT sec_PagoMensual.NEXTVAL INTO :NEW.OID_PMEN FROM DUAL;
END;
/

CREATE SEQUENCE sec_descuento;
CREATE OR REPLACE TRIGGER crea_OID_DES
BEFORE INSERT ON descuento
FOR EACH ROW
BEGIN
    SELECT sec_descuento.NEXTVAL INTO :NEW.OID_DES FROM DUAL;
END;
/

CREATE SEQUENCE sec_Es_pagado_por;
CREATE OR REPLACE TRIGGER crea_OID_EPP
BEFORE INSERT ON Es_pagado_por
FOR EACH ROW
BEGIN
    SELECT sec_Es_pagado_por.NEXTVAL INTO :NEW.OID_EPP FROM DUAL;
END;
/

CREATE SEQUENCE sec_Pertenece_A;
CREATE OR REPLACE TRIGGER crea_OID_AP
BEFORE INSERT ON Pertenece_A
FOR EACH ROW
BEGIN
    SELECT sec_Pertenece_A.NEXTVAL INTO :NEW.OID_AP FROM DUAL;
END;
/

CREATE SEQUENCE sec_sala;
CREATE OR REPLACE TRIGGER crea_OID_SALA
BEFORE INSERT ON sala
FOR EACH ROW
BEGIN
    SELECT sec_sala.NEXTVAL INTO :NEW.OID_SALA FROM DUAL;
END;
/

CREATE SEQUENCE sec_reservado_por;
CREATE OR REPLACE TRIGGER crea_OID_RP
BEFORE INSERT ON reservado_por
FOR EACH ROW
BEGIN
    SELECT sec_reservado_por.NEXTVAL INTO :NEW.OID_RP FROM DUAL;
END;
/


CREATE SEQUENCE sec_comedor;
CREATE OR REPLACE TRIGGER crea_OID_CO
BEFORE INSERT ON comedor
FOR EACH ROW
BEGIN
    SELECT sec_comedor.NEXTVAL INTO :NEW.OID_CO FROM DUAL;
END;
/

CREATE SEQUENCE sec_habita_en   ;
CREATE OR REPLACE TRIGGER crea_OID_HAB 
BEFORE INSERT ON habita_en 
FOR EACH ROW
BEGIN
    SELECT sec_habita_en .NEXTVAL INTO :NEW.OID_HAB   FROM DUAL;
END;
/

CREATE SEQUENCE sec_consulta   ;
CREATE OR REPLACE TRIGGER crea_OID_Consulta 
BEFORE INSERT ON consulta 
FOR EACH ROW
BEGIN
    SELECT sec_consulta .NEXTVAL INTO :NEW.OID_Consulta   FROM DUAL;
END;
/


create or replace procedure updatearResidente(
dni in varchar2,
nom in varchar2,
ape1 in varchar2,
ape2 in varchar2,
sex in varchar2,
fechaLlegada in date,
fechaSalida in date
) as
begin
UPDATE RESIDENTE SET NOMBRE = nom,
                    APELLIDO1 = ape1,
                    APELLIDO2 = ape2,  
                    GENERO = sex
                    WHERE DNI_R = dni;
                    
UPDATE CONTRATO_RESIDENTE SET FECHA_INICIO = fechaLlegada,
                            FECHA_FIN = fechaSalida 
                            WHERE DNI_R = dni;
end;
/

CREATE OR REPLACE PROCEDURE INSERTAR_CONTACTO 
  (nombre IN VARCHAR2,
   apellido1 IN VARCHAR2,
   apellido2 IN VARCHAR2,
   correo IN VARCHAR2,
   asunto IN VARCHAR2,
   mensaje IN VARCHAR2
   ) AS
BEGIN
  INSERT INTO consulta
  VALUES (sec_consulta.nextval, nombre, apellido1, apellido2, correo, asunto, mensaje);
  commit;
END;
/


CREATE OR REPLACE PROCEDURE INSERTAR_RESERVA 
  (dni IN VARCHAR2,
   nombre IN VARCHAR2,
   apellido1 IN VARCHAR2,
   apellido2 IN VARCHAR2,
   sexo IN VARCHAR2,
   mayorEdad IN integer,
   pais IN VARCHAR2,
   poblacion in varchar2,
   codigoPostal in integer,
   domicilio in varchar2,
   correoElectronico in varchar2,
   correoPadre in varchar2,
   pass in varchar2,
   fechaLlegada in date,
   fechaSalida in date,
   tipoPago in varchar2,
   formaPago in varchar2,
   pagoComedor in integer
   
   ) AS
BEGIN
  INSERT INTO residente
  VALUES (dni, nombre, apellido1, apellido2, sexo, pagoComedor, mayorEdad);
  commit;
  INSERT INTO contrato_residente(OID_CR, Correo_Hijo, Correo_padre,
                                Fecha_inicio, Fecha_fin, TipoPago,
                                FormaPago, Pais, Domicilio, Poblacion, CodPostal, DNI_R)
  VALUES(sec_contrato_residente.nextval, correoElectronico, 
        correoPadre, fechaLlegada, fechaSalida, tipoPago,
        formaPago, pais, domicilio,poblacion, codigoPostal, dni);
  commit;
  INSERT INTO usuario_registrado(OID_UR, correo, contrasena, DNI_R)
  VALUES(sec_usuario_registrado.nextval, correoElectronico, pass, dni);
  commit;
END;
/

insert into DIRECTOR_A(DNID, NOMBRE)
      values('53964017Z', 'Margarita');

insert into USUARIO_REGISTRADO(CORREO, CONTRASENA, DNID)
      values('margarita@gmail.com', 'contrasena1', '53964017Z');
