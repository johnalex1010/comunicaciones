/*
==========================
PROCEDIMIENTOS ALMACENADOS
==========================
-- PREFIJOS
-- sl_NombreProcedimiento = sl -> Metodo SELECT
-- in_NombreProcedimiento = in -> Metodo INSERT	
-- up_NombreProcedimiento = up -> Metodo UPDATE
-- dl_NombreProcedimiento = dl -> Metodo DELETE
*/


/*
======
SELECT
======
*/

/*SELECCION DE ADJUNTOS DE ST - Tipo de solicitud: Email Institucionales con usuarios asignados*/
SELECT
	S.numST,
    S.nombre,
    S.email,
    S.telefono,
    U.usuario,
    FD.facDep,
    E.estado,
    TP.tipoSolicitud,
    ADJ.adjunto,
    TRAS.fecha,
    TRAS.comentario,
    F.fase
FROM 
	t_solicitud AS S,
    t_usuario AS U,
    t_resusuario AS RS,
    t_adjunto AS ADJ,
    t_estado AS E,
    t_tiposolicitud AS TP,
    t_facdep AS FD,
    t_trasabilidad AS TRAS,
    t_fase AS F
WHERE 
	S.numST=ADJ.numST
    AND S.id_facDep=FD.id_facDep
    AND S.id_estado=E.id_estado
    AND S.id_tipoSolicitud=TP.id_tipoSolicitud
    AND S.numST=RS.numST
    AND RS.id_usuario=U.id_usuario
    AND TRAS.numST=S.numST
    AND TRAS.id_fase=F.id_fase
    AND TP.id_tipoSolicitud=4
    ORDER BY `S`.`numST`  DESC


/*
======
INSERT
======
*/

/*
-------------------------
PRCEDIMIENTOS ALMACENADOS
-------------------------

1)  in_SolicitudADJ
-------------------
    A- SOLICITUD DE ENVIO DE CORREOS INSTITUCIONALES
    B- SOLICITUD DE TOMÁS NOTICIAS
    C- SOLICITUD DE CUMPLEAÑOS INSTITUCIONALES
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudADJ (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_estado int,                  /*Relación de la tabla t_estado*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_tipoSolicitud int,           /*Relación de la tabla t_tipoSolicitud*/
        IN _adjunto VARCHAR(30),            /*Relación de la tabla t_adjunto*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT                 /*Relación de la tabla t_trasabilidad*/
        
    )
        BEGIN
            IF NOT EXISTS (SELECT numST FROM t_solicitud WHERE numST=_numST) THEN
                INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono, id_estado, id_tipoSolicitud) VALUES (_numST, _nombres, _email, _id_facDep, _telefono, _id_estado, _id_tipoSolicitud);
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
                INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
                INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario) VALUES (_id_fase, _numST, _fecha, _comentario);
            ELSE
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
            END IF;
        END//
DELIMITER ;

/*CALL in_EmailInsitucional("ST003","Dato2","Dato3","Dato4","Dato5","5","4","Dato8"); --> La forma de como llamar al procedimiento*/
/*DROP PROCEDURE in_EmailInsitucional; --> Eliminar el procedimiento*/

/*
======
UPDATE
======
*/


/*
======
DELETE
======
*/