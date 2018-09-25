/*
========================================================
BASE de CREACIÓN DE LA BASE DATOS DE SOLICITUDES DE COMUNICIONES
========================================================
*/
CREATE DATABASE bdComunicaciones;
USE bdComunicaciones;
/*CREACION DE TABLAS*/
	/*--Tabla de estado*/
	CREATE TABLE t_estado (
		id_estado int NOT NULL AUTO_INCREMENT,
		estado varchar(50) NOT NULL,
		PRIMARY KEY (id_estado)
	);

	/*--Tabla Unidad*/
	CREATE TABLE t_unidad(
		id_unidad int NOT NULL AUTO_INCREMENT,
		nomUnidad varchar(50) NOT NULL,
		PRIMARY KEY (id_unidad)
	);

	/*--Tabla PublicoObjetivo*/
	CREATE TABLE t_objPublico (
		id_objPublico int NOT NULL AUTO_INCREMENT,
		listPublico varchar(30) NOT NULL,
		PRIMARY KEY (id_objPublico)
	);

	/*--Tabla Permisos de usuario*/
	CREATE TABLE t_permiso (
		id_permiso int NOT NULL AUTO_INCREMENT,
		permiso varchar(30) NOT NULL,
		c int NOT NULL,
		r int NOT NULL,
		u int NOT NULL,
		d int NOT NULL,
		PRIMARY KEY (id_permiso)
	);

	/*--Tabla Piezas digitales*/
	CREATE TABLE t_piezaDig(
		id_piezaDig int NOT NULL AUTO_INCREMENT,
		listPiezaDig varchar(20) NOT NULL,
		PRIMARY KEY (id_piezaDig)
	);

	/*--Tabla Piezas Impresas*/
	CREATE TABLE t_piezaImp (
		id_piezaImp int NOT NULL AUTO_INCREMENT,
		listPiezaImp varchar(30) NOT NULL,
		PRIMARY KEY (id_piezaImp)
	);

	/*--Tabla Medidas Impresas*/
	CREATE TABLE t_medidaImp (
		id_medidaImp int NOT NULL AUTO_INCREMENT,
		listMedidaImp varchar(30) NOT NULL,
		PRIMARY KEY (id_medidaImp)
	);

	/*--Tabla Acabados en Impresos*/
	CREATE TABLE t_acabadoImp (
		id_acabadoImp int NOT NULL AUTO_INCREMENT,
		listAcabadoImp varchar(30) NOT NULL,
		PRIMARY KEY (id_acabadoImp)
	);

	/*--Tabla Papel impreso*/
	CREATE TABLE t_papelImp (
		id_papelImp int NOT NULL AUTO_INCREMENT,
		listPapelImp varchar(30) NOT NULL,
		PRIMARY KEY (id_papelImp)
	);

	/*--Tabla Fases para mostrar al cliente*/
	CREATE TABLE t_fase (
		id_fase int NOT NULL AUTO_INCREMENT,
		fase varchar(50) NOT NULL,
		PRIMARY KEY (id_fase)
	);

	/*--Tabla Tipo de evento*/
	CREATE TABLE t_tipoEvento (
		id_tipoEvento int NOT NULL AUTO_INCREMENT,
		tipoEvento varchar(30) NOT NULL,
		PRIMARY KEY (id_tipoEvento)
	);

	/*--Tabla Tipo de red social*/
	CREATE TABLE t_tipoRedSocial (
		id_tipoRedSocial int NOT NULL AUTO_INCREMENT,
		redSocial varchar(30) NOT NULL,
		PRIMARY KEY (id_tipoRedSocial)
	);
	
	/*--Tablas de opcAudiovisual para eventos y campañas*/
	CREATE TABLE t_audioVisual (
		id_audioVisual int NOT NULL AUTO_INCREMENT,
		listAudioVisual varchar(50) NOT NULL,
		PRIMARY KEY (id_audioVisual)
	);

	/*--Tabla Madre*/	
	CREATE TABLE t_solicitud (
		id_solicitud int NOT NULL AUTO_INCREMENT,
		numST varchar(10) NOT NULL UNIQUE,
		nombre varchar(60) NOT NULL,
		email varchar(80) NOT NULL,
		faculDepen varchar(80) NOT NULL,
		telefono varchar(20) NOT NULL,
		id_estado int NOT NULL, /*Es FOREIGN KEY de la tabla t_estado*/
		PRIMARY KEY (id_solicitud),
		FOREIGN KEY (id_estado) REFERENCES t_estado(id_estado)
	);

	/*--Tabla Categoria*/	
	CREATE TABLE t_categoria(
		id_categoria int NOT NULL AUTO_INCREMENT,
		categoria varchar(20) NOT NULL,
		id_unidad int NOT NULL, /*Es FOREIGN KEY de la tabla t_permiso*/
		PRIMARY KEY (id_categoria),
		FOREIGN KEY (id_unidad) REFERENCES t_unidad(id_unidad)
	);

	/*--Tabla SubCategoria*/	
	CREATE TABLE t_subCategoria(
		id_subCategoria int NOT NULL AUTO_INCREMENT,
		subCategoria varchar(20) NOT NULL,
		id_categoria int NOT NULL, /*Es FOREIGN KEY de la tabla t_permiso*/
		PRIMARY KEY (id_subCategoria),
		FOREIGN KEY (id_categoria) REFERENCES t_categoria(id_categoria)
	);
	/*--Tablas de Unidad, categorias y subcategorias*/	
	CREATE TABLE t_resUnidad(
		id_resUnidad int NOT NULL AUTO_INCREMENT,
		id_unidad int NOT NULL, /*Es FOREIGN KEY de la tabla t_unidad*/
		id_categoria int NOT NULL, /*Es FOREIGN KEY de la tabla t_categoria*/
		id_subCategoria int NOT NULL, /*Es FOREIGN KEY de la tabla t_subCategoria*/
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_resUnidad),
		FOREIGN KEY (id_unidad) REFERENCES t_unidad(id_unidad),
		FOREIGN KEY (id_categoria) REFERENCES t_categoria(id_categoria),
		FOREIGN KEY (id_subCategoria) REFERENCES t_subCategoria(id_subCategoria),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*--Tablas de resultado de publico objetivo y publico objetivo*/
	CREATE TABLE t_resObjPublico(
		id_resObjPublico int NOT NULL AUTO_INCREMENT,
		id_objPublico int NOT NULL, /*Es FOREIGN KEY de la tabla t_objPublico*/
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_resObjPublico),
		FOREIGN KEY (id_objPublico) REFERENCES t_objPublico(id_objPublico),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*--Tablas de  usuarios */
	CREATE TABLE t_usuario(
		id_usuario int NOT NULL AUTO_INCREMENT,
		usuario varchar(20) NOT NULL,
		id_permiso int NOT NULL, /*Es FOREIGN KEY de la tabla t_permiso*/
		PRIMARY KEY (id_usuario),
		FOREIGN KEY (id_permiso) REFERENCES t_permiso(id_permiso)
	);

	/*--Tablas de  usuarios y permisos*/
	CREATE TABLE t_resUsuario(
		id_resUsuario int NOT NULL AUTO_INCREMENT,
		id_usuario int NOT NULL, /*Es FOREIGN KEY de la tabla t_usuario*/
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_resUsuario),
		FOREIGN KEY (id_usuario) REFERENCES t_usuario(id_usuario),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);	

	/*--Tabla de adjuntos*/
	CREATE TABLE t_adjunto(
		id_adjunto int NOT NULL AUTO_INCREMENT,
		adjunto varchar(20) NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_adjunto),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*--Tabla de color*/
	CREATE TABLE t_color(
		id_color int NOT NULL AUTO_INCREMENT,
		color varchar(20) NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_color),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*--Tablas de piezas digitales*/
	CREATE TABLE t_resPiezaDig(
		id_resPiezaDig int NOT NULL AUTO_INCREMENT,
		id_piezaDig int NOT NULL, /*Es FOREIGN KEY de la tabla t_piezaDig*/
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_resPiezaDig),
		FOREIGN KEY (id_piezaDig) REFERENCES t_piezaDig(id_piezaDig),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);
	
	/*--Tablas de piezas impresas*/
	CREATE TABLE t_resPiezaImp(
		id_resPiezaImp int NOT NULL AUTO_INCREMENT,
		id_piezaImp int NOT NULL, /*Es FOREIGN KEY de la tabla t_piezaImp*/
		id_medidaImp int NOT NULL, /*Es FOREIGN KEY de la tabla t_medidaImp*/
		id_acabadoImp int NOT NULL, /*Es FOREIGN KEY de la tabla t_acabadoImp*/
		id_papelImp int NOT NULL, /*Es FOREIGN KEY de la tabla t_papelImp*/
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_resPiezaImp),
		FOREIGN KEY (id_piezaImp) REFERENCES t_piezaImp(id_piezaImp),
		FOREIGN KEY (id_medidaImp) REFERENCES t_medidaImp(id_medidaImp),
		FOREIGN KEY (id_acabadoImp) REFERENCES t_acabadoImp(id_acabadoImp),
		FOREIGN KEY (id_papelImp) REFERENCES t_papelImp(id_papelImp),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*--Tablas de requerimiento Audiovisual en Evento y/o Campañas*/
	CREATE TABLE t_resAudioVisual(
		id_resAudiovisual int NOT NULL AUTO_INCREMENT,
		id_audiovisual int NOT NULL, /*Es FOREIGN KEY de la tabla t_audioVisual*/
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_resAudiovisual),
		FOREIGN KEY (id_audioVisual) REFERENCES t_audioVisual(id_audioVisual),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);
	
	/*--Tablas de trasibilidad*/
	CREATE TABLE t_trasabilidad(
		id_trasabilidad int NOT NULL AUTO_INCREMENT,
		id_fase int NOT NULL, /*Es FOREIGN KEY de la tabla t_fase*/
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		fecha DATETIME, /*Guarda fecha y hora*/
		PRIMARY KEY (id_trasabilidad),
		FOREIGN KEY (id_fase) REFERENCES t_fase(id_fase),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*--Tablas de eventos*/
	CREATE TABLE t_evento (
		id_evento int NOT NULL AUTO_INCREMENT,		
		nombrEvento varchar(100) NOT NULL,
		lugar varchar(100) NOT NULL,
		fechaInicio DATE NOT NULL,
		fechaFin DATE NOT NULL,
		hora varchar(10) NOT NULL,
		numTIC varchar(100) NOT NULL,
		tipoWeb varchar(100) NOT NULL,
		justificacionWeb TEXT NOT NULL,
		txtLineamientos TEXT NOT NULL,
		id_tipoEvento int NOT NULL, /*Es FOREIGN KEY de la tabla t_tipo*/
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_evento),
		FOREIGN KEY (id_tipoEvento) REFERENCES t_tipoEvento(id_tipoEvento),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Campañas*/
	CREATE TABLE t_campania (
		id_campania int NOT NULL AUTO_INCREMENT,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_campania),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Aprobación de material*/
	CREATE TABLE t_aprobMate (
		id_aprobMate int NOT NULL AUTO_INCREMENT,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_aprobMate),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tabla de condolencias*/
	CREATE TABLE t_condolencias (
		id_condolencias int NOT NULL AUTO_INCREMENT,
		nombreDoliente varchar(100) NOT NULL,
		nombreFallecido varchar(100) NOT NULL,
		parentesco varchar(100) NOT NULL,
		FacDep varchar(100) NOT NULL,
		lugarVelacion varchar(100) NOT NULL,
		fechaVelacion DATE NOT NULL,
		horaVelacion time NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_condolencias),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tabla de tarjetas conmemorativas (Ej: Día del madre)*/
	CREATE TABLE t_tarjetas (
		id_tarjetas int NOT NULL AUTO_INCREMENT,
		nombreTarjeta varchar(100) NOT NULL,
		fechaTarjeta DATE NOT NULL,
		mensaje TEXT NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_tarjetas),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Sitios Web: Nuevos Sitios*/
	CREATE TABLE t_newWeb (
		id_newWeb int NOT NULL AUTO_INCREMENT,
		nombreWeb varchar(100) NOT NULL,
		subdominio varchar(100) NOT NULL,
		justificacion TEXT NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_newWeb),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Sitios Web: Ajustes*/
	CREATE TABLE t_ajusteWeb (
		id_ajusteWeb int NOT NULL AUTO_INCREMENT,
		urlAjuste varchar(200) NOT NULL,
		descripciion TEXT NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_ajusteWeb),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Sitios Web: Desarrrollo aplicaciones*/
	CREATE TABLE t_desarrolloWeb (
		id_desarrolloWeb int NOT NULL AUTO_INCREMENT,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_desarrolloWeb),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Sitios Web: Capacitaciones*/
	CREATE TABLE t_capacitacionWeb (
		id_capacitacionWeb int NOT NULL AUTO_INCREMENT,
		nomPersona varchar(100) NOT NULL,
		telefonoExt varchar(20) NOT NULL,
		numCelular varchar(10) NOT NULL,
		email varchar(100) NOT NULL,
		fechaHoraCW DATE NOT NULL,
		txtMotivo TEXT NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_capacitacionWeb),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Community Manager Asesorias*/
	CREATE TABLE t_asesoriaCM (
		id_asesoriaCM int NOT NULL AUTO_INCREMENT,
		tema varchar(200) NOT NULL,
		lugar varchar(50) NOT NULL,
		fechaHoraACM DATE NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_asesoriaCM),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Community Manager Campañas*/
	CREATE TABLE t_campaniasCM (
		id_campaniasCM int NOT NULL AUTO_INCREMENT,
		nombreCam varchar(200) NOT NULL,
		justificacion TEXT NOT NULL,
		objetivo TEXT NOT NULL,
		fechaHoraIni DATE NOT NULL,
		fechaHoraFin DATE NOT NULL,
		palabrasClaves TEXT NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_campaniasCM),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	/*Tablas de Community Manager Crear Redes*/
	CREATE TABLE t_creaRedesCM (
		id_creaRedesCM int NOT NULL AUTO_INCREMENT,
		nomPerfil varchar(200) NOT NULL,
		emailPersonal varchar(50) NOT NULL,
		descripcion TEXT NOT NULL,
		direccion varchar(50) NOT NULL,
		id_solicitud int NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_creaRedesCM),
		FOREIGN KEY (id_solicitud) REFERENCES t_solicitud(id_solicitud)
	);

	CREATE TABLE t_resTRS (
		id_resTRS int NOT NULL AUTO_INCREMENT,
		id_creaRedesCM int NOT NULL, /*Es FOREIGN KEY de la tabla t_creaRedesCM*/
		id_tipoRedSocial int NOT NULL, /*Es FOREIGN KEY de la tabla t_tipoRedSocial*/
		PRIMARY KEY (id_resTRS),
		FOREIGN KEY (id_creaRedesCM) REFERENCES t_creaRedesCM(id_creaRedesCM),
		FOREIGN KEY (id_tipoRedSocial) REFERENCES t_tipoRedSocial(id_tipoRedSocial)
	);
	

