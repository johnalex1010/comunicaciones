/*
========================================================
CREACIÓN DE LA BASE DATOS DE SOLICITUDES DE COMUNICIONES
========================================================
*/
CREATE DATABASE IF NOT EXISTS bdComunicaciones;
USE bdComunicaciones;
/*CREACION DE TABLAS*/

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
	
	/*--Tabla de opcAudiovisual para eventos y campañas*/
	CREATE TABLE t_audioVisual (
		id_audioVisual int NOT NULL AUTO_INCREMENT,
		listAudioVisual varchar(50) NOT NULL,
		PRIMARY KEY (id_audioVisual)
	);

	/*--Tabla de Listado de Facultades/Depenencias*/
	CREATE TABLE t_facDep (
		id_facDep int NOT NULL AUTO_INCREMENT,
		facDep varchar(80) NOT NULL,
		PRIMARY KEY (id_facDep)
	);
	/*--Tabla de Listado de Cargos*/
	CREATE TABLE t_cargo (
		id_cargo int NOT NULL AUTO_INCREMENT,
		cargo varchar(30) NOT NULL,
		PRIMARY KEY (id_cargo)
	);

	/*--Tabla Madre*/	
	CREATE TABLE t_solicitud (
		numST varchar(10) NOT NULL UNIQUE,
		nombre varchar(60) NOT NULL,
		email varchar(80) NOT NULL,
		id_facDep int NOT NULL, /*Es FOREIGN KEY de la tabla t_facDep*/
		telefono varchar(20) NOT NULL,
		PRIMARY KEY (numST),
		FOREIGN KEY (id_facDep) REFERENCES t_facDep(id_facDep)
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
		subCategoria varchar(50) NOT NULL,
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
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_resUnidad),
		FOREIGN KEY (id_unidad) REFERENCES t_unidad(id_unidad),
		FOREIGN KEY (id_categoria) REFERENCES t_categoria(id_categoria),
		FOREIGN KEY (id_subCategoria) REFERENCES t_subCategoria(id_subCategoria),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*--Tablas de resultado de publico objetivo y publico objetivo*/
	CREATE TABLE t_resObjPublico(
		id_resObjPublico int NOT NULL AUTO_INCREMENT,
		id_objPublico int NOT NULL, /*Es FOREIGN KEY de la tabla t_objPublico*/
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varios Público Objetivo*/
		PRIMARY KEY (id_resObjPublico),
		FOREIGN KEY (id_objPublico) REFERENCES t_objPublico(id_objPublico),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*--Tablas de  usuarios */
	CREATE TABLE t_usuario(
		id_usuario int NOT NULL AUTO_INCREMENT,
		usuario varchar(30) NOT NULL UNIQUE,
		password varchar(80) NOT NULL,
		nombres varchar(30) NOT NULL,
		apellido varchar(30) NOT NULL,
		email varchar(30) NOT NULL,
		id_cargo int NOT NULL,
		id_permiso int NOT NULL, /*Es FOREIGN KEY de la tabla t_permiso*/
		PRIMARY KEY (id_usuario),
		FOREIGN KEY (id_cargo) REFERENCES t_cargo(id_cargo),
		FOREIGN KEY (id_permiso) REFERENCES t_permiso(id_permiso)
	);

	/*--Tablas de  usuarios y permisos frente a la solicitud*/
	CREATE TABLE t_resUsuario(
		id_resUsuario int NOT NULL AUTO_INCREMENT,
		id_usuario int NOT NULL, /*Es FOREIGN KEY de la tabla t_usuario*/
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varios Usuarios a una misma  ST*/
		PRIMARY KEY (id_resUsuario),
		FOREIGN KEY (id_usuario) REFERENCES t_usuario(id_usuario),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);	

	/*--Tabla de adjuntos*/
	CREATE TABLE t_adjunto(
		id_adjunto int NOT NULL AUTO_INCREMENT,
		adjunto varchar(30) NOT NULL,
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varios Adjuntos para uns unica ST*/
		PRIMARY KEY (id_adjunto),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*--Tabla de color*/
	CREATE TABLE t_color(
		id_color int NOT NULL AUTO_INCREMENT,
		color varchar(20) NOT NULL,
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varios Colores(3) para uns unica ST*/
		PRIMARY KEY (id_color),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*--Tabla de cubrimiento*/
	CREATE TABLE t_cubrimiento(
		id_cubrimiento int NOT NULL AUTO_INCREMENT,
		tipoCubrimiento varchar(50) NOT NULL,
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varios Colores(3) para uns unica ST*/
		PRIMARY KEY (id_cubrimiento),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*--Tabla de requerimientoWeb*/
	CREATE TABLE t_requerimientoWeb(
		id_requerimientoWeb int NOT NULL AUTO_INCREMENT,
		tipoWeb varchar(20) NOT NULL,
		justificacionWeb TEXT NOT NULL,
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varios Colores(3) para uns unica ST*/
		PRIMARY KEY (id_requerimientoWeb),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*--Tablas de piezas digitales*/
	CREATE TABLE t_resPiezaDig(
		id_resPiezaDig int NOT NULL AUTO_INCREMENT,
		id_piezaDig int NOT NULL, /*Es FOREIGN KEY de la tabla t_piezaDig*/
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser  varias piezas digitales para una unica ST*/
		PRIMARY KEY (id_resPiezaDig),
		FOREIGN KEY (id_piezaDig) REFERENCES t_piezaDig(id_piezaDig),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);
	
	/*--Tablas de piezas impresas*/
	CREATE TABLE t_resPiezaImp(
		id_resPiezaImp int NOT NULL AUTO_INCREMENT,
		id_piezaImp int NOT NULL, /*Es FOREIGN KEY de la tabla t_piezaImp*/
		id_medidaImp int NOT NULL, /*Es FOREIGN KEY de la tabla t_medidaImp*/
		id_acabadoImp int NOT NULL, /*Es FOREIGN KEY de la tabla t_acabadoImp*/
		id_papelImp int NOT NULL, /*Es FOREIGN KEY de la tabla t_papelImp*/
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varias piezas impresas para una unica ST*/
		PRIMARY KEY (id_resPiezaImp),
		FOREIGN KEY (id_piezaImp) REFERENCES t_piezaImp(id_piezaImp),
		FOREIGN KEY (id_medidaImp) REFERENCES t_medidaImp(id_medidaImp),
		FOREIGN KEY (id_acabadoImp) REFERENCES t_acabadoImp(id_acabadoImp),
		FOREIGN KEY (id_papelImp) REFERENCES t_papelImp(id_papelImp),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*--Tablas de requerimiento Audiovisual en Evento y/o Campañas*/
	CREATE TABLE t_resAudioVisual(
		id_resAudiovisual int NOT NULL AUTO_INCREMENT,
		id_audiovisual int NOT NULL, /*Es FOREIGN KEY de la tabla t_audioVisual*/
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varios requerimientos audiovisuales para una unica ST*/
		PRIMARY KEY (id_resAudiovisual),
		FOREIGN KEY (id_audioVisual) REFERENCES t_audioVisual(id_audioVisual),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);
	
	/*--Tablas de trasibilidad*/
	CREATE TABLE t_trasabilidad(
		id_trasabilidad int NOT NULL AUTO_INCREMENT,
		id_fase int NOT NULL, /*Es FOREIGN KEY de la tabla t_fase*/
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unica porque se debe llevar una trasabilidad sobre la ST*/
		fecha DATE, /*Guarda fecha y hora*/
		comentario TEXT NOT NULL,
		id_usuario int NOT NULL, /*Es FOREIGN KEY de la tabla t_usuario*/
		PRIMARY KEY (id_trasabilidad),
		FOREIGN KEY (id_fase) REFERENCES t_fase(id_fase),
		FOREIGN KEY (id_usuario) REFERENCES t_usuario(id_usuario),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*--Tablas de eventos*/
	CREATE TABLE t_evento (
		id_evento int NOT NULL AUTO_INCREMENT,
		id_tipoEvento int NOT NULL, /*Es FOREIGN KEY de la tabla t_tipo*/
		nombreEvento varchar(100) NOT NULL,
		lugar varchar(100) NOT NULL,
		fechaInicio DATE NOT NULL,
		fechaFin DATE NOT NULL,
		hora varchar(10) NOT NULL,
		numTIC varchar(100) NOT NULL,
		txtLineamientos TEXT NOT NULL,		
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_evento),
		FOREIGN KEY (id_tipoEvento) REFERENCES t_tipoEvento(id_tipoEvento),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tablas de Campañas*/
	CREATE TABLE t_campania (
		id_campania int NOT NULL AUTO_INCREMENT,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_campania),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tablas de Aprobación de material*/
	CREATE TABLE t_aprobMate (
		id_aprobMate int NOT NULL AUTO_INCREMENT,
		nomAprobacion varchar(100) NOT NULL,
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud == No es unico porque pueden ser varios materiales para aprobación sobre la ST*/
		PRIMARY KEY (id_aprobMate),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tabla de condolencias*/
	CREATE TABLE t_condolencias (
		id_condolencias int NOT NULL AUTO_INCREMENT,
		nombreDoliente varchar(100) NOT NULL,
		cargoDoliente varchar(50) NOT NULL,
		id_facDep int NOT NULL,  /*Es FOREIGN KEY de la tabla t_facDep*/
		nombreFallecido varchar(100) NOT NULL,
		parentesco varchar(100) NOT NULL,		
		lugarVelacion varchar(100) NOT NULL,
		fechaVelacion DATE NOT NULL,
		horaVelacion time NOT NULL,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_condolencias),
		FOREIGN KEY (id_facDep) REFERENCES t_facDep(id_facDep),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tabla de tarjetas conmemorativas (Ej: Día del madre)*/
	CREATE TABLE t_tarjetas (
		id_tarjetas int NOT NULL AUTO_INCREMENT,
		nombreTarjeta varchar(100) NOT NULL,
		fechaTarjeta DATE NOT NULL,
		mensaje TEXT NOT NULL,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_tarjetas),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tablas de Sitios Web: Nuevos Sitios*/
	CREATE TABLE t_newWeb (
		id_newWeb int NOT NULL AUTO_INCREMENT,
		nombreWeb varchar(100) NOT NULL,
		subdominio varchar(100) NOT NULL,
		justificacion TEXT NOT NULL,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_newWeb),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tablas de Sitios Web: Ajustes*/
	CREATE TABLE t_ajusteWeb (
		id_ajusteWeb int NOT NULL AUTO_INCREMENT,
		urlAjuste varchar(200) NOT NULL,
		descripcion TEXT NOT NULL,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_ajusteWeb),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tablas de Sitios Web: Desarrrollo aplicaciones*/
	CREATE TABLE t_desarrolloWeb (
		id_desarrolloWeb int NOT NULL AUTO_INCREMENT,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_desarrolloWeb),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tablas de Sitios Web: Capacitaciones*/
	CREATE TABLE t_capacitacionWeb (
		id_capacitacionWeb int NOT NULL AUTO_INCREMENT,
		nomPersona varchar(100) NOT NULL,
		telefonoExt varchar(20) NOT NULL,
		numCelular varchar(10) NOT NULL,
		emailCapa varchar(100) NOT NULL,
		fechaCW DATE NOT NULL,
		horaCW time NOT NULL,
		txtMotivo TEXT NOT NULL,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_capacitacionWeb),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tablas de Community Manager Asesorias*/
	CREATE TABLE t_asesoriaCM (
		id_asesoriaCM int NOT NULL AUTO_INCREMENT,
		tema varchar(200) NOT NULL,
		lugar varchar(50) NOT NULL,
		fechaACM DATE NOT NULL,
		horaACM time NOT NULL,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_asesoriaCM),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
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
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_campaniasCM),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	/*Tablas de Community Manager Crear Redes*/
	CREATE TABLE t_creaRedesCM (
		id_creaRedesCM int NOT NULL AUTO_INCREMENT,
		nomPerfil varchar(200) NOT NULL,
		emailPersonal varchar(50) NOT NULL,
		descripcion TEXT NOT NULL,
		direccion varchar(50) NOT NULL,
		telPerfil varchar(10) NOT NULL,
		emailPerfil varchar(100) NOT NULL,
		numST varchar(10) NOT NULL UNIQUE, /*Es FOREIGN KEY de la tabla t_solicitud*/
		PRIMARY KEY (id_creaRedesCM),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
	);

	CREATE TABLE t_resTRS (
		id_resTRS int NOT NULL AUTO_INCREMENT,
		id_tipoRedSocial int NOT NULL, /*Es FOREIGN KEY de la tabla t_tipoRedSocial*/
		numST varchar(10) NOT NULL, /*Es FOREIGN KEY de la tabla t_solicitud =  No es unico porque puede crear varia redes sociales*/
		PRIMARY KEY (id_resTRS),
		FOREIGN KEY (id_tipoRedSocial) REFERENCES t_tipoRedSocial(id_tipoRedSocial),
		FOREIGN KEY (numST) REFERENCES t_solicitud(numST)
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
	(4, "Aprobaciones", 1),
	(5, "Web Site", 3),
	(6, "Community Manager", 3);

	/*--t_subCategoria*/
	INSERT INTO t_subCategoria VALUES
	(1, "Envío de correos Institucionales", 3),
	(2, "Tomás Noticias", 3),
	(3, "Condolencias", 3),
	(4, "Cumpleaños", 3),
	(5, "Tarjetas conmemorativas", 3),
	(6, "Nuevo Sitio Web", 5),
	(7, "Ajuste Web", 5),
	(8, "Desarrrollo Aplicaciones Web", 5),
	(9, "Capacitación Web", 5),
	(10, "Creación Redes Sociales", 6),
	(11, "Campañas Redes Sociales", 6),
	(12, "Asesorias Community Manager", 6),
	(13, "Aprobación de material", 3),
	(14, "Evento", 1);

	/*--t_fase*/
	INSERT INTO t_fase VALUES
	(1, "En desarrrollo"),
	(2, "Aprobación por parte del cliente"),
	(3, "Finalización y entrega de material");

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
	(2, "Tipo Pieza Digital 2"),
	(3, "Tipo Pieza Digital 3"),
	(4, "Tipo Pieza Digital 4"),
	(5, "Tipo Pieza Digital 5"),
	(6, "Tipo Pieza Digital 6"),
	(7, "Tipo Pieza Digital 7"),
	(8, "Tipo Pieza Digital 8");

	/*--t_piezaImp*/
	INSERT INTO t_piezaImp VALUES
	(1, "Tipo Pieza Impresa 1"),
	(2, "Tipo Pieza Impresa 2"),
	(3, "Tipo Pieza Impresa 3"),
	(4, "Tipo Pieza Impresa 4"),
	(5, "Tipo Pieza Impresa 5"),
	(6, "Tipo Pieza Impresa 6"),
	(7, "Tipo Pieza Impresa 7"),
	(8, "Tipo Pieza Impresa 8");

	/*--t_medidaImp*/
	INSERT INTO t_medidaImp VALUES
	(1, "Tipo Medida Impresa 1"),
	(2, "Tipo Medida Impresa 2"),
	(3, "Tipo Medida Impresa 3"),
	(4, "Tipo Medida Impresa 4"),
	(5, "Tipo Medida Impresa 5"),
	(6, "Tipo Medida Impresa 6"),
	(7, "Tipo Medida Impresa 7"),
	(8, "Tipo Medida Impresa 8");

	/*--t_acabadoImp*/
	INSERT INTO t_acabadoImp VALUES
	(1, "Tipo Acabados Impresa 1"),
	(2, "Tipo Acabados Impresa 2"),
	(3, "Tipo Acabados Impresa 3"),
	(4, "Tipo Acabados Impresa 4"),
	(5, "Tipo Acabados Impresa 5"),
	(6, "Tipo Acabados Impresa 6"),
	(7, "Tipo Acabados Impresa 7"),
	(8, "Tipo Acabados Impresa 8");

	/*--t_papelImp*/
	INSERT INTO t_papelImp VALUES
	(1, "Tipo Papel Impresa 1"),
	(2, "Tipo Papel Impresa 2"),
	(3, "Tipo Papel Impresa 3"),
	(4, "Tipo Papel Impresa 4"),
	(5, "Tipo Papel Impresa 5"),
	(6, "Tipo Papel Impresa 6"),
	(7, "Tipo Papel Impresa 7"),
	(8, "Tipo Papel Impresa 8");

	/*--t_permiso*/
	INSERT INTO t_permiso VALUES
	(1, "Super administrador", 1 , 1 , 1, 1),
	(2, "Administrador", 1, 1 , 1 , 0),
	(3, "Colaborador", 0 , 1 , 1, 0),
	(4, "No Valido", 0 , 0 , 0, 0);

	/*--t_cargo*/
	INSERT INTO t_cargo VALUES
	(1, "Sin cargo"),
	(2, "Web Master"),
	(3, "Profesional Soporte Web");

	/*--t_usuario*/
	INSERT INTO t_usuario VALUES
	(1, "nousuario", "nousuario", "No Soy Usuario Valido", "No valido", "usu@usu.co", 1, 4),
	(2, "johnalex1010", "millos", "John Alexander", "Fandiño Rojas", "prof.sopweb@usantotomas.edu.co", 3, 1),
	(3, "lubo51", "josepass", "Jose", "Lubo", "webmaster@usantotomas.edu.co", 2, 1);

	/*--t_tipoRedSocial*/
	INSERT INTO t_tipoRedSocial VALUES
	(1, "Facebook"),
	(2, "Instagram"),
	(3, "Twitter"),
	(4, "Linkedin");

	/*--t_facDep*/
	INSERT INTO t_facDep VALUES
	(1, "Departamento Departamento 1"),
	(2, "Departamento Departamento 2"),
	(3, "Departamento Departamento 3"),
	(4, "Departamento Departamento 4"),
	(5, "Departamento Departamento 5"),
	(6, "Departamento Departamento 6"),
	(7, "Departamento Departamento 7"),
	(8, "Departamento Departamento 8"),
	(9, "Departamento Departamento 9"),
	(10, "Facultades Facultades  10"),
	(12, "Facultades Facultades  12"),
	(13, "Facultades Facultades  13"),
	(14, "Facultades Facultades  14"),
	(15, "Facultades Facultades  15"),
	(16, "Facultades Facultades  16"),
	(17, "Facultades Facultades  17"),
	(18, "Facultades Facultades  18"),
	(19, "Facultades Facultades  19"),
	(20, "Facultades Facultades  20");

	/*--t_solicitud*/
	INSERT INTO t_solicitud VALUES ("ST000", "Solicitud Generada por el sistema", "No debe ser tenida encuenta", 1, "000");


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
        IN _cargo varchar(50),				 /*Relación de la tabla t_condoloencias*/
        IN _id_facDepCondo int,				 /*Relación de la tabla t_condoloencias*/
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
            INSERT INTO t_condolencias(nombreDoliente, cargoDoliente, id_facDep, nombreFallecido, parentesco, lugarVelacion, fechaVelacion, horaVelacion, numST) VALUES (_nombreDoliente, _cargo, _id_facDepCondo, _nombreFallecido, _parentesco, _lugarVelacion, _fechaVelacion, _horaVelacion, _numST);
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

        IN _id_tipoEvento int,              /*Relación de la tabla t_tipoevento*/
        IN _nombreEvento varchar(100),      /*Relación de la tabla t_evento*/
        IN _lugar varchar(100),             /*Relación de la tabla t_evento*/
        IN _fechaInicio DATE,               /*Relación de la tabla t_evento*/
        IN _fechaFin DATE,                  /*Relación de la tabla t_evento*/
        IN _hora varchar(10),               /*Relación de la tabla t_evento*/
        IN _numTIC varchar(100),            /*Relación de la tabla t_evento*/
        IN _txtLineamientos TEXT            /*Relación de la tabla t_evento*/
    )
        BEGIN
            INSERT INTO t_solicitud(numST, nombre, email, id_facDep, telefono) VALUES (_numST, _nombres, _email, _id_facDep, _telefono);
            INSERT INTO t_resusuario(id_usuario, numST) VALUES (_id_usuario, _numST);
            INSERT INTO t_trasabilidad(id_fase, numST, fecha, comentario, id_usuario) VALUES (_id_fase, _numST, _fecha, _comentario, _id_usuario);
            INSERT INTO t_resunidad(id_unidad, id_categoria, id_subCategoria, numST) VALUES (_id_unidad, _id_categoria, _id_subCategoria, _numST);
            INSERT INTO t_evento(id_tipoEvento, nombreEvento, lugar, fechaInicio, fechaFin, hora, numTIC, txtLineamientos, numST) VALUES (_id_tipoEvento, _nombreEvento, _lugar, _fechaInicio, _fechaFin, _hora, _numTIC, _txtLineamientos, _numST);
        END//
DELIMITER ;
