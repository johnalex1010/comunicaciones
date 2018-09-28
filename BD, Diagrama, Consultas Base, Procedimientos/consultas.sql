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

	/*SELECCION DE ADJUNTOS DE ST - Tipo de solicitud: Email Institucionales*/
	SELECT
		S.numST,
	    S.nombre,
	    S.email,
	    S.telefono,
	    FD.facDep,
	    E.estado AS Estado,
	    TP.tipoSolicitud AS TipoSolicitud,
	    ADJ.adjunto AS Adjunto
	FROM t_solicitud AS S, t_adjunto AS ADJ, t_estado AS E, t_tiposolicitud AS TP, t_facdep AS FD WHERE S.numST=ADJ.numST AND S.id_facDep=FD.id_facDep AND S.id_estado=E.id_estado AND S.id_tipoSolicitud=TP.id_tipoSolicitud AND TP.id_tipoSolicitud=4

/*SELECCION DE ADJUNTOS DE ST - Tipo de solicitud: Email Institucionales con usuarios asignados*/
SELECT
	S.numST,
    S.nombre,
    S.email,
    S.telefono,
    U.usuario,
    FD.facDep,
    E.estado AS Estado,
    TP.tipoSolicitud AS TipoSolicitud,
    ADJ.adjunto AS Adjunto
FROM 
	t_solicitud AS S,
    t_usuario AS U,
    t_resusuario AS RS,
    t_adjunto AS ADJ,
    t_estado AS E,
    t_tiposolicitud AS TP,
    t_facdep AS FD
WHERE 
	S.numST=ADJ.numST
    AND S.id_facDep=FD.id_facDep
    AND S.id_estado=E.id_estado
    AND S.id_tipoSolicitud=TP.id_tipoSolicitud
    AND S.numST=RS.numST
    AND RS.id_usuario=U.id_usuario
    AND TP.id_tipoSolicitud=4
