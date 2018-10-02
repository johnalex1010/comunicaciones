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

/*SELECCION DE ADJUNTOS DE ST - con usuarios asignados*/
SELECT
	S.numST,
    S.nombre,
    S.email,
    S.telefono,
    U.usuario,
    FD.facDep,
    TP.tipoSolicitud,
    ADJ.adjunto,
    TRAS.fecha,
    TRAS.comentario,
    F.fase
FROM 
	t_solicitud     AS S,
    t_usuario       AS U,
    t_resusuario    AS RS,
    t_adjunto       AS ADJ,
    t_tiposolicitud AS TP,
    t_facdep        AS FD,
    t_trasabilidad  AS TRAS,
    t_fase          AS F
WHERE 
	S.numST=ADJ.numST
    AND S.id_facDep=FD.id_facDep
    AND S.id_tipoSolicitud=TP.id_tipoSolicitud
    AND S.numST=RS.numST
    AND RS.id_usuario=U.id_usuario
    AND TRAS.numST=S.numST
    AND TRAS.id_fase=F.id_fase
    AND TP.id_tipoSolicitud=4
ORDER BY S.numST DESC


/*
======
INSERT
======
*/

/*
-------------------------
PRCEDIMIENTOS ALMACENADOS
-------------------------

1)  in_SolicitudADJ (Solo para los formularios:)
------------------------------------------------
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
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_tipoSolicitud int,           /*Relación de la tabla t_tipoSolicitud*/
        IN _adjunto VARCHAR(30),            /*Relación de la tabla t_adjunto*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT                 /*Relación de la tabla t_trasabilidad*/
        
    )
        BEGIN
            IF NOT EXISTS (SELECT numST FROM t_solicitud WHERE numST=_numST) THEN
                INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono, id_tipoSolicitud) VALUES (_numST, _nombres, _email, _id_facDep, _telefono, _id_tipoSolicitud);
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
                INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
                INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario) VALUES (_id_fase, _numST, _fecha, _comentario);
            ELSE
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
            END IF;
        END//
DELIMITER ;

/*
2)  in_SolicitudTFC (Solo para el formulario: Tarjeras fechas conmemorativas)
-----------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudTFC (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_tipoSolicitud int,           /*Relación de la tabla t_tipoSolicitud*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/
        
        IN _nombreTarjeta varchar(100),     /*Relación de la tabla t_tarjetas*/
        IN _fechaTarjeta DATE,              /*Relación de la tabla t_tarjetas*/
        IN _mensaje TEXT                    /*Relación de la tabla t_tarjetas*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono, id_tipoSolicitud) VALUES (_numST, _nombres, _email, _id_facDep, _telefono, _id_tipoSolicitud);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario) VALUES (_id_fase, _numST, _fecha, _comentario);
            INSERT INTO t_tarjetas(nombreTarjeta, fechaTarjeta, mensaje, numST) VALUES (_nombreTarjeta, _fechaTarjeta, _mensaje, _numST);
        END//
DELIMITER ;

/*
3)  in_SolicitudCondo (Solo para el formulario: Condolencias a travez de email institucional)
--------------------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudCondo (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_tipoSolicitud int,           /*Relación de la tabla t_tipoSolicitud*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/
        
        IN _nombreDoliente varchar(100),     /*Relación de la tabla t_condoloencias*/
        IN _nombreFallecido varchar(100),    /*Relación de la tabla t_condoloencias*/
        IN _parentesco varchar(100),         /*Relación de la tabla t_condoloencias*/
        IN _lugarVelacion varchar(100),      /*Relación de la tabla t_condoloencias*/
        IN _fechaVelacion DATE,              /*Relación de la tabla t_condoloencias*/
        IN _horaVelacion time                /*Relación de la tabla t_condoloencias*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono, id_tipoSolicitud) VALUES (_numST, _nombres, _email, _id_facDep, _telefono, _id_tipoSolicitud);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario) VALUES (_id_fase, _numST, _fecha, _comentario);
            INSERT INTO t_condolencias(nombreDoliente, nombreFallecido, parentesco, id_facDep, lugarVelacion, fechaVelacion, horaVelacion, numST) VALUES (_nombreDoliente, _nombreFallecido, _parentesco, _id_facDep, _lugarVelacion, _fechaVelacion, _horaVelacion, _numST);
        END//
DELIMITER ;
/*
4)  in_SolicitudAprobMate (Solo para el formulario: Condolencias a travez de email institucional)
--------------------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudAprobMate (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_tipoSolicitud int,           /*Relación de la tabla t_tipoSolicitud*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _adjunto VARCHAR(30),            /*Relación de la tabla t_adjunto*/
        IN _nomAprobacion varchar(100)      /*Relación de la tabla t_aprobMate*/
        
    )
        BEGIN
            IF NOT EXISTS (SELECT numST FROM t_solicitud WHERE numST=_numST) THEN
                INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono, id_tipoSolicitud) VALUES (_numST, _nombres, _email, _id_facDep, _telefono, _id_tipoSolicitud);
                INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
                INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario) VALUES (_id_fase, _numST, _fecha, _comentario);
                INSERT INTO t_aprobMate(nomAprobacion, numST) VALUES (_nomAprobacion, _numST);
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
            ELSE
                INSERT INTO t_aprobMate(nomAprobacion, numST) VALUES (_nomAprobacion, _numST);
            END IF;
        END//
DELIMITER ;

/*
5)  in_SolicitudNewWeb (Solo para el formulario: Nuevo sitio web eventos)
--------------------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudNewWeb (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_tipoSolicitud int,           /*Relación de la tabla t_tipoSolicitud*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _nombreWeb varchar(100),         /*Relación de la tabla t_newWeb*/
        IN _subdominio varchar(100),        /*Relación de la tabla t_newWeb*/
        IN _justificacion TEXT,             /*Relación de la tabla t_newWeb*/
        IN _adjunto VARCHAR(30)             /*Relación de la tabla t_adjunto*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono, id_tipoSolicitud) VALUES (_numST, _nombres, _email, _id_facDep, _telefono, _id_tipoSolicitud);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario) VALUES (_id_fase, _numST, _fecha, _comentario);
            INSERT INTO t_newWeb(nombreWeb, subdominio, justificacion, numST) VALUES (_nombreWeb, _subdominio, _justificacion, _numST);
            INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
            
        END//
DELIMITER ;

/*
6)  in_SolicitudAjusteWeb (Solo para el formulario: Ajustes de texto y/o imagenes web)
--------------------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudAjusteWeb (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_tipoSolicitud int,           /*Relación de la tabla t_tipoSolicitud*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _urlAjuste varchar(200),         /*Relación de la tabla t_ajusteWeb*/
        IN _descripcion TEXT,               /*Relación de la tabla t_ajusteWeb*/
        IN _adjunto VARCHAR(30)             /*Relación de la tabla t_adjunto*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono, id_tipoSolicitud) VALUES (_numST, _nombres, _email, _id_facDep, _telefono, _id_tipoSolicitud);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario) VALUES (_id_fase, _numST, _fecha, _comentario);
            INSERT INTO t_ajusteWeb(urlAjuste, descripcion, numST) VALUES (_urlAjuste, _descripcion, _numST);
            INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
            
        END//
DELIMITER ;
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