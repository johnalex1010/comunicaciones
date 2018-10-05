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
        U.usuario,
        UN.nomUnidad,
        CAT.categoria,
        SCAT.subCategoria,
        F.fase,
        TRAS.comentario


    FROM 
        t_solicitud AS S,
        t_usuario AS U,
        t_resusuario AS US,
        t_resunidad AS RU,
        t_unidad AS UN,
        t_categoria AS CAT,
        t_subcategoria AS SCAT,
        t_trasabilidad AS TRAS,
        t_fase AS F
    WHERE
        S.numST=US.numST
        AND S.numST=RU.numST
        AND RU.id_unidad=UN.id_unidad
        AND RU.id_categoria=CAT.id_categoria
        AND RU.id_subCategoria=SCAT.id_subCategoria
        AND S.numST=TRAS.numST
        AND TRAS.id_fase=F.id_fase
        AND TRAS.id_usuario=U.id_usuario
        AND S.numST = 'ST014'
    ORDER BY TRAS.id_trasabilidad DESC LIMIT 1;









SELECT
    TRAS.numST,
    U.usuario,
    SCAT.subCategoria,
    F.fase,
    TRAS.comentario,
    TRAS.id_trasabilidad
FROM 
    t_solicitud AS S,
    t_usuario AS U,
    t_resusuario AS US,
    t_resunidad AS RU,
    t_subcategoria AS SCAT,
    t_trasabilidad AS TRAS,
    t_fase AS F
WHERE
    S.numST=US.numST
    AND S.numST=RU.numST
    AND RU.id_subCategoria=SCAT.id_subCategoria
    AND S.numST=TRAS.numST
    AND TRAS.id_fase=F.id_fase
    AND TRAS.id_usuario=U.id_usuario
GROUP BY TRAS.numST DESC
ORDER BY id_trasabilidad DESC;





SELECT 
    T.id_trasabilidad,
    T.numST,
    T.comentario,
    T.id_usuario,
    T.id_fase,
    F.fase
FROM
    t_trasabilidad AS T,
    t_fase AS F
WHERE
    T.id_fase=F.id_fase
ORDER BY T.id_trasabilidad DESC



/*
-------------------------
PRCEDIMIENTOS ALMACENADOS
-------------------------
======
INSERT
======

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
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/
        IN _adjunto VARCHAR(30)             /*Relación de la tabla t_adjunto*/
        
    )
        BEGIN
            IF NOT EXISTS (SELECT numST FROM t_solicitud WHERE numST=_numST) THEN
                INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
                INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
                INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
                INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
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
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/
        
        IN _nombreTarjeta varchar(100),     /*Relación de la tabla t_tarjetas*/
        IN _fechaTarjeta DATE,              /*Relación de la tabla t_tarjetas*/
        IN _mensaje TEXT                    /*Relación de la tabla t_tarjetas*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
            INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
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
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
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
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
            INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
            INSERT INTO t_condolencias(nombreDoliente, nombreFallecido, parentesco, id_facDep, lugarVelacion, fechaVelacion, horaVelacion, numST) VALUES (_nombreDoliente, _nombreFallecido, _parentesco, _id_facDep, _lugarVelacion, _fechaVelacion, _horaVelacion, _numST);
        END//
DELIMITER ;
/*
4)  in_SolicitudAprobMate (Solo para el formulario: Condolencias a travez de email institucional)
-------------------------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudAprobMate (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _adjunto VARCHAR(30),            /*Relación de la tabla t_adjunto*/
        IN _nomAprobacion varchar(100)      /*Relación de la tabla t_aprobMate*/
        
    )
        BEGIN
            IF NOT EXISTS (SELECT numST FROM t_solicitud WHERE numST=_numST) THEN
                INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
                INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
                INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
                INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
                INSERT INTO t_aprobMate(nomAprobacion, numST) VALUES (_nomAprobacion, _numST);
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
            ELSE
                INSERT INTO t_aprobMate(nomAprobacion, numST) VALUES (_nomAprobacion, _numST);
            END IF;
        END//
DELIMITER ;

