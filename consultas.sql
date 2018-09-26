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
	/*PROCEDIMIETNO 1*/
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