DROP TABLE CONTRATO_RESIDENTE;
DROP TABLE USUARIO_REGISTRADO;
DROP TABLE RESIDENTE;
DROP TABLE DIRECTOR_A;
DROP SEQUENCE sec_contrato_residente;
DROP SEQUENCE sec_usuario_registrado;

create table director_a(
DNID varchar2(50) primary key not null,
nombre varchar2(50) not null
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
check(Aplica_SEPA in (0, 1)) not null,
DNI_R varchar2(50),
FOREIGN KEY (DNI_R) REFERENCES RESIDENTE ON DELETE CASCADE,
CONSTRAINT CHK_DIAS CHECK(Fecha_inicio < Fecha_fin)
);

create table usuario_registrado(
OID_UR integer primary key,
correo varchar2(100) not null,
contraseña varchar2(100) not null,
DNI_R varchar2(9) ,
DNID varchar2(50) ,
Foreign key (DNI_R) References residente on delete cascade,
Foreign key (DNID) References director_a on delete cascade
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