/*
5)  in_SolicitudNewWeb (Solo para el formulario: Nuevo sitio web eventos)
-------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudNewWeb (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _nombreWeb varchar(100),         /*Relación de la tabla t_newWeb*/
        IN _subdominio varchar(100),        /*Relación de la tabla t_newWeb*/
        IN _justificacion TEXT,             /*Relación de la tabla t_newWeb*/
        IN _adjunto VARCHAR(30)             /*Relación de la tabla t_adjunto*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
            INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
            INSERT INTO t_newWeb(nombreWeb, subdominio, justificacion, numST) VALUES (_nombreWeb, _subdominio, _justificacion, _numST);
            INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
            
        END//
DELIMITER ;

/*
6)  in_SolicitudAjusteWeb (Solo para el formulario: Ajustes de texto y/o imagenes web)
--------------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudAjusteWeb (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _urlAjuste varchar(200),         /*Relación de la tabla t_ajusteWeb*/
        IN _descripcion TEXT,               /*Relación de la tabla t_ajusteWeb*/
        IN _adjunto VARCHAR(30)             /*Relación de la tabla t_adjunto*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
            INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
            INSERT INTO t_ajusteWeb(urlAjuste, descripcion, numST) VALUES (_urlAjuste, _descripcion, _numST);
            INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
            
        END//
DELIMITER ;

/*
7)  in_SolicitudCapaWeb (Solo para el formulario: Capacitaciones web)
---------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudCapaWeb (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _nomPersona varchar(100),         /*Relación de la tabla t_capacitacionWeb*/
        IN _telefonoExt varchar(20),         /*Relación de la tabla t_capacitacionWeb*/
        IN _numCelular varchar(10),          /*Relación de la tabla t_capacitacionWeb*/
        IN _emailCapa varchar(100),              /*Relación de la tabla t_capacitacionWeb*/
        IN _fechaCW DATE,                    /*Relación de la tabla t_capacitacionWeb*/
        IN _horaCW time,                     /*Relación de la tabla t_capacitacionWeb*/
        IN _txtMotivo TEXT                   /*Relación de la tabla t_capacitacionWeb*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
            INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
            INSERT INTO t_capacitacionWeb(nomPersona, telefonoExt, numCelular, emailCapa, fechaCW, horaCW, txtMotivo, numST) VALUES (_nomPersona, _telefonoExt, _numCelular, _emailCapa, _fechaCW, _horaCW, _txtMotivo, _numST);
        END//
DELIMITER ;

/*
8)  in_SolicitudCapaWeb (Solo para el formulario: Asesorias Community Manager)
------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudAsesoriaCM (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _tema varchar(200),              /*Relación de la tabla t_asesoriaCM*/
        IN _lugar varchar(50),              /*Relación de la tabla t_asesoriaCM*/
        IN _fechaACM DATE,                  /*Relación de la tabla t_asesoriaCM*/
        IN _horaACM time                    /*Relación de la tabla t_asesoriaCM*/
        
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
            INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
            INSERT INTO t_asesoriaCM(tema, lugar, fechaACM, horaACM, numST) VALUES (_tema, _lugar, _fechaACM, _horaACM, _numST);
        END//
DELIMITER ;

/*
9)  in_SolicitudCampaniaCM (Solo para el formulario: Campaña Redes Sociales - Community Manager)
------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudCampaniaCM (
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _nombreCam varchar(200),         /*Relación de la tabla t_campaniascm*/
        IN _justificacion TEXT,             /*Relación de la tabla t_campaniascm*/
        IN _objetivo TEXT,                  /*Relación de la tabla t_campaniascm*/
        IN _fechaHoraIni DATE,              /*Relación de la tabla t_campaniascm*/
        IN _fechaHoraFin DATE,              /*Relación de la tabla t_campaniascm*/
        IN _palabrasClaves TEXT,             /*Relación de la tabla t_campaniascm*/
        IN _adjunto VARCHAR(30),            /*Relación de la tabla t_adjunto*/
        IN _id_objPublico int               /*Relación de la tabla t_resobjpublico*/

    )
        BEGIN
            IF NOT EXISTS (SELECT numST FROM t_solicitud WHERE numST=_numST) THEN
                INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
                INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
                INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
                INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
                INSERT INTO t_campaniascm(nombreCam, justificacion, objetivo, fechaHoraIni, fechaHoraFin, palabrasClaves, numST) VALUES (_nombreCam, _justificacion, _objetivo, _fechaHoraIni, _fechaHoraFin, _palabrasClaves, _numST);
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
                INSERT INTO t_resobjpublico(id_objPublico, numST) VALUES (_id_objPublico, _numST);
            ELSE
                INSERT INTO t_resobjpublico(id_objPublico, numST) VALUES (_id_objPublico, _numST);
            END IF;
        END//
