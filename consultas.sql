/*CONSULTAS A LA BASE*/

	SELECT COUNT(*) from Information_Schema.Tables where TABLE_TYPE = 'BASE TABLE' and table_schema = 'bdcomunicaciones'; /*Contar cuantas tablas hay en la base de datos*/

	/*SELECCION DE SUBCATEGORIAS POR ID*/

	SELECT 
		S.id_subCategoria AS SUB,
	    C.id_categoria AS CAT,
	    U.id_unidad AS UNI
	FROM t_subcategoria AS S, t_categoria AS C, t_unidad AS U
	WHERE S.id_categoria=C.id_categoria AND C.id_unidad=U.id_unidad AND S.id_subCategoria='1'


	/*SELECCION DE SUBCATEGORIAS POR NOMBRES*/
	SELECT 
		S.subcategoria AS SUB,
	    C.categoria AS CAT,
	    U.nomUnidad AS UNI
	FROM t_subcategoria AS S, t_categoria AS C, t_unidad AS U
	WHERE S.id_categoria=C.id_categoria AND C.id_unidad=U.id_unidad AND S.id_subCategoria='1'

	/*SELECCION DE CATEGORIAS POR NOMBRES TRES TABLAS*/
	SELECT 
		S.subcategoria AS SUB,
	    C.categoria AS CAT,
	    U.nomUnidad AS UNI
	FROM t_subcategoria AS S, t_categoria AS C, t_unidad AS U
	WHERE S.id_categoria=C.id_categoria AND C.id_unidad=U.id_unidad AND C.id_categoria='6'


	/*SELECCION DE CATEGORIAS POR NOMBRES DOS TABLAS*/
	SELECT 
	    C.categoria AS CAT,
	    U.nomUnidad AS UNI
	FROM t_categoria AS C, t_unidad AS U
	WHERE C.id_unidad=U.id_unidad AND C.id_categoria='1'

	/*SELECCION DE SUBCATEGORIAS POR NOMBRES DOS TABLAS*/
	SELECT 
		S.subcategoria AS SUB,
	    C.categoria AS CAT
	FROM t_subcategoria AS S, t_categoria AS C
	WHERE S.id_categoria=C.id_categoria AND C.id_categoria='6'


/*PROCEDIMIENTOS ALMACENADOS*/
	/*PROCEDIMIETNO 1 CONSULTA*/
	DELIMITER //
	CREATE OR REPLACE PROCEDURE consultaprueba (IN idSubCat INT)
	BEGIN
	SELECT 
			S.id_subCategoria AS SUB,
		    C.id_categoria AS CAT,
		    U.id_unidad AS UNI
		FROM t_subcategoria AS S, t_categoria AS C, t_unidad AS U
		WHERE S.id_categoria=C.id_categoria AND C.id_unidad=U.id_unidad AND S.id_subCategoria=idSubCat;
	END//
	DELIMITER ;

	CALL consultaprueba(1); /*La forma de como llamar al procedimiento*/
	DROP PROCEDURE consultaprueba;  /*Eliminar el procedimiento*/


	/*PROCEDIMIETNO 2 INSERCCIÓN*/
	DELIMITER //
	CREATE OR REPLACE PROCEDURE insertPrueba (IN _numSol varchar(10), IN _nombres VARCHAR(50))
	BEGIN
	INSERT INTO t_solicitud(numST, nombre, email, faculDepen, telefono, id_estado, id_tipoSolicitud) VALUES (_numSol, _nombres, 'john@john.com', 'facultad', '3214548919', '5', '1');
	END//
	DELIMITER ;

	CALL insertPrueba(1,2); /*La forma de como llamar al procedimiento*/
	DROP PROCEDURE insertPrueba;  /*Eliminar el procedimiento*/

	/*PROCEDIMIETNO 3 UPDATE*/
	DELIMITER //
	CREATE OR REPLACE PROCEDURE updatePrueba (IN _nombres VARCHAR(50))
	BEGIN
	UPDATE t_solicitud SET nombre = _nombres WHERE numST = 'ST001';
	END//
	DELIMITER ;

	CALL updatePrueba("KAREN"); /*La forma de como llamar al procedimiento*/
	DROP PROCEDURE updatePrueba;  /*Eliminar el procedimiento*/


	