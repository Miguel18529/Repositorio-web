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
                                FormaPago, Pais, Domicilio, Poblacion, CodPostal)
  VALUES(sec_contrato_residente.nextval, correoElectronico, 
        correoPadre, fechaLlegada, fechaSalida, tipoPago,
        formaPago, pais, domicilio,poblacion, codigoPostal);
  commit;
  INSERT INTO usuario_registrado(OID_UR, correo, contraseña, DNI_R)
  VALUES(sec_usuario_registrado.nextval, correoElectronico, pass, dni);
  commit;
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