DELIMITER ;

/*
10)  in_SolicitudCampaniaCM (Solo para el formulario: Creación Redes Sociales - Community Manager)
------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudNewRedSocial(
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _nomPerfil varchar(200),         /*Relación de la tabla t_crearedescm*/
        IN _emailPersonal varchar(50),      /*Relación de la tabla t_crearedescm*/
        IN _descripcion TEXT,               /*Relación de la tabla t_crearedescm*/
        IN _direccion varchar(50),          /*Relación de la tabla t_crearedescm*/
        IN _telPerfil varchar(10),          /*Relación de la tabla t_crearedescm*/
        IN _emailPerfil varchar(100),       /*Relación de la tabla t_crearedescm*/
        IN _adjunto VARCHAR(30),            /*Relación de la tabla t_adjunto*/
        IN _id_tipoRedSocial int            /*Relación de la tabla t_tiporedsocial*/

    )
        BEGIN
            IF NOT EXISTS (SELECT numST FROM t_solicitud WHERE numST=_numST) THEN
                INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
                INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
                INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
                INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
                INSERT INTO t_crearedescm(nomPerfil, emailPersonal, descripcion, direccion, telPerfil, emailPerfil, numST) VALUES (_nomPerfil, _emailPersonal, _descripcion, _direccion, _telPerfil, _emailPerfil, _numST);
                INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
                INSERT INTO t_restrs(id_tipoRedSocial, numST) VALUES (_id_tipoRedSocial, _numST);
            ELSE
                INSERT INTO t_restrs(id_tipoRedSocial, numST) VALUES (_id_tipoRedSocial, _numST);
            END IF;
        END//
DELIMITER ;

/*
11)  in_SolicitudEvento (Solo para el formulario: Eventos)
------------------------------------------------------------------------------
*/
DELIMITER //
    CREATE OR REPLACE PROCEDURE in_SolicitudEvento(
        IN _numST varchar(10),              /*Relación de la tabla t_solicitud*/
        IN _nombres VARCHAR(60),            /*Relación de la tabla t_solicitud*/
        IN _email VARCHAR(80),              /*Relación de la tabla t_solicitud*/
        IN _id_facDep int,                  /*Relación de la tabla t_solicitud*/
        IN _telefono VARCHAR(20),           /*Relación de la tabla t_solicitud*/
        IN _id_usuario int,                 /*Relación de la tabla t_usuario*/
        IN _id_unidad int,                  /*Relación de la tabla t_unidad*/
        IN _id_categoria int,               /*Relación de la tabla t_categoria*/
        IN _id_subCategoria int,            /*Relación de la tabla t_subcategoria*/
        IN _id_fase int,                    /*Relación de la tabla t_fase*/
        IN _fecha DATE,                     /*Relación de la tabla t_trasabilidad*/
        IN _comentario TEXT,                /*Relación de la tabla t_trasabilidad*/

        IN _nombreEvento varchar(100),      /*Relación de la tabla t_evento*/
        IN _lugar varchar(100),             /*Relación de la tabla t_evento*/
        IN _fechaInicio DATE,               /*Relación de la tabla t_evento*/
        IN _fechaFin DATE,                  /*Relación de la tabla t_evento*/
        IN _hora varchar(10),               /*Relación de la tabla t_evento*/
        IN _numTIC varchar(100),            /*Relación de la tabla t_evento*/
        IN _tipoWeb varchar(100),           /*Relación de la tabla t_evento*/
        IN _justificacionWeb TEXT,          /*Relación de la tabla t_evento*/
        IN _txtLineamientos TEXT,           /*Relación de la tabla t_evento*/
        IN _id_tipoEvento int               /*Relación de la tabla t_tipoevento*/

    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
            INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
            INSERT INTO t_evento(nombreEvento, lugar, fechaInicio, fechaFin, hora, numTIC, tipoWeb, justificacionWeb, txtLineamientos, id_tipoEvento, numST) VALUES (_nombreEvento, _lugar, _fechaInicio, _fechaFin, _hora, _numTIC, _tipoWeb, _justificacionWeb, _txtLineamientos, _id_tipoEvento, _numST);
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