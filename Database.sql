CREATE TABLE IF NOT EXISTS Usuario(
	ID INT(64) NOT NULL auto_increment,
	Nombre VARCHAR(127) NOT NULL,
	Email VARCHAR(320) NOT NULL,
	Celular VARCHAR(10) NOT NULL,
	Password VARCHAR(14) NOT NULL,
	PRIMARY KEY (ID)
) DEFAULT
	CHARSET=latin1
	AUTO_INCREMENT=1;
