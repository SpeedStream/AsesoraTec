CREATE TABLE IF NOT EXISTS Usuarios(
	ID INT(64) NOT NULL auto_increment,
	Perfil BIT NULL,
	Nombre VARCHAR(127) NOT NULL,
	Email VARCHAR(320) NOT NULL,
	Celular VARCHAR(10) NOT NULL,
	Password VARCHAR(254) NOT NULL,
    FotoPerfil VARCHAR(254) NULL,
	PRIMARY KEY (ID)
) DEFAULT
	CHARSET=latin1
	AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS Habilidades(
	ID INT(64) NOT NULL auto_increment,
	IDUsuario INT(64) NOT NULL,
	Materia VARCHAR(50) NOT NULL,
	Habilidad VARCHAR(50) NOT NULL,
	ValoracionPromedio INT(3) NOT NULL DEFAULT 80,
	PremioActual VARCHAR(50) DEFAULT NULL,
	PRIMARY KEY (ID)
) DEFAULT
	CHARSET=latin1,
	AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS FormaPago(
	ID INT(1) NOT NULL auto_increment,
	FormaPago VARCHAR(50) NOT NULL,
	FechaAlta DATE NOT NULL,
	IDUsuarioAlta INT(64) NOT NULL,
	PRIMARY KEY (ID)
) DEFAULT
	CHARSET=latin1,
	AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS FormaPagoUsuario(
	ID INT(64) NOT NULL auto_increment,
	IDUsuario INT(64) NOT NULL,
	IDFormaPago INT(1) NOT NULL,
	FechaAlta DATE NOT NULL,
	PRIMARY KEY (ID)
) DEFAULT
	CHARSET=latin1,
	AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS Direccion(
	ID INT(64) NOT NULL auto_increment,
	IDUsuario INT(64) NOT NULL,
	Calle VARCHAR(256) NOT NULL,
	NumExterior VARCHAR(10) NOT NULL DEFAULT "",
	NumInterior VARCHAR(10) NOT NULL DEFAULT "",
	CP VARCHAR(5) NOT NULL,
	Colonia VARCHAR(50) NOT NULL,
	Municipio VARCHAR(50) NOT NULL,
	Ciudad VARCHAR(50) NOT NULL,
	Estado VARCHAR(50) NOT NULL,
	Pais VARCHAR(10) NOT NULL DEFAULT "México",
	PRIMARY KEY (ID)
) DEFAULT
	CHARSET=latin1,
	AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS MisAsesorias(
	ID INT(64) NOT NULL auto_increment,
    IDAsesor INT(64) NOT NULL,
    IDAsesorado INT(64) NOT NULL,
    IDFormaPago INT(1) NOT NULL,
    IDDireccion INT(64) NOT NULL,
    Fecha DATE NOT NULL,
    HoraInicio TIME NOT NULL,
    HoraFin TIME NOT NULL,
    Concluida BOOL DEFAULT FALSE,
    ComentarioAsesor VARCHAR(256) NOT NULL DEFAULT "",
    ComentarioAsesorado VARCHAR(256) NOT NULL DEFAULT "",
    PRIMARY KEY (ID)
) DEFAULT
	CHARSET=latin1,
    AUTO_INCREMENT=1;
