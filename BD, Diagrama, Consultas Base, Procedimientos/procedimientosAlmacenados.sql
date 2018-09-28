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



/*
======
INSERT
======
*/

/*PRCEDIMIENTO DE: INSERT SOLICITUD DE ENVIO DE CORREOS INSTITUCIONALES*/
DELIMITER //
CREATE OR REPLACE PROCEDURE in_EmailInsitucional (
	IN _numST varchar(10), 				/*Relación de la tabla t_solicitud*/
	IN _nombres VARCHAR(60), 			/*Relación de la tabla t_solicitud*/
	IN _email VARCHAR(80), 				/*Relación de la tabla t_solicitud*/
	IN _id_facDep int, 			/*Relación de la tabla t_solicitud*/
	IN _telefono VARCHAR(20), 			/*Relación de la tabla t_solicitud*/
	IN _id_estado int, 					/*Relación de la tabla t_estado*/
	IN _id_usuario int, 				/*Relación de la tabla t_usuario*/
	IN _id_tipoSolicitud int, 			/*Relación de la tabla t_tipoSolicitud*/
	IN _adjunto VARCHAR(30) 			/*Relación de la tabla t_adjunto*/
)
BEGIN
INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono, id_estado, id_tipoSolicitud) VALUES (_numST, _nombres, _email, _id_facDep, _telefono, _id_estado, _id_tipoSolicitud);
INSERT INTO t_adjunto(numST, adjunto) VALUES (_numST, _adjunto);
INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
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