BEGIN

INSERT INTO director_a (DNID,nombre) values('56734586R', 'Daisy Floripondio');

INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111112B', 'bbbaaaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111113B', 'bbbbaaaaaaaaaaaa','hombre', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111114B', 'bbbbbaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111115B', 'bbbaaaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111116B', 'bbbbaaaaaaaaaaaa','hombre', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111117B', 'bbbbbaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111118B', 'bbbaaaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111119B', 'bbbbaaaaaaaaaaaa','hombre', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111124B', 'bbbbbaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111132B', 'bbbaaaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111143B', 'bbbbaaaaaaaaaaaa','hombre', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111154B', 'bbbbbaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111162B', 'bbbaaaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111173B', 'bbbbaaaaaaaaaaaa','hombre', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111184B', 'bbbbbaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111192B', 'bbbaaaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111213B', 'bbbbaaaaaaaaaaaa','hombre', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111314B', 'bbbbbaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111412B', 'bbbaaaaaaaaaaaaa','mujer', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111513B', 'bbbbaaaaaaaaaaaa','hombre', 1, 1);
INSERT INTO residente (DNI_R, Nombre, Genero, PagoComedor, Es_Mayor )
            values('11111614B', 'bbbbbaaaaaaaaaaa','mujer', 1, 1);

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(1,'25w6nju@gmail.com', '3rzniun5@hotmail.com' ,TO_DATE('14-ABR-2018','DD-MON-YYYY'),
TO_DATE('9-OCT-2018','DD-MON-YYYY'),'bimensual', 'transferencia','España', 'La Algaba', 'C/ ctymzv, numero 15', 02859,78 ,376,'furktypb792' ,347 , 1 ,
'11111112B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(2,'uyz293z@gmail.com', '6vrr6muo@hotmail.com' ,TO_DATE('14-DIC-2017','DD-MON-YYYY'),
TO_DATE('17-DIC-2017','DD-MON-YYYY'),'mensual', 'recibo bancario','España', 'Bormujos', 'C/ izxvkn, numero 13', 19299,88 ,332,'vbelnexo144' ,263 , 1 ,
'11111113B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal
, Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(3,'uxbk8l2@gmail.com', 'hrcihhe1@hotmail.com' ,TO_DATE('22-FEB-2018','DD-MON-YYYY'),
TO_DATE('20-JUN-2019','DD-MON-YYYY'),'mensual', 'efectivo','España', 'Rota', 'C/ mijlkb, numero 2', 76299,70 ,324,'tcwlddhj298' ,452 , 0 , '11111114B');

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(1,'25w6nju@gmail.com', '3rzniun5@hotmail.com' ,TO_DATE('14-ABR-2018','DD-MON-YYYY'),
TO_DATE('9-OCT-2018','DD-MON-YYYY'),'bimensual', 'transferencia','España', 'La Algaba', 'C/ ctymzv, numero 15', 02859,78 ,376,'furktypb792' ,347 , 1 ,
'11111115B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(2,'uyz293z@gmail.com', '6vrr6muo@hotmail.com' ,TO_DATE('14-DIC-2017','DD-MON-YYYY'),
TO_DATE('17-DIC-2017','DD-MON-YYYY'),'mensual', 'recibo bancario','España', 'Bormujos', 'C/ izxvkn, numero 13', 19299,88 ,332,'vbelnexo144' ,263 , 1 ,
'11111116B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(3,'uxbk8l2@gmail.com', 'hrcihhe1@hotmail.com' ,TO_DATE('22-FEB-2018','DD-MON-YYYY'),
TO_DATE('20-JUN-2019','DD-MON-YYYY'),'mensual', 'efectivo','España', 'Rota', 'C/ mijlkb, numero 2', 76299,70 ,324,'tcwlddhj298' ,452 , 0 , '11111117B');

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(1,'25w6nju@gmail.com', '3rzniun5@hotmail.com' ,TO_DATE('14-ABR-2018','DD-MON-YYYY'),
TO_DATE('9-OCT-2018','DD-MON-YYYY'),'bimensual', 'transferencia','España', 'La Algaba', 'C/ ctymzv, numero 15', 02859,78 ,376,'furktypb792' ,347 , 1 ,
'11111118B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(2,'uyz293z@gmail.com', '6vrr6muo@hotmail.com' ,TO_DATE('14-DIC-2017','DD-MON-YYYY'),
TO_DATE('17-DIC-2017','DD-MON-YYYY'),'mensual', 'recibo bancario','España', 'Bormujos', 'C/ izxvkn, numero 13', 19299,88 ,332,'vbelnexo144' ,263 , 1 ,
'11111119B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(3,'uxbk8l2@gmail.com', 'hrcihhe1@hotmail.com' ,TO_DATE('22-FEB-2018','DD-MON-YYYY'),
TO_DATE('20-JUN-2019','DD-MON-YYYY'),'mensual', 'efectivo','España', 'Rota', 'C/ mijlkb, numero 2', 76299,70 ,324,'tcwlddhj298' ,452 , 0 , '11111124B');

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(1,'25w6nju@gmail.com', '3rzniun5@hotmail.com' ,TO_DATE('14-ABR-2018','DD-MON-YYYY'),
TO_DATE('9-OCT-2018','DD-MON-YYYY'),'bimensual', 'transferencia','España', 'La Algaba', 'C/ ctymzv, numero 15', 02859,78 ,376,'furktypb792' ,347 , 1 ,
'11111132B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(2,'uyz293z@gmail.com', '6vrr6muo@hotmail.com' ,TO_DATE('14-DIC-2017','DD-MON-YYYY'),
TO_DATE('17-DIC-2017','DD-MON-YYYY'),'mensual', 'recibo bancario','España', 'Bormujos', 'C/ izxvkn, numero 13', 19299,88 ,332,'vbelnexo144' ,263 , 1 ,
'11111143B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(3,'uxbk8l2@gmail.com', 'hrcihhe1@hotmail.com' ,TO_DATE('22-FEB-2018','DD-MON-YYYY'),
TO_DATE('20-JUN-2019','DD-MON-YYYY'),'mensual', 'efectivo','España', 'Rota', 'C/ mijlkb, numero 2', 76299,70 ,324,'tcwlddhj298' ,452 , 0 , '11111154B');

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(1,'25w6nju@gmail.com', '3rzniun5@hotmail.com' ,TO_DATE('14-ABR-2018','DD-MON-YYYY'),
TO_DATE('9-OCT-2018','DD-MON-YYYY'),'bimensual', 'transferencia','España', 'La Algaba', 'C/ ctymzv, numero 15', 02859,78 ,376,'furktypb792' ,347 , 1 ,
'11111162B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(2,'uyz293z@gmail.com', '6vrr6muo@hotmail.com' ,TO_DATE('14-DIC-2017','DD-MON-YYYY'),
TO_DATE('17-DIC-2017','DD-MON-YYYY'),'mensual', 'recibo bancario','España', 'Bormujos', 'C/ izxvkn, numero 13', 19299,88 ,332,'vbelnexo144' ,263 , 1 ,
'11111173B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(3,'uxbk8l2@gmail.com', 'hrcihhe1@hotmail.com' ,TO_DATE('22-FEB-2018','DD-MON-YYYY'),
TO_DATE('20-JUN-2019','DD-MON-YYYY'),'mensual', 'efectivo','España', 'Rota', 'C/ mijlkb, numero 2', 76299,70 ,324,'tcwlddhj298' ,452 , 0 , '11111184B');

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(1,'25w6nju@gmail.com', '3rzniun5@hotmail.com' ,TO_DATE('14-ABR-2018','DD-MON-YYYY'),
TO_DATE('9-OCT-2018','DD-MON-YYYY'),'bimensual', 'transferencia','España', 'La Algaba', 'C/ ctymzv, numero 15', 02859,78 ,376,'furktypb792' ,347 , 1 ,
'11111192B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(2,'uyz293z@gmail.com', '6vrr6muo@hotmail.com' ,TO_DATE('14-DIC-2017','DD-MON-YYYY'),
TO_DATE('17-DIC-2017','DD-MON-YYYY'),'mensual', 'recibo bancario','España', 'Bormujos', 'C/ izxvkn, numero 13', 19299,88 ,332,'vbelnexo144' ,263 , 1 ,
'11111213B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(3,'uxbk8l2@gmail.com', 'hrcihhe1@hotmail.com' ,TO_DATE('22-FEB-2018','DD-MON-YYYY'),
TO_DATE('20-JUN-2019','DD-MON-YYYY'),'mensual', 'efectivo','España', 'Rota', 'C/ mijlkb, numero 2', 76299,70 ,324,'tcwlddhj298' ,452 , 0 , '11111314B');

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(1,'25w6nju@gmail.com', '3rzniun5@hotmail.com' ,TO_DATE('14-ABR-2018','DD-MON-YYYY'),
TO_DATE('9-OCT-2018','DD-MON-YYYY'),'bimensual', 'transferencia','España', 'La Algaba', 'C/ ctymzv, numero 15', 02859,78 ,376,'furktypb792' ,347 , 1 ,
'11111412B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(2,'uyz293z@gmail.com', '6vrr6muo@hotmail.com' ,TO_DATE('14-DIC-2017','DD-MON-YYYY'),
TO_DATE('17-DIC-2017','DD-MON-YYYY'),'mensual', 'recibo bancario','España', 'Bormujos', 'C/ izxvkn, numero 13', 19299,88 ,332,'vbelnexo144' ,263 , 1 ,
'11111513B'); 

INSERT INTO contrato_residente (OID_CR, Correo_Hijo, Correo_padre, Fecha_inicio, Fecha_fin, TipoPago, FormaPago, Pais, Poblacion, Domicilio, CodPostal,
Fianza1, Fianza2, CuentaBanco, PagoMen, Aplica_SEPA, DNI_R) values(3,'uxbk8l2@gmail.com', 'hrcihhe1@hotmail.com' ,TO_DATE('22-FEB-2018','DD-MON-YYYY'),
TO_DATE('20-JUN-2019','DD-MON-YYYY'),'mensual', 'efectivo','España', 'Rota', 'C/ mijlkb, numero 2', 76299,70 ,324,'tcwlddhj298' ,452 , 0 , '11111614B');

INSERT INTO USUARIO_REGISTRADO(CORREO, CONTRASEÑA, DNI_R, DNID) VALUES('25w6nju@gmail.com', 'abcdefghij', '11111112B', '56734586R');

INSERT INTO USUARIO_REGISTRADO(CORREO, CONTRASEÑA, DNI_R, DNID) VALUES('uyz293z@gmail.com', 'abcdefghik', '11111113B', '56734586R');

INSERT INTO USUARIO_REGISTRADO(CORREO, CONTRASEÑA, DNI_R, DNID) VALUES('uxbk8l2@gmail.com', 'abcdefghil', '11111114B', '56734586R');

INSERT INTO USUARIO_REGISTRADO(CORREO, CONTRASEÑA, DNI_R, DNID) VALUES('25w6nju@gmail.com', 'abcdefghim', '11111115B', '56734586R');

INSERT INTO USUARIO_REGISTRADO(CORREO, CONTRASEÑA, DNI_R, DNID) VALUES('uyz293z@gmail.com', 'abcdefghin', '11111116B', '56734586R');

INSERT INTO USUARIO_REGISTRADO(CORREO, CONTRASEÑA, DNI_R, DNID) VALUES('uxbk8l2@gmail.com', 'abcdefghio', '11111117B', '56734586R');

COMMIT;

END;