/*INSERT A LAS TABLAS*/
	/*--t_unidad*/
	INSERT INTO t_unidad VALUES
	(1, "Comunicaciones Institucionales"),
	(2, "Medios Audiovisuales"),
	(3, "Unidad Digital");

	/*--t_categoria*/
	INSERT INTO t_categoria VALUES
	(1, "Eventos", 1),
	(2, "Campañas", 1),
	(3, "Comunicaciones Internas", 1),
	(4, "Aprobación", 1),
	(5, "Web Site", 3),
	(6, "Community Manager", 3);

	/*--t_subCategoria*/
	INSERT INTO t_subCategoria VALUES
	(1, "Circulares", 3),
	(2, "Tomás Noticias", 3),
	(3, "Condolencias", 3),
	(4, "Cumpleaños", 3),
	(5, "Tarjetas", 3),
	(6, "Nuevo Sitio Web", 5),
	(7, "Ajuste Web", 5),
	(8, "Desarrrollo Aplicaciones Web", 5),
	(9, "Capacitación Web", 5),
	(10, "Creación Redes Sociales", 6),
	(11, "Campañas Redes Sociales", 6),
	(12, "Asesorias Redes Sociales", 6);

	/*--t_fase*/
	INSERT INTO t_fase VALUES
	(1, "En desarrrollo"),
	(2, "Aprobación por parte del cliente"),
	(3, "Finalización y entrega de material");

	/*--t_estado*/
	INSERT INTO t_estado VALUES
	(1, "Realizado"),
	(2, "En espera de aprobación por parte del cliente"),
	(3, "No aprobado"),
	(4, "No realizado"),
	(5, "Sin asignación de usuarios");

	/*--t_objPublico*/
	INSERT INTO t_objPublico VALUES
	(1, "Estudiantes de pregrado"),
	(2, "Estudiantes de posgrado"),
	(3, "Docentes"),
	(4, "Colaboradores administrativos"),
	(5, "Egresados"),
	(6, "Directivos");

	/*--t_tipoEvento*/
	INSERT INTO t_tipoEvento VALUES
	(1, "Tipo Evento 1"),
	(2, "Tipo Evento 2"),
	(3, "Tipo Evento 3"),
	(4, "Tipo Evento 4"),
	(5, "Tipo Evento 5"),
	(6, "Tipo Evento 6");

	/*--t_piezaDig*/
	INSERT INTO t_piezaDig VALUES
	(1, "Tipo Pieza Digital 1"),
	(2, "Tipo Pieza Digital 2");

	/*--t_piezaImp*/
	INSERT INTO t_piezaImp VALUES
	(1, "Tipo Pieza Impresa 1"),
	(2, "Tipo Pieza Impresa 2");

	/*--t_medidaImp*/
	INSERT INTO t_medidaImp VALUES
	(1, "Tipo Medida Impresa 1"),
	(2, "Tipo Medida Impresa 2");

	/*--t_acabadoImp*/
	INSERT INTO t_acabadoImp VALUES
	(1, "Tipo Acabado Impresa 1"),
	(2, "Tipo Acabado Impresa 2");

	/*--t_papelImp*/
	INSERT INTO t_papelImp VALUES
	(1, "Tipo Papel Impresa 1"),
	(2, "Tipo Papel Impresa 2");

	/*--t_permiso*/
	INSERT INTO t_permiso VALUES
	(1, "Super administrador", 1 , 1 , 1, 1),
	(2, "Administrador", 1, 1 , 1 , 0),
	(3, "Colaborador", 0 , 1 , 1, 0);

	/*--t_usuario*/
	INSERT INTO t_usuario VALUES
	(1, "johnalex1010", 1),
	(2, "joselubo51", 1),
	(3, "nivelAdmin", 2),
	(4, "basicoUser", 3);

	/*--t_tipoRedSocial*/
	INSERT INTO t_tipoRedSocial VALUES
	(1, "Facebook"),
	(2, "Instagram"),
	(3, "Twitter");

